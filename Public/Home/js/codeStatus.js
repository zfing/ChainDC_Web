function sortBy(sortBy){
    loadGitInfos(sortBy);
}

function loadGitInfos(sortBy){
    if(sortBy==undefined) sortBy="this_month_add";
    var $table = $("#t1");

    var url = "http://www.chaindc.com/index.php/Home/json/infos?callback=?";
    var params = {sortBy:sortBy}
    $.getJSON(url,params, function(data){
        var infos = data.infos;
        console.log(infos);
        var html = [];
        html.push("<tr><th>项目</th>");
        html.push("<th class='hidden-xs' onclick='sortBy(\"last_month_commit\")'>上月提交</th><th onclick='sortBy(\"this_month_commit\")'>本月提交次数</th><th onclick='sortBy(\"last_month_add\")' class='hidden-xs'>上月代码量</th>");
        html.push("<th onclick='sortBy(\"this_month_add\")'>本月代码量</th>");
        html.push("<th class='hidden-xs' onclick='sortBy(\"branch\")'>分支数</th><th class='hidden-xs' onclick='sortBy(\"fork\")'>分叉数</th>");
        html.push("<th class='hidden-xs' onclick='sortBy(\"watch\")'>订阅数</th><th class='hidden-xs' onclick='sortBy(\"star\")'>关注数</th>");
        html.push("<th onclick='sortBy(\"hot\")'>热度</th></tr>");

        for(var i=0; i < infos.length; i++){
            var info = infos[i];
            if(info.last_month_add<0) info.last_month_add=0;
            if(info.this_month_add<0) info.this_month_add=0;
            if(info.last_month_commit<0) info.last_month_commit=0;
            if(info.this_month_commit<0) info.this_month_commit=0;

            html.push("<tr class='tr"+(i%2)+"'>");
            html.push("<td title="+info.abbreviation+" style='padding:10px;background: "+info.path+" 10px center no-repeat;background-size: 25px'><a target='_blank' href='https://github.com/"+info.link+"'>"+info.abbreviation+"</a></td>");
            html.push("<td class='hidden-xs'>"+info.last_month_commit+"</td>");
            html.push("<td>"+info.this_month_commit+"</td>");
            html.push("<td class='hidden-xs'>"+info.last_month_add+"</td>");
            html.push("<td>"+info.this_month_add+"</td>");
            html.push("<td class='hidden-xs'>"+info.branch+"</td>");
            html.push("<td class='hidden-xs'>"+info.fork+"</td>");
            html.push("<td class='hidden-xs'>"+info.watch+"</td>");
            html.push("<td class='hidden-xs'>"+info.star+"</td>");
            // html.push("<td>"+info.hot+"</td>");
            if(info.hot == '高'){
                html.push("<td style='color:rgb(106,168,79)'>"+info.hot+"");
            }
            if(info.hot == '中'){
                html.push("<td style='color:rgb(230,145,56)'>"+info.hot+"");
            }
            if(info.hot == '低'){
                html.push("<td style='color:rgb(204,0,0)'>"+info.hot+"");
            }
            html.push("</tr>");
        }

        $table.html(html.join(''));

        /*var ths = $table.find("th");
        for(var i=0; i<ths.length; i++){
            var $th = $(ths[i]);
            if($th.prop("outerHTML").indexOf(sortBy)>0){
                $th.html($th.html()+"<font color='blue'>↓</font>");
            }
        }*/
    });
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
    $('.codeTable').show();
});
Router.route('/services', function() {
    $('.growUpOne,.growUpTwo,.growUpThree,.wl-aboutUs,.codeTable').hide();
    $('.wl-services').show();
});
Router.route('/about', function() {
    $('.growUpOne,.growUpTwo,.growUpThree,.wl-services,.codeTable').hide();
    $('.wl-aboutUs').show();
});
Router.route('/growUp1', function() {
    $('.growUpTwo,.growUpThree,.wl-services,.codeTable,.wl-aboutUs').hide();
    $('.growUpOne').show();
});
Router.route('/growUp2', function() {
    $('.growUpOne,.growUpThree,.wl-services,.codeTable,.wl-aboutUs').hide();
    $('.growUpTwo').show();
});
Router.route('/growUp3', function() {
    $('.growUpOne,.growUpTwo,.wl-services,.codeTable,.wl-aboutUs').hide();
    $('.growUpThree').show();
});