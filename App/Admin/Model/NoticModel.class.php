<?php
namespace Admin\Model;
use Think\Model;
class NoticModel extends Model{
    protected function _before_insert(&$data,$options){
        $data['add_time'] = time();
    }
    //更新前钩子
    protected function _before_update($options){
        $no_id = $options['no_id'];
        //从表单里获取的数据
        $up_arr = explode('img',$options['content']);
        $up_img = array();
        if(count($up_arr)!=1){
            $up_img = array_slice($up_arr,1);
            foreach ($up_img as $key=>$vu){
                $up_img[$key] = substr($vu,11,44);
            }
        }
        //从数据库中查找的数据
        $data = $this->field('content')->find($no_id);
        $arr = explode('img',$data['content']);
        if (count($arr) !=1){
            $img = array_slice($arr,1);
            foreach ($img as $k=>$v){
                if(in_array(substr($v,11,44),$up_img)==false){
                    @unlink('.'.substr($v,11,44));
                }
            }
        }
    }
    //删除前钩子
    protected function _before_delete($options){
        $no_id = $options['where']['no_id'];
        $data = $this->field('content')->find($no_id);
        $arr = explode('img',$data['content']);
        $img = array_slice($arr,1);
        foreach ($img as $v){
            @unlink('.'.substr($v,11,44));
        }
    }
}