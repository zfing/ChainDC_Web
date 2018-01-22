$(function () {
    //深度专访
    $.ajax({
        url:'http://www.chaindc.com/index.php/Home/Json/getNewIv',
        dataType:'jsonp',
        success:function (res) {
            $.each(res,function (index,item) {

                if(item){
                    $('<li></li>').addClass('li'+item.iv_id).click(function () {
                        window.open(item.url)
                    }).appendTo($('.interFather1'));
                    $('<img>').attr({src:item.iv_cover}).appendTo($('.li'+item.iv_id));
                    $('<span>'+item.title+'</span>').appendTo($('.li'+item.iv_id));
                    $('<p>'+item.intro+'</p>').appendTo($('.li'+item.iv_id));

                    //小
                    $('<li></li>').css({
                        width:'45%',
                        display: 'inline-block'
                    }).addClass('li2'+item.iv_id).click(function () {
                        window.open(item.url)
                    }).appendTo($('.interFather2'));
                    $('<img>').attr({src:item.iv_cover}).appendTo($('.li2'+item.iv_id));
                    $('<span>'+item.title+'</span>').appendTo($('.li2'+item.iv_id));
                    $('<p>'+item.intro+'</p>').addClass('hidden-xs').appendTo($('.li2'+item.iv_id));

                }

                //九宫格布局
                // console.log($('.interFather2 li').length);
                for (var i = 0; i < $('.interFather2 li').length; i++) {
                    var col = parseInt(i % 2);//列
                    var row = parseInt(i / 2);//行

                    var leftV = col * 30;
                    var topV = row * 30;
                    $('.interFather2 li')[i].style.left = leftV + '%';
                    $('.interFather2 li')[i].style.top = topV + '%';
                }

            })
        }
    });
    //公告
    $('.proInterview .InterviewMore').click(function () {
        window.open('/index.php/Home/Index/IvIndex')
    })
    
});
