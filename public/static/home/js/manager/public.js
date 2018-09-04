$(function(){
    $("#birthday").datepicker({
        clearBtn : true,
        language : "zh-CN",
        format : "yyyy-mm-dd",
        todayHighlight : true,
        autoclose : true
    });
});
var info = {
    bind:false,
    company:{
        options:''
    }
};
var notice = {};
// 隐藏提示
notice.hideAlert = function () {
    $("div .infoAlert").hide();
};
// 显示提示
notice.showAlert = function () {
    $("div .infoAlert").show();
    setTimeout(function() {
        $("div .infoAlert").hide(500);
    }, 2000);
};
//提示信息
notice.tip= function(message){
    $("div.infoAlert>span").text(message);
};
//清除弹窗原数据
$("#myModal").on("hidden.bs.modal", function() {
    document.getElementById("form-edit").reset();
});
//账户信息编辑
$("#edit-info").on('click',function(){
    //移除提示
    $("div .infoAlert").hide();
    if($('#username').val()==''){
        $('#username').focus();
        notice.tip('请输入昵称!');
        notice.showAlert();
        return false;
    }
    if($('#birthday').val()==''){
        $('#birthday').focus();
        notice.tip('请选择生日!');
        notice.showAlert();
        return false;
    }
    if($('#qq').val()==''){
        $('#qq').focus();
        notice.tip('请填写QQ!');
        notice.showAlert();
        return false;
    }
    if(!isQQ($('#qq').val())){
        $('#qq').focus();
        notice.tip('请正确填写QQ!');
        notice.showAlert();
        return false;
    }
    if($('#email').val()==''){
        $('#email').focus();
        notice.tip('请填写邮箱!');
        notice.showAlert();
        return false;
    }
    if(!isEmail($('#email').val())){
        $('#email').focus();
        notice.tip('请正确填写邮箱!');
        notice.showAlert();
        return false;
    }
    if($('#city').val()==''){
        $('#city').focus();
        notice.tip('请填写城市!');
        notice.showAlert();
        return false;
    }
    layui.use('layer', function () {
        var layer = layui.layer;
        var data = $('#form-edit').serialize();
        $.ajax({
            type: 'POST',
            url: "/manager/user_info",
            dataType: "json",
            data: $('#form-edit').serialize(),
            success: function(status){
                if (status == 1) {
                    layer.msg('账户信息编辑成功!');
                    $(location).attr('href','/manager/index');
                } else {
                    layer.msg('账户信息编辑失败!');
                    return false;
                }
            }
        });
    });
});
//发送验证码
var  validate={
    telephone:/(^[1][3-8][0-9]{9}$)/,
    code:/^[1-9]\d{4}$/,
    pwd:/(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/,
    validate_code:function(code){
        return validate_code = code;
    }
};
var telephone = $('#telephone').val();
var validate_code='';
var code =0;
var sends = {
    checked:1,
    send:function() {
        var time = 60;
        $.ajax({
            url: "/manager/ajax_sms",
            type: "POST",
            dataType:"json",
            data:{tel:telephone},
            success: function(data){
                function timeCountDown(){
                    if(time==0){
                        clearInterval(timer);
                        $('.send-code').html("发送验证码");
                        $(".send-code").attr("onclick",'sends.send();');
                        sends.checked = 1;
                        return true;
                    }
                    $(".end-code").removeAttr("onclick");
                    $('.send-code').html(time+"S后再次发送");
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
    }
}
$('#reset-pwd').on('click',function(){
    $('.error-info').remove();
    var error_info = function(message){return '<span style="color: red" class="error-info">'+message+'</span>';}
    if($('#initial_password').val()==''){
        $('#initial_password').focus();
        $('#initial_password').parent().append(error_info('请输入当前密码'));
        return false;
    }
    if(!validate.pwd.test($('#initial_password').val())){
        $('#initial_password').focus();
        $('#initial_password').parent().append(error_info('6~16位字符，至少包含数字.字母.符号中的2种'));
        return false;
    }
    if($('#veriy_code').val()==''){
        $('#veriy_code').focus();
        $('#veriy_code').parent().append(error_info('请输入验证码'));
        return false;
    }
    if(Number($('#veriy_code').val()) !== Number(validate_code)){
        $('#veriy_code').focus();
        $('#veriy_code').parent().append(error_info('验证码错误'));
        return false;
    }
    if($('#new_password').val()==''){
        $('#new_password').focus();
        $('#new_password').parent().append(error_info('设置密码不能为空'));
        return false;
    }
    if(!validate.pwd.test($('#new_password').val())){
        $('#new_password').focus();
        $('#new_password').parent().append(error_info('6~16位字符，至少包含数字.字母.符号中的2种'));
        return false;
    }
    if($('#confirm_password').val()==''){
        $('#confirm_password').focus();
        $('#confirm_password').parent().append(error_info('确认密码不能为空'));
        return false;
    }
    if($('#new_password').val() !== $('#confirm_password').val()){
        $('#new_password').focus();
        $('#new_password').parent().append(error_info('密码不一致'));
        $('#confirm_password').parent().append(error_info('密码不一致'));
        return false;
    }
    layui.use('layer', function () {
        var layer = layui.layer;
        $.ajax({
            url: "/manager/reset_password",
            type: "POST",
            dataType:"json",
            data:$('#reset-password').serialize(),
            success: function(status){
                if (status == 1) {
                    layer.msg('密码重置成功!');
                    $(location).attr('href','/user/login');
                }
                if(status==0) {
                    layer.msg('密码重置失败!');
                    return false;
                }
                if(status==2){
                    layer.msg('当前密码不正确!');
                    return false;
                }
            }

        });
        return false;
    });
});
$('.empty').on('click',function(){
    document.getElementById("reset-password").reset();
});
//公司信息编辑
var com_notice = {};
// 隐藏提示
com_notice.hideAlert = function () {
    $("div .infoAlert-company").hide();
};
// 显示提示
com_notice.showAlert = function () {
    $("div .infoAlert-company").show();
    setTimeout(function() {
        $("div .infoAlert-company").hide(500);
    }, 2000);
};
//提示信息
com_notice.tip= function(message){
    $("div.infoAlert-company>span").text(message);
};
$('#selectTrade').on('show.bs.modal', function (e) {
     var options =[];
     $('dl.contain>dd').each(function(index,element){
               options.push($(element).attr('id'));
     });
     $('.category').each(function(index,dd){
         var tagid = $(dd).attr("parent-id");
         var matched = false;
         $.each(options, function(a, option) {
             if (option == tagid) {
                 matched = true;
                 return false;
             }
         });
         if (matched) {
             $(dd).addClass("on");
         } else {
             $(dd).removeClass("on");
         }
     });
});
//提交
$('#edit-info-company').on('click',function(){
    $('.error-info').remove();
    //拼接从事行业
    if($('#company_name').val()==''){
        $('#company_name').focus();
        com_notice.tip('请输入公司名称!');
        com_notice.showAlert();
        return false;
    }
    if($('#company_address').val()==''){
        $('#company_address').focus();
        com_notice.tip('请输入公司地址!');
        com_notice.showAlert();
        return false;
    }
    if($('#company_mobile').val()==''){
        $('#company_mobile').focus();
        com_notice.tip('请输入公司电话!');
        com_notice.showAlert();
        return false;
    }
    if(!isPhoneNumber($('#company_mobile').val())){
        $('#company_mobile').focus();
        com_notice.tip('公司电话格式错误!');
        com_notice.showAlert();
        return false;
    }
    if($('#company_fax').val()==''){
        $('#company_fax').focus();
        com_notice.tip('请输入公司传真!');
        com_notice.showAlert();
        return false;
    }
    if(!isFax($('#company_fax').val())){
        $('#company_fax').focus();
        com_notice.tip('公司传真格式错误!');
        com_notice.showAlert();
        return false;
    }
    if($('#company_website').val()==''){
        $('#company_website').focus();
        com_notice.tip('请输入公司网址!');
        com_notice.showAlert();
        return false;
    }
    if(!isUrl($('#company_website').val())){
        $('#company_website').focus();
        com_notice.tip('公司网址格式错误!');
        com_notice.showAlert();
        return false;
    }
    //获取行业信息
    var len = $('.contain>dd').length;
    var categoryArray = [];
    var category = '';
    if(len>0){
        $('.contain>dd').each(function(index,element){
            categoryArray.push($(element).attr('id'));
            category=categoryArray.join(',');
        });
    }else{
        category='';
    }
    var frm = $('#form-edit-company').serialize()+'&'+$.param({'company_trade':category});
    layui.use('layer', function () {
        var layer = layui.layer;
    $.post('/manager/company_info',frm,function(status){
           if(status==1){
               layer.msg('企业信息更改成功!');
               $(location).attr('href','/manager/index');
           }
           if(status==2){
               layer.msg('企业信息更改失败!');
               return false;
           }
    },'json');
    });
});
//清除弹窗原数据
$("#editCompany").on("hidden.bs.modal", function() {
    document.getElementById("form-edit-company").reset();
});
//获取行业选择信息
$('dd.category').on('click',function(){
   if($(this).hasClass('on')){
       $(this).removeClass('on');
   }else{
       $(this).addClass('on');
   }
});
//提交行业选择
$('#select-trade').on('click',function(){
    var options =[];
    $('.contain').empty();
    $('dd.on').each(function(index,element){
        var option = {
            id : $(element).attr("parent-id"),
            name : $(element).text(),
            symbol : null
        };
        var string = '<dd class="" id="'+option.id+'">'+option.name+'</dd>';
        $('.contain').append(string);
        options.push(option);
    });
    info.company.options = options;
    $("#selectTrade").modal('hide');
});