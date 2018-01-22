<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    //自动验证
    protected $_validate = array(
        array('username','require','账号不能为空',0,'regex',3),
        array('password','require','密码不能为空',0,'regex',3),
    );
    //密码验证
    public function CheckUser($username,$password){
        $where = array(
            'username'=>$username,
            'password'=> md5(md5($password).C('salt'))
        );
        return $this->where($where)->find();
    }
}