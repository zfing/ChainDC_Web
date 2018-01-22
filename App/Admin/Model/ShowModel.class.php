<?php
namespace Admin\Model;
use Think\Model;
class ShowModel extends Model{
    //自动验证
    protected $_validate = array(
        array('currency_name','require','名称栏目不能为空',0,'regex',3),
        array('currency_name','','名字不能重复',0,'unique',3),
        array('currency','require','市值栏不能为空',0,'regex',3),
        array('currency','','名字不能重复',0,'unique',3),
//        array('current','require','当前价格不能为空',0,'regex',3),
    );
    //插入新增数据前的回调方法
    protected function _before_insert(&$data,$options){
        //判断有没有上传图片  并制作缩略图
//        dump($_FILES);die();
        if($_FILES['logo_path']['error'] == 0){
            $uploadinfo = $this->fileUpload();
//            dump($uploadinfo);die();
            if($uploadinfo == false){
                return false;
            }else{
                $data['logo_path'] = $uploadinfo['logo_path']['savepath'].$uploadinfo['logo_path']['savename'];
                $thumb_url = $uploadinfo['logo_path']['savepath']."thumb_".$uploadinfo['logo_path']['savename'];
                $image = new \Think\Image();
                $image->open(C("UPLOAD_PATH").$data['logo_path']);
                $image->thumb(40,40,2)->save(C("UPLOAD_PATH").$thumb_url);
                $data['thumb_path'] = $thumb_url;
            }
        }
    }
    //插入数据后调用接口更新缓存redis
    protected function _after_insert(&$data,$options){
//        dump($data['currency']);die();
        //连接redis服务
        S(array('type'=>'redis'));
        $url = "https://api.coinmarketcap.com/v1/ticker/{$data['currency']}/?convert=CNY";
        if(makeRequest($url)['code']==200){
            S($data['currency'],makeRequest($url)['result']);
        }
    }
//更新数据前的回调方法
    protected function _before_update(&$data,$options){
//        dump(substr($options['where']["_string"],12));

//        dump($result);die();
        //判断有没有上传图片  并制作缩略图
//        dump($_FILES);die();
        if($_FILES['logo_path']['error'] == 0){
//            dump($this->fileUpload());die();
            $uploadinfo = $this->fileUpload();
//            dump($uploadinfo);die();
            if($uploadinfo == false){
                return false;
            }else{
                //有图片上传就先删除图片
                $id = substr($options['where']["_string"],12);
                $result = $this->field('logo_path,thumb_path')->find($id);
                foreach ($result as $k=>$v){
                    //删除实体文件
                    $path = C("UPLOAD_PATH").$v;
                    @unlink($path);
                }
                //再进行上传图片
                $data['logo_path'] = $uploadinfo['logo_path']['savepath'].$uploadinfo['logo_path']['savename'];
                $thumb_url = $uploadinfo['logo_path']['savepath']."thumb_".$uploadinfo['logo_path']['savename'];
                $image = new \Think\Image();
                $image->open(C("UPLOAD_PATH").$data['logo_path']);
                $image->thumb(40,40,2)->save(C("UPLOAD_PATH").$thumb_url);
                $data['thumb_path'] = $thumb_url;
            }
        }
    }
    //插入数据后调用接口更新缓存redis
    protected function _after_update(&$data,$options){
//        dump($data['currency']);die();
        //连接redis服务
        S(array('type'=>'redis'));
        $url = "https://api.coinmarketcap.com/v1/ticker/{$data['currency']}/?convert=CNY";
        if(makeRequest($url)['code']==200){
            S($data['currency'],makeRequest($url)['result']);
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
//        dump($info);die();
        if(!$info) {// 上传错误提示错误信息
            return false;
        }else{// 上传成功
            return $info;
        }
    }
    //删除前钩子
    protected function _before_delete($options){
        $currency_id = $options['where']['currency_id'];
//        dump($currency_id);die();
        $result = $this->field('logo_path,thumb_path')->find($currency_id);
        foreach ($result as $k=>$v){
            //删除实体文件
            $path = C("UPLOAD_PATH").$v;
            @unlink($path);
        }
    }
}