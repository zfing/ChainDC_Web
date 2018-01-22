
//pages的详情切换
$(function () {
    $('.project-pages_introduce_tab').click(function () {
        var indexNum = $(this).index();
        $(this).addClass('project-pages_introduce_tab_active').siblings().removeClass('project-pages_introduce_tab_active');
        $(".project-pages_introduce_content").eq(indexNum).show().siblings().hide();
    });

    //路由切换
    Router.route('/', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.wl-services').hide();
        $('.wl-project-pages').show();
    });
    Router.route('/services', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.wl-project-pages').hide();
        $('.wl-services').show();
    });
    Router.route('/about', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-services,.wl-project-pages').hide();
        $('.wl-aboutUs').show();
    });
    Router.route('/growUp1', function() {
        $('.growUpTwo,.growUpThree,.wl-services,.wl-project-pages,.wl-aboutUs').hide();
        $('.growUpOne').show();
    });
    Router.route('/growUp2', function() {
        $('.growUpOne,.growUpThree,.wl-services,.wl-project-pages,.wl-aboutUs').hide();
        $('.growUpTwo').show();
    });
    Router.route('/growUp3', function() {
        $('.growUpOne,.growUpTwo,.wl-services,.wl-project-pages,.wl-aboutUs').hide();
        $('.growUpThree').show();
    });

});


