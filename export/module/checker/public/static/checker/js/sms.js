 var Tel =$("#con_telephone").val();
 var ID = $("#order_id").val();
 var user_id = $("#user_id").val();
 var order_number = $("#order_number").val();
                $('#reject').click(function(){
                    $.ajax({
                        url: "/admin.php/checker/index/ajax_sms",
                        type: "POST",
                        dataType:"json",
                        data:{phone:Tel,action:'reject',id:ID,user_id:user_id,order_number:order_number},
                        success: function(data){
                            if(data.status==1){
                                layer.msg('订单已驳回！');
                                $(location).attr('href', '/admin.php/checker/index/offline');
                            }else{
                                layer.msg('订单驳回失败,请稍后重试！');
                                $(location).attr('href', '/admin.php/checker/index/offline');
                            }
                        }
                    });
                });
                $('#through').click(function(){
                    $.ajax({
                        url: "/admin.php/checker/index/ajax_sms",
						type: "POST",
                        dataType:"json",
                        data:{phone:Tel,action:'through',id:ID,user_id:user_id,order_number:order_number},
						success: function(data){
                            if(data.status==1){
                                layer.msg('订单审核成功！');
                                $(location).attr('href', '/admin.php/checker/index/offline');
                            }else{
                                layer.msg('订单审核失败,请稍后重试！');
                                $(location).attr('href', '/admin.php/checker/index/offline');
                            }
                        }
					});
                });
