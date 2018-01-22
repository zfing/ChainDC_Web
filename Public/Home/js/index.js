$(function () {
    $('.wl-project-filter').click(function () {
        //没有内容的时候显示所有选项
        if ($(".search_input_focus").val().length <= 0) {
            $(".select-results_option").css({display:'block'});
        }
        $('.select_box').toggle();
        $('.search_input_focus').focus().val('');//确定焦点并清空输入值
        $('.searchFail').css({display:'none'});
        $('.select-results_option').on('mouseover',function () {
            $(this).addClass('select-results_option_bgColor').siblings().removeClass('select-results_option_bgColor');
        });
        return false; //阻止冒泡
    });
    $(".select_box").click(function(){
        return false; //阻止冒泡
    });
    $('body').click(function () {
        $('.select_box').hide();
        $('.search_input_focus').val('');//清空输入值
        $('.searchFail').css({display:'none'});
    });
    //点击选项li获取其值到搜索框中
    $(".select-results_option").click(function () {
        $(".search_input_focus").val($(this).find('.search-result_item_text-name').text());
        //加载新页面
        if($(this).find('input').val() == '1'){
            window.open("/index.php/Home/Index/pages/id/"+$(this).attr('id'));
        }else {
            alert('深度评级暂未开放');
        }
    });
    $('.select-results_options .select-results_option:eq(0)').addClass('select-results_option_bgColor');
    //匹配选项（模糊查询）
    $('<li class="searchFail">No results found</li>').css({display:'none'}).appendTo('.select-results_options');
    $('.search_input_focus').bind('input propertychange',function () {
        if ($(".search_input_focus").val().length <= 0) {
            $('.searchFail').css({display:'none'});
            $(".select-results_option").css({display:'block'});
            return;
        }
        $(".select-results_option").css('display', 'none');
        var index=0;
        for(var j = 0; j < $('.select-results_option').length; j++){
            var searchNum = $('.select-results_option').find('.search-result_item_text-name').eq(j).text().indexOf($('.search_input_focus').val().toUpperCase());
            if (searchNum >= 0) {
                $('.select-results_option').eq(j).css({display:'block'});
                $('.searchFail').css({display:'none'});
            }else{
                ++index
            }
        }
        if(index == $('.select-results_option').length){
            $('.searchFail').css({display:'block'});
        }
    });
    //模态框区域
    $('.modal_close').click(function () {
        //清空输入框中值
        $('.modal_form input,.modal_form textarea').val('');
    });
    // 模态框动画+随屏幕高度垂直居中
    $('#modalButton,#wl-footer-rating').click(function () {
        $('#myModal').on('shown.bs.modal', function () {
            $('.modal_form input').eq(0).focus();
            var modalHeight = ($(window).height() - $('.modal-dialog').height())/2;
            $('.modal-dialog').stop().css({'margin-top':0}).animate({
                'margin-top': modalHeight
            });
            $(window).resize(function () {
                var modalTop = ($(window).height() - $('.modal-dialog').height())/2;
                $('.modal-dialog').css({
                    'margin-top': modalTop
                });
            });
        });
    });
    //首页路由跳转

    Router.route('/', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.wl-services').hide();
        $('.wl-content').show();
    });
    Router.route('/services', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.wl-content').hide();
        $('.wl-services').show();
    });
    Router.route('/about', function() {
        $('.growUpOne,.growUpTwo,.growUpThree,.wl-services,.wl-content').hide();
        $('.wl-aboutUs').show();
    });
    Router.route('/growUp1', function() {
        $('.growUpTwo,.growUpThree,.wl-services,.wl-content,.wl-aboutUs').hide();
        $('.growUpOne').show();
    });
    Router.route('/growUp2', function() {
        $('.growUpOne,.growUpThree,.wl-services,.wl-content,.wl-aboutUs').hide();
        $('.growUpTwo').show();
    });
    Router.route('/growUp3', function() {
        $('.growUpOne,.growUpTwo,.wl-services,.wl-content,.wl-aboutUs').hide();
        $('.growUpThree').show();
    });
});


