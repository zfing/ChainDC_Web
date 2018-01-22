$(function () {
    // addProject
    function addProjectTab(TabClass) {
        $('.'+TabClass).click(function () {
            $(this).addClass('proStyleCss').siblings().removeClass('proStyleCss');
        })
    }
    addProjectTab('proType');
    addProjectTab('proHot');
    addProjectTab('proRisk');
    addProjectTab('proDeepRating');
    addProjectTab('proPotential');
    addProjectTab('proRatingStatus');

    /*  <div class="Exchange">
            <label class="linkAddress">链接地址：</label>
            <input type="text" class="linkFocus" name="links">
        </div>

    */
    /*var container = $('.pc-container');
    $('<img>').attr({
        src:'images/star.png'
    }).css({
        top:'50px',
        left:'50px',
        transform:'scale(.5) rotateZ(90deg)',
        position: 'absolute'
    }).addClass('myImg').appendTo('.pc-container');*/

    //添加社交链接地址栏
    $('.addSocial').click(function () {
        var socialParent = $('.socialBox');
        var insertSocial = $('<div></div>').addClass('social');
        socialParent.append(insertSocial);

        var labelSocial = $('<label>链接地址:</label>').addClass('socialLinkAddress');
        labelSocial.appendTo(insertSocial);
        var inputSocial = $('<input>').attr({type:'text',name:'s_link[]'}).addClass('socialFocus');
        inputSocial.appendTo(insertSocial);
        var deleteSocial = $('<img>').attr({src:'/Public/Admin/images/indexImg/delete.png'}).addClass('deleteSocial');
        deleteSocial.appendTo(insertSocial);

        //删除添加的社交链接地址栏
        $('.deleteSocial').click(function () {
            $(this).parent().fadeOut('slow',function () {
                $(this).remove();
            })
        })

    });

    //添加交易所链接地址栏
    $('.addExchange').click(function () {
        var parentBox = $('.ExchangeBox');
        var insertAdd = $('<div></div>').addClass('Exchange');
        parentBox.append(insertAdd);

        var labelAdd = $('<label>链接地址:</label>').addClass('linkAddress');
        labelAdd.appendTo(insertAdd);
        var inputAdd = $('<input>').attr({type:'text',name:'exchange[]'}).addClass('linkFocus');
        inputAdd.appendTo(insertAdd);
        var deleteExchange = $('<img>').attr({src:'/Public/Admin/images/indexImg/delete.png'}).addClass('deleteExchange');
        deleteExchange.appendTo(insertAdd);

        //删除添加的交易所链接地址栏
        $('.deleteExchange').click(function () {
            $(this).parent().fadeOut('slow',function () {
                $(this).remove();
            })
        })

    });

});

