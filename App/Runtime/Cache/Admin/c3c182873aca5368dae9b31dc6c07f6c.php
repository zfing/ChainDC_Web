<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据更新</title>
    <link rel="stylesheet" href="/Public/Admin/css/index.css">
    <script src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Admin/js/contentProject.js"></script>


</head>
<body>
<div class="projectUpload">
    <form action="/index.php/Admin/Admin/upd" method="post" enctype="multipart/form-data">
        <input type="hidden" name="currency_id" value="<?= $result['currency_id']; ?>">
        <div class="main-container">
            <div class="main-container-title">添加项目</div>

            <div class="main-container-top">
                <div class="main-project-name">
                    <span>项目名称</span>
                    <input type="text" name="currency_name" class="proName" value="<?= $result['currency_name']; ?>">
                </div>
                <div class="main-project-name">
                    <span>github名称</span>
                    <input type="text" name="project_name" class="allName">&nbsp;<tishi>需要爬取数据的GitHub地址后缀 如:https://github.com/bitcoin中的bitcoin</tishi>
                </div>
                <div class="main-project-currency">
                    <span>币种名称</span>
                    <input type="text" name="currency" class="currency" value="<?= $result['currency']; ?>">&nbsp;<tishi>正确填写获取接口数据(当前价格和当前市值) 如:BTC为项目bitcoin</tishi>
                </div>
                <div class="main-project-introduction">
                    <span>公司简介</span>
                    <input type="text" name="introduction" class="introduction" value="<?= $result['introduction']; ?>">
                </div>
                <div class="main-project-logo">
                    <span>项目logo</span>
                    <div class="main-project-logoBox">
                        <div id="preview">
                            <img id="imghead"  border=0 src="<?= C('READ_PATH').$result['thumb_path']; ?>">
                        </div>
                        <div class="fileInputContainer">
                            <input type="file" class="fileInput" name="logo_path" onchange="previewImage(this)" />
                        </div>
                    </div>
                </div>
                <!--<div class="main-project-type">-->
                    <!--<span>项目类型</span>-->
                    <!--<div>-->
                        <!--<label for="proType1" class="proType <?= ($result[project_type]==1) ? 'proStyleCss':'';?>">上层应用<input id="proType1" type="radio" name="project_type" value="1"></label>-->
                        <!--<label for="proType2" class="proType <?= ($result[project_type]==2) ? 'proStyleCss':'';?>">协 议 层<input id="proType2" type="radio" name="project_type" value="2"></label>-->
                        <!--<label for="proType3" class="proType <?= ($result[project_type]==3) ? 'proStyleCss':'';?>">底层系统<input id="proType3" type="radio" name="project_type" value="3"></label>-->
                    <!--</div>-->
                <!--</div>-->
            </div>

            <div class="main-container-bottom">
                <div>
                    <span class="project-titleName">项目热度</span>
                    <div class="container-bottom-right main-project-hot">
                        <label for="proHot1" class="proHot <?= ($result[ishot]==1) ? 'proStyleCss':'';?>">高<input id="proHot1" type="radio" name="ishot" value="1"></label>
                        <label for="proHot2" class="proHot <?= ($result[ishot]==2) ? 'proStyleCss':'';?>">中<input id="proHot2" type="radio" name="ishot" value="2"></label>
                        <label for="proHot3" class="proHot <?= ($result[ishot]==3) ? 'proStyleCss':'';?>">低<input id="proHot3" type="radio" name="ishot" value="3"></label>
                        <label for="proHot4" class="proHot <?= ($result[ishot]==4) ? 'proStyleCss':'';?>">暂无<input id="proHot4" type="radio" name="ishot" value="4"></label>
                    </div>
                </div>
                <div>
                    <span class="project-titleName">项目风险</span>
                    <div class="container-bottom-right main-project-risk">

                        <label for="proRisk1" class="proRisk <?= ($result[risk_score]==1) ? 'proStyleCss':'';?>">高<input id="proRisk1" type="radio" name="risk_score" value="1"></label>

                        <label for="proRisk2" class="proRisk <?= ($result[risk_score]==2) ? 'proStyleCss':'';?>">中<input id="proRisk2" type="radio" name="risk_score" value="2"></label>

                        <label for="proRisk3" class="proRisk <?= ($result[risk_score]==3) ? 'proStyleCss':'';?>">低<input id="proRisk3" type="radio" name="risk_score" value="3"></label>

                        <label for="proRisk4" class="proRisk <?= ($result[risk_score]==4) ? 'proStyleCss':'';?>">暂无<input id="proRisk4" type="radio" name="risk_score" value="4"></label>
                    </div>
                </div>
                <div>
                    <span class="project-titleName">深度评估</span>
                    <div class="container-bottom-right main-project-deepRating">
                        <label for="proDeepRating1" class="proDeepRating <?= ($result[assessment]==A) ? 'proStyleCss':'';?>">A（投资级）<input id="proDeepRating1" type="radio" name="assessment" value="A"></label>

                        <label for="proDeepRating2" class="proDeepRating <?= ($result[assessment]==B) ? 'proStyleCss':'';?>">B（投资级）<input id="proDeepRating2" type="radio" name="assessment" value="B"></label>

                        <label for="proDeepRating3" class="proDeepRating <?= ($result[assessment]==C) ? 'proStyleCss':'';?>">C（投资级）<input id="proDeepRating3" type="radio" name="assessment" value="C"></label>

                        <label for="proDeepRating4" class="proDeepRating <?= ($result[assessment]==D) ? 'proStyleCss':'';?>">D（投机级）<input id="proDeepRating4" type="radio" name="assessment" value="D"></label>

                        <label for="proDeepRating5" class="proDeepRating <?= ($result[assessment]==E) ? 'proStyleCss':'';?>">E（投机级）<input id="proDeepRating5" type="radio" name="assessment" value="E"></label>

                        <label for="proDeepRating6" class="proDeepRating <?= ($result[assessment]==F) ? 'proStyleCss':'';?>">未评估<input id="proDeepRating6" type="radio" name="assessment" value="F"></label>
                    </div>
                </div>
                <!--<div>-->
                    <!--<span class="project-titleName">深度评估报告</span>-->
                    <!--<div class="container-bottom-right main-project-ratingBook">-->
                        <!--<div class="upload">-->
                            <!--<input type="file" class="uploadInput">-->
                            <!--<img src="/Public/Admin/images/indexImg/text.png"/>-->
                            <!--<span>点击上传</span>-->
                        <!--</div>-->

                        <!--&lt;!&ndash;<div class="ratingBook-operation">&ndash;&gt;-->
                        <!--&lt;!&ndash;<span class="operation">预览</span>&ndash;&gt;-->
                        <!--&lt;!&ndash;<div class="operation-split"></div>&ndash;&gt;-->
                        <!--&lt;!&ndash;<span class="operation">下载</span>&ndash;&gt;-->
                        <!--&lt;!&ndash;<div class="operation-split"></div>&ndash;&gt;-->
                        <!--&lt;!&ndash;<span class="operation">删除</span>&ndash;&gt;-->
                        <!--&lt;!&ndash;</div>&ndash;&gt;-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div>-->
                    <!--<span class="project-titleName">市值(￥)</span>-->
                    <!--<div class="container-bottom-right">-->
                        <!--<input type="text" class="marketValue" name="marketValue" value="">-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div>-->
                    <!--<span class="project-titleName">当前价格(￥)</span>-->
                    <!--<div class="container-bottom-right">-->
                        <!--<input type="text" class="curPrice" name="curPrice">-->
                    <!--</div>-->
                <!--</div>-->
                <div>
                    <span class="project-titleName">预估市值</span>
                    <div class="container-bottom-right">
                        <input type="text" class="estimatePrice" name="emarket" value="<?= $result['emarket']; ?>">
                    </div>
                </div>
                <!--<div>-->
                    <!--<span class="project-titleName">预估潜力</span>-->
                    <!--<div class="container-bottom-right main-project-potential">-->

                        <!--<label for="proPotential1" class="proPotential">高<input id="proPotential1" type="radio" name="proPotential" value="高"></label>-->

                        <!--<label for="proPotential2" class="proPotential">中<input id="proPotential2" type="radio" name="proPotential" value="中"></label>-->

                        <!--<label for="proPotential3" class="proPotential">低<input id="proPotential3" type="radio" name="proPotential" value="低"></label>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div style="display: flex">-->
                    <!--<span class="project-titleName">交易所</span>-->

                    <!--<div style="flex: 1" class="container-bottom-right">-->

                        <!--<div class="ExchangeBox">-->
                            <!--<?php foreach(json_decode($result['exchange']) as $value){ ?>-->
                            <!--<div class="Exchange">-->
                            <!--&lt;!&ndash; <div class="main-project-logoBox">-->
                                 <!--<div id="preview1">-->
                                     <!--<img src="../images/indexImg/link.png" id="imghead1"  class="ExchangeLink"/>-->
                                 <!--</div>-->
                                 <!--<div class="fileInputContainer1" >-->
                                     <!--<input type="file" class="fileInput1" name="linksImg" onchange="previewImage1(this)" />-->
                                 <!--</div>-->
                             <!--</div>&ndash;&gt;-->

                            <!--&lt;!&ndash;<img src="../images/indexImg/link.png" id="imghead1"  class="ExchangeLink"/>&ndash;&gt;-->
                            <!--<label class="linkAddress">链接地址:</label><input type="text" class="linkFocus" name="exchange[]" value="<?= $value; ?>"><img class="deleteExchange" src="/Public/Admin/images/indexImg/delete.png"/>-->

                        <!--</div>-->
                            <!--<?php } ?>-->
                        <!--</div>-->

                        <!--<input type="button" class="addExchange" value="+添加交易所">-->

                    <!--</div>-->

                <!--</div>-->
                <!--<div>-->
                    <!--<span class="project-titleName">项目状态</span>-->
                    <!--<div class="container-bottom-right RatingStatus">-->

                        <!--<label for="proRatingStatus1" class="proRatingStatus <?= ($result[state]==1) ? 'proStyleCss':'';?>">已评估<input id="proRatingStatus1" type="radio" name="state" value="1"></label>-->
                        <!--<label for="proRatingStatus2" class="proRatingStatus <?= ($result[state]==2) ? 'proStyleCss':'';?>">未评估<input id="proRatingStatus2" type="radio" name="state" value="2"></label>-->
                    <!--</div>-->
                <!--</div>-->
            </div>

            <div class="project-info-operation">
                <span></span>
                <div class="info-operation">
                    <!--<input type="reset" value="重置">-->
                    <a href="<?php if($result[state]==1){echo U('Admin/index');}else{echo U('Admin/index#TabNavPage1');} ?>"><input type="button" value="返回"></a>
                    <input type="submit" value="保存" onclick="return postComment()">
                </div>
            </div>

        </div>
    </form>
