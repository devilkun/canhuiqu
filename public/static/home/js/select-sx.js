$(function() {
    //获取type类型
    var type = $('#type').val();
    switch (type) {
        case 'all':
            $('#all').addClass('type-actvie');
            break;
        case 'hot':
            $('#hot').addClass('type-actvie');
            break;
        case 'newest':
            $('#newest').addClass('type-actvie');
            break;
        case 'condition':
            $('#condition').addClass('type-actvie');
            break;    
    }
    // tab
    $(".tabClass li").click(function() {
        $(".tabClass li").removeClass("tabHover");
        $(this).addClass("tabHover");

        var clickWithoutHidden = $("#detailTab").attr("clickWithoutHidden");
        if (clickWithoutHidden != 'true') {
            $(this).closest(".tabClass").next(".tabCont").find(".tabBox").hide().eq($(this).index()).show();
        }
    });

    $(".tabClose").click(function() {
        if ($(".tabCont").is(":hidden")) {
            $(".tabCont").show();
            $(this).html("<p>收起筛选</p><span class='tab-up'></span>");
        } else {
            $(".tabCont").hide();
            $(this).html("<p>展开筛选</p><span class='tab-down'></span>");
        }
    });

    //按行业分类进行搜索
    //初始化
    $(".searchPoz p").hide();
    $(".searchPoz span").hide();

    //行业
    var $parentCatalogName, $parentCatalogCode, $catalogName, $catalogCode;

    var tradeDom = $(".cLi-Trade span");
    tradeDom.mouseenter(function() {
        tradeSearchCondition($(this), false, false, false, false);
    });

    tradeDom.click(function() {
        tradeSearchCondition($(this), true, true, false, true);
    });

    var tradeSearchCondition = function(target, search, showCondition, loadShow) {
        $parentCatalogName = target.attr("name");
        $parentCatalogCode = target.attr("code");
        $catalogName = "";
        $catalogCode = "";

        var leftPx = $(".cLi-Trade").offset().left;
        var left = target.offset().left;
        leftPx = left - leftPx;
        target.find(".sonclass").css("left", "-" + leftPx + "px");
        if (!$(".sonclass").length) {
            $(".cLi-Trade span").removeClass();
            target.addClass("cSel");
            var index = target.index();
            if (index === 0) {
                if (search) {
                    $(".searchPoz").find("#trade").prev("p").hide();
                    $(".searchPoz").find("#trade").hide();
                    $("#parentCategoryId").val("");
                    $("#categoryId").val("");
                }
            } else if (showCondition) {
                $(".searchPoz").find("#trade").prev("p").show();
                $(".searchPoz").find("#trade").html("").show().append(getMergedCatalogName($parentCatalogName, $catalogName));
            }
        } else if (!$(".sonclass").eq(target.index() - 1).find("a").length) {
            $(".sonclass").hide();
            $(".sonclass").find("a").removeClass();
            $(".cLi-Trade span").removeClass();
            $(".cLi-Trade").find("b").hide();
            target.addClass("cSel");
            if (showCondition) {
                $(".searchPoz").find("#trade").prev("p").show();
                $(".searchPoz").find("#trade").html("").show().append(getMergedCatalogName($parentCatalogName, $catalogName));
            }
        } else {
            $(".cLi-Trade span").removeClass();
            target.addClass("cSel");
            $(".cLi-Trade").find("b").hide();
            var index = target.index();
            if (index === 0) {
                if (search) {
                    $(".searchPoz").find("#trade").prev("p").hide();
                    $(".searchPoz").find("#trade").hide();
                    $(".sonclass").hide();
                    $(".cLi-Trade").find("b").hide();
                    $("#parentCategoryId").val("");
                    $("#categoryId").val("");
                }
            } else {
                if (showCondition) {
                    if (loadShow) {
                        $catalogCode = $("#categoryId").val();
                        if ($catalogCode && $catalogCode.length > 0) {
                            $catalogName = $('a[code=' + $catalogCode + ']').text();
                        }
                    }
                    $(".searchPoz").find("#trade").prev("p").show();
                    $(".searchPoz").find("#trade").html("").show().append(getMergedCatalogName($parentCatalogName, $catalogName));
                }
                target.append("<b></b>");
                $(".sonclass").hide().eq(target.index() - 1).show();
            }
        }
        if (search) doSearch();
    };

    $(".sonclass a").bind("click", function(event) {
        subTradeSearchCondition($(this), true, event);
    });

    var subTradeSearchCondition = function(target, search, event) {
        $catalogName = target.text() || $catalogName;
        $catalogCode = target.attr("code") || $catalogCode;

        $(".sonclass").find("a").removeClass();
        target.addClass("cSel");
        $(".cLi-Trade").find("b").hide();
        $(".searchPoz").find("#trade").prev("p").show();
        $(".searchPoz").find("#trade").html("").show().append(getMergedCatalogName($parentCatalogName, $catalogName));
        $(".sonclass").hide();
        if (search && '+' !== target.text()) doSearch();
        if (event) event.stopPropagation(); //  阻止事件冒泡
    };


    tradeDom.mouseleave(function() {
        $(".sonclass").hide();
        $(".cLi-Trade").find("b").hide();
        // $(".cLi-Trade span").removeClass();
    });

    var getMergedCatalogName = function(parentName, catalogName) {
        $("#parentCategoryId").val($parentCatalogCode);
        $("#categoryId").val($catalogCode);

        parentName = parentName || $parentCatalogName;
        catalogName = catalogName || $catalogName;
        var displayName = catalogName ? parentName + " - " + catalogName : parentName;
        return "<font color='gray'>行业：</font>" + displayName + " &times;"
    };

    $(document).ready(function() {
        var num = $(".cLi-Trade").find("span");
        var temp = 0;
        var clipIndex;
        $(".cLi-Trade").find("span").each(function(i) {
            var top = $(this).offset().top;
            if (temp > 0 && top > temp) {
                clipIndex = i;
                return false;
            }
            temp = top;
        });

        function show() {
            $(".cLi-Trade").find("span").each(function(i) {
                if (i >= clipIndex) {
                    $(this).show();
                }
            })
        }

        function hide() {
            $(".cLi-Trade").find("span").each(function(i) {
                if (i >= clipIndex) {
                    $(this).hide();
                }
            })
        }
        hide();
        $("#more-Trade").click(function() {
            if ("+" == $(this).html()) {
                show();
                $(this).html("-");
            } else {
                hide();
                $(this).html("+");
            }
        })
    });

    //国家
    var $continent, $continentCode, $country, $countryCode, $index;
    var $countryMergedNameDom = $(".searchPoz").find("#country");
    var countryDom = $(".cLi-Addr span");

    countryDom.mouseenter(function() {
        continentSearchCondition($(this), false, false, false);
    });

    countryDom.click(function() {
        continentSearchCondition($(this), true, true, true);
    });

    countryDom.mouseleave(function() {
        $(".country").hide();
        $(".cLi-Addr").find("b").hide();
        //$(".cLi-Addr span").removeClass();
    });

    var continentSearchCondition = function(target, search, showCondition, t) {
        countryDom.removeClass();
        target.addClass("cSel");
        $continent = target.attr("name");
        $continentCode = target.attr("id");
        $country = "";
        $countryCode = "";
        $index = target.index();
        if ($index === 0) {
            if (search) {
                target.closest(".cLi-Addr").find("b").hide();
                $(".country").hide();
                $(".country a").removeClass();
                $countryMergedNameDom.prev("p").hide();
                $countryMergedNameDom.html("").hide();
                // 条件为不限
                $("#continentCode").val("");
                $("#countryCode").val("");
            }
        } else if (!$(".country").eq(target.index() - 1).find("a").length) {
            target.closest(".cLi-Addr").find("b").hide();
            $(".country").hide();
            if (showCondition) {
                $countryMergedNameDom.prev("p").show();
                $countryMergedNameDom.html("").show().append(getMergedCountryName($continent, $country));
            }
        } else {
            target.closest(".cLi-Addr").find("b").hide();
            target.append("<b></b>");
            if (showCondition) {
                $countryMergedNameDom.prev("p").show();
                $countryMergedNameDom.html("").show().append(getMergedCountryName($continent, $country));
            }
            $(".country").hide().eq(target.index() - 1).show();
        }
        if (search) doSearch();
    };

    $(".cLi-Addr .country a").click(function(event) {
        countrySearchCondition($(this), true, event);
    });

    var countrySearchCondition = function(target, search, event) {
        $country = target.text();
        $countryCode = target.attr("id");
        $(".country").find("a").removeClass();
        target.addClass("cSel");
        $countryMergedNameDom.prev("p").show();
        $countryMergedNameDom.html("").show().append(getMergedCountryName($continent, $country));
        $(".country").hide();
        $(".cLi-Addr").find("b").hide();
        if (search) doSearch();
        if (event) event.stopPropagation(); //  阻止事件冒泡
    };

    var getMergedCountryName = function(continent, country) {
        $("#countryCode").val($countryCode);
        $("#continentCode").val($continentCode);

        continent = continent || $continent;
        country = country || $country;
        var displayName = country ? continent + " - " + country : continent;
        return "<font color='gray'>地点：</font>" + displayName + " &times;";
    };

    $(".cLi-Addr .country > i").click(function(event) {
        var $thisHeight = $(this).closest(".country").height();
        if ($thisHeight <= 60) {
            $(this).closest(".country").css({ "height": "auto", "overflow": "hidden" });
            $(this).html("-");
        } else {
            $(this).closest(".country").css({ "height": "60px", "overflow": "hidden" });
            $(this).html("+");
        }
        event.stopPropagation(); //  阻止事件冒泡
    });

    //时间
    $(".cLi-Time span").off("click").on("click", function() {
        timeCondition($(this), true);
    });

    var timeCondition = function(that, search) {
        $(".cLi-Time span").removeClass();
        that.addClass("cSel");
        var index = that.index();
        if (index == 0) {

            $(".searchPoz").find("#time").prev("p").hide();
            $(".searchPoz").find("#time").hide();
            $("#startTime").val("");
        } else {
            $(".searchPoz").find("#time").prev("p").show();
            $(".searchPoz").find("#time").html("").show().append("<font color='gray'>时间：</font>" + that.text() + " &times;");
            $("#startTime").val(that.attr("code"));

        }
        if (search) doSearch();
    };

    //展开或隐藏更多类别
    $("#more-Time").click(function() {
        if ("+" == $(this).html()) {
            $(this).closest(".cLi").css({ "height": "auto", "overflow": "hidden" });
            $(this).html("-");
        } else {
            $(this).closest(".cLi").css({ "height": "40px", "overflow": "hidden" });
            $(this).html("+");
        }
    });

    //删除某个筛选条件
    $(".searchPoz #trade").click(function() {
        $(this).prev("p").hide();
        $(this).html("").hide();
        $(".cLi-Trade span").removeClass().eq(0).addClass("cSel");
        $(".sonclass a").removeClass();
        $(".sonclass").hide();

        // 清空数据
        $("#parentCategoryId").val("");
        $("#categoryId").val("");
        doSearch();
    });

    $(".searchPoz #country").click(function() {
        $(this).prev("p").hide();
        $(this).html("").hide();
        $(".cLi-Addr span").removeClass().eq(0).addClass("cSel");
        $(".cLi-Addr").find("b").hide();
        $(".cLi-Addr .country a").removeClass();
        $(".cLi-Addr .country").hide();

        // 条件为不限
        $("#continentCode").val("");
        $("#countryCode").val("");
        doSearch();
    });

    $(".searchPoz #time").click(function() {
        $(this).prev("p").hide();
        $(this).html("").hide();
        $(".cLi-Time span").removeClass().eq(0).addClass("cSel");
        $("#startTime").val("");
        doSearch();
    });

    //清空筛选条件
    $(".searchPoz i").click(function() {
        $(".searchPoz").find("p").hide();
        $(".searchPoz").find("span").html("").hide();
        $(".cLi-Trade span").removeClass().eq(0).addClass("cSel");
        $(".sonclass a").removeClass();
        $(".sonclass").hide();
        $(".cLi-Addr span").removeClass().eq(0).addClass("cSel");
        $(".cLi-Addr").find("b").hide();
        $(".cLi-Addr .country a").removeClass();
        $(".cLi-Addr .country").hide();
        $(".cLi-Time span").removeClass().eq(0).addClass("cSel");

        // 清空数据
        $("#parentCategoryId").val("");
        $("#categoryId").val("");
        $("#continentCode").val("");
        $("#countryCode").val("");
        $("#startTime").val("");
        doSearch();
    });

    // 检查一级分类是否选中
    var parentCategoryId = $("#parentCategoryId").val();
    if (parentCategoryId) {
        var spanDom = $(".cLi-Trade span[code=" + parentCategoryId + "]");
        tradeSearchCondition(spanDom, false, true, true);
        //spanDom.click();
        $(".cLi-Trade").find("b").hide();
        $(".sonclass").hide();

        var categoryId = $("#categoryId").val();
        if (categoryId) {
            var divDom = $("#ulCategory").find("div:visible");
            //divDom.find("a[code='" + categoryId + "']").click();
            subTradeSearchCondition(divDom.find("a[code='" + categoryId + "']"), false, window.event)
            divDom.show();
        }
    }

    // 检查大州一级是否选中
    var continentCode = $("#continentCode").val();
    if (continentCode) {
        var countryCode = $("#countryCode").val();
        continentSearchCondition($(".cLi-Addr span[id=" + continentCode.toLowerCase() + "]"), false, true);
        //$(".cLi-Addr span[code=" + continentCode.toLowerCase() + "]").click();
        $(".cLi-Addr").find("b").hide();
        if (countryCode) {
            countrySearchCondition($(".cLi-Addr").find("div:visible").find("a[id='" + countryCode.toLowerCase() + "']"), false, window.event);
            //$(".cLi-Addr").find("div:visible").find("a[code='" + countryCode.toLowerCase() + "']").click();
        }
        $(".country").hide();
        $(".cLi-Addr").find("b").hide();
    }

    // 检查时间是否选中
    var startTime = $("#hidStartTime").val();
    if (startTime) {
        timeCondition($(".cLi-Time span[code=" + startTime + "]"), false);
        //$(".cLi-Time span[code=" + startTime + "]").click();
    }
    //
    $(".decrease").click(function() {
        var dom = $(this).next(".num-val").find("input");
        dom.val(Math.max(1, parseInt(dom.val()) - 1));
    });

    $(".increase").click(function() {
        var dom = $(this).prev(".num-val").find("input");
        dom.val(parseInt(dom.val()) + 1);
    });
    var doSearch = function() {
        ///iuexpo-portal/exhibition/booth/index.html?advertising=false&popular=false&keyword=
        // &parentCategoryId=&categoryId=&continentCode=&countryCode=&pageIndex=1&startTime=
        var arr = ["advertising=false", "popular=false", "keyword=",
            "searchSource=" + $("#searchSource").val(),
            "parentCategoryId=" + $("#parentCategoryId").val(),
            "categoryId=" + $("#categoryId").val(),
            "continentCode=" + $("#continentCode").val(),
            "countryCode=" + $("#countryCode").val(),
            "startTime=" + $("#startTime").val()
        ];
        console.log(arr.join("&"));
        $("#searchKeyword").val("");
        $("#webQueryCondition").submit();
    };
});