@extends('layouts.layout_standard')

@section('title')
    <title>写文章</title>
@endsection

@section('head-extend')
    <link rel="stylesheet" href="assets/editormd/css/style.css" />
    <link rel="stylesheet" href="assets/editormd/css/editormd.css" />
@endsection

@section('content')
    <form class="am-topbar-form">
        <div class="am-g am-g-fixed blog-fixed">
            <div class="am-u-md-7 am-u-sm-12">
                <input name="article-title" type="text" class="am-form-field am-input-sm" placeholder="文章标题">
            </div>
            <div class="am-u-md-3 am-u-sm-12">
                <label>文章分类</label>
                <select name="article-folder" data-am-selected="{maxHeight: 100}">
                    @foreach($folders as $folder)
                        <option value="{{$folder->folder_id}}">{{$folder->folder_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="am-u-md-1 am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-radius">保存博客</button>
            </div>
            <div class="am-u-md-1 am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-radius">发布博客</button>
            </div>
        </div>
        <div class="am-g am-g-fixed blog-fixed">
            <div class="am-u-md-7 am-u-sm-12">
                <input name="article-lable" type="text" class="am-form-field am-input-sm" placeholder="文章标签(||号隔开)">
            </div>
        </div>
        <hr>
        <div id="article-editormd">
            <textarea style="display:none;"></textarea>
        </div>
    </form>
@endsection

@section('script-extend')
    {{--<script src="assets/editormd/js/jquery.min.js"></script>--}}
    <script src="assets/editormd/js/editormd.min.js"></script>
    <script type="text/javascript">
        var articleEditor;

        $(function() {
            articleEditor = editormd("article-editormd", {
                placeholder: '享受Markdown！开始编写...',
                width   : "95%",
                height  : 730,
                syncScrolling : true,
                path    : "assets/editormd/lib/",
                codeFold : true,
                saveHTMLToTextarea : true,
                searchReplace : true,
                emoji : true,
                taskList : true,
                tocm : true,
                tex  : true,
                flowChart : true,
                sequenceDiagram : true,
                htmlDecode : true,
                imageUpload: true,
                imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL : "{{route('upload-img')}}",
            });

            /*
            // or
            testEditor = editormd({
                id      : "test-editormd",
                width   : "90%",
                height  : 640,
                path    : "../lib/"
            });
            */
        });


    </script>
@endsection