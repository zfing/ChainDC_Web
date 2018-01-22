$(function () {
    //公告集合
    $.ajax({
        url:'http://www.chaindc.com/index.php/Home/Json/getNo',
        dataType:'jsonp',
        success:function (res) {
            var noticeList = $('.noticeList');
            $.each(res,function (index,item) {
                var no_id = item.no_id;
                var title = item.title;
                var add_time = item.add_time;
                var url = item.url;
                $('<li></li>').addClass('noticeItem'+no_id+' noticeItem').appendTo(noticeList);
                $('<a></a>').addClass('noticeHref'+no_id+" noticeHref").attr({
                    href:url,
                    target:'_blank'
                }).appendTo($('.noticeItem'+no_id));
                //标题
                $('<div></div>').addClass('noticeTitle'+no_id+' noticeTitle').appendTo($('.noticeHref'+no_id));
                $('<span>'+title+'</span>').appendTo($('.noticeTitle'+no_id));
                //时间
                $('<div></div>').addClass('noticeTime'+no_id+' noticeTime').appendTo($('.noticeHref'+no_id));
                $('<span>'+add_time+'</span>').appendTo($('.noticeTime'+no_id));
            })
            //提示全名
            $('.noticeItem').mouseover(function () {
                $(this).attr({
                    title:$(this).find('.noticeTitle span').html()
                })
            })
        },
        error:function () {
            alert('获取公告失败')
        }
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
        $('.main_notice').show();
    });
    Router.route('/services', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.main_notice').hide();
        $('.wl-services').show();
    });
    Router.route('/about', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-services,.main_notice').hide();
        $('.wl-aboutUs').show();
    });
    Router.route('/growUp1', function() {
        $('.growUpTwo,.growUpThree,.wl-services,.main_notice,.wl-aboutUs').hide();
        $('.growUpOne').show();
    });
    Router.route('/growUp2', function() {
        $('.growUpOne,.growUpThree,.wl-services,.main_notice,.wl-aboutUs').hide();
        $('.growUpTwo').show();
    });
    Router.route('/growUp3', function() {
        $('.growUpOne,.growUpTwo,.wl-services,.main_notice,.wl-aboutUs').hide();
        $('.growUpThree').show();
    });
});