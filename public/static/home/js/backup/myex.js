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


layui.use(['upload','layer'], function() {
    var $ = layui.jquery
        , layer = layui.layer
        , upload = layui.upload;

    //营业执照上传
    var uploadInst = upload.render({
        elem: '#test1'
        , url: 'ajax_uploads_blicense'
        , before: function (obj) {
            //预读本地文件示例，不支持ie8
            obj.preview(function (index, file, result) {
                $('#demo1').attr('src', result); //图片链接（base64）
            });
        }
        , done: function (res) {
            $("#blicense").val(res);
        }
        , error: function () {
            //演示失败状态，并实现重传
            var demoText = $('#demoText');
            demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
            demoText.find('.demo-reload').on('click', function () {
                uploadInst.upload();
            });
        }
    });
});
$("input[type='checkbox']").on('ifChecked', function(event){
    $(this).parent().nextAll().attr("disabled",false);
    $(this).parent().parent().parent().next().children().children().attr("disabled",false);
});
$("input[type='checkbox']").on('ifUnchecked', function(event){
    $(this).parent().nextAll().attr("disabled",true);
    $(this).parent().parent().parent().next().children().children().attr("disabled",true);
});