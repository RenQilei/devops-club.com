<!-- Jquery UI -->
<script src="//cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- WangEditor -->
<script src="//cdn.bootcss.com/wangeditor/2.1.20/js/wangEditor.min.js"></script>
<script type="text/javascript">
    var editor = new wangEditor('content-editor');
    // 菜单
    editor.config.menus = [
        'source',
        'bold',
        'underline',
        'italic',
        'strikethrough',
        'eraser',
        'forecolor',
        'bgcolor',
        'quote',
        'fontfamily',
        'fontsize',
        'head',
        'unorderlist',
        'orderlist',
        'alignleft',
        'aligncenter',
        'alignright',
        'link',
        'unlink',
        'table',
        'img',
        // 'emotion',
        // 'video',
        // 'location',
        'insertcode',
        'undo',
        'redo',
        'fullscreen'
    ];
    // 上传图片
    editor.config.uploadImgUrl = "{{ url('article/wang/image/upload') }}";
    // 设置 headers
    editor.config.uploadHeaders = {
        'Accept' : 'text/x-json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
    // 隐藏“网络图片”tab
    editor.config.hideLinkImg = false;
    editor.create();
</script>

<!-- Tag Editor -->
<script src="//cdn.bootcss.com/tag-editor/1.0.20/jquery.tag-editor.min.js"></script>
<script type="text/javascript">
    $("#tags").tagEditor({
        delimiter: ',， ',
        placeholder:'添加一个标签'
    });
</script>

<!-- Jquery File Upload -->
<script src="//cdn.bootcss.com/blueimp-file-upload/9.18.0/js/jquery.fileupload.min.js"></script>
<script type="text/javascript">
    $(function () {
        // 优化banner区域样式
        $("#banner-showroom").height($("#banner-handler").height());

        // 图片已上传
        var uploadedImage = $("input[name='banner_url']").val();
        if(uploadedImage) {
            $("#banner-upload-status").html("<span class='ui blue'>存在已上传图片,点击上传替换...</span>");
            $("#banner-uploaded-image").html("<img src='" + uploadedImage + "'>");
        }

        // 图片上传
        'use strict';
        $('#banner-upload').fileupload({
            url: "{{ url('article/banner/image/upload') }}",
            dataType: 'json',
            done: function (e, data) {
                // 上传成功
                $("input[name='banner_url']").val(data.result);
                $("#banner-upload-status").html("<span>图片上传成功!</span>");
                $("#banner-uploaded-image").html("<img src='" + data.result + "'>");
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#banner-upload-progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>