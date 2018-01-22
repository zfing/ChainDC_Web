$(function () {
    $('.addNewIconImg').click(function () {
        $('.addNewIconBox').toggle();
        $('.addNewIconUpload').hide();
        $('.NewIconName').focus().val('');
        return false;
    });
    $('body').click(function () {
        $('.addNewIconBox,.addNewIconUpload').hide();
        $('.NewIconName').val('');
    });

     function stopPropagation(e) {
        if (e.stopPropagation){
            e.stopPropagation();
        }
        else{
            e.cancelBubble = true;
        }
    }
    $('.addNewIconBox,.addNewIconUpload').on('click',function(e){
        stopPropagation(e);
    });

     //图标管理tr更新弹框
    $('.logoOperationUpdate').click(function () {
        var trNum =  $(this).parent().parent().parent().index();
        $('.logoCountsContent').eq(trNum).find('.addNewIconUpload').toggle().end().siblings().find('.addNewIconUpload').hide().end().find('.NewIconName').attr({name:''}).end().find('.NewIconImg').attr({name:''});
        $('.logoCountsContent').eq(trNum).find('.addNewIconUpload').find('.NewIconName').attr({name:'keyword'}).end().find('.NewIconImg').attr({name:'logo_adress'});
        $('.addNewIconBox').hide();
        $('.NewIconName').focus().val('');
        return false;
    });

     $('.addIconCancel').click(function () {
         $('.addNewIconUpload,.addNewIconBox').hide();
     });
//    提交按钮
   /* $('.addIconSubmit').click(function () {
        alert(1)
        var NewIconName = $('.NewIconName').val();
        // console.log(NewIconName);
        var oMyForm = new FormData();
        oMyForm.append("keyword", NewIconName);
        oMyForm.append("logo_adress", $('input[name=logo_adress]')[0].files[0]);
        console.log($('input[name=logo_adress]')[0]);
        $.ajax({
            url: 'add_logo',
            type: 'POST',
            cache: false,
            data: oMyForm,
            processData: false,
            contentType: false,
            async: false
        }).done(function(res) {
            alert('创建成功');
            $('.addNewIconUpload,.addNewIconBox').hide();
        }).fail(function(res) {
            alert('创建失败')
        });
    })*/





});