</div>
</body>

<script type="text/javascript">
    //    <!--更换logo函数-->
    function previewImage(file)
    {
        var MAXWIDTH  = 100;
        var MAXHEIGHT = 100;
        var div = document.getElementById('preview');
        if (file.files && file.files[0])
        {
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            var reader = new FileReader();
            reader.onload = function(evt){img.src = evt.target.result;};
            reader.readAsDataURL(file.files[0]);
        }
        else
        {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";
        }
    }
    /*   function previewImage1(file)
     {
     var MAXWIDTH  = 100;
     var MAXHEIGHT = 100;

     var div1 = document.getElementById('preview1');
     if (file.files && file.files[0])
     {

     div1.innerHTML = '<img id=imghead1>';

     var img1 = document.getElementById('imghead1');

     var reader1 = new FileReader();

     reader1.onload = function(evt){img1.src = evt.target.result;};

     reader1.readAsDataURL(file.files[0]);
     }
     else
     {
     var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
     file.select();
     var src = document.selection.createRange().text;

     div1.innerHTML = '<img id=imghead1>';

     var img1 = document.getElementById('imghead1');

     img1.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
     var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
     status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);

     div1.innerHTML = "<div id=divhead1 style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";
     }
     }
     */
    function clacImgZoomParam( maxWidth, maxHeight, width, height ){
        var param = {top:0, left:0, width:width, height:height};
        if( width>maxWidth || height>maxHeight )
        {
            rateWidth = width / maxWidth;
            rateHeight = height / maxHeight;
            if( rateWidth > rateHeight )
            {
                param.width =  maxWidth;
                param.height = Math.round(height / rateWidth);
            }else
            {
                param.width = Math.round(width / rateHeight);
                param.height = maxHeight;
            }
        }
        param.left = Math.round((maxWidth - param.width) / 2);
        param.top = Math.round((maxHeight - param.height) / 2);
        return param;
    }
</script>
<script>
    function postComment() {
        var proName = $('.proName').val();
        var currency = $('.currency').val();
        var introduction = $('.introduction').val();


        if(proName == ''){
            alert('项目名称不能为空');
            return false;
        }else if(currency == ''){
            alert('币种名称不能为空');
            return false;
        }else if(introduction == ''){
            alert('公司简介不能为空');
            return false;
        }
        //验证url网址


        var linkFocusS =$('.linkFocus');
        for(var i = 0;i<linkFocusS.length;i++){
            if(linkFocusS[i].value) {
                var str=linkFocusS[i].value;
                var Expression=/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
                var objExp=new RegExp(Expression);

                if(objExp.test(str) != true){

                    alert("有网址格式错误！请检查");
                    return false;
                }

            }
        }


    }
</script>
</html>