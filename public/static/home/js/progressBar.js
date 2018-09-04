// JavaScript Document

$(function(){
	//a 搴曡壊锛宐 鍔犺浇鑹� , w 灞曠ず瀹藉害锛宧 灞曠ず楂樺害
	var a="#DD6104";
	var b="#f5f5f5";
	var w="80px";
	var h="13px";
	var div=$(".div");//杩涘害鏉¤鎻掑叆鐨勫湴鏂�
	var barb=function(){
		div.each(function(){
			var width=$(this).attr('w');
			var barbox='<dl class="barbox"><dd class="barline"><div w="'+width+'" class="charts" style="width:0px"><d></d></div></dd></dl>';
			$(this).append(barbox);
		})
	}
	
	var amimeat=function(){
		$(".charts").each(function(i,item){
			var wi=parseInt($(this).attr("w"));
			$(item).animate({width: wi+"%"},1000,function(){//涓€澶╁唴璧板畬
//				$(this).children('d').html(wi+"%");
			});
		});
	}
	var barbCss=function(a,b){
		$(".barbox").css({
			"height":h,
			"line-height":h,
			"text-align":"center",
			"color":"#fff",
		})
		$(".barbox>dd").css({
			"float":"left"
		})	
		$(".barline").css({
			"width":w,
//			"background":b,
			"height":h,
			"overflow":"hidden",
			"display":"inline",
			"position":"relative",
			"border-radius":"8px",
		})
		$(".barline>d").css({
			"position":"absolute",
			"top":"0px",
			"left":"-999999999",
		})
		$(".charts").css({
			"background":a,
			"height":h,
			"width":"0px",
			"overflow":"hidden",
			"border-radius":"8px"
		})
	}
	barb();
	amimeat();
	barbCss(a,b);
})

