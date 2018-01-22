<?php
namespace Admin\Controller;
class NoticController extends CommonController{
    //添加方法
    public function Add(){
        if(IS_POST){
            $notic = D('Notic');
            if($notic->create()) {
                if($notic->add()) {
                    $this->success('数据添加成功！',U('Admin/index#TabNavPage1'));die();
                }else{
                    $this->error('数据添加错误！',$notic->getDbError());
                }
            }else{
                $this->error($notic->getError());
            }
        }
        $this->display('Notic/add');
    }
    //公告的更新方法
    public function Upd(){
        $id = I('get.no_id');
        $notic = D('Notic');
        if(IS_POST){
            if($notic->create()){
                $no_id = $_POST['no_id'];
                $result = $notic->where("no_id=$no_id")->save();
                if($result!== false){
                    $this->success('数据更新成功！',U("Admin/index#TabNavPage1"));die();
                }else{
                    $this->error('数据更新错误！',$notic->getDbError());
                }
            }else{
                $this->error($notic->getError());
            }
        }
        $data = $notic->field('no_id,title,content')->where("no_id=$id")->find();
        $this->assign('data',$data);
        $this->display('Notic/upd');
    }
    //删除方法
    public function Del(){
        $id = I('get.no_id');
        $notic = D('Notic');
        $notic->delete($id);
        $this->success('删除成功',U('Admin/index#TabNavPage1'));die();
    }
    //富文本编辑器的图片上传方法
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传根目录
        // 上传单个文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            foreach($info as $file){
                $url = C('READ_PATH').$file['savepath'].$file['savename'];
                //预留接口 ************
                //在这里可以把图片地址写入数据库 或者对图片进行操作 例如生成缩略图

                //这里返回每一次的URL pulpload 规则 参见 编辑器js
                $this->ajaxReturn($url,'EVAL');
            }
        }
    }
    //展示通知页面
//    public function Show(){
//        //获取ID值
//        $id = I('get.no_id');
//        //查询数据库
//        $notic = D('Notic');
//        $data = $notic->field('title,content,click,add_time')->where("no_id=$id")->find();
//        $this->assign('data',$data);
//        $this->display('Notic/show');
//    }
}