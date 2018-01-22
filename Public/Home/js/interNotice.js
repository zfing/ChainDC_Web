$(function () {
    //公告
    $.ajax({
        url:'http://www.chaindc.com/index.php/Home/Json/getNewNo',
        dataType:'jsonp',
        success:function (res) {
            // console.log(res);
            var ulParant0 = $('<ul></ul>');
            var ulParant1 = $('<ul></ul>');
            $.each(res,function (index,item) {
                var no_id = item.no_id;
                var no_title = item.title;
                var no_url = item.url;
                //    创建标签
                $('.noticeCon').eq(0).html(ulParant0);
                var nolis = $('<li></li>').attr('dataId',no_id).appendTo(ulParant0);
                $('<a></a>').attr({
                    'href':no_url,
                    'target':'_blank'
                }).html(no_title).appendTo(nolis);
            });
            //提示全名
            $('.noticeCon ul li a').mouseover(function () {
                $(this).attr({
                    title:$(this).html()
                })
            })
        },
        error:function () {
            alert('获取公告失败')
        }
    })
    $('.InterviewMore').click(function () {
        window.open('/index.php/Home/Index/NoIndex')
    })
    //模态框区域
    $('.modal_close').click(function () {
        //清空输入框中值
        $('.modal_form input,.modal_form textarea').val('');
    });
    // 模态框动画+随屏幕高度垂直居中
    $('#modalButton,#wl-footer-rating').click(function () {
        $('#myModal').on('shown.bs.modal', function () {
            $('.modal_form input').eq(0).focus();
            var modalHeight = ($(window).height() - $('.modal-dialog').height()) / 2;
            $('.modal-dialog').stop().css({'margin-top': 0}).animate({
                'margin-top': modalHeight
            });
            $(window).resize(function () {
                var modalTop = ($(window).height() - $('.modal-dialog').height()) / 2;
                $('.modal-dialog').css({
                    'margin-top': modalTop
                });
            });
        });
    });
    //路由跳转

    Router.route('/', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.wl-services').hide();
        $('.main_IN').show();
    });
    Router.route('/services', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.main_IN').hide();
        $('.wl-services').show();
    });
    Router.route('/about', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-services,.main_IN').hide();
        $('.wl-aboutUs').show();
    });
    Router.route('/growUp1', function() {
        $('.growUpTwo,.growUpThree,.wl-services,.main_IN,.wl-aboutUs').hide();
        $('.growUpOne').show();
    });
    Router.route('/growUp2', function() {
        $('.growUpOne,.growUpThree,.wl-services,.main_IN,.wl-aboutUs').hide();
        $('.growUpTwo').show();
    });
    Router.route('/growUp3', function() {
        $('.growUpOne,.growUpTwo,.wl-services,.main_IN,.wl-aboutUs').hide();
        $('.growUpThree').show();
    });
});