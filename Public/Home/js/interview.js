$(function () {
    $.ajax({
        url: 'http://www.chaindc.com/index.php/Home/Json/getIv',
        dataType: 'jsonp',
        success: function (res) {
            $.each(res, function (index, item) {
                var interviewContent = $('.main-interviewCon');
                var iv_id = item.iv_id;
                var iv_title = item.title;
                var iv_intro = item.intro;
                var iv_cover = item.iv_cover;
                var iv_url = item.url;
                //    创建标签
                var interviewConLis = $('<li></li>').appendTo(interviewContent);
                var interviewConA = $('<a></a>').attr({
                    href: iv_url,
                    target: '_blank'
                }).appendTo(interviewConLis);
                $('<img>').attr('src', iv_cover).appendTo(interviewConA);
                $('<span></span>').html(iv_title).appendTo(interviewConA);
                $('<p></p>').html(iv_intro).appendTo(interviewConA);
            })
        },
        error: function () {
            alert('获取数据失败')
        }
    });
    //九宫格布局
    var interviewConLis = $('.main-interviewCon li');
    for (var i = 0; i < interviewConLis.length; i++) {
        var col = parseInt(i % 3);//列
        var row = parseInt(i / 3);//行
        var leftV = col * 30;
        var topV = row * 30;
        interviewConLis[i].style.left = leftV + '%';
        interviewConLis[i].style.top = topV + '%';
    }
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
        $('.INCon').show();
    });
    Router.route('/services', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.INCon').hide();
        $('.wl-services').show();
    });
    Router.route('/about', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-services,.INCon').hide();
        $('.wl-aboutUs').show();
    });
    Router.route('/growUp1', function() {
        $('.growUpTwo,.growUpThree,.wl-services,.INCon,.wl-aboutUs').hide();
        $('.growUpOne').show();
    });
    Router.route('/growUp2', function() {
        $('.growUpOne,.growUpThree,.wl-services,.INCon,.wl-aboutUs').hide();
        $('.growUpTwo').show();
    });
    Router.route('/growUp3', function() {
        $('.growUpOne,.growUpTwo,.wl-services,.INCon,.wl-aboutUs').hide();
        $('.growUpThree').show();
    });

})