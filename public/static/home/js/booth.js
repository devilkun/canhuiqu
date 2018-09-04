//wangEditor
var editor = new wangEditor('otherInfo');
var editor_config_menus = [
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
editor.config.menus = editor_config_menus;
editor.create();
//AddBooth
$(function() {
    var notice = {};
    // 隐藏提示
    notice.hideAlert = function() {
        $("div .boothAlert").hide();
    };
    // 显示提示
    notice.showAlert = function() {
        $("div .boothAlert").show();
        setTimeout(function() {
            $("div .boothAlert").hide(500);
        }, 2000);
    };
    //提示信息
    notice.tip = function(message) {
        $("div.boothAlert>span").text(message);
    };
    //移除提示
    $("#boothAlert").on('click', function() {
        $("div .boothAlert").hide();
    });
    //判断发布模式
    $("input:radio[name='line']").on('ifChecked', function(event) {
        var v = $(this).val();
        $("input[name='pattern']").val(v);
        if (v == 0) {
            $("div .boothAlert").hide();
            $(".line").css('display', 'none');
            $(".describe").css('display', 'block');
        } else {
            $("div .boothAlert").hide();
            $(".line").css('display', 'block');
            $(".describe").css('display', 'none');
        }
    });
    //标摊效果图
    $('#stand_pic').fileinput({
        language: 'zh',
        uploadUrl: '/exhibition/ajax_stand_pic',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        dropZoneEnabled: false,
        showCaption: false,
        showUpload: false,
        layoutTemplates: {
            actionUpload: ''
        },
        maxFileCount: 4,
        msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
    }).on('fileclear', function(event) {
        $("#stand_pictures").val("");
    });
    //展位图
    $('#booth_pic').fileinput({
        language: 'zh',
        uploadUrl: '/exhibition/ajax_booth_pic',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        dropZoneEnabled: false,
        showCaption: false,
        showUpload: false,
        layoutTemplates: {
            actionUpload: ''
        },
        maxFileCount: 4,
        msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
    }).on('fileclear', function(event) {
        $("#booth_pictures").val("");
    });
    //发布展位
    $("button.booth").on('click', function() {
        $('#myModal').modal('show');
        $("input[type='checkbox'].booth").on('ifChecked', function(event) {
            $(this).parent().nextAll().attr("disabled", false);
            $(this).parent().parent().parent().next().children().children().attr("disabled", false);
            if ($(this).attr('id') == "indoor") {
                $("#indoorArea").attr("disabled", false);
                $("div .indoor").show();
            } else if ($(this).attr('id') == "stand") {
                $("#StandArea").attr("disabled", false);
                $("div .stand").show();
            } else if ($(this).attr('id') == "outdoor") {
                $("#outdoorArea").attr("disabled", false);
                $("div .outdoor").show();
            }
        });
        $("input[type='checkbox'].booth").on('ifUnchecked', function(event) {
            $(this).parent().nextAll().attr("disabled", true);
            $(this).parent().parent().parent().next().children().children().attr("disabled", true);
            if ($(this).attr('id') == "indoor") {
                $("#indoorArea").attr("disabled", true);
                $(".indoor").hide();
                $(".indoorArea").empty();
            } else if ($(this).attr('id') == "stand") {
                $("#StandArea").attr("disabled", true);
                $(".stand").hide();
                $(".StandArea").empty();
            } else if ($(this).attr('id') == "outdoor") {
                $("#outdoorArea").attr("disabled", true);
                $(".outdoor").hide();
                $(".outdoorArea").empty();
            }
        });
        //展会ID
        var ID = $(this).parent().prevAll('.ex_id').children().children().attr('id');
        $("input[type='hidden'].ex_id").val(ID);
        //展会名称
        var exname = $(this).parent().prevAll('.exname').text();
        $("label.exname").text(exname);
        //随团服务
        $("input:radio[name='provideTravel']").on('ifChecked', function(event) {
            var v = $(this).val();
            if (v == 1) {
                $("input[name='is_pt']").val(v);
                $(".bindTravel,.chargeManagementFee").show();
            }
        });
        $("input:radio[name='provideTravel']").on('ifUnchecked', function(event) {
            $(".bindTravel,.chargeManagementFee").hide();
        });
        //是否要求随团
        $("input:radio[name='bindTravel']").on('ifChecked', function(event) {
            var v = $(this).val();
            if (v == 1) {
                $("input[name='is_ct']").val(v);
                $(".chargeManagementFee").hide();
            }
        });
        $("input:radio[name='bindTravel']").on('ifUnchecked', function(event) {
            $(".bindTravel,.chargeManagementFee").show();
        });
        //是否收取脱团管理费
        $("input:radio[name='chargeManagementFee']").on('ifChecked', function(event) {
            var v = $(this).val();
            if (v == 1) {
                $("input[name='is_dt']").val(v);
                $(".managementFee").show();
                $("input[name='dt_managerfee']").attr('disabled', false);
            }
        });
        $("input:radio[name='chargeManagementFee']").on('ifUnchecked', function(event) {
            $("input[name='dt_managerfee']").attr('disabled', true);
            $(".managementFee").hide();
        });
        //是否按要求搭展
        $("input:radio[name='bindBooth']").on('ifChecked', function(event) {
            var v = $(this).val();
            if (v == 1) {
                $("input[name='is_ts']").val(v);
                $(".bindBooth").show();
            }
        });
        $("input:radio[name='bindBooth']").on('ifUnchecked', function(event) {
            $(".bindBooth").hide();
        });
        //是否预售
        $("input[type='checkbox'].is_presell").on('ifChecked', function(event) {
            $("input[name='is_presell']").attr("disabled", false);
        });
        //室内光地预定面积
        $(".addIndoorArea").on('click', function() {
            $(".error-info").hide();
            $("input[name='indoorAera']").val('');
            $('#myAera').modal('show');
        });
        //添加室内光地预定面积
        var indoorArea = "";
        $(".addIndoorAera").on('click', function() {
            var isHave = '';
            var area = $("input[name='indoorAera']").val();
            var reg = /^[1-9]\d{0,3}$/;
            if (!(area == "其他" || reg.test(area))) {
                $(".error-info").show();
                return false;
            } else {
                //判断所添加的面积是否存在（isHave=1表示已存在）
                if ($("div.indoorArea").has("p").length > 0) {
                    $("font.indoorArea").each(function() {
                        if ($(this).text() == area) {
                            isHave = 1;
                        }
                    });
                }
                if (isHave == 1) {
                    $('#myAera').modal('hide');
                } else {
                    if ($("#indoorArea").val() == "") {
                        indoorArea = area;
                    } else {
                        indoorArea = $("#indoorArea").val() + "." + area;
                    }
                    $("#indoorArea").val(indoorArea);
                    $("div.indoorArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"indoorArea\">" + area + "</font><span class=\"rmindoorArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    $('#myAera').modal('hide');
                }

            }
        });
        //移除室内光地预定面积
        $("body").on('click', '.rmindoorArea', function() {
            $(this).parent().remove();
            var indoorArea = "";
            var len = $("div.indoorArea>p").length;
            if (len > 1) {
                $("font.indoorArea").each(function(i, dom) {
                    var a = $(this).text();
                    if (i === len - 1) {
                        indoorArea += a;
                    } else {
                        indoorArea += a + ".";
                    }

                });
                $("#indoorArea").val(indoorArea);
            }
            if (len == 0) {
                $("#indoorArea").val("");
            }
            if (len == 1) {
                $("font.indoorArea").each(function(i, dom) {
                    var a = $(this).text();
                    indoorArea += a;
                });
                $("#indoorArea").val(indoorArea);
            }

        });
        //标准摊位预定面积
        var StandArea = "";
        $(".addStandArea").on('click', function() {
            $(".error-info").hide();
            $("input[name='StandAera']").val('');
            $('#myAera1').modal('show');
        });
        //添加标准摊位预定面积
        $(".addStandAera").on('click', function() {
            var isHave = '';
            var area = $("input[name='StandAera']").val();
            var reg = /^[1-9]\d{0,3}$/;
            if (!(area == "其他" || reg.test(area))) {
                $(".error-info").show();
                return false;
            } else {
                //判断所添加的面积是否存在（isHave=1表示已存在）
                if ($("div.StandArea").has("p").length > 0) {
                    $("font.addStandArea").each(function() {
                        if ($(this).text() == area) {
                            isHave = 1;
                        }
                    });
                }
                if (isHave == 1) {
                    $('#myAera1').modal('hide');
                } else {
                    if ($("#StandArea").val() == "") {
                        StandArea = area;
                    } else {
                        StandArea = $("#StandArea").val() + "." + area;
                    }
                    $("#StandArea").val(StandArea);
                    $("div.StandArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"addStandArea\">" + area + "</font><span class=\"rmStandArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    $('#myAera1').modal('hide');
                }

            }
        });
        //移除标准摊位预定面积
        $("body").on('click', '.rmStandArea', function() {
            $(this).parent().remove();
            var StandArea = "";
            var len = $("div.StandArea>p").length;
            if (len > 1) {
                $("font.addStandArea").each(function(i, dom) {
                    var a = $(this).text();
                    if (i === len - 1) {
                        StandArea += a;
                    } else {
                        StandArea += a + ".";
                    }

                });
                $("#StandArea").val(StandArea);
            }
            if (len == 0) {
                $("#StandArea").val("");
            }
            if (len == 1) {
                $("font.addStandArea").each(function(i, dom) {
                    var a = $(this).text();
                    StandArea += a;
                });
                $("#StandArea").val(StandArea);
            }
        });
        //室外光地预定面积
        var outdoorArea = "";
        $(".addOutdoorArea").on('click', function() {
            $(".error-info").hide();
            $("input[name='OutdoorArea']").val('');
            $('#myAera2').modal('show');
        });
        //添加室外光地预定面积
        $(".addOutdoorAera").on('click', function() {
            var isHave = '';
            var area = $("input[name='OutdoorArea']").val();
            var reg = /^[1-9]\d{0,3}$/;
            if (!(area == "其他" || reg.test(area))) {
                $(".error-info").show();
                return false;
            } else {
                //判断所添加的面积是否存在（isHave=1表示已存在）
                if ($("div.outdoorArea").has("p").length > 0) {
                    $("font.addOutdoorArea").each(function() {
                        if ($(this).text() == area) {
                            isHave = 1;
                        }
                    });
                }
                if (isHave == 1) {
                    $('#myAera2').modal('hide');
                } else {
                    if ($("#outdoorArea").val() == "") {
                        outdoorArea = area;
                    } else {
                        outdoorArea = $("#outdoorArea").val() + "." + area;
                    }
                    $("#outdoorArea").val(outdoorArea);
                    $("div.outdoorArea").append("<p class=\"red-border\"><font style=\"color: red\" class=\"addOutdoorArea\">" + area + "</font><span class=\"rmOutdoorArea\" style=\"cursor: pointer;\" title=\"删除可预订位置\">x</span></p>");
                    $('#myAera2').modal('hide');
                }

            }
        });
        //移除室外光地预定面积
        $("body").on('click', '.rmOutdoorArea', function() {
            $(this).parent().remove();
            var outdoorArea = "";
            var len = $("div.outdoorArea>p").length;
            if (len > 1) {
                $("font.addOutdoorArea").each(function(i, dom) {
                    var a = $(this).text();
                    if (i === len - 1) {
                        outdoorArea += a;
                    } else {
                        outdoorArea += a + ".";
                    }

                });
                $("#outdoorArea").val(outdoorArea);
            }
            if (len == 0) {
                $("#outdoorArea").val("");
            }
            if (len == 1) {
                $("font.addOutdoorArea").each(function(i, dom) {
                    var a = $(this).text();
                    outdoorArea += a;
                });
                $("#outdoorArea").val(outdoorArea);
            }
        });
    });
    $("#myModal").on("hidden.bs.modal", function() {
        location.reload();
    });
    //提交表单
    $(".subbooth").on('click', function() {
        var id = $("input[name='ex_id']").val();
        var html = editor.$txt.html();
        var arr = $("#frm").serializeArray();
        var message = "";
        $("input[name='other_desc']").val(html);
        var reg = /^[1-9]\d*(\.\d+)?$/;
        $("div .boothAlert").hide();
        //获取预定模式
        var pattern = $("input[name='pattern']").val();
        //当pattern为0时只进行其对应数据的判断
        if (pattern == 0) {
            var describe = $("textarea[name='describe']").val();
            if (describe == "") {
                $('#boothTab a[href="#boothTab_1"]').tab('show');
                $("textarea[name=describe]").focus();
                notice.tip("请输入详细信息！");
                notice.showAlert();
                return false;
            }
            //表单数据处理
            layui.use('layer', function() {
                var layer = layui.layer;
                $.ajax({
                    type: 'POST',
                    url: "/exhibition/ajax_add_mybooth_off",
                    dataType: "json",
                    data: { 'describe': describe, 'id': id },
                    success: function(data) {
                        if (data == 1) {
                            layer.msg('添加成功!');
                            location.reload();
                        } else {
                            layer.msg('添加失败!');
                            location.reload();
                        }
                    }
                });
            });
        } else {
            for (var i = 0; i < arr.length; i++) {
                //注册费
                if (arr[i]['name'] == "reg_fee" && !reg.test(arr[i]['value'])) {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=reg_fee]").focus();
                    notice.tip("请正确输入注册费！");
                    notice.showAlert();
                    return false;
                }
                //注册费用说明
                if (arr[i]['name'] == "reg_desc" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=reg_desc]").focus();
                    notice.tip("请输入注册费用说明！");
                    notice.showAlert();
                    return false;
                }
                //室内光地
                if (arr[i]['name'] == "indoor_price" && !reg.test(arr[i]['value'])) {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=indoor_price]").focus();
                    notice.tip("请正确输入室内光地单位价格！");
                    notice.showAlert();
                    return false;
                }
                //室内光地预定说明
                if (arr[i]['name'] == "indoor_desc" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=indoor_desc]").focus();
                    notice.tip("请输入室内光地预定说明！");
                    notice.showAlert();
                    return false;
                }
                //室内光地可预定面积
                if (arr[i]['name'] == "indoor_area" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=indoor_area]").focus();
                    notice.tip("请输入室内光地可预定面积！");
                    notice.showAlert();
                    return false;
                }
                //标准摊位单位价格
                if (arr[i]['name'] == "stand_price" && !reg.test(arr[i]['value'])) {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=stand_price]").focus();
                    notice.tip("请正确输入标准摊位单位价格！");
                    notice.showAlert();
                    return false;
                }
                //标准摊位预定说明
                if (arr[i]['name'] == "stand_desc" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=stand_desc]").focus();
                    notice.tip("请输入标准摊位预定说明！");
                    notice.showAlert();
                    return false;
                }
                //标准摊位可预定面积
                if (arr[i]['name'] == "stand_area" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=stand_area]").focus();
                    notice.tip("请输入标准摊位可预定面积！");
                    notice.showAlert();
                    return false;
                }
                //室外光地单位价格
                if (arr[i]['name'] == "outdoor_price" && !reg.test(arr[i]['value'])) {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=outdoor_price]").focus();
                    notice.tip("请正确输入标准摊位单位价格！");
                    notice.showAlert();
                    return false;
                }
                //室外光地预定说明
                if (arr[i]['name'] == "outdoor_desc" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=outdoor_desc]").focus();
                    notice.tip("请输入室外光地预定说明！");
                    notice.showAlert();
                    return false;

                }
                //室外光地可预定面积
                if (arr[i]['name'] == "outdoor_area" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=outdoor_area]").focus();
                    notice.tip("请输入室外光地可预定面积！");
                    notice.showAlert();
                    return false;
                }
                //其他费用单位价格
                if (arr[i]['name'] == "other_fee" && !reg.test(arr[i]['value'])) {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=other_fee]").focus();
                    notice.tip("请输入其他费用单位价格！");
                    notice.showAlert();
                    return false;
                }
                //其他费用预定说明
                if (arr[i]['name'] == "otherfee_desc" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name=otherfee_desc]").focus();
                    notice.tip("请输入其他费用预定说明！");
                    notice.showAlert();
                    return false;
                }
                //标摊配置
                if (arr[i]['name'] == "stand_config" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("textarea[name=stand_config]").focus();
                    notice.tip("请输入标摊配置！");
                    notice.showAlert();
                    return false;
                }
                //价格说明
                if (arr[i]['name'] == "price_desc" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("textarea[name=price_desc]").focus();
                    notice.tip("请输入价格说明！");
                    notice.showAlert();
                    return false;
                }
                //脱团管理费
                if (arr[i]['name'] == "dt_managerfee" && arr[i]['value'] == "") {
                    $('#boothTab a[href="#boothTab_1"]').tab('show');
                    $("input[name='dt_managerfee']").focus();
                    notice.tip("请输入脱团管理费！");
                    notice.showAlert();
                    return false;
                }
            }
            layui.use('layer', function() {
                                var layer = layui.layer;
                                $.ajax({
                                    type: 'POST',
                                    url: "/exhibition/ajax_add_mybooth",
                                    dataType: "json",
                                    data: $('#frm').serialize(),
                                    success: function(data) {
                                        console.log(data);
                                        if (data == 1) {
                                            layer.msg('添加成功!');
                                            location.reload();
                                        } else {
                                            layer.msg('添加失败!');
                                            location.reload();
                                        }
                                    }
                                });
                            });
            // var stand_pictures_len = $("#boothTab_2 .file-preview-frame").length;
            // if (stand_pictures_len) {
            //     var stand_pictures_num = $("#stand_pic").fileinput('getFilesCount');
            // } else {
            //     var stand_pictures_num = 0;
            // }
            // var booth_pictures_len = $("#boothTab_3 .file-preview-frame").length;
            // if (!booth_pictures_len) {
            //     $('#boothTab a[href="#boothTab_3"]').tab('show');
            //     $("input[name='booth_pictures']").focus();
            //     notice.tip("请上传展位图！");
            //     notice.showAlert();
            //     return false;
            // } else {
            //     var booth_pictures_num = $("#booth_pic").fileinput('getFilesCount');
            // }
            // var expath = {
            //     'stand_num': stand_pictures_num,
            //     'booth_num': booth_pictures_num,
            //     'stand_pic': [],
            //     'booth_pic': [],
            //     'stand_pictures': '',
            //     'booth_pictures': '',
            //     'merge': function(r, type) {
            //         if (type == "stand_pictures") {
            //             this.stand_pic.push(r);
            //             if (this.stand_num == this.stand_pic.length) {
            //                 if (this.stand_num == 0) {
            //                     this.stand_pictures = "";
            //                 } else {
            //                     this.stand_pictures = this.stand_pic.join(',');
            //                 }
            //             }
            //         } else if (type == "booth_pictures") {
            //             this.booth_pic.push(r);
            //             if (this.booth_num == this.booth_pic.length) {
            //                 this.booth_pictures = this.booth_pic.join(',');
            //                 var ser = $('#frm').serialize() + '&' + $.param({ 'stand_pictures': this.stand_pictures }) + '&' + $.param({ 'booth_pictures': this.booth_pictures });
            //                 //表单数据处理
            //                 layui.use('layer', function() {
            //                     var layer = layui.layer;
            //                     $.ajax({
            //                         type: 'POST',
            //                         url: "/exhibition/ajax_add_mybooth",
            //                         dataType: "json",
            //                         data: ser,
            //                         success: function(data) {
            //                             console.log(data);
            //                             if (data == 1) {
            //                                 layer.msg('添加成功!');
            //                                 location.reload();
            //                             } else {
            //                                 layer.msg('添加失败!');
            //                                 location.reload();
            //                             }
            //                         }
            //                     });
            //                 });
            //             }
            //         }

            //     }
            // };
            // if (stand_pictures_len) {
            //     $("#stand_pic").fileinput('upload');
            //     $("#stand_pic").on('fileuploaded', function(event, data) {
            //         expath.merge(data.response, 'stand_pictures');
            //     });
            // }
            // $("#booth_pic").fileinput('upload');
            // $("#booth_pic").on('fileuploaded', function(event, data) {
            //     expath.merge(data.response, 'booth_pictures');
            // });


        }
    });
});