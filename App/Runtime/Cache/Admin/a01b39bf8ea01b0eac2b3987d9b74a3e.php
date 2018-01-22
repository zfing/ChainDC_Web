<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>深度评估添加</title>
    <link rel="stylesheet" href="/Public/Admin/css/index.css">
    <link rel="stylesheet" href="/Public/Admin/css/jHsDate.css">
    <link rel="stylesheet" href="/Public/WangEditor/css/wangEditor.min.css">
    <script src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Admin/js/contentProject.js"></script>


</head>
<body>
<style>
    body{margin: 0;padding: 0;}
    .everyWeekDay .weekday,.everyDay .days {/*解决span不支持width属性*/display: -moz-inline-box;display: inline-block;margin: 5px 0 0 20px;text-align: center;width: 20px;border: 1px solid #F7F7F7;cursor: pointer;}
    .marginTop{margin-top: 5px;}
    .selectStyle{padding-left: 10px;border: none;border-radius: 3px;outline: none;appearance: none;-moz-appearance: none;-webkit-appearance: none;margin: 0 10px 0 10px;width: 60px;border-color: #0FB9EF;color: #0FB9EF;}
</style>
<div class="projectUpload">
    <form action="/index.php/Admin/Assessment/add" method="post" enctype="multipart/form-data">
        <input type="hidden" name="currency_id" value="<?= $result['currency_id']; ?>">
        <div class="main-container">
            <div class="main-container-title">添加项目</div>

            <div class="main-container-top">
                <div class="main-project-name">
                    <span>项目名称:</span>
                    <!--<input type="text" name="currency_name" class="proName" value="<?= $result['currency_name']; ?>">-->
                    <?php echo $result['currency_name']; ?>
                </div>
                <div class="main-project-name">
                    <span>成立时间:</span>
                    <input type="text" name="set_up" id="txt_calendar" class="allName" readonly="readonly" onfocus="showDate()">
                </div>
                <div class="main-project-currency">
                    <span>官方网站:</span>
                    <input type="text" name="web" class="currency">
                </div>
                <!--社交链接点击生成问题 这里我使用了交易所的那些代码 可以查看下面注释 63行方法-->
                <!--<div style="display: flex">-->
                    <!--<span class="socialLink">社交链接:</span>-->

                    <!--<div style="flex: 1" class="container-bottom-right">-->

                        <!--<div class="socialBox">-->
                            <!--<div class="social">-->
                                <!--<label class="socialLinkAddress">链接地址:</label><input type="text" class="socialFocus" name="s_link[]"><img class="deleteSocial" src="/Public/Admin/images/indexImg/delete.png"/>-->

                            <!--</div>-->
                        <!--</div>-->
                        <!--&lt;!&ndash;此处生成的是交易所的链接 不能生成社交链接&ndash;&gt;-->
                        <!--<input type="button" class="addSocial" value="+添加链接">-->

                    <!--</div>-->

                <!--</div>-->
                <!--<div style="display: flex">-->
                    <!--<span class="project-titleName">交易所:</span>-->

                    <!--<div style="flex: 1" class="container-bottom-right">-->

                        <!--<div class="ExchangeBox">-->
                            <!--<div class="Exchange">-->
                                <!--<label class="linkAddress">链接地址:</label><input type="text" class="linkFocus" name="exchange[]"><img class="deleteExchange" src="/Public/Admin/images/indexImg/delete.png"/>-->

                            <!--</div>-->
                        <!--</div>-->

                        <!--<input type="button" class="addExchange" value="+添加交易所">-->

                    <!--</div>-->

                <!--</div>-->

            </div>

            <div class="main-container-bottom">
                <div>
                    <span class="project-titleName">评估文章:</span>
                    <textarea name="content" id="textarea1" style="height:400px;max-height:500px;"></textarea>
                </div>
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
<!--<script type="text/javascript" src="/Public/Admin/js/dateJs.fei.js" ></script>-->
<script type="text/javascript" src="/Public/Admin/js/jHsDate.js" ></script>
<script src="/Public/Plupload/plupload.full.min.js"></script>
<script src="/Public/WangEditor/js/wangEditor.min.js"></script>
<!--时间插件-->
<script>
    $('#txt_calendar').jHsDate();
</script>
<script type="text/javascript">
    // 封装console.log
    function printLog(title, info) {
        window.console && console.log(title, info);
    }

    // ------- 配置上传的初始化事件 -------
    function uploadInit () {
        // this 即 editor 对象
        var editor = this;
        // 编辑器中，触发选择图片的按钮的id
        var btnId = editor.customUploadBtnId;
        // 编辑器中，触发选择图片的按钮的父元素的id
        var containerId = editor.customUploadContainerId;

        //实例化一个上传对象
        var uploader = new plupload.Uploader({
            browse_button: btnId,  // 选择文件的按钮的id
            url: '/index.php/Admin/Assessment/upload',  // 服务器端的上传地址
            flash_swf_url: '/Public/Plupload/Moxie.swf',
            sliverlight_xap_url: '/Public/Plupload/Moxie.xap',
            filters: {
                mime_types: [
                    //只允许上传图片文件 （注意，extensions中，逗号后面不要加空格）
                    { title: "图片文件", extensions: "jpg,gif,png,bmp" }
                ]
            }
        });

        //存储所有图片的url地址
        var urls = [];

        //初始化
        uploader.init();

        //绑定文件添加到队列的事件
        uploader.bind('FilesAdded', function (uploader, files) {
            //显示添加进来的文件名
            $.each(files, function(key, value){
                printLog('添加文件' + value.name);
            });

            // 文件添加之后，开始执行上传
            uploader.start();
        });

        //单个文件上传之后
        uploader.bind('FileUploaded', function (uploader, file, responseObject) {
            //注意，要从服务器返回图片的url地址，否则上传的图片无法显示在编辑器中
            var url = responseObject.response;
            //先将url地址存储来，待所有图片都上传完了，再统一处理
            urls.push(url);

            printLog('一个图片上传完成，返回的url是' + url);
        });

        //全部文件上传时候
        uploader.bind('UploadComplete', function (uploader, files) {
            printLog('所有图片上传完成');

            // 用 try catch 兼容IE低版本的异常情况
            try {
                //打印出所有图片的url地址
                $.each(urls, function (key, value) {
                    printLog('即将插入图片' + value);

                    // 插入到编辑器中
                    editor.command(null, 'insertHtml', '<img src="' + value + '" style="max-width:100%;"/>');
                });
            } catch (ex) {
                // 此处可不写代码
            } finally {
                //清空url数组
                urls = [];

                // 隐藏进度条
                editor.hideUploadProgress();
            }
        });

        // 上传进度条
        uploader.bind('UploadProgress', function (uploader, file) {
            // 显示进度条
            editor.showUploadProgress(file.percent);
        });
    }
    var editor = new wangEditor('textarea1');
    //    editor.config.uploadImgUrl = 'upload';
    editor.config.menus = [
        'source',
        '|',
        'bold',
        'underline',
        'italic',
        'strikethrough',
        'eraser',
        'forecolor',
        'bgcolor',
        'lineheight',
        '|',
        'quote',
        'fontfamily',
        'fontsize',
        'head',
        'unorderlist',
        'orderlist',
        'alignleft',
        'aligncenter',
        'alignright',
        '|',
        'link',
        'unlink',
        'table',
        'emotion',
        '|',
        'img',
        'video',
//        'location',
//        'insertcode',
        '|',
        'undo',
        'redo',
        'fullscreen'
    ];
    // 字号
    editor.config.fontsizes = {
        // 格式：'value': 'title'
        1: '12px',
        2: '13px',
        3: '14px',
        4: '16px',
        5: '18px',
        6: '24px',
        7: '32px',
        8: '48px'
    };
    editor.config.customUpload = true;  // 配置自定义上传的开关
    editor.config.customUploadInit = uploadInit;  // 配置上传事件，uploadInit方法已经在上面定义了
    editor.create();
</script>
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
            alert('成立时间不能为空');
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