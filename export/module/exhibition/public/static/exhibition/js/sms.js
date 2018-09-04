 var Tel =$("#telephone").val();
 var ID = $("#id").val();
                $('#reject').click(function(){
                    $.ajax({
                        url: "/admin.php/exhibition/check/ajax_sms",
                        type: "POST",
                        dataType:"json",
                        data:{phone:Tel,action:'reject',id:ID},
                        success: function(data){
                            if(data.status==1){
                                layer.msg('信息发送成功！');
                                $(location).attr('href', '/admin.php/exhibition/check/index');
                            }else{
                                layer.msg('信息发送失败,请稍后重试！');
                                $(location).attr('href', '/admin.php/exhibition/check/index');
                            }
                        }
                    });
                });
                $('#through').click(function(){
                    $.ajax({
                        url: "/admin.php/exhibition/check/ajax_sms",
						type: "POST",
                        dataType:"json",
                        data:{phone:Tel,action:'through',id:ID},
						success: function(data){
                            if(data.status==1){
                                layer.msg('信息发送成功！');
                                $(location).attr('href', '/admin.php/exhibition/check/index');
                            }else{
                                layer.msg('信息发送失败,请稍后重试！');
                                $(location).attr('href', '/admin.php/exhibition/check/index');
                            }
                        }
					});
                });
