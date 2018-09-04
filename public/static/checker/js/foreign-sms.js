var ID = $("#id").val();
$('#reject').click(function(){
    $.ajax({
        url: "/admin.php/checker/foreign/ajax_sms",
        type: "POST",
        dataType:"json",
        data:{action:'reject',id:ID},
        success: function(data){
            if(data.status==1){
                layer.msg('已处理,结果为审核已驳回！');
                $(location).attr('href', '/admin.php/checker/foreign/index');
            }else{
                layer.msg('操作失败,请稍后重试！');
                $(location).attr('href', '/admin.php/checker/foreign/index');
            }
        }
    });
});
$('#through').click(function(){
    $.ajax({
        url: "/admin.php/checker/foreign/ajax_sms",
        type: "POST",
        dataType:"json",
        data:{action:'through',id:ID},
        success: function(data){
            if(data.status==1){
                layer.msg('已处理,结果为审核已通过！');
                $(location).attr('href', '/admin.php/checker/foreign/index');
            }else{
                layer.msg('操作失败,请稍后重试！');
                $(location).attr('href', '/admin.php/checker/foreign/index');
            }
        }
    });
});
