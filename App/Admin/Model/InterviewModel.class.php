<?php
namespace Admin\Model;
use Think\Model;
class InterviewModel extends Model{
    //添加前处理
    protected function _before_insert(&$data,$options){
        $data['add_time'] = time();
        if($_FILES['iv_cover']['error'] == 0){
            $uploadinfo = $this->fileUpload();
            if($uploadinfo == false){
                return false;
            }else{
                $data['iv_cover'] = $uploadinfo['iv_cover']['savepath'].$uploadinfo['iv_cover']['savename'];
            }
        }
    }
    //更新前方法
    protected function _before_update(&$data,$options){
        $iv_id = $data['iv_id'];//获取ID
        //封面图片如果有上传 就删除旧的 使用新的
        if($_FILES['iv_cover']['error'] == 0){
            $uploadinfo = $this->fileUpload();
            if($uploadinfo == false){
                return false;
            }else{
                //有图片上传就先删除图片
                $result = $this->field('iv_cover')->find($iv_id);
                foreach ($result as $k=>$v){
                    //删除实体文件
                    $path = C("UPLOAD_PATH").$v;
                    @unlink($path);
                }
                //再进行上传图片
                $data['iv_cover'] = $uploadinfo['iv_cover']['savepath'].$uploadinfo['iv_cover']['savename'];
            }
        }
        //从表单里获取的数据
        $up_arr = explode('img',$data['content']);
        $up_img = array();
        if(count($up_arr) !=1){//第一个为标签代码 第二个开始才是图片 所以可以用大于号
            $up_img = array_slice($up_arr,1);
            foreach ($up_img as $key=>$vu){
                $up_img[$key] = substr($vu,11,44);
            }
        }
        //从数据库中查找的数据
        $data_i = $this->field('content')->find($iv_id);
        $arr = explode('img',$data_i['content']);
        if (count($arr) !=1){//第一个为标签代码 第二个开始才是图片
            $img = array_slice($arr,1);//去除数组中的第一个数据(即不是图片的数据)
            //遍历数据库中分解出来的数据 如果有就保留 没有就删除
            foreach ($img as $vue){
                if(in_array(substr($vue,11,44),$up_img)==false){
                    @unlink('.'.substr($vue,11,44));
                }
            }
        }
    }
    //上传的方法
    public function fileUpload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg','ico');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
        //上传文件
        if(!is_dir($upload->rootPath)){
            mkdir($upload->rootPath);
        }
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            return false;
        }else{// 上传成功
            return $info;
        }
    }
    //删除方法 带删除文件
    protected function _before_delete($options){
        $iv_id = $options['where']['iv_id'];
        $data = $this->field('content,iv_cover')->find($iv_id);
        $arr = explode('img',$data['content']);
        $img = array_slice($arr,1);
        foreach ($img as $v){
            @unlink('.'.substr($v,11,44));
        }
        foreach ($data['iv_cover'] as $k=>$vu){
            //删除实体文件
            $path = C("LOGO_PATH").$vu;
            @unlink($path);
        }
    }
}
