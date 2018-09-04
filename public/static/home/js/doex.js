$(function() {
    //选择添加
     var chsub = $("input[type='checkbox'][name='subcheck']").length;
     var checkedsub = $("input[type='checkbox'][name='subcheck']:checked").length;
     var discheckedsub=$("input[type='checkbox'][name='subcheck']:disabled").length;
     var checkAll = $('input.all');
     var checkboxes = $('input.my_checked');
     if(discheckedsub==chsub){
        $("input[name='selectAll']").iCheck('disable');
     }
    $("input[name='selectAll']").on('ifChecked', function(event){
             $("input[type='checkbox']").iCheck('check');
             $("#add").attr("disabled",false);
     });
    $("input[name='selectAll']").on('ifUnchecked', function(event){
             $("input[type='checkbox']").iCheck('uncheck');
             $("#add").attr("disabled",true);
     });
    $("input[type='checkbox']").on('ifChecked', function(event){
             $("#add").attr("disabled",false);
              if(chsub==checkedsub){
                   $("input[name='selectAll']").iCheck('check');
              }
    });
    checkboxes.on('ifChanged', function(event){
    if(checkboxes.filter(':checked').length == checkboxes.length) {
        checkAll.prop('checked', 'checked');
    }else {
        checkAll.removeProp('checked');
    }
    if(checkboxes.filter(':checked').length == 0 || checkboxes.filter(':checked').length ==discheckedsub) {
        $("#add").attr("disabled",true);
    }
    checkAll.iCheck('update');
});
    //demo 1
    $("#datepicker").datepicker();
    //demo 2
    $("#startdate").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        onSelect: function( selectedDate ) {
            $( "#enddate" ).datepicker( "option", "minDate", selectedDate, $.datepicker.regional[ "zh-CN" ] );
        }
    });
    $("#enddate").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        onSelect: function( selectedDate ) {
            $("#startdate").datepicker( "option", "maxDate", selectedDate, $.datepicker.regional[ "zh-CN" ] );
        }
    });
    //查询提交
    // $(".search").click(function(){
    //     $.ajax({
    //              type: 'POST',
    //              url: "/exhibition/ajax_search",
    //              data: $("form").serialize(),
    //              success: function(data){
    //                console.log(data);
    //                  if(data==0){
    //                      $(".all").hide();
    //                      $(".no-data").show();
    //                  }else if(data==1){
    //
    //                  }else{
    //                      $(".all").hide();
    //                      $(".search").show();
    //                  }
    //
    //              }
    //     });
    //     return false;
    // });
    //添加到我的展会
    $(".myex").click(function(){
           var v =$(this).attr('id');
           layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.msg('确定添加到我的展会吗？', {
                              time: 0 //不自动关闭
                              ,btn: ['是的', '再看看']
                              ,yes: function(index){
                                  $.ajax({
                                      type: 'POST',
                                      url: "/exhibition/ajax_addEx",
                                      data: {id:v},
                                      success: function(data){
                                         if(data==1){
                                            layer.msg('添加成功');
                                            location.reload();
                                         }
                                      }
                                    });
                              }
                            });
                        });

                });
    //批量添加到我的展会
    $("#add").click(function(){
       var arr =new Array;
        $("input[name='subcheck']:checkbox").each(function(index){
          if(true == $(this).is(':checked')&& !$(this).attr("disabled")){
                      arr.push($(this).attr('id'));
                }
        });
        layui.use('layer', function () {
                     var layer = layui.layer;
                     layer.msg('确定添加到我的展会吗？', {
                           time: 0 //不自动关闭
                           ,btn: ['是的', '再看看']
                           ,yes: function(index){
                             $.ajax({
                                     type: 'POST',
                                     url: "/exhibition/ajax_addExbatch",
                                     data: {id:arr},
                                     success: function(data){
                                       console.log(data);
                                        if(data==1){
                                          layui.use('layer', function () {
                                           var layer = layui.layer;
                                           layer.msg('添加成功');
                                           location.reload();
                                      });
                                      }
                                     }
                             });
                               return false;
                           }
                });
              });


    });
});
