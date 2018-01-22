<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController
{
    /********一般数据方法开始*********/
    //首页的展示
    public function index()
    {
        //连接redis服务
        S(array('type'=>'redis'));
        $show = D('Show');
        //全部评估资料的显示
        $a_data = $show->order('currency_id desc')->select();
        $assessment = D('Assessment');
        //深度评估数据
        $d_assessment = $assessment -> field('p_id') ->select();
        $result = array();
        $d_arr = array();
        foreach ($d_assessment as $d_v){
            $d_arr[] = $d_v['p_id'];
        }
        foreach ($a_data as $v){
            if($d_assessment==null){
                $v['d_a'] = '添加';
                $v['d_a_href'] = U('Admin/Assessment/add',array('currency_id'=>$v['currency_id']),false);
            }
            if(in_array($v['currency_id'],$d_arr)){
                $v['d_a'] = '更新';
                $v['d_a_href'] = U('Admin/Assessment/upd',array('currency_id'=>$v['currency_id']),false);
            }else{
                $v['d_a'] = '添加';
                $v['d_a_href'] = U('Admin/Assessment/add',array('currency_id'=>$v['currency_id']),false);
            }
            if(S($v['currency'])){
                $m_redis = S($v['currency']);
                $add_arr = array("price_cny"=>$m_redis[0]['price_cny'],"market_cap_cny"=>$m_redis[0]['market_cap_cny'],"last_updated"=>$m_redis[0]['last_updated']);
                $result[] =  array_merge($v,$add_arr);
            }else{
                $result[] = $v;
            }
        }
        $this->assign('result', $result);
        //深度采访展示
        $interview = D('Interview');
        $iv_res = $interview->order('iv_id desc')->select();
//        dump($iv_res);die();
        $this->assign('interview',$iv_res);
        //公告栏数据
        $notic = D('Notic');
        $no_res = $notic->order('no_id desc')->select();
//        dump($no_res);die();
        $this->assign('notic',$no_res);
        //管理图标的显示
        $logo = D('Logo');
        $logo_r = $logo->select();
        $this->assign('logo',$logo_r);
        $this->display('Show/index');
    }
    //添加数据的方法
    public function add(){
        if(IS_POST){
            $show = D('Show');
            if($show->create()) {
                //判断是否有图片上传
                if($_FILES['logo_path']['error'] == 4){
                    $this->error('请上传图片');
                }
                //图片大小不能超过2M
                if($_FILES['logo_path']['size'] == 0){
                    $this->error('图片只支持小于2M');
                }
                //判断是否已经完整输入数据
                if ($_POST['introduction']==null ||$_POST['ishot']==null ||$_POST['assessment']==null ||$_POST['risk_score']==null){
                    $this->error('请填写完整数据');
                }
                $data = $show->create();
                $adr = array();
                foreach($data['exchange'] as $v){
                    if ($v != ''){
                        if(explode(':',$v)[0] != 'http'&& explode(':',$v)[0] != 'https'){
                            $v = 'http://'.$v;
                        }
                        $adr['exchange'][] = $v;
                    }
                }
                $data['exchange'] = json_encode($adr['exchange']);
//                dump($data);die();
//                dump($show->add());die();
                if($show->add($data)) {
                    $this->success('数据添加成功！',U("index",false));die();
                }else{
                    $this->error('数据添加错误！',$show->getDbError());
                }
            }else{
                $this->error($show->getError());
            }
        }
    }
    //更新数据方法
    public function upd(){
        $show = D('Show');
        $currency_id = I('get.currency_id');//用I方法接受get数据
        if(IS_POST){
            if($show->create()) {
                //判断是否有图片上传
//                if($_FILES['logo_path']['error'] == 4){
//                    $this->error('请上传图片');
//                }
                //判断是否已经完整输入数据
                if ($_POST['introduction']==null &&$_POST['ishot']==null &&$_POST['assessment']==null &&$_POST['risk_score']==null){
                    $this->error('请填写完整数据');
                }
                $id = $_POST['currency_id'];
                //往SAVE方法中添加字段id才能更新成功
                $data = $show->create();
                $adr = array();
//                foreach($data['exchange'] as $v){
//                    if ($v != ''){
//                        if(explode(':',$v)[0] != 'http'&& explode(':',$v)[0] != 'https'){
//                            $v = 'http://'.$v;
//                        }
//                        $adr['exchange'][] = $v;
//                    }
//                }
//                $data['exchange'] = json_encode($adr['exchange']);
                $result =   $show->where("currency_id=$id")->save($data);
//                dump($result);die();
                if($result !== false) {
                    $this->success('数据更新成功！',U('index'));die();
                }else{
                    $this->error('数据更新错误！',$show->getDbError());
                }
            }else{
                $this->error($show->getError());
            }
        }
        $result = $show->where("currency_id=$currency_id")->find();
        $this->assign('result',$result);
        $this->display('Show/upd');
    }
    //删除数据方法
    public function del(){
        $show = D('Show');
        $currency_id = I('get.currency_id');//用I方法接受get数据
        $show->delete($currency_id);
        $this->success('删除成功',U('index'));die();
    }
    /********一般数据方法结束*********/

    /********LOGO方法开始*********/
    //添加Logo图片管理
    public function add_logo(){
//        dump($_FILES);die();
        if(IS_POST){
            $logo = D('Logo');
            if($logo->create()) {
                //判断是否有图片上传
                if($_FILES['logo_adress']['error'] == 4){
                    $this->error('请上传图片');
                }
                //图片大小不能超过2M
                if($_FILES['logo_adress']['size'] == 0){
                    $this->error('图片只支持小于2M');
                }
                if($logo->add()) {
                    $this->success('数据添加成功！',U("index#TabNavPage3"));die();
                }else{
                    $this->error('数据添加错误！',$logo->getDbError());
                }
            }else{
                $this->error($logo->getError());
            }
        }
    }
    //更新Logo的方法
    public function upd_logo(){
        $logo = D('Logo');
//        $id = I('get.id');
        if(IS_POST){
            if($logo->create()) {
                $id = $_POST['id'];
                //往SAVE方法中添加字段id才能更新成功
                $result = $logo->where("id=$id")->save();
                if($result !== false) {
                    $this->success('数据更新成功！',U('index#TabNavPage3'));die();
                }else{
                    $this->error('数据更新错误！',$logo->getDbError());
                }
            }else{
                $this->error($logo->getError());
            }
        }
    }
    //删除logo的方法
    public function del_logo(){
        $logo = D('Logo');
        $id = I('get.id');
        $logo->delete($id);
        $this->success('删除成功',U('Admin/index#TabNavPage3'));die();
    }
    /********LOGO方法结束*********/
}