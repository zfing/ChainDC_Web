<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    //主页展示
    public function index()
    {
        if ($_SERVER ['HTTP_HOST'] !='www.chaindc.com'){
            header('Location: http://www.chaindc.com');
        }
        //查找mysql数据
        $show = D('Show');
        $data = $show->field('currency_id,currency_name,introduction,logo_path')->order('currency_id desc')->select();
        //查找评估数据
        $assessment = D('Assessment');
        $d_assessment = $assessment -> field('p_id') ->select();
        $result = array();
        $d_arr = array();
        foreach ($d_assessment as $d_v){
            $d_arr[] = $d_v['p_id'];
        }
        foreach ($data as $v){
            if(in_array($v['currency_id'],$d_arr)){
                $v['d_a'] = 1;
            }else{
                $v['d_a'] = 0;
            }
            $result[] = $v;
        }
//        dump($result);
        $this->assign('result',$result);
        $this->display('');
    }
    //深度专访的展示页面
    public function IvIndex(){
        $this->display('Index/ivindex');
    }
    //公告的展示页面
    public function NoIndex(){
        $this->display('Index/noindex');
    }
    //详情页的展示页面(包括深度专访和公告)
    public function InterNotic(){
        //开启redis
        S(array('type'=>'redis'));
        $id_key = array_keys($_GET);//获取数组中的键名
        if(in_array('iv_id',$id_key)){//查看数组数据是否有iv_id
            $id = I('get.iv_id');
            $interview = D('Interview');
            $data = $interview->where("iv_id=$id")->find();
//            $data['name'] = '专访';
            if(cookie('iv_id')){//有数据就遍历数据
                $id_arr = json_decode(cookie('iv_id'),true);
                if (in_array($id,$id_arr)){
                    //如果当前id存在数组内 跳出本次判断
//                    dump(S("iv_id_$id"));die();
                    $data['click'] = S("iv_id_$id");
                    goto end;
                }else{
                    array_push($id_arr,$id);
                    cookie('iv_id',json_encode($id_arr),10800);
                    $click = S("iv_id_$id");
                    $data['click'] = $click+1;
//                    dump($data['click']);die();
                    S("iv_id_$id",$data['click']);
                }
            }else{//没数据
                $id_arr[] = $id;
                cookie('iv_id',json_encode($id_arr),10800);
                $click = S("iv_id_$id");
                $data['click'] = $click+1;
                //把数据增加到redis
                S("iv_id_$id",$data['click']);
            }
            //跳出判断标识符
            end:
//            dump($data);die();
            $this->assign('data',$data);
        }else{//没有就获取no_id
            $id = I('get.no_id');
            $notic = D('Notic');
            $data = $notic->where("no_id=$id")->find();
//            $data['name'] = '公告';
            if(cookie('no_id')){//有数据就遍历数据
                $id_arr = json_decode(cookie('no_id'),true);
                if (in_array($id,$id_arr)){
                    $data['click'] = S("no_id_$id");
                    //如果当前id存在数组内 跳出本次判断
                    goto end_no;
                }else{
                    array_push($id_arr,$id);
                    cookie('no_id',json_encode($id_arr),10800);
                    $click = S("no_id_$id");
                    $data['click'] = $click+1;
                    S("no_id_$id",$data['click']);
//                echo '没有当前id';
                }
            }else{//没数据
                $id_arr[] = $id;
                cookie('no_id',json_encode($id_arr),10800);
                $click = S("no_id_$id");
                $data['click'] = $click+1;
                //保存进redis里面
                S("no_id_$id",$data['click']);
            }
            //跳出判断标识符
            end_no:
            $this->assign('data',$data);
        }
        $this->display('Index/InterNotice');
    }
    public function ceshi(){
        $this->display('Index/ceshi');
    }
    //深度评估页面
    public function pages(){
        //连接redis服务
        S(array('type'=>'redis'));
        $show = D('Show');
        $id=I('get.id');
        $data=$show->where("currency_id=$id")->find();
        $m_redis = S($data['currency']);
        $result = $show->alias('a')->join("currency_assessment b ON b.p_id=$id and b.p_id=a.currency_id")->find();
        $result['market'] = number_format(FormatMoney($m_redis['market_cap_cny']),1,'.',',');
        $result['multiple'] = number_format($data['emarket']/FormatMoney($m_redis['market_cap_cny']),1,'.',',');
        $this->assign('result',$result);
        $this->display();
    }
    //代码审计
    public function codeStatus(){
        $this->display();
    }
