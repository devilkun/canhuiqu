$(function(){
    //时间插件
    $("#setoff").datepicker();
    var pt = {};
    var notice = {};
    // 隐藏提示
    notice.hideAlert = function () {
        $("div .ptAlert").hide();
    };
    // 显示提示
    notice.showAlert = function () {
        $("div .ptAlert").show();
        setTimeout(function() {
            $("div .ptAlert").hide(500);
        }, 2000);
    };
    //提示信息
    notice.tip= function(message){
        $("div.ptAlert>span").text(message);
    };
    //移除提示
    $("#ptAlert").on('click',function(){
        $("div .ptAlert").hide();
    });
    //费用说明
    var fee_introduce = new wangEditor('fee_introduce');
    fee_introduce.config.menus = editor_config_menus;
    fee_introduce.create();
    //预定须知
    var book_notice = new wangEditor('book_notice');
    book_notice.config.menus = editor_config_menus;
    book_notice.create();
    //行程图片
    $('#strokeImg').fileinput({
        language: 'zh',
        uploadUrl: '/exhibition/ajax_stroke_img',
        allowedFileExtensions : ['jpg', 'png','gif'],
        dropZoneEnabled: false,
        showCaption: false,
        showUpload:false,
        layoutTemplates:{
            actionUpload:''
        },
        maxFileCount: 4,
        msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
    }).on('fileclear',function(event){
        $("#stroke_pictures").val("");
    });
    //发布拼团
    var ex_id ='';
    $("button.pt").on('click',function () {
        ex_id = $(this).prev('#ex_id').val();
        $('#myGroup').modal('show');
        //发布模式
        $("input:radio[name='myGroupattern']").on('ifChecked', function(event){
             if($(this).val()==2){
                   $(".travel-city").iCheck('uncheck');
                   $('.order').hide();
                   $('.predestine').show();
                   $('#travelOtherSource').hide();
             }else{
                   $(".travel-city").iCheck('uncheck');
                   $('.predestine').hide();
                   $('.order').show();
                   $('#travelOtherSource').hide();
             }
        });
        $("input:radio[name='setoffCity']").on('ifChecked', function(event){
            if($(this).val()=="other"){
                $('#travelOtherSource').val("");
                $('#travelOtherSource').show();
            }
        }).on('ifUnchecked',function(event){
            if($(this).val()=="other"){
                $('#travelOtherSource').val("");
                $('#travelOtherSource').hide();
            }
        });
        $("input:checkbox[name='setoffCity']").on('ifChecked', function(event){
            if($(this).val()=="other"){
                $('#travelOtherSource').val("");
                $('#travelOtherSource').show();
            }
        }).on('ifUnchecked',function(event){
            if($(this).val()=="other"){
                $('#travelOtherSource').val("");
                $('#travelOtherSource').hide();
            }
        });
        //本地参团
        $("input:radio[name='isLocal']").on('ifChecked', function(event){
              if($(this).val()==1){
                   $(".localDelegation").show();
              }else{
                  $(".localDelegation").hide();
              }
        });
        /*---------增加行程-----start-----*/
        var d;
        $(".trip-btn").on('click',function(){
            //获取行程天数
            var sday = $(".stroke").length;
            if(sday==0){
                d=1;
            }else{
                d=sday+1;
            }
            //出发日期
            var tdSelcet='#travelDate_'+d;
            //行程安排
            var detail ='<form id="schedule_'+d+'">\n'+
                '<div class="panel panel-default stroke" style="padding: 0px;margin-top:5px">\n' +
                '                                                            <div class="panel-heading trip-box" role="tab" id="heading'+d+'">\n' +
                '                                                                <h4 class="panel-title">\n' +
                '                                                                    <a role="button" data-toggle="collapse" href="#collapse'+d+'" class="title">行程第'+d+'天 - </a>\n' +
                '                                                                    <div>\n' +
                '                                                                        <select name="scheduleType_'+d+'" class="form-control scheduleType " style="width: 100px; float: left; margin-left: 100px; margin-top: -25px;">\n' +
                '                                                                            <option label="" value=""></option>\n' +
                '                                                                            <option label="出发" value="出发">出发</option>\n' +
                '                                                                            <option label="旅程" value="旅程">旅程</option>\n' +
                '                                                                            <option label="回程" value="回程">回程</option>\n' +
                '                                                                        </select>\n' +
                '                                                                        <button type="button"  class="btn close removeStroke" style="float: right; margin: -18px 15px 0 0;">&times;</button>\n' +
                '                                                                    </div>\n' +
                '                                                                </h4>\n' +
                '                                                            </div>\n' +
                '                                                            <div id="collapse'+d+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading0">\n' +
                '                                                                <div class="panel-body">\n' +
                '                                                                    <div class="row">\n' +
                '                                                                        <div class="col-md-4">\n' +
                '                                                                            <div class="form-group input-group input-medium date-picker input-daterange" data-date-format="yyyy-mm-dd">\n' +
                '                                                                                <label class="control-label">出发日期:</label>\n' +
                '                                                                                <input id="travelDate_'+d+'" name="travelDate_'+d+'" class="form-control travelDate" type="text">\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '                                                                        <div class="col-md-4">\n' +
                '                                                                            <div class="form-group">\n' +
                '                                                                                <label class="control-label">出发地:</label>\n' +
                '                                                                                <input class="form-control setoffCity" type="text" name="setoffCity_'+d+'">\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '                                                                        <div class="col-md-4">\n' +
                '                                                                            <div class="form-group">\n' +
                '                                                                                <label class="control-label">目的地:</label>\n' +
                '                                                                                <input class="form-control destinationCity" type="text" name="destinationCity_'+d+'">\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '                                                                    </div>\n' +
                '                                                                    <div class="row">\n' +
                '                                                                        <div class="col-md-4">\n' +
                '                                                                            <div class="form-group travel-mode-0">\n' +
                '                                                                                <label class="control-label">交通工具:</label><br>\n' +
                '                                                                                <input type="hidden" name="transport_'+d+'"/>\n'+
                '                                                                                <label class="checkbox-condition transport"><input value="飞机" type="checkbox" id="transport_'+d+'">飞机</label>\n' +
                '                                                                                <label class="checkbox-condition transport"><input value="巴士" type="checkbox" id="transport_'+d+'">巴士</label>\n' +
                '                                                                                <label class="checkbox-condition transport"><input value="火车" type="checkbox" id="transport_'+d+'">火车</label>\n' +
                '                                                                                <label class="checkbox-condition transport"><input value="其他" type="checkbox" id="transport_'+d+'">其他</label>\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '                                                                        <div class="col-md-4">\n' +
                '                                                                            <div class="form-group dinner-type-0">\n' +
                '                                                                                <label class="control-label">用餐:</label><br>\n' +
                '                                                                                <input type="hidden" name="meal_'+d+'">\n'+
                '                                                                                <label class="checkbox-condition meal"><input value="早" type="checkbox" id="meal_'+d+'">早</label>\n' +
                '                                                                                <label class="checkbox-condition meal"><input value="中" type="checkbox" id="meal_'+d+'">中</label>\n' +
                '                                                                                <label class="checkbox-condition meal"><input value="晚" type="checkbox" id="meal_'+d+'">晚</label>\n' +
                '                                                                                <label class="checkbox-condition meal"><input value="飞机餐" type="checkbox" id="meal_'+d+'">飞机餐</label>\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '                                                                        <div class="col-md-4">\n' +
                '                                                                            <div class="form-group hotel-type-0">\n' +
                '                                                                                <label class="control-label">住宿:</label><br>\n' +
                '                                                                                <input type="hidden" name="stay_'+d+'" />\n'+
                '                                                                                <label class="checkbox-condition stay"><input value="酒店" type="checkbox" id="stay_'+d+'">酒店</label>\n' +
                '                                                                                <label class="checkbox-condition stay"><input value="飞机上" type="checkbox" id="stay_'+d+'">飞机上</label>\n' +
                '                                                                                <label class="checkbox-condition stay"><input value="其他" type="checkbox" id="stay_'+d+'">其他\n' +
                '                                                                                </label>\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '                                                                    </div>\n' +
                '                                                                    <div class="row">\n' +
                '                                                                        <div class="col-md-12">\n' +
                '                                                                            <div class="form-group">\n' +
                '                                                                                <label>行程描述:</label>\n' +
                '                                                                                <input type="hidden" name="strokeDescribe_'+d+'">\n'+
                '                                                                                <div id="strokeDescribe_'+d+'" class="strokeDescribe"></div>\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '                                                                    </div>\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '</form>';
            $(".trip").append(detail);
            $(tdSelcet).datepicker();
            //行程描述
            var stroke_describe_id ="strokeDescribe_"+d;
            var stroke_describe = new wangEditor(stroke_describe_id);
            stroke_describe.config.menus = editor_config_menus;
            stroke_describe.create();
            /*---------删除行程----start----*/
            $(".removeStroke").on('click',function(){
                //删除当前行程
                $(this).parents('div.stroke').parent().remove();
                //重新获取各行程属性
                $('div.stroke').each(function(i){
                      var notice = "行程第"+(i+1)+"天";
                      var schedule = "schedule_"+(i+1);
                      $(this).parent('form').attr('id',schedule);
                      $(this).find('a.title').text(notice);
                      var scheduleType = "scheduleType_"+(i+1);
                      $(this).find('select.scheduleType').attr('name',scheduleType);
                      var travelDate = "travelDate_"+(i+1);
                      $(this).find('input.travelDate').attr('name',travelDate);
                      $(this).find('input.travelDate').attr('id',travelDate);
                      var setoffCity = "setoffCity_"+(i+1);
                      $(this).find('input.setoffCity').attr('name',setoffCity);
                      var destinationCity="destinationCity_"+(i+1);
                      $(this).find('input.destinationCity').attr('name',destinationCity);
                      var transport = "transport_"+(i+1);
                      $(this).find("input[type='checkbox'].transport").attr('name',transport);
                      var meal ="meal_"+(i+1);
                      $(this).find("input[type='checkbox'].meal").attr('name',meal);
                      var stay ="stay_"+(i+1);
                      $(this).find("input[type='checkbox'].stay").attr('name',stay);
                      var strokeDescribe = "strokeDescribe_"+(i+1);
                      $(this).find("div.strokeDescribe").attr('name',strokeDescribe);
                      $(this).find("div.strokeDescribe").attr('id',strokeDescribe);
                });
            });
            /*---------删除行程-----end-----*/
        });
        /*---------增加行程-----end-----*/

    });
    //保存并提交
    $("#btnSubmit-pt").on('click',function(){
        notice.hideAlert();
        //获取发布模式
        var setoffCitys = [];
        var otherFlag = false;
        $('.travel-city').each(function(index,item){
           var setoffCity = $(item).attr('value');
           if($(item).is(':checked')){
               if(setoffCity=='other'){
                    otherFlag = true;
               }else{
                    setoffCitys.push(setoffCity);
               }
           }
        });
        var otherCity = $("#travelOtherSource").val();
        if(otherFlag){
            if(!otherCity){
                $('#travelTab a[href="#travelTab_1"]').tab('show');
                $("#travelOtherSource").focus();
                notice.tip("请输入出发城市！");
                notice.showAlert();
                return false;
            }
            setoffCitys.push(otherCity);
        }
        //判断发布模式
        $('input[name="myGroupattern"]:radio').each(function(num,item){
            if($(item).is(':checked')){
                pattern  = $(item).attr('value');
            }
        });
        pt.pattern = pattern;
        if(pattern==2 && setoffCitys.length>2){
               $('#travelTab a[href="#travelTab_1"]').tab('show');
                notice.tip("请最多设置两个城市!");
                notice.showAlert();
                return false;
        }
        if(setoffCitys.length==0){
               $('#travelTab a[href="#travelTab_1"]').tab('show');
                notice.tip("请选择出发城市！");
                notice.showAlert();
                return false;
        }
        pt.setoffcity = setoffCitys.join(",");
        var destination_city = $('input[name="destination_city"]').val();
        if(destination_city){
             pt['destination_city'] = destination_city;
        }else{
             $('#travelTab a[href="#travelTab_1"]').tab('show');
             $('input[name="destination_city"]').focus();
             notice.tip("请输入目的城市！");
             notice.showAlert();
             return false;
        }
        var setoff_date = $('input[name="setoffdate"]').val();
        if(setoff_date){
            pt.setoff_date = setoff_date;
        }else{
            $('#travelTab a[href="#travelTab_1"]').tab('show');
            $('input[name="setoffdate"]').focus();
            notice.tip("请选择出发日期！");
            notice.showAlert();
            return false;
        }
        var dayCount = $('#dayCount').val();
        if(dayCount){
            pt.daycount = dayCount;
        }else{
            $('#travelTab a[href="#travelTab_1"]').tab('show');
            $('#dayCount').focus();
            notice.tip("请填写时间安排！");
            notice.showAlert();
            return false;
        }
        var nightCount = $('#nightCount').val();
        if(nightCount){
            pt.nightcount = nightCount;
        }else{
            $('#travelTab a[href="#travelTab_1"]').tab('show');
            $('#nightCount').focus();
            notice.tip("请填写时间安排！");
            notice.showAlert();
            return false;
        }
        var services = [];
        $('.travel-service').each(function(num,item){
            var service = $(item).attr('value');
            if($(item).is(':checked')){
                services.push(service);
            }
        });
        if(services.length==0){
            $('#travelTab a[href="#travelTab_1"]').tab('show');
            notice.tip("请选择可供服务类型！");
            notice.showAlert();
            return false;
        }else{
            pt.service = services.join(',');
        }
        var localFlag = false;
        $('input[name="isLocal"]').each(function(num,item){
             var local = $(item).attr('value');
             if($(item).is(':checked')){
                  if(local==1){
                      localFlag = true;
                  }
                  pt.local = local;
             }
        });
        if(localFlag){
            var localPrice = $('#localPrice').val();
            if(localPrice==""){
                $('#travelTab a[href="#travelTab_1"]').tab('show');
                $('#localPrice').focus();
                notice.tip("请填写本地参团人员费！");
                notice.showAlert();
                return false;
            }else{
                pt.localprice = localPrice;
            }
        }else{
                pt.localprice =0;
        }
        var adultPrice = $('#adultPrice').val();
        if(adultPrice){
            pt.adultprice = adultPrice;
        }else{
            $('#travelTab a[href="#travelTab_1"]').tab('show');
            $('#adultPrice').focus();
            notice.tip("请填写标准人员费！");
            notice.showAlert();
            return false;
        }
        var roomDifference = $('#roomDifference').val();
        if(roomDifference){
            pt.roomdifference =roomDifference;
        }else{
            pt.roomdifference = 0;
        }
        var discountRate = $('#discountRate').val();
        pt.discountRate = discountRate;
        if(discountRate==""){
            pt.discountRate=0;
        }
        if(!!pt.discountRate && (discountRate>=100 || discountRate <1)){
            $('#travelTab a[href="#travelTab_1"]').tab('show');
            $('#discountRate').focus();
            notice.tip("请输入范围在1-99的有效折扣！");
            notice.showAlert();
            return false;
        }
        if($("div.stroke").length==0){
            $('#travelTab a[href="#travelTab_2"]').tab('show');
            $('#accordion').focus();
            notice.tip("请增加行程信息！");
            notice.showAlert();
            return false;
        }
        //检查行程
        var res = true;
        var stroke = [];
        $("div.stroke").each(function(i) {
            //获取行程表单信息
            var frm = "#schedule_" + (i + 1);
            var arr_schedule = $(frm).serializeArray();
            var d = {};
            d.day = (i + 1);
            for (var s = 0; s <arr_schedule.length; s++) {
            if (arr_schedule[s].name == ("scheduleType_" + (i + 1))) {
                var message = "";
                if (arr_schedule[s].value == "") {
                    $('#travelTab a[href="#travelTab_2"]').tab('show');
                    var tag = 'select[name="scheduleType_'+(i+1)+'"]';
                    $(tag).focus();
                    notice.tip("请选择行程第"+(i+1)+"天类型!");
                    notice.showAlert();
                    res=false;
                    return false;
                } else {
                    d.scheduleType = arr_schedule[s].value;
                }
            }
            if (arr_schedule[s].name == ("travelDate_" + (i + 1))) {
                if (arr_schedule[s].value == "") {
                    $('#travelTab a[href="#travelTab_2"]').tab('show');
                    var tag = 'input[name="travelDate_'+(i+1)+'"]';
                    $(tag).focus();
                    notice.tip("请选择行程第"+(i+1)+"出发日期!");
                    notice.showAlert();
                    res=false;
                    return false;
                } else {
                    d.travelDate = arr_schedule[s].value;
                }

            }
            if (arr_schedule[s].name == ("setoffCity_" + (i + 1))) {
                if (arr_schedule[s].value == "") {
                    $('#travelTab a[href="#travelTab_2"]').tab('show');
                    var tag = 'input[name="setoffCity_'+(i+1)+'"]';
                    $(tag).focus();
                    notice.tip("请输入行程第"+(i+1)+"天出发地!");
                    notice.showAlert();
                    res=false;
                    return false;
                } else {
                    d.setoffCity = arr_schedule[s].value;
                }
            }
            if (arr_schedule[s].name == ("destinationCity_" + (i + 1))) {
                if (arr_schedule[s].value == "") {
                    message = "请输入行程第"+(i+1)+"天目的地!";
                    $('#travelTab a[href="#travelTab_2"]').tab('show');
                    var tag = 'input[name="destinationCity_'+(i+1)+'"]';
                    $(tag).focus();
                    notice.tip("请输入行程第"+(i+1)+"天目的地!");
                    notice.showAlert();
                    res=false;
                    return false;
                } else {
                    d.destinationCity = arr_schedule[s].value;
                }
            }
            if (arr_schedule[s].name == ("transport_" + (i + 1))) {
                var transport = [];
                var tname = "transport_" + (i + 1);
                $('input[id=' + tname + ']:checkbox').each(function (i) {
                    if (true == $(this).is(':checked')) {
                        transport.push($(this).val());
                    }
                });
                if (transport.length == 0) {
                    $('#travelTab a[href="#travelTab_2"]').tab('show');
                    notice.tip("请选择行程第"+(i+1)+"天交通工具!");
                    notice.showAlert();
                    res=false;
                    return false;
                }
                var transports = transport.join(",");
                d.transport = transports;
            }
            if (arr_schedule[s].name == ("meal_" + (i + 1))) {
                var meal = [];
                var mname = "meal_" + (i + 1);
                $('input[id=' + mname + ']:checkbox').each(function (i) {
                    if (true == $(this).is(':checked')) {
                        meal.push($(this).val());
                    }
                });
                if (meal.length == 0) {
                    $('#travelTab a[href="#travelTab_2"]').tab('show');
                    notice.tip("请选择行程第"+(i+1)+"天用餐服务!");
                    notice.showAlert();
                    res=false;
                    return false;
                }
                var meals = meal.join(",");
                d.meal = meals;
            }
            if (arr_schedule[s].name == ("stay_" + (i + 1))) {
                var stay = [];
                var sname = "stay_" + (i + 1);
                $('input[id=' + sname + ']:checkbox').each(function (i) {
                    if (true == $(this).is(':checked')) {
                        stay.push($(this).val());
                    }
                });
                if (stay.length == 0) {
                    $('#travelTab a[href="#travelTab_2"]').tab('show');
                    notice.tip("请选择行程第"+(i+1)+"天住宿服务!");
                    notice.showAlert();
                    res=false;
                    return false;
                }
                var stays = stay.join(",");
                d.stay = stays;

            }
            if(arr_schedule[s].name == ("strokeDescribe_"+(i+1))){
                var travelScheduleDesc = "#strokeDescribe_"+(i+1);
                var text =$(travelScheduleDesc).html();
                if(text == "<p><br></p>"){
                    $('#travelTab a[href="#travelTab_2"]').tab('show');
                    $(travelScheduleDesc).focus();
                    notice.tip("请输入行程第"+(i+1)+"天行程描述!");
                    notice.showAlert();
                    res=false;
                    return false;
                }
                d.travelScheduleDesc =text;
            }

        }
        stroke[i]=d;
        });
        if (!res) {
            return false;
        }
        var len = $(".file-preview-frame").length;
        if(len==0){
            $('#travelTab a[href="#travelTab_3"]').tab('show');
            notice.tip("请上传图片!");
            notice.showAlert();
            return false;
        }
        var fee_introduce =$('#fee_introduce').html();
        if(fee_introduce=="<p><br></p>"){
            $('#travelTab a[href="#travelTab_4"]').tab('show');
            $('#fee_introduce').focus();
            notice.tip("请输入费用说明!");
            notice.showAlert();
            return false;
        }
        pt.feeintroduce =fee_introduce;
        var book_notice =$('#book_notice').html();
        if(book_notice=="<p><br></p>"){
            $('#travelTab a[href="#travelTab_5"]').tab('show');
            $('#book_notice').focus();
            notice.tip("请输入预定须知!");
            notice.showAlert();
            return false;
        }
        pt.booknotice = book_notice;
        var num = $("#strokeImg").fileinput('getFilesCount');
        var pic =[];
        var path={
            'num':num,
            'pic':[],
            'merge':function(r){
                pic.push(r);
                if(this.num==pic.length){
                     pt.path = pic.join(',');
                     var data = JSON.stringify(pt);
                     layui.use('layer', function () {
                        var layer = layui.layer;
                        $.ajax({
                            type: 'POST',
                            url: "/exhibition/ajax_submit_mypt",
                            dataType: "json",
                            data: {pt:data,stroke:stroke,ex_id:ex_id},
                            success: function(data){
                                console.log(data);
                                if(data==1){
                                    layer.msg('添加成功!');
                                    location.reload();
                                }else{
                                    layer.msg('添加失败!');
                                    location.reload();
                                }
                            }
                        });
                    });
                }
            }
        };
        $("#strokeImg").fileinput('upload');
        $("#strokeImg").on('fileuploaded',function(event,data){
            path.merge(data.response);
        });
    });

    $("#myGroup").on("hidden.bs.modal", function (){
        location.reload();
    });

});