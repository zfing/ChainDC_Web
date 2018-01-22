<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
    //防无登录翻墙
    public function _initialize(){
//        if(cookie('account')){
//            $usr = D('User');
//            $usrn = $_COOKIE['account'];
//            $res = $usr->where("username='$usrn'")->find();
//            if($res){
//                session('account',$_COOKIE['account']);
//            }
//        }
        if(!session('?account')) {
            $this->error("非管理员不允许访问!!!", U('/Admin/Public/login'));
        }
//        if(!cookie('account')) {
//            $this->error("非管理员不允许访问!!!", U('/Admin/Public/login'));
//        }
    }
}