//    public function text(){
//        $interview = D('Interview');
//        $result = $interview->field('iv_id,title,intro,iv_cover')->order('iv_id desc')->limit(2)->select();
//        dump($result);
//    }
//详情页的展示页面(包括深度专访和公告)
    public function test(){
        //连接redis服务
        S(array('type'=>'redis'));
        //查找mysql数据
        $show = D('Show');
        $data = $show->field('currency_id,currency_name,ishot,assessment,logo_path,emarket,risk_score,currency')->order('emarket desc')->select();
        foreach ($data as $v){
            echo $v['currency'];
            if(S($v['currency'])!=false){
                $m_redis = S($v['currency']);
                dump($m_redis);
            }

        }
        //开启redis
//        S(array('type'=>'redis'));
////        $id_key = array_keys($_GET);//获取数组中的键名
////        if(in_array('iv_id',$id_key)){//查看数组数据是否有iv_id
//            $id = 35;
//            $interview = D('Interview');
//            $data = $interview->where("iv_id=$id")->find();
////            $data['name'] = '专访';
//            if(cookie('iv_id')){//有数据就遍历数据
//                $id_arr = json_decode(cookie('iv_id'),true);
//                if (in_array($id,$id_arr)){
//                    //如果当前id存在数组内 跳出本次判断
////                    dump(S("iv_id_$id"));die();
//                    $data['click'] = S("iv_id_$id");
//                    goto end;
//                }else{
//                    array_push($id_arr,$id);
//                    cookie('iv_id',json_encode($id_arr),10800);
//                    $click = S("iv_id_$id");
//                    $data['click'] = $click+1;
////                    dump($data['click']);die();
//                    S("iv_id_$id",$data['click']);
//                }
//            }else{//没数据
//                $id_arr[] = $id;
//                cookie('iv_id',json_encode($id_arr),10800);
//                $click = S("iv_id_$id");
//                $data['click'] = $click+1;
//                //把数据增加到redis
//                S("iv_id_$id",$data['click']);
//            }
//            //跳出判断标识符
//            end:
////            dump(html_entity_decode($data['content']));
////            die();
//            $this->assign('data',$data);
////        }else{//没有就获取no_id
////            $id = I('get.no_id');
////            $notic = D('Notic');
////            $data = $notic->where("no_id=$id")->find();
//////            $data['name'] = '公告';
////            if(cookie('no_id')){//有数据就遍历数据
////                $id_arr = json_decode(cookie('no_id'),true);
////                if (in_array($id,$id_arr)){
////                    $data['click'] = S("no_id_$id");
////                    //如果当前id存在数组内 跳出本次判断
////                    goto end_no;
////                }else{
////                    array_push($id_arr,$id);
////                    cookie('no_id',json_encode($id_arr),10800);
////                    $click = S("no_id_$id");
////                    $data['click'] = $click+1;
////                    S("no_id_$id",$data['click']);
//////                echo '没有当前id';
////                }
////            }else{//没数据
////                $id_arr[] = $id;
////                cookie('no_id',json_encode($id_arr),10800);
////                $click = S("no_id_$id");
////                $data['click'] = $click+1;
////                //保存进redis里面
////                S("no_id_$id",$data['click']);
////            }
////            //跳出判断标识符
////            end_no:
////            $this->assign('data',$data);
////        }
//        $this->display('Index/test');
    }
}