<?php
namespace Admin\Model;
use Think\Model;
class LogoModel extends Model{
    protected $_validate = array(
        array('keyword','require','关键字不能为空',0,'regex',3),
        array('keyword','','关键字不能重复',0,'unique',3),
    );
    //新增前钩子
    protected function _before_insert(&$data,$options){
//        dump($data);die();
        //字母转小写
        $data['keyword'] = strtolower($data['keyword']);
        //图片处理
        if($_FILES['logo_adress']['error'] == 0){
            $uploadinfo = $this->fileUpload();
            if($uploadinfo == false){
                return false;
            }else{
                $data['logo_adress'] = $uploadinfo['logo_adress']['savepath'].$uploadinfo['logo_adress']['savename'];
            }
        }
    }
    //更新前钩子
    protected function _before_update(&$data,$options){
        if($_FILES['logo_adress']['error'] == 0){
            $uploadinfo = $this->fileUpload();
//            dump($uploadinfo);die();
            if($uploadinfo == false){
                return false;
            }else{
//                dump($options);die();
                $id = substr($options['where']['_string'],3);
//                dump($id);die();
                $result = $this->field('logo_adress')->find($id);
//                dump($result);die();
                foreach ($result as $k=>$v){
                    //删除实体文件
                    $path = C("LOGO_PATH").$v;
                    @unlink($path);
                }
                $data['logo_adress'] = $uploadinfo['logo_adress']['savepath'].$uploadinfo['logo_adress']['savename'];
            }
        }
    }
    //上传的方法
    public function fileUpload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg','ico');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/Logo/'; // 设置附件上传根目录
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
        $id = $options['where']['id'];
        $result = $this->field('logo_adress')->find($id);
        foreach ($result as $k=>$v){
            //删除实体文件
            $path = C("LOGO_PATH").$v;
            @unlink($path);
        }
    }
}