$(function () {

    var hash = location.hash;

    function tab(index){
        $('.content-project').siblings('.content-project').hide().end().eq(index).show();
    }
    if(hash){
        tab(hash.match(/\d+/)[0]);
        $('.TabNav').eq(hash.match(/\d+/)[0]).addClass('navStyle').siblings().removeClass('navStyle');
        function navTab(num,navBg,selected,select) {
            if(hash.match(/\d+/)[0] == num){
                $("."+navBg).attr({
                    src:selected
                })
            }else {
                $("."+navBg).attr({
                    src:select
                })
            }
        }
        navTab(0,'navBg0','/Public/Admin/images/indexImg/rating1_selected.png','/Public/Admin/images/indexImg/rating1.png');
        navTab(1,'navBg1','/Public/Admin/images/indexImg/rating2_selected.png','/Public/Admin/images/indexImg/rating2.png');
        navTab(2,'navBg2','/Public/Admin/images/indexImg/add_selected.png','/Public/Admin/images/indexImg/add.png');
        // navTab(3,'navBg3','/Public/Admin/images/indexImg/setting_selected.png','/Public/Admin/images/indexImg/setting.png');
        navTab(3,'navBg3','/Public/Admin/images/indexImg/logo_setting_selected.png','/Public/Admin/images/indexImg/logo_setting.png');
    }
    $('.TabNav').click(function(){
        $(this).addClass('navStyle').siblings().removeClass('navStyle');
        var proName = document.querySelector('.proName');
        proName.focus();
        var number = $(this).index();
        tab(number);
        //切换nav图片(参数：当前下标值，类名，选中时img路径，不选中时img路径)
        function navTab(num,navBg,selected,select) {
            if(number == num){
                $("."+navBg).attr({
                    src:selected
                })
            }else {
                $("."+navBg).attr({
                    src:select
                })
            }
        }
        navTab(0,'navBg0','/Public/Admin/images/indexImg/rating1_selected.png','/Public/Admin/images/indexImg/rating1.png');
        navTab(1,'navBg1','/Public/Admin/images/indexImg/rating2_selected.png','/Public/Admin/images/indexImg/rating2.png');
        navTab(2,'navBg2','/Public/Admin/images/indexImg/add_selected.png','/Public/Admin/images/indexImg/add.png');
        // navTab(3,'navBg3','/Public/Admin/images/indexImg/setting_selected.png','/Public/Admin/images/indexImg/setting.png');
        navTab(3,'navBg3','/Public/Admin/images/indexImg/logo_setting_selected.png','/Public/Admin/images/indexImg/logo_setting.png');
    });


//    已评估的搜索框
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
        // window.location.href = 'pages.html'
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


    $('.wl-project-name').mouseover(function () {
        var projectNameAll = $(this).html();
        $(this).attr({
            title:projectNameAll
        })
    });

    $('.quit,.toggleUser').click(function () {
        window.location.href = 'loginPage.html'
    })


});

