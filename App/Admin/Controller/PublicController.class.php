<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function login(){
        //session判断登录
//        dump(cookie('account'));die();
        if(cookie('account')){
            $usr = D('User');
            $usrn = $_COOKIE['account'];
            $res = $usr->where("username='$usrn'")->find();
            if($res){
                session('account',$_COOKIE['account']);
            }
        }
        if(session('account')){
            $this->redirect("Admin/Admin/Index");
        }
        if(IS_POST){
            //验证码验证
            $verify = new \Think\Verify();
            if(!$verify->check(I('post.captcha'))){
                $this->error("你输入的验证码错误,请重新填写");
            }
            //登录验证
            $userinfo = D('User')->CheckUser(I('post.username'),I('post.password'));
            if($userinfo){
                //验证完成写入session
                session('account',$userinfo['username']);
                //验证完成写入cookie
                cookie('account',$userinfo['username'],3600*24*365*15);
                $this->redirect("Admin/Admin/Index");
            }else{
                $this->error("账号或密码错误,请重新填写!");
            }
        }
        $this->display('Login/login');
    }
    //验证码
    public function getCode(){
        $config =	array(
            'fontSize'  =>  14,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'imageH'    =>  0,               // 验证码图片高度
            'imageW'    =>  0,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'codeSet'   =>  '123456789abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXYZ',
            'bg'        =>  array(176,224,230),
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
}