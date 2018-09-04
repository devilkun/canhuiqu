var  validate={
    telephone:/(^[1][3-8][0-9]{9}$)/,
    code:/^[1-9]\d{4}$/,
    pwd:/(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/,
    validate_code:function(code){
        return validate_code = code;
    },
    is_relation:function(type){
        return  is_relation =type;
    },
    user_id:function(user_id){
        return userid = user_id;
    }
};
var userid='';
var is_relation ='';
var validate_code='';
var code =0;
var sends = {
    checked:1,
    send:function() {
        var numbers = /(^[1][3-8][0-9]{9}$)/;
        var val = $('#phone').val().replace(/\s+/g, ""); //获取输入手机号码
        if (!numbers.test(val) || val.length == 0) {
            $('#phone').focus();
            $('#phone').css('border-color','red');
            $('#reg-phone').append('<div class="tip-error">手机号格式错误</div>');
            return false;
        }
        if(numbers.test(val)){
            var time = 60;
            $.ajax({
                url: "/user/ajax_sms",
                type: "POST",
                dataType:"json",
                data:{phone:val},
                success: function(data){
                    if(data.status==1){
                        if($('#reg-phone').find('div').length == 0){
                            $('#phone').css('border-color','red');
                            $('#reg-phone').append('<div class="tip-error">已注册</div>');
                            return false;
                        }
                    }else if(data.status==2){
                        layui.use('layer', function () {
                            var layer = layui.layer;
                            layer.msg('该手机号已被注册,是否添加关联', {
                                time: 0 //不自动关闭
                                ,btn: ['关联', '取消']
                                ,yes: function(index){
                                    validate.is_relation('2');
                                    validate.user_id(data.relation_id);
                                    $('#phone').attr('readonly','readonly');
                                    $('#reg-pwd').hide();
                                    $('.account-type').hide();
                                    $.ajax({
                                        url: "/user/ajax_relation_sms",
                                        type: "POST",
                                        dataType:"json",
                                        data:{phone:val},
                                        success: function(data){
                                            function timeCountDown(){
                                                if(time==0){
                                                    clearInterval(timer);
                                                    $('#reg-code a').html("发送验证码");
                                                    $(".reg-sendCode").attr("onclick",'sends.send();');
                                                    sends.checked = 1;
                                                    return true;
                                                }
                                                $(".reg-sendCode").removeAttr("onclick");
                                                $('#reg-code a').html(time+"S后再次发送");
                                                time--;
                                                return false;
                                                sends.checked = 0;
                                            }
                                            timeCountDown();
                                            var timer = setInterval(timeCountDown,1000);
                                            code =  data.code ;console.log(code);
                                            validate.validate_code(code);
                                        }
                                    });
                                    layer.msg('已关联,请输入验证码进行验证!');
                                }
                            });
                        });
                    }else{
                        function timeCountDown(){
                            if(time==0){
                                clearInterval(timer);
                                $('#reg-code a').html("发送验证码");
                                $(".reg-sendCode").attr("onclick",'sends.send();');
                                sends.checked = 1;
                                return true;
                            }
                            $(".reg-sendCode").removeAttr("onclick");
                            $('#reg-code a').html(time+"S后再次发送");
                            time--;
                            return false;
                            sends.checked = 0;
                        }
                        timeCountDown();
                        var timer = setInterval(timeCountDown,1000);

                    }
                    code =  data.code;console.log(code);
                    validate.validate_code(code);
                }
            });

        }

    }
};
/*---------注册------------*/
$(function() {
//手机号
    $("#phone").on('blur', function () {
        $('#phone').css('border-color', '#e9e9e9');
        $('#reg-phone').find('div').remove();
        var numbers = /(^[1][3-8][0-9]{9}$)/;
        var val = $('#phone').val().replace(/\s+/g, ""); //获取输入手机号码
        if ($('#reg-phone').find('div').length == 0) {
            if (!numbers.test(val) || val.length == 0) {
                $('#reg-phone').append('<div class="tip-error">手机号格式错误</div>');
                return false;
            }
        }
    }).on('focus', function () {
        $('#phone').css('border-color', 'red');
    });
//验证码
    $('#code').on('blur', function () {
        $('#code').css('border-color', '#e9e9e9');
        $('#reg-code').find('div').remove();
        var codes = /^[1-9]\d{4}$/;
        var val1 = $('#code').val();
        if ($('#reg-code').find('div').length == 0) {
            if (!codes.test(val1) || val1.length == 0 || val1 != validate_code) {
                $('#reg-code').append('<div class="tip-error">验证码错误</div>');
                return false;
            } else {
                $('#reg-code').append('<div class="tip-right">正确</div>');
            }
        }
    }).on('focus', function () {
        $('#code').css('border-color', 'red');
    });
    //密码
    $('#pwd').on('blur', function () {
        $('#pwd').css('border-color', '#e9e9e9');
        $('#reg-pwd').find('div').remove();
        var pwds = /(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/;
        var val2 = $('#pwd').val();
        if ($('#reg-pwd').find('div').length == 0) {
            if (!pwds.test(val2) || val2.length == 0) {
                $('#reg-pwd').append('<div class="tip-error">6~16位字符，至少包含数字.字母.符号中的2种</div>');
                return false;
            }
        }
    }).on('focus', function () {
        $('#pwd').css('border-color', 'red');
    });
//注册提交
    $('#regist-submit').click(function () {
        if(is_relation=='2'){
            var code = $('#code').val();
            if (!validate.code.test(code) || code == "" || !code == validate_code) {
                $('#code').focus();
                $('#reg-code').append('<div class="tip-error">验证码错误</div>');
                $('#code').css('border-color', 'red');
                return false;
            }
            $.ajax({
                url: "/user/ajax_relation_account",
                type: "POST",
                dataType: "json",
                data: {'id':userid,'access_token':$('#access_token').val(),'openid':$('#openid').val()},
                success: function (data) {
                    if (data.status == 1) {
                        layui.use('layer', function () {
                            var layer = layui.layer;
                            layer.msg('已成功补全信息！');
                            $(location).attr('href', '/index/index');
                        });

                    }
                }
            });
        }else{
            $('.tip-error').remove();
            var telephone = $('#phone').val().replace(/\s+/g, "");
            if (!validate.telephone.test(telephone) || telephone == "") {
                $('#phone').focus();
                $('#reg-phone').append('<div class="tip-error">手机号格式错误</div>');
                $('#phone').css('border-color', 'red');
                return false;
            }
            var code = $('#code').val();
            if (!validate.code.test(code) || code == "" || !code == validate_code) {
                $('#code').focus();
                $('#reg-code').append('<div class="tip-error">验证码错误</div>');
                $('#code').css('border-color', 'red');
                return false;
            }
            var pwd = $('#pwd').val();
            if (!validate.pwd.test(pwd) || pwd == "") {
                $('#pwd').focus();
                $('#reg-pwd').append('<div class="tip-error">密码格式错误</div>');
                $('#pwd').css('border-color', 'red');
                return false;
            }
            var accountType = $('#account-type option:checked').val();
            if(accountType==""){
                layui.use('layer', function () {
                    var layer = layui.layer;
                    layer.msg('请选择账号类型！');
                });
                return false;
            }
            $.ajax({
                url: "/user/ajax_third_reg",
                type: "POST",
                dataType: "json",
                data: {
                    mobile: $('#phone').val().replace(/\s+/g, ""),
                    password: $('#pwd').val(),
                    rid: accountType,
                    nickname: $('#account-type option:checked').text(),
                    access_token:$('#access_token').val(),
                    openid:$('#openid').val()

                },
                success: function (data) {
                    if (data.status == 1) {
                        layui.use('layer', function () {
                            var layer = layui.layer;
                            layer.msg('已成功补全账号信息！');
                            $(location).attr('href', '/index/index');
                        });

                    }
                }
            });
        }
    });
});