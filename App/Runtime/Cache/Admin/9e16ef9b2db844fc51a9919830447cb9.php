<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <link rel="shortcut icon" href="/Public/Admin/images/login/titlelogo.icon" type="image/x-icon">
    <link rel="stylesheet" href="/Public/Admin/css/login.css">

</head>
<body>

    <div class="loginBox">
        <div class="loginCon">
            <div class="loginImg">
                <img src="/Public/Admin/images/login/login_pic.png" alt="">
            </div>
            <form action="/index.php/Admin/Public/login" method="post">
                <div class="loginPerson">
                    <div class="loginUser">
                        <div class="loginUser_left">
                            <div class="loginUser_left_text">账号</div>
                            <div class="loginUser_left_img"><img src="/Public/Admin/images/login/account.png" alt=""></div>
                        </div>
                        <input type="text" class="username" name="username">

                    </div>
                    <div class="loginPW">
                        <div class="loginUser_left">
                            <div class="loginUser_left_text">密码</div>
                            <div class="loginUser_left_img"><img src="/Public/Admin/images/login/password.png" alt=""></div>
                        </div>
                        <input type="password" class="password" name="password">

                    </div>

                </div>
                <div class="identify">
                    <label>验证码</label>
                    <input type="text" name="captcha" id="captcha" >
                    <img src="/index.php/Admin/Public/getCode" title="点击更换验证码" id="imgcha">
                </div>

                <div class="loginSub">
                    <input type="submit" class="submit" value="登陆">
                </div>
            </form>

        </div>
        <div class="wl-copy">
            <p>广州未来链信息技术有限公司 出品</p>
            <p> © 2016-2017 Chaindc All rights reserved</p>
        </div>
    </div>

</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script>
/*
//jq:
$(function () {
    $('.username').focus();//获取光标
    $('.submit').click(function () {
        var usernameCon = $('.username').val();
        var passwordCon = $('.password').val();

        if (usernameCon.replace(/(^\s*)|(\s*$)/g, "")==""){

            $('.username').attr({placeholder:'请输入账号'});
            return false
        }else if (passwordCon.replace(/(^\s*)|(\s*$)/g, "")==""){

            $('.password').attr({placeholder:'请输入密码'});
            return false
        }
    });

});*/
var submit = document.querySelector('.submit');
var username = document.querySelector('.username');
var password = document.querySelector('.password');
var captcha = document.querySelector('#captcha');
username.focus();
submit.onclick = function () {
    var usernameCon = document.querySelector('.username').value;

    var passwordCon = document.querySelector('.password').value;

    var captchaCon = document.querySelector('#captcha').value;


    if (usernameCon.replace(/(^\s*)|(\s*$)/g, "")==""){
        username.setAttribute('placeholder','请输入账号');
        return false
    }
    if (passwordCon.replace(/(^\s*)|(\s*$)/g, "")==""){
        password.setAttribute('placeholder','请输入密码');
        return false
    }
    if (captchaCon.replace(/(^\s*)|(\s*$)/g, "")==""){
        captcha.setAttribute('placeholder',' 请输入验证码');
        return false
    }
};
//验证码刷新
$('#imgcha').click(function(){
    $(this).attr('src','/index.php/Admin/Public/getCode/_/'+Math.random());
});
//$('#imgcha').click();
</script>
</html>