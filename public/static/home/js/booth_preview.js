$(function(){
    //wangEditor
    var editor = new wangEditor('otherInfo');
    editor.config.menus = [
        'bold',
        'underline',
        'italic',
        'eraser',
        'forecolor',
        '|',
        'fontfamily',
        'fontsize',
        'head',
        'unorderlist',
        'orderlist',
        'alignleft',
        'aligncenter',
        'alignright',
        '|',
        'link',
        'unlink',
        'emotion',
        'img',
        '|',
        'undo',
        'redo',
        'fullscreen'
    ];
    editor.create();
    //我的展位-预览
    $("button.preview").on('click',function () {
        $id = $(this).attr("code");
        $('#myModal').modal('show');
        $("#myModalLabel").text("预览展位");
        $(".modal-footer").hide();
        $("input[name='stand_pic']").hide();
        $("input[name='booth_pic']").hide();
        //随团服务
        $("input:radio[name='provideTravel']").on('ifChecked', function(event){
            var v = $(this).val();
            if(v==1){
                $("input[name='is_pt']").val(v);
                $(".bindTravel,.chargeManagementFee").show();
            }
        });
        $("input:radio[name='provideTravel']").on('ifUnchecked', function(event){
            $(".bindTravel,.chargeManagementFee").hide();
        });
        //是否要求随团
        $("input:radio[name='bindTravel']").on('ifChecked', function(event){
            var v = $(this).val();
            if(v==1){
                $("input[name='is_ct']").val(v);
                $(".chargeManagementFee").hide();
            }
        });
        $("input:radio[name='bindTravel']").on('ifUnchecked', function(event){
            $(".bindTravel,.chargeManagementFee").show();
        });
        //是否收取脱团管理费
        $("input:radio[name='chargeManagementFee']").on('ifChecked', function(event){
            var v = $(this).val();
            if(v==1){
                $("input[name='is_dt']").val(v);
                $(".managementFee").show();
                $("input[name='dt_managerfee']").attr('disabled',false);
            }
        });
        $("input:radio[name='chargeManagementFee']").on('ifUnchecked', function(event){
            $("input[name='dt_managerfee']").attr('disabled',true);
            $(".managementFee").hide();
        });
        //是否按要求搭展
        $("input:radio[name='bindBooth']").on('ifChecked', function(event){
            var v = $(this).val();
            if(v==1){
                $("input[name='is_ts']").val(v);
                $(".bindBooth").show();
            }
        });
        $("input:radio[name='bindBooth']").on('ifUnchecked', function(event){
            $(".bindBooth").hide();
        });
        //是否预售
        $("input[type='checkbox'].is_presell").on('ifChecked', function(event){
            $("input[name='is_presell']").attr("disabled",false);
        });
        $("input[type='checkbox'].booth").iCheck('disable');
        $.post("/exhibition/ajax_booth_preview",{id:$id},function(data){
              var booth_detail = JSON.parse(data);
              for(var i in booth_detail){
                    //获取展会名称
                    if(i=="name"){
                        $(".ex_name").text(booth_detail[i]);
                    }
                    //获取发布模式信息
                    if(i=="pattern" && booth_detail[i]==0){
                        $("#offline").iCheck('check');
                        $("input[name='line']").iCheck('disable');
                        $("div .boothAlert").hide();
                        $(".line").css('display','none');
                        $(".describe").css('display','block');
                    }
                    if(i=="pattern" && booth_detail[i]==1){
                        $("#inline").iCheck('check');
                        $("input[name='line']").iCheck('disable');
                        $("div .boothAlert").hide();
                        $(".line").css('display','block');
                        $(".describe").css('display','none');
                    }
                    //获取详细描述
                    if(i=="describe"){
                        $("textarea[name='describe']").attr("disabled","true");
                        $("textarea[name='describe']").text(booth_detail[i]);
                    }
                    //注册费选框
                    if(i=="reg_fee" && booth_detail[i]!=='0'){
                        $(".reg").iCheck('check');
                        $("input[name='reg_fee']").val(booth_detail[i]);
                    }
                    //注册货币
                    if(i=="regfee_cu" && booth_detail[i]!==0){
                        $("select[name='regfee_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                    }
                    //注册费用说明
                    if(i=="reg_desc" && booth_detail[i]!==""){
                        $("input[name='reg_desc']").val(booth_detail[i]);
                    }
                    //室内光地单价
                    if(i=="indoor_price" && booth_detail[i]!=='0'){
                        $("input[type='checkbox']#indoor").iCheck('check');
                        $("input[name='indoor_price']").val(booth_detail[i]);
                    }
                    //室内光地货币单位
                    if(i=="indoor_cu" && booth_detail[i]!==0){
                        $("select[name='indoor_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                    }
                    //室内光地面积单位
                    if(i=="indoor_au" && booth_detail[i]!==0){
                      $("select[name='indoor_au'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                    }
                    //室内光地预定说明
                    if(i=="indoor_desc" && booth_detail[i]!==""){
                        $("input[name='indoor_desc']").val(booth_detail[i]);
                    }
                    //室内光地可预订面积\
                    if(i=="indoor_area" && booth_detail[i]!==""){
                        var s = booth_detail[i];
                        var area = s.split(".");
                        for(var ae in area){
                              $("div.indoorArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"indoorArea\">"+area[ae]+"</font></p>");
                        }
                    }
                    //标准摊位单价
                    if(i=="stand_price" && booth_detail[i]!=='0'){
                      $("input[type='checkbox']#stand").iCheck('check');
                      $("input[name='stand_price']").val(booth_detail[i]);
                    }
                    //标准摊位货币单位
                    if(i=="stand_cu" && booth_detail[i]!==0){
                      $("select[name='stand_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                    }
                    //标准摊位面积单位
                    if(i=="stand_au" && booth_detail[i]!==0){
                      $("select[name='stand_au'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                    }
                    //标准摊位预定说明
                    if(i=="stand_desc" && booth_detail[i]!==""){
                      $("input[name='stand_desc']").val(booth_detail[i]);
                    }
                    //标准摊位可预订面积\
                    if(i=="stand_area" && booth_detail[i]!==""){
                      var s = booth_detail[i];
                      var area = s.split(".");
                      for(var ae in area){
                          $("div.StandArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"standArea\">"+area[ae]+"</font></p>");
                      }
                    }
                    //室外光地单价
                    if(i=="outdoor_price" && booth_detail[i]!=='0'){
                      $("input[type='checkbox']#outdoor").iCheck('check');
                      $("input[name='outdoor_price']").val(booth_detail[i]);
                    }
                    //室外光地货币单位
                    if(i=="outdoor_cu" && booth_detail[i]!==0){
                      $("select[name='outdoor_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                    }
                    //室外光地面积单位
                    if(i=="outdoor_au" && booth_detail[i]!==0){
                      $("select[name='outdoor_au'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                    }
                    //室外光地预定说明
                    if(i=="outdoor_desc" && booth_detail[i]!==""){
                      $("input[name='outdoor_desc']").val(booth_detail[i]);
                    }
                    //室外光地可预订面积\
                    if(i=="outdoor_area" && booth_detail[i]!==""){
                      var s = booth_detail[i];
                      var area = s.split(".");
                      for(var ae in area){
                          $("div.outdoorArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"standArea\">"+area[ae]+"</font></p>");
                      }
                    }
                    //其他费用选框
                    if(i=="other_fee" && booth_detail[i]!=='0'){
                      $("input[type='checkbox']#other").iCheck('check');
                      $("input[name='other_fee']").val(booth_detail[i]);
                    }
                    //其他费用货币
                    if(i=="other_cu" && booth_detail[i]!==0){
                      $("select[name='other_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                    }
                    //其他费用说明
                    if(i=="otherfee_desc" && booth_detail[i]!==""){
                      $("input[name='otherfee_desc']").val(booth_detail[i]);
                    }
                    //标摊配置
                    if(i=="stand_config" && booth_detail[i]!==""){
                      $("#stand_config").attr("disabled","true");
                      $("#stand_config").text(booth_detail[i]);
                    }
                    //价格说明
                    if(i=="price_desc" && booth_detail[i]!==""){
                      $("#priceDesc").attr("disabled","true");
                      $("#priceDesc").text(booth_detail[i]);
                    }
                    //是否提供随团服务(1:是,0:否)
                    if(i=="is_pt" && booth_detail[i]==1){
                        $("#y-pt").iCheck('check');
                        $("input[name='provideTravel']").iCheck('disable');
                    }
                    if(i=="is_pt" && booth_detail[i]==0){
                        $("#n-pt").iCheck('check');
                        $("input[name='provideTravel']").iCheck("disable");
                    }
                    //是否要求随团(1:是,0:否)
                    if(i=="is_ct" && booth_detail[i]==1){
                        $("#y-ct").iCheck('check');
                        $("input[name='bindTravel']").iCheck('disable');
                    }
                    if(i=="is_ct" && booth_detail[i]==0){
                        $("#n-ct").iCheck('check');
                        $("input[name='bindTravel']").iCheck('disable');
                    }
                    //是否收取脱团管理费(1:是,0:否)
                    if(i=="is_dt" && booth_detail[i]==1){
                        $("#y-dt").iCheck('check');
                        $("input[name='chargeManagementFee']").iCheck('disable');
                    }
                    if(i=="is_dt" && booth_detail[i]==0){
                        $("#n-dt").iCheck('check');
                        $("input[name='chargeManagementFee']").iCheck('disable');
                    }
                    //获取脱团管理费
                    if(i=="dt_managerfee" && booth_detail!==0){
                        $("input[name='dt_managerfee']").val(booth_detail[i]);
                        $("input[name='dt_managerfee']").attr("disabled","true");
                    }
                    //是否按要求撘展(1:是,0:否)
                    if(i=="is_ts" && booth_detail[i]==1){
                        $("#y-ts").iCheck('check');
                        $("input[name='bindBooth']").iCheck('disable');
                    }
                    if(i=="is_ts" && booth_detail[i]==0){
                        $("#n-ts").iCheck('check');
                        $("input[name='bindBooth']").iCheck('disable');
                    }
                    //补贴说明
                    if(i=="subsidy_desc" && booth_detail[i]!==""){
                        $("textarea[name='subsidy_desc']").attr("disabled","true");
                        $("textarea[name='subsidy_desc']").text(booth_detail[i]);
                    }
                    //其他说明
                    if(i=="other_desc"){
                        editor.disable();
                        $("div #otherInfo").text(booth_detail[i]);
                    }
                    //标摊效果图
                    if(i=="stand_pictures" && booth_detail[i]!==""){
                        var sp = booth_detail[i];
                        var sparea = sp.split(".");
                        for(var spae in sparea){
                                $.post('/exhibition/ajax_get_file_path',{id:sparea[spae]},function(path){
                                    $("div #boothTab_2").append('<img width="768" height="768" src='+path+'>');
                                },"json");
                        }
                    }
                    //是否预售(1:是,0:否)
                    if(i=="is_presell" && booth_detail[i]==1){
                        $(".is_presell").iCheck('check');
                        $(".is_presell").iCheck('disable');
                    }
                    if(i=="is_presell" && booth_detail[i]==0){
                        $(".is_presell").iCheck('uncheck');
                        $(".is_presell").iCheck('disable');
                    }
                    //展位说明
                    if(i=="booth_desc"){
                        $("textarea[name='booth_desc']").text(booth_detail[i]);
                        $("textarea[name='booth_desc']").attr('disabled','true');
                    }
                    //标摊效果图
                    if(i=="booth_pictures" && booth_detail[i]!==""){
                        var bp = booth_detail[i];
                        var bparea = bp.split(".");
                        for(var bpae in bparea){
                          $.post('/exhibition/ajax_get_file_path',{id:bparea[bpae]},function(path){
                              $(".zw-sm").append('<img width="768" height="768" src='+path+'>');
                          },"json");
                        }
                    }
              }
        });

    });
    //我的展位-修改
    $("button.edit").on('click',function (){
        $('#myModal').modal('show');
        $id = $(this).attr("code");
        //标摊效果图
        $('#stand_pic').fileinput({
            language: 'zh',
            uploadUrl: '/exhibition/ajax_stand_pic',
            allowedFileExtensions : ['jpg', 'png','gif'],
            dropZoneEnabled: false,
            showCaption: false,
            maxFileCount: 4,
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
        }).on("fileuploaded", function (event, data, previewId, index) {
            console.log(data.response);
            var stand_pic= '';
            if($("#stand_pictures").val()==""){
                stand_pic=data.response;
                $("#stand_pictures").val(stand_pic);
            }else{
                stand_pic=$("#stand_pictures").val()+"."+data.response;
                $("#stand_pictures").val(stand_pic);
            }
        }).on('fileclear',function(event){
            $("#stand_pictures").val("");
        });
        //展位图
        $('#booth_pic').fileinput({
            language: 'zh',
            uploadUrl: '/exhibition/ajax_booth_pic',
            allowedFileExtensions : ['jpg', 'png','gif'],
            dropZoneEnabled: false,
            showCaption: false,
            maxFileCount: 4,
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
        }).on("fileuploaded", function (event, data, previewId, index) {
            var booth_pic= '';
            if($("#booth_pictures").val()==""){
                booth_pic=data.response;
                $("#booth_pictures").val(booth_pic);
            }else{
                booth_pic=$("#booth_pictures").val()+"."+data.response;
                $("#booth_pictures").val(booth_pic);
            }
        }).on('fileclear',function(event){
            $("#booth_pictures").val("");
        });
        $("#myModalLabel").text("编辑展位");
        $("input[type='checkbox'].booth").on('ifChecked', function (event) {
            $(this).parent().nextAll().attr("disabled", false);
            $(this).parent().parent().parent().next().children().children().attr("disabled", false);
            if ($(this).attr('id') == "indoor") {
                $("#indoorArea").attr("disabled",false);
                $("div .indoor").show();
            } else if ($(this).attr('id') == "stand") {
                $("#StandArea").attr("disabled",false);
                $("div .stand").show();
            } else if ($(this).attr('id') == "outdoor") {
                $("#outdoorArea").attr("disabled",false);
                $("div .outdoor").show();
            }
        });
        $("input[type='checkbox'].booth").on('ifUnchecked', function (event) {
            $(this).parent().nextAll().attr("disabled", true);
            $(this).parent().parent().parent().next().children().children().attr("disabled", true);
            if ($(this).attr('id') == "indoor") {
                $("#indoorArea").attr("disabled",true);
                $(".indoor").hide();
                $(".indoorArea").empty();
            } else if ($(this).attr('id') == "stand") {
                $("#StandArea").attr("disabled",true);
                $(".stand").hide();
                $(".StandArea").empty();
            } else if ($(this).attr('id') == "outdoor") {
                $("#outdoorArea").attr("disabled",true);
                $(".outdoor").hide();
                $(".outdoorArea").empty();
            }
        });
        //随团服务
        $("input:radio[name='provideTravel']").on('ifChecked', function(event){
            var v = $(this).val();
            if(v==1){
                $("input[name='is_pt']").val(v);
                $(".bindTravel,.chargeManagementFee").show();
            }
        });
        $("input:radio[name='provideTravel']").on('ifUnchecked', function(event){
            $(".bindTravel,.chargeManagementFee").hide();
        });
        //是否要求随团
        $("input:radio[name='bindTravel']").on('ifChecked', function(event){
            var v = $(this).val();
            if(v==1){
                $("input[name='is_ct']").val(v);
                $(".chargeManagementFee").hide();
            }
        });
        $("input:radio[name='bindTravel']").on('ifUnchecked', function(event){
            $(".bindTravel,.chargeManagementFee").show();
        });
        //是否收取脱团管理费
        $("input:radio[name='chargeManagementFee']").on('ifChecked', function(event){
            var v = $(this).val();
            if(v==1){
                $("input[name='is_dt']").val(v);
                $(".managementFee").show();
                $("input[name='dt_managerfee']").attr('disabled',false);
            }
        });
        $("input:radio[name='chargeManagementFee']").on('ifUnchecked', function(event){
            $("input[name='dt_managerfee']").attr('disabled',true);
            $(".managementFee").hide();
        });
        //是否按要求搭展
        $("input:radio[name='bindBooth']").on('ifChecked', function(event){
            var v = $(this).val();
            if(v==1){
                $("input[name='is_ts']").val(v);
                $(".bindBooth").show();
            }
        });
        $("input:radio[name='bindBooth']").on('ifUnchecked', function(event){
            $(".bindBooth").hide();
        });
        //是否预售
        $("input[type='checkbox'].is_presell").on('ifChecked', function(event){
            $("input[name='is_presell']").attr("disabled",false);
        });
        //室内光地预定面积
        $(".addIndoorArea").on('click',function(){
            $(".error-info").hide();
            $("input[name='indoorAera']").val('');
            $('#myAera').modal('show');
        });
        //添加室内光地预定面积
        var indoorArea = "";
        $(".addIndoorAera").on('click',function(){
            var isHave = '';
            var area = $("input[name='indoorAera']").val();
            var reg = /^[1-9]\d{0,3}$/;
            if(!(area == "其他" || reg.test(area))){
                $(".error-info").show();
                return false;
            }else{
                //判断所添加的面积是否存在（isHave=1表示已存在）
                if($("div.indoorArea").has("p").length>0){
                    $("font.indoorArea").each(function(){
                        if($(this).text()==area){
                            isHave =1;
                        }
                    });
                }
                if(isHave==1){
                    $('#myAera').modal('hide');
                }else{
                    if($("#indoorArea").val() ==""){
                        indoorArea = area;
                    }else{
                        indoorArea = $("#indoorArea").val()+"."+area;
                    }
                    $("#indoorArea").val(indoorArea);
                    $("div.indoorArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"indoorArea\">"+area+"</font><span class=\"rmindoorArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    $('#myAera').modal('hide');
                }

            }
        });
        //移除室内光地预定面积
        $("body").on('click','.rmindoorArea',function(){
            $(this).parent().remove();
            var indoorArea = "";
            var len =$("div.indoorArea>p").length;
            if(len>1){
                $("font.indoorArea").each(function(i, dom){
                    var a = $(this).text();
                    if(i===len - 1){
                        indoorArea += a;
                    }else{
                        indoorArea += a+".";
                    }

                });
                $("#indoorArea").val(indoorArea);
            }
            if(len==0){
                $("#indoorArea").val("");
            }
            if(len==1){
                $("font.indoorArea").each(function(i, dom){
                    var a = $(this).text();
                    indoorArea += a;
                });
                $("#indoorArea").val(indoorArea);
            }

        });
        //标准摊位预定面积
        var StandArea = "";
        $(".addStandArea").on('click',function(){
            $(".error-info").hide();
            $("input[name='StandAera']").val('');
            $('#myAera1').modal('show');
        });
        //添加标准摊位预定面积
        $(".addStandAera").on('click',function(){
            var isHave = '';
            var area = $("input[name='StandAera']").val();
            var reg = /^[1-9]\d{0,3}$/;
            if(!(area == "其他" || reg.test(area))){
                $(".error-info").show();
                return false;
            }else{
                //判断所添加的面积是否存在（isHave=1表示已存在）
                if($("div.StandArea").has("p").length>0){
                    $("font.addStandArea").each(function(){
                        if($(this).text()==area){
                            isHave =1;
                        }
                    });
                }
                if(isHave==1){
                    $('#myAera1').modal('hide');
                }else{
                    if($("#StandArea").val() ==""){
                        StandArea = area;
                    }else{
                        StandArea = $("#StandArea").val()+"."+area;
                    }
                    $("#StandArea").val(StandArea);
                    $("div.StandArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"addStandArea\">"+area+"</font><span class=\"rmStandArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    $('#myAera1').modal('hide');
                }

            }
        });
        //移除标准摊位预定面积
        $("body").on('click','.rmStandArea',function(){
            $(this).parent().remove();
            var StandArea = "";
            var len =$("div.StandArea>p").length;
            if(len>1){
                $("font.addStandArea").each(function(i, dom){
                    var a = $(this).text();
                    if(i===len - 1){
                        StandArea += a;
                    }else{
                        StandArea += a+".";
                    }

                });
                $("#StandArea").val(StandArea);
            }
            if(len==0){
                $("#StandArea").val("");
            }
            if(len==1){
                $("font.addStandArea").each(function(i, dom){
                    var a = $(this).text();
                    StandArea += a;
                });
                $("#StandArea").val(StandArea);
            }
        });
        //室外光地预定面积
        var outdoorArea = "";
        $(".addOutdoorArea").on('click',function(){
            $(".error-info").hide();
            $("input[name='OutdoorArea']").val('');
            $('#myAera2').modal('show');
        });
        //添加室外光地预定面积
        $(".addOutdoorAera").on('click',function(){
            var isHave = '';
            var area = $("input[name='OutdoorArea']").val();
            var reg = /^[1-9]\d{0,3}$/;
            if(!(area == "其他" || reg.test(area))){
                $(".error-info").show();
                return false;
            }else{
                //判断所添加的面积是否存在（isHave=1表示已存在）
                if($("div.outdoorArea").has("p").length>0){
                    $("font.addOutdoorArea").each(function(){
                        if($(this).text()==area){
                            isHave =1;
                        }
                    });
                }
                if(isHave==1){
                    $('#myAera2').modal('hide');
                }else{
                    if($("#outdoorArea").val() ==""){
                        outdoorArea = area;
                    }else{
                        outdoorArea = $("#outdoorArea").val()+"."+area;
                    }
                    $("#outdoorArea").val(outdoorArea);
                    $("div.outdoorArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"addOutdoorArea\">"+area+"</font><span class=\"rmOutdoorArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    $('#myAera2').modal('hide');
                }

            }
        });
        //移除室外光地预定面积
        $("body").on('click','.rmOutdoorArea',function(){
            $(this).parent().remove();
            var outdoorArea = "";
            var len =$("div.outdoorArea>p").length;
            if(len>1){
                $("font.addOutdoorArea").each(function(i, dom){
                    var a = $(this).text();
                    if(i===len - 1){
                        outdoorArea += a;
                    }else{
                        outdoorArea += a+".";
                    }

                });
                $("#outdoorArea").val(outdoorArea);
            }
            if(len==0){
                $("#outdoorArea").val("");
            }
            if(len==1){
                $("font.addOutdoorArea").each(function(i, dom){
                    var a = $(this).text();
                    outdoorArea += a;
                });
                $("#outdoorArea").val(outdoorArea);
            }
        });
        $.post("/exhibition/ajax_booth_preview",{id:$id},function(data){
            var booth_detail = JSON.parse(data);
            $(".ex_id").val(booth_detail.id);
            for(var i in booth_detail){
                //获取展会名称
                if(i=="name"){
                    $(".ex_name").text(booth_detail[i]);
                }
                //获取发布模式信息
                if(i=="pattern" && booth_detail[i]==0){
                    $("#offline").iCheck('check');
                    $("input[name='line']").iCheck('disable');
                    $("div .boothAlert").hide();
                    $(".line").css('display','none');
                    $(".describe").css('display','block');
                    $("#stand_pic").attr("disabled","true");
                    $(".is_presell").iCheck('disable');
                    $("textarea[name='booth_desc']").attr("disabled","true");
                    $("#booth_pic").attr("disabled","true");
                }
                if(i=="pattern" && booth_detail[i]==1){
                    $("#inline").iCheck('check');
                    $("input[name='line']").iCheck('disable');
                    $("div .boothAlert").hide();
                    $(".line").css('display','block');
                    $(".describe").css('display','none');
                }
                //获取详细描述
                if(i=="describe"){
                    $("textarea[name='describe']").text(booth_detail[i]);
                }
                //注册费选框
                if(i=="reg_fee" && booth_detail[i]!=='0'){
                    $(".reg").iCheck('check');
                    $("input[name='reg_fee']").val(booth_detail[i]);
                }
                //注册货币
                if(i=="regfee_cu" && booth_detail[i]!==0){
                    $("select[name='regfee_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                }
                //注册费用说明
                if(i=="reg_desc" && booth_detail[i]!==""){
                    $("input[name='reg_desc']").val(booth_detail[i]);
                }//室内光地单价
                if(i=="indoor_price" && booth_detail[i]!=='0'){
                    $("input[type='checkbox']#indoor").iCheck('check');
                    $("input[name='indoor_price']").val(booth_detail[i]);
                }
                //室内光地货币单位
                if(i=="indoor_cu" && booth_detail[i]!==0){
                    $("select[name='indoor_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                }
                //室内光地面积单位
                if(i=="indoor_au" && booth_detail[i]!==0){
                    $("select[name='indoor_au'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                }
                //室内光地预定说明
                if(i=="indoor_desc" && booth_detail[i]!==""){
                    $("input[name='indoor_desc']").val(booth_detail[i]);
                }
                //室内光地可预订面积\
                if(i=="indoor_area" && booth_detail[i]!==""){
                    var s = booth_detail[i];
                    $('#indoorArea').val(s);
                    var area = s.split(".");
                    for(var ae in area){
                        $("div.indoorArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"indoorArea\">"+area[ae]+"</font><span class=\"rmindoorArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    }
                }
                //标准摊位单价
                if(i=="stand_price" && booth_detail[i]!=='0'){
                    $("input[type='checkbox']#stand").iCheck('check');
                    $("input[name='stand_price']").val(booth_detail[i]);
                }
                //标准摊位货币单位
                if(i=="stand_cu" && booth_detail[i]!==0){
                    $("select[name='stand_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                }
                //标准摊位面积单位
                if(i=="stand_au" && booth_detail[i]!==0){
                    $("select[name='stand_au'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                }
                //标准摊位预定说明
                if(i=="stand_desc" && booth_detail[i]!==""){
                    $("input[name='stand_desc']").val(booth_detail[i]);
                }
                //标准摊位可预订面积\
                if(i=="stand_area" && booth_detail[i]!==""){
                    var s = booth_detail[i];
                    $('#StandArea').val(s);
                    var area = s.split(".");
                    for(var ae in area){
                        $("div.StandArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"standArea\">"+area[ae]+"</font><span class=\"rmOutdoorArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    }
                }
                //室外光地单价
                if(i=="outdoor_price" && booth_detail[i]!=='0'){
                    $("input[type='checkbox']#outdoor").iCheck('check');
                    $("input[name='outdoor_price']").val(booth_detail[i]);
                }
                //室外光地货币单位
                if(i=="outdoor_cu" && booth_detail[i]!==0){
                    $("select[name='outdoor_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                }
                //室外光地面积单位
                if(i=="outdoor_au" && booth_detail[i]!==0){
                    $("select[name='outdoor_au'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                }
                //室外光地预定说明
                if(i=="outdoor_desc" && booth_detail[i]!==""){
                    $("input[name='outdoor_desc']").val(booth_detail[i]);
                }
                //室外光地可预订面积\
                if(i=="outdoor_area" && booth_detail[i]!==""){
                    var s = booth_detail[i];
                    $('#outdoorArea').val(s);
                    var area = s.split(".");
                    for(var ae in area){
                        $("div.outdoorArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"standArea\">"+area[ae]+"</font><span class=\"rmOutdoorArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    }
                }
                //其他费用选框
                if(i=="other_fee" && booth_detail[i]!=='0'){
                    $("input[type='checkbox']#other").iCheck('check');
                    $("input[name='other_fee']").val(booth_detail[i]);
                }
                //其他费用货币
                if(i=="other_cu" && booth_detail[i]!==0){
                    $("select[name='other_cu'] option[value="+booth_detail[i]+"]").attr("selected","selected");
                }
                //其他费用说明
                if(i=="otherfee_desc" && booth_detail[i]!==""){
                    $("input[name='otherfee_desc']").val(booth_detail[i]);
                }
                //标摊配置
                if(i=="stand_config" && booth_detail[i]!==""){
                    $("#stand_config").text(booth_detail[i]);
                }
                //价格说明
                if(i=="price_desc" && booth_detail[i]!==""){
                    $("#priceDesc").text(booth_detail[i]);
                }
                //是否提供随团服务(1:是,0:否)
                if(i=="is_pt" && booth_detail[i]==1){
                    $("#y-pt").iCheck('check');
                }
                if(i=="is_pt" && booth_detail[i]==0){
                    $("#n-pt").iCheck('check');
                }
                //是否要求随团(1:是,0:否)
                if(i=="is_ct" && booth_detail[i]==1){
                    $("#y-ct").iCheck('check');
                }
                if(i=="is_ct" && booth_detail[i]==0){
                    $("#n-ct").iCheck('check');
                }
                //是否收取脱团管理费(1:是,0:否)
                if(i=="is_dt" && booth_detail[i]==1){
                    $("#y-dt").iCheck('check');
                }
                if(i=="is_dt" && booth_detail[i]==0){
                    $("#n-dt").iCheck('check');
                }
                //获取脱团管理费
                if(i=="dt_managerfee" && booth_detail!==0){
                    $("input[name='dt_managerfee']").val(booth_detail[i]);
                }
                //是否按要求撘展(1:是,0:否)
                if(i=="is_ts" && booth_detail[i]==1){
                    $("#y-ts").iCheck('check');
                }
                if(i=="is_ts" && booth_detail[i]==0){
                    $("#n-ts").iCheck('check');
                }
                //补贴说明
                if(i=="subsidy_desc" && booth_detail[i]!==""){
                    $("textarea[name='subsidy_desc']").text(booth_detail[i]);
                }
                //其他说明
                if(i=="other_desc"){
                    $("div #otherInfo").text(booth_detail[i]);
                }
                //标摊效果图
                if(i=="stand_pictures" && booth_detail[i]!==""){
                    var sp = booth_detail[i];
                    var sparea = sp.split(".");
                    for(var spae in sparea){
                        $.post('/exhibition/ajax_get_file_path',{id:sparea[spae]},function(path){
                            $("div #boothTab_2").append('<img width="200" height="200" src='+path+'>');
                        },"json");
                    }
                }
                //是否预售(1:是,0:否)
                if(i=="is_presell" && booth_detail[i]==1){
                    $(".is_presell").iCheck('check');
                }
                if(i=="is_presell" && booth_detail[i]==0){
                    $(".is_presell").iCheck('uncheck');
                }
                //展位说明
                if(i=="booth_desc"){
                    $("textarea[name='booth_desc']").text(booth_detail[i]);
                }
                //展位效果图
                if(i=="booth_pictures"){
                    var bp = booth_detail[i];
                    $.post("/exhibition/ajax_get_files_path",{id:bp},function(path){
                        $("#booth_pic").fileinput("refresh", {
                                        language: 'zh',
                                        uploadUrl: '/exhibition/ajax_booth_pic',
                                        allowedFileExtensions : ['jpg', 'png','gif'],
                                        dropZoneEnabled: false,
                                        showCaption: false,
                                        showPreview:true,
                                        maxFileCount: 4,
                                        msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
                                        initialPreview: [path]
                                    }).on("fileuploaded", function (event, data, previewId, index) {
                                        var booth_pic= '';
                                        if($("#booth_pictures").val()==""){
                                            booth_pic=data.response;
                                            $("#booth_pictures").val(booth_pic);
                                        }else{
                                            booth_pic=$("#booth_pictures").val()+"."+data.response;
                                            $("#booth_pictures").val(booth_pic);
                                        }
                                    }).on('fileclear',function(event){
                                        $("#booth_pictures").val("");
                                    });
                    },"json");
                }
            }
        });
    });
    $("#myModal").on("hidden.bs.modal", function (){
        location.reload();
    });
    //提交表单
    $(".subbooth").on('click',function(){
        var id = $("input[name='ex_id']").val();
        var html = editor.$txt.html();
        var message = "";
        $("input[name='other_desc']").val(html);
        var arr=$("#frm").serializeArray();
        var reg = /^[1-9]\d*(\.\d+)?$/;
        $("div .boothAlert").hide();
        //获取预定模式
        var pattern = $("input[name='pattern']").val();
        //当pattern为0时只进行其对应数据的判断
        if(pattern==0){
            var describe = $("textarea[name='describe']").val();
            if(describe==""){
                message = "请输入详细信息！";
                $("div.boothAlert>span").text(message);
                $("textarea[name=describe]").focus();
                $("div .boothAlert").show();
                return false;
            }
            //表单数据处理
            layui.use('layer', function () {
                var layer = layui.layer;
                $.ajax({
                    type: 'POST',
                    url: "/exhibition/ajax_add_mybooth_off",
                    dataType: "json",
                    data: {'describe':describe,'id':id},
                    success: function(data){
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
        }else{
            for(var i=0;i<arr.length;i++){
                //注册费
                if (arr[i]['name'] == "reg_fee" && !reg.test(arr[i]['value'])) {
                    message = "请正确输入注册费！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=reg_fee]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //注册费用说明
                if (arr[i]['name'] == "reg_desc" && arr[i]['value'] == "") {
                    message = "请输入注册费用说明！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=reg_desc]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //室内光地
                if (arr[i]['name'] == "indoor_price" && !reg.test(arr[i]['value'])) {
                    message = "请正确输入室内光地单位价格！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=indoor_price]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //室内光地预定说明
                if (arr[i]['name'] == "indoor_desc" && arr[i]['value'] == "") {
                    message = "请输入室内光地预定说明！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=indoor_desc]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //室内光地可预定面积
                if (arr[i]['name'] == "indoor_area" && arr[i]['value'] == "") {
                    message = "请输入室内光地可预定面积！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=indoor_area]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //标准摊位单位价格
                if (arr[i]['name'] == "stand_price" && !reg.test(arr[i]['value'])) {
                    message = "请正确输入标准摊位单位价格！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=stand_price]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //标准摊位预定说明
                if (arr[i]['name'] == "stand_desc" && arr[i]['value'] == "") {
                    message = "请输入标准摊位预定说明！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=stand_desc]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //标准摊位可预定面积
                if (arr[i]['name'] == "stand_area" && arr[i]['value'] == "") {
                    message = "请输入标准摊位可预定面积！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=stand_area]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //室外光地单位价格
                if (arr[i]['name'] == "outdoor_price" && !reg.test(arr[i]['value'])) {
                    message = "请正确输入标准摊位单位价格！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=outdoor_price]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //室外光地预定说明
                if (arr[i]['name'] == "outdoor_desc" && arr[i]['value'] == "") {
                    message = "请输入室外光地预定说明！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=outdoor_desc]").focus();
                    $("div .boothAlert").show();
                    return false;

                }
                //室外光地可预定面积
                if (arr[i]['name'] == "outdoor_area" && arr[i]['value'] == "") {
                    message = "请输入室外光地可预定面积！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=outdoor_area]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //其他费用单位价格
                if (arr[i]['name'] == "other_fee" && !reg.test(arr[i]['value'])) {
                    message = "请输入其他费用单位价格！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=other_fee]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //其他费用预定说明
                if (arr[i]['name'] == "otherfee_desc" && arr[i]['value'] == "") {
                    message = "请输入其他费用预定说明！";
                    $("div.boothAlert>span").text(message);
                    $("input[name=otherfee_desc]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //标摊配置
                if (arr[i]['name'] == "stand_config" && arr[i]['value'] == "") {
                    message = "请输入标摊配置！";
                    $("div.boothAlert>span").text(message);
                    $("textarea[name=stand_config]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //价格说明
                if (arr[i]['name'] == "price_desc" && arr[i]['value'] == "") {
                    message = "请输入价格说明！";
                    $("div.boothAlert>span").text(message);
                    $("textarea[name=price_desc]").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                //脱团管理费
                if (arr[i]['name'] == "dt_managerfee" && arr[i]['value'] == "") {
                    message = "请输入脱团管理费！";
                    $("div.boothAlert>span").text(message);
                    $("input[name='dt_managerfee']").focus();
                    $("div .boothAlert").show();
                    return false;
                }
                // //展位图
                // if (arr[i]['name'] == "booth_pictures" && arr[i]['value'] == "") {
                //     message = "请上传展位图片！";
                //     $("div.boothAlert>span").text(message);
                //     $("input[name='booth_pictures']").focus();
                //     $("div .boothAlert").show();
                //     return false;
                // }
            }
            //表单数据处理
            layui.use('layer', function () {
                var layer = layui.layer;
                $.ajax({
                    type: 'POST',
                    url: "/exhibition/ajax_edit_mybooth",
                    dataType: "json",
                    data: $("#frm").serialize(),
                    success: function(data){
                        if(data==1){
                            layer.msg('编辑成功!');
                            location.reload();
                        }else{
                            layer.msg('编辑失败!');
                            location.reload();
                        }
                    }
                });
            });
        }
    });
    $("#boothAlert").on('click',function(){
        $("div .boothAlert").hide();
    });
});