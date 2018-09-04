$(function() {
    //进度条
    bsStep();
    //bsStep(i) i 为number 可定位到第几步 如bsStep(2)/bsStep(3)
    var $li = $('#tab li');
    var $ul = $('#tent ul');
    $li.click(function() {
        var $this = $(this);
        var $t = $this.index();
        $li.removeClass();
        $this.addClass('current');
        $ul.css('display', 'none');
        $ul.eq($t).css('display', 'block');
    });
    //跟随导航
    var nav = $(".details-titBox"); //得到导航对象
    var prebook = $(".pre-book");
    var win = $(window); //得到窗口对象
    var sc = $(document); //得到document文档对象。
    win.scroll(function() {
        if (sc.scrollTop() >= 360) {
            nav.addClass("fixednav");
            prebook.addClass("fixedbook");
        } else {
            nav.removeClass("fixednav");
            prebook.removeClass("fixedbook");
        }
    });
});