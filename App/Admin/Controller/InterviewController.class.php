<?php
namespace Admin\Controller;
class InterviewController extends CommonController
{
    //文章添加首页
    public function Add(){
        if(IS_POST){
            $interview = D('Interview');
            if($interview->create()) {
                //判断是否有图片上传
                if($_FILES['iv_cover']['error'] == 4){
                    $this->error('请上传图片');
                }
                if($interview->add()) {
                    $this->success('数据添加成功！',U('Admin/index#TabNavPage1'));die();
                }else{
                    $this->error('数据添加错误！',$interview->getDbError());
                }
            }else{
                $this->error($interview->getError());
            }
        }
        $this->display('Interview/add');
    }
    //更新采访页面数据
    public function Upd(){
        $id = I('get.iv_id');
        $interview = D('Interview');
        if(IS_POST){
            if($interview->create()){
                $iv_id = $_POST['iv_id'];
                $result = $interview->where("iv_id=$iv_id")->save();
                if($result!== false){
                    $this->success('数据添加成功！',U("Admin/index#TabNavPage1"));die();
                }else{
                    $this->error('数据添加错误！',$interview->getDbError());
                }
            }else{
                $this->error($interview->getError());
            }
        }
//        dump($data);
        //数据分配和渲染模板
        $data = $interview->field('iv_id,title,intro,iv_cover,content')->where("iv_id=$id")->find();
        $this->assign('data',$data);
        $this->display('Interview/upd');
    }
    //富文本编辑器的图片上传方法
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
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
    //删除文章功能 一并把里面的图片删除
    public function del(){
        $interview = D('Interview');
        $id = I('get.iv_id');
        $interview->delete($id);
        $this->success('删除成功',U('Admin/index#TabNavPage1'));die();
    }
    //点击查看内容
//    public function Show(){
//        $interview = D('Interview');
//        $id = I('get.iv_id');
//        $data = $interview->where("iv_id='$id'")->find();
//        //该功能为点击进去添加浏览量
//        if(cookie('iv_id')){//有数据就遍历数据
//            $id_arr = json_decode(cookie('iv_id'),true);
//            if (in_array($id,$id_arr)){
//                //如果当前id存在数组内 跳出本次判断
//                goto end;
////                echo '有当前id';
//            }else{
//                array_push($id_arr,$id);
//                cookie('iv_id',json_encode($id_arr),10800);
//                $data['click'] = $data['click'] +1;
//                $interview ->where("iv_id=$id")->save($data);
////                echo '没有当前id';
//            }
//        }else{//没数据
//            $id_arr[] = $id;
//            cookie('iv_id',json_encode($id_arr),10800);
//            $data['click'] = $data['click'] +1;
//            $interview ->where("iv_id=$id")->save($data);
//        }
//        //跳出判断标识符
//        end:
//        $this->assign('result',$data);
//        $this->display('show');
//    }
}