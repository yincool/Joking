<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="_token" content="{{csrf_token()}}">
    <link href="{{asset('editor.md/css/editormd.min.css')}}" rel="stylesheet">
</head>
<body>
    <div id="editormd">
        <textarea style="display:none;" name="md">### Hello Editor.md !</textarea>
    </div>
</body>
<script src="{{asset('js/jquery3.1.1.min.js')}}"></script>
<script src="{{asset('editor.md/editormd.js')}}"></script>
<script src="{{asset('editor.md/lib/lrz.bundle.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var editor = editormd({
            id: "editormd",
            path:"{{asset('editor.md/lib').'/'}}",
            width:'100%',
            height:500,
            //启动本地图片上传功能
            imageUpload:true,
            imageFormats   : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL : "",
            saveHTMLToTextarea : true,
            emoji: true,//emoji表情，默认关闭
            taskList: true,
            tocm: true, // Using [TOCM]
            tex: true,// 开启科学公式TeX语言支持，默认关闭
            flowChart: true,//开启流程图支持，默认关闭
            sequenceDiagram: true,//开启时序/序列图支持，默认关闭,
        });

        function paste(event) {
            var clipboardData = event.clipboardData;
            var items, item, types;
            if (clipboardData) {
                items = clipboardData.items;
                if (!items) {
                    return;
                }
                // 保存在剪贴板中的数据类型
                types = clipboardData.types || [];
                for (var i = 0; i < types.length; i++) {
                    if (types[i] === 'Files') {
                        item = items[i];
                        break;
                    }
                }
                // 判断是否为图片数据
                if (item && item.kind === 'file' && item.type.match(/^image\//i)) {
                    // 读取该图片
                    var file = item.getAsFile(),
                        reader = new FileReader();
                    var token = $('meta[name="_token"]').attr('content');
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        //前端压缩
                        lrz(reader.result, {width: 1080}).then(function (res) {
                            $.ajax({
                                url: "/uploadImage",
                                type: 'post',
                                headers:{'X-CSRF-TOKEN':token},
                                data: {"filePath": res.base64, "name": new Date().getTime() + ".png"},
//                                contentType: 'application/x-www-form-urlencoded;charest=UTF-8',
                                dataType:'json',
                                success: function (data) {
                                    var imageName;
                                    try {
                                        imageName = JSON.parse(data).key;
                                    } catch (e) {
                                        alert(e.toString);
                                    }

                                    var qiniuUrl = '![](http://opgmvuzyu.bkt.clouddn.com/' + imageName + ')';

                                    editor.insertValue(qiniuUrl);
                                }
                            })
                        });
                    }
                }
            }
        }
        document.addEventListener('paste', function (event) {
            paste(event);
        })


        /**
         * 咱贴上传图片
         */
//        $("#editormd").on('paste', function (ev) {
//            var data = ev.clipboardData;
//            var items = (event.clipboardData || event.originalEvent.clipboardData).items;
//            for (var index in items) {
//                var item = items[index];
//                if (item.kind === 'file') {
//                    var blob = item.getAsFile();
//                    var reader = new FileReader();
//                    reader.onload = function (event) {
//                        var base64 = event.target.result;
//                        alert(1);
//                        $.ajax({
//                            url:'/uploadImage',
//                            data:{base64:base64},
//                            type:'post',
//                            dataType:'json',
//                            headers:{'X-CSRF-TOKEN':token},
//                            success:function (res) {
//                                layer.msg(res.msg);
//                                if(res.success){
//                                    editor.insertValue("\n![" + res.data.title + "](" + res.data.path + ")");
//                                }
//                            }
//                        });
//                    }; // data url!
//                    var url = reader.readAsDataURL(blob);
//                }
//            }
//        });
    });
</script>
</html>