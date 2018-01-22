<?php
namespace Home\Controller;
use Think\Controller;
//该方法主要实现所有的json数据发送
class JsonController extends Controller{
    //首页中间列表的项目数据
    public function getData(){
        //连接redis服务
        S(array('type'=>'redis'));
        //查找mysql数据
        $show = D('Show');
        $data = $show->field('currency_id,currency_name,ishot,assessment,logo_path,emarket,risk_score,currency')->order('emarket desc')->select();
        //查询评估数据
        $assessment = D('Assessment');
        $d_assessment = $assessment -> field('p_id') ->select();
        $d_arr = array();
        foreach ($d_assessment as $d_v){
            $d_arr[] = $d_v['p_id'];
        }
        $result = array();
        foreach ($data as $v){
            $v['logo_path'] = 'url(/Public/Uploads/'.$v['logo_path'].')';
            //热度判断
            //判断是否已经填写数据
            if(in_array($v['currency_id'],$d_arr)){
                $v['d_a'] = 1;
            }else{
                $v['d_a'] = 0;
            }
            if($v['ishot']==1){
                $v['ishot'] = "高";
            }else if($v['ishot']==2){
                $v['ishot'] = "中";
            }else if($v['ishot']==3){
                $v['ishot'] = "低";
            }else{
                $v['ishot'] = "暂无";
            }
            //风险判断
            if($v['risk_score']==1){
                $v['risk_score'] = "高";
            }else if($v['risk_score']==2){
                $v['risk_score'] = "中";
            }else if($v['risk_score']==3){
                $v['risk_score'] = "低";
            }else{
                $v['risk_score'] = '暂无';
            }
            //深度评估判断
            if($v['assessment']=='A'){
                $v['as_title'] = "投资级";
            }else if($v['assessment']=='B'){
                $v['as_title'] = "投资级";
            }else if($v['assessment']=='C'){
                $v['as_title'] = "投资级";
            }else if($v['assessment']=='D'){
                $v['as_title'] = "投机级";
            }else if($v['assessment']=='E'){
                $v['as_title'] = "投机级";
            }else{
                $v['assessment'] = '暂无';
                $v['as_title'] = '未评估';
            }
            if($v['currency']!=null){
                if(S($v['currency'])!=false){
                    $m_redis = S($v['currency']);
                    $add_arr = array(
                        //当前价格
                        "price_cny"=>'￥'.number_format($m_redis['price_cny'],2,'.',','),
                        //当前市值
                        "market_cap_cny"=>'￥'.number_format(FormatMoney($m_redis['market_cap_cny']),1,'.',',').'亿',
                        //更新时间
                        "last_updated"=>'更新时间:'.date('Y-m-d H:i:s',$m_redis['last_updated']),
                        //价格涨跌状态
                        'updown'=>$m_redis['updown'],
                        //涨幅
                        'percent_change_24h'=>$m_redis['percent_change_24h'],
                        //预估潜力
//                        "multiple"=>number_format($v['emarket']/FormatMoney($m_redis['market_cap_cny']),1,'.',',').'倍'
                        "multiple"=>'1倍',
                        //预估市值(暂定)
                        'emarket' =>  '￥'.number_format(FormatMoney($m_redis['market_cap_cny']),1,'.',',').'亿'
                    );
                }else{
                    $add_arr = array("price_cny"=>'暂无',"market_cap_cny"=>'暂无',"last_updated"=>'暂无',"multiple"=>'暂无','updown'=>0,'emarket'=>'暂无');
                }
            }else{
                $add_arr = array("price_cny"=>'暂无',"market_cap_cny"=>'暂无',"last_updated"=>'暂无',"multiple"=>'暂无','updown'=>0,'emarket'=>'暂无');
            }
//            if($v['emarket']!=null){
//                $v['emarket'] = '￥'.number_format($v['emarket'],1,'.',',').'亿';
//            }else{
//                $v['emarket'] = '暂无';
//            }
            $result['dataS'][]['data'] = array_merge($v,$add_arr);
        }
        echo $_GET['callback'].'('.json_encode($result).')';
    }
    //最新的两条采访数据
    public function getNewIv(){
        $interview = D('Interview');
        $result = $interview->field('iv_id,title,intro,iv_cover')->order('iv_id desc')->limit(8)->select();
        foreach ($result as$k => $v){
            $result[$k]['iv_cover'] = C("READ_PATH").$v['iv_cover'];
            //url等页面渲染做好再决定
            $result[$k]['url'] = '/index.php/Home/Index/InterNotic/iv_id/'.$v['iv_id'];
        }
        echo $_GET['callback'].'('.json_encode($result).')';
    }
    //最新的六条公告数据
    public function getNewNo(){
        $notic = D('Notic');
        $result = $notic->field('no_id,title')->order('no_id desc')->limit(6)->select();
        //url待定页面渲染后再实现
        foreach ($result as $k => $v){
            $result[$k]['url'] = '/index.php/Home/Index/InterNotic/no_id/'.$v['no_id'];
        }
        echo $_GET['callback'].'('.json_encode($result).')';
    }
    //获取全部的采访数据
    public function getIv(){
        $interview = D('Interview');
        $data = $interview->field('iv_id,title,intro,iv_cover')->order('iv_id desc')->select();
        foreach ($data as $k=>$v){
            $data[$k]['iv_cover'] = C('READ_PATH').$v['iv_cover'];
            //url等页面渲染做好再决定
            $data[$k]['url'] = '/index.php/Home/Index/InterNotic/iv_id/'.$v['iv_id'];
        }
        echo $_GET['callback'].'('.json_encode($data).')';
    }
    //获取全部的公告数据
    public function getNo(){
        $notic = D('Notic');
        //查找数据库的数据
        $data = $notic->field('no_id,title,add_time')->select();
        foreach ($data as $k=>$v){
            $data[$k]['add_time'] = date('Y/m/d',$v['add_time']);
            //url等页面渲染做好再决定
            $data[$k]['url'] = '/index.php/Home/Index/InterNotic/no_id/'.$v['no_id'];
        }
        echo $_GET['callback'].'('.json_encode($data).')';
    }
    //代码审计的数据接口
    public function infos(){
        $code = D('Code');
        $data = $code->field('a.*,b.ishot')->alias('a')->join('currency_show b ON b.currency_name=a.abbreviation')->select();
        $result = array();
        foreach ($data as $v){
            if($v['ishot']==1){
                $v['hot'] = '高';
            }else if($v['ishot']==2){
                $v['hot'] = '中';
            }else{
                $v['hot'] = '低';
            }
            $v['path'] =  'url(/Public/Uploads/'.$v['path'].')';
            $v['this_month_commit'] = $v['this_month_commit'] + $v['this_day_commit'];
            $v['this_month_add'] = $v['this_month_add'] + $v['this_day_add'];
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
            $result['infos'][] = $v;
        }
        echo $_GET['callback'].'('.json_encode($result).')';
    }
    public function test(){
        //连接redis服务
        S(array('type'=>'redis'));
        //查找mysql数据
        $show = D('Show');
        $data = $show->field('currency_id,currency_name,ishot,assessment,logo_path,emarket,risk_score,currency')->order('emarket desc')->select();
        //查询评估数据
        $assessment = D('Assessment');
        $d_assessment = $assessment -> field('p_id') ->select();
        $d_arr = array();
        foreach ($d_assessment as $d_v){
            $d_arr[] = $d_v['p_id'];
//            dump($d_v);
        }
        $result = array();
        foreach ($data as $v){
            $v['logo_path'] = 'url(/Public/Uploads/'.$v['logo_path'].')';
            //热度判断
            //判断是否已经填写数据
            if(in_array($v['currency_id'],$d_arr)){
                $v['d_a'] = 1;
            }else{
                $v['d_a'] = 0;
            }
            if($v['ishot']==1){
                $v['ishot'] = "高";
            }else if($v['ishot']==2){
                $v['ishot'] = "中";
            }else{
                $v['ishot'] = "低";
            }
            //风险判断
            if($v['risk_score']==1){
                $v['risk_score'] = "高";
            }else if($v['risk_score']==2){
                $v['risk_score'] = "中";
            }else{
                $v['risk_score'] = "低";
            }
            //深度评估判断
            if($v['assessment']=='A'){
                $v['as_title'] = "投资级";
            }else if($v['assessment']=='B'){
                $v['as_title'] = "投资级";
            }else if($v['assessment']=='C'){
                $v['as_title'] = "投资级";
            }else if($v['assessment']=='D'){
                $v['as_title'] = "投机级";
            }else{
                $v['as_title'] = "投机级";
            }
            if($v['currency']!=null){
                if(S($v['currency'])!=false){
                    $m_redis = S($v['currency']);
                    $add_arr = array(
                        //当前价格
                        "price_cny"=>'￥'.number_format($m_redis['price_cny'],2,'.',','),
                        //当前市值
                        "market_cap_cny"=>'￥'.number_format(FormatMoney($m_redis['market_cap_cny']),1,'.',',').'亿',
                        //更新时间
                        "last_updated"=>'更新时间:'.date('Y-m-d H:i:s',$m_redis['last_updated']),
                        //价格涨跌状态
                        'updown'=>$m_redis['updown'],
                        //涨幅
                        'percent_change_24h'=>$m_redis['percent_change_24h'],
                        //预估潜力
//                        "multiple"=>number_format($v['emarket']/FormatMoney($m_redis['market_cap_cny']),1,'.',',').'倍'
                        "multiple"=>'1倍',
                        //预估市值(暂定)
                        'emarket' =>  '￥'.number_format(FormatMoney($m_redis['market_cap_cny']),1,'.',',').'亿'
                    );
                }else{
                    $add_arr = array("price_cny"=>'暂无',"market_cap_cny"=>'暂无',"last_updated"=>'暂无',"multiple"=>'暂无','updown'=>0);
                }
            }else{
                $add_arr = array("price_cny"=>'暂无',"market_cap_cny"=>'暂无',"last_updated"=>'暂无',"multiple"=>'暂无','updown'=>0);
            }
//            if($v['emarket']!=null){
//                $v['emarket'] = '￥'.number_format($v['emarket'],1,'.',',').'亿';
//            }else{
//                $v['emarket'] = '暂无';
//            }
            $result['dataS'][]['data'] = array_merge($v,$add_arr);
        }
        dump($result);
//        echo $_GET['callback'].'('.json_encode($result).')';
    }
}