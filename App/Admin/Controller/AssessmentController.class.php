<?php
namespace Admin\Controller;
use Think\Controller;
class AssessmentController extends CommonController{
    //添加评估方法
    public function add(){
        $show = D('Show');
        if(IS_POST){
//            dump($_POST);
            $assessment = D('Assessment');
            if($assessment->create()){
//                dump($assessment->create());
                $data = $assessment->create();
//                dump($data);
                foreach($data['exchange'] as $k=> $v){
                    if ($v != ''){
                        if(explode(':',$v)[0] != 'http'&& explode(':',$v)[0] != 'https'){
                            $v = 'http://'.$v;
                        }
                        $data['exchange'][$k] = $v;
                    }
                }
                $data['exchange'] = json_encode($data['exchange']);
                foreach($data['s_link'] as $k=> $v){
                    if ($v != ''){
                        if(explode(':',$v)[0] != 'http'&& explode(':',$v)[0] != 'https'){
                            $v = 'http://'.$v;
                        }
                        $data['s_link'][$k] = $v;
                    }
                }
                $data['s_link'] = json_encode($data['s_link']);
                $data['p_id'] = $_POST['currency_id'];
                $data['d_assessment'] = $_POST['content'];
                $data['web'] = $_POST['web'];
//                dump($data);
                if($assessment->add($data)) {
                    $this->success('数据添加成功！',U('Admin/index#TabNavPage0'));die();
                }else{
                    $this->error('数据添加错误！',$assessment->getDbError());
                }
            }else{
                $this->error($assessment->getError());
            }
        }
        $id = I('get.currency_id');
        $result = $show->field('currency_id,currency_name')->where("currency_id=$id")->find();
        $this->assign('result',$result);
        $this->display();
    }
    public function upd(){
        $id = I('get.currency_id');
        $assessment = D('Assessment');
        if(IS_POST){
            if($assessment->create()){
                $data = $assessment->create();
//                dump($data);
                foreach($data['exchange'] as $k=> $v){
                    if ($v != ''){
                        if(explode(':',$v)[0] != 'http'&& explode(':',$v)[0] != 'https'){
                            $v = 'http://'.$v;
                        }
                        $data['exchange'][$k] = $v;
                    }
                }
                $data['exchange'] = json_encode($data['exchange']);
                foreach($data['s_link'] as $k=> $v){
                    if ($v != ''){
                        if(explode(':',$v)[0] != 'http'&& explode(':',$v)[0] != 'https'){
                            $v = 'http://'.$v;
                        }
                        $data['s_link'][$k] = $v;
                    }
                }
                $data['s_link'] = json_encode($data['s_link']);
                $data['p_id'] = $_POST['currency_id'];
                $data['d_assessment'] = $_POST['content'];
                $data['web'] = $_POST['web'];
                $data['p_id'] = $_POST['p_id'];
                $p_id = $_POST['p_id'];
//                dump($_POST);
//                die();
                $result =   $assessment->where("p_id=$p_id")->save($data);
//                dump($result);die();
                if($result !== false) {
                    $this->success('数据更新成功！',U('Admin/index#TabNavPage0'));die();
                }else{
                    $this->error('数据更新错误！',$assessment->getDbError());
                }
            }else{
                $this->error($assessment->getError());
            }
        }
        $result = $assessment->field('a.*,b.currency_name')->alias('a')->join("currency_show b ON b.currency_id=$id and b.currency_id=a.p_id")->find();
//        dump($result);
//        die();
//        $result = $assessment->where("p_id=$id")->find();
        $result['s_link'] = json_decode($result['s_link'],true);
        $result['exchange'] = json_decode($result['exchange'],true);
//        dump($result);
        $this->assign('result',$result);
        $this->display('Assessment/upd');
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
}