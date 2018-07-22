@extends('layouts.layout_standard')

@section('title')
    <title>写文章</title>
@endsection

@section('head-extend')
    <link rel="stylesheet" href="{{asset('assets/editormd/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/editormd/css/editormd.css')}}" />
@endsection

@section('content')
    <form id="article_from" class="am-topbar-form" method="POST" action="{{$article==null?route('article-edit'):route('article-edit').'/'.$article->archive_id}}">
        @csrf
        <div class="am-g am-g-fixed blog-fixed">
            <input id="submit_type" name="submit_type" value="" style="display:none">
            {{--save|publish--}}
            <div class="am-u-md-7 am-u-sm-12">
                <input name="article_title" type="text" class="am-form-field am-input-sm" placeholder="文章标题" value="{{$article!=null?$article->titile:""}}">
            </div>
            <div class="am-u-md-3 am-u-sm-12">
                <label>文章分类</label>
                <select name="article_folder" data-am-selected="{maxHeight: 100}">
                    @foreach($folders as $folder)
                        <option value="{{$folder->folder_id}}" {{($article!=null and $article->folder_id == $folder->folder_id)?'selected=selected':''}}>{{$folder->folder_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="am-u-md-1 am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-radius" onclick="save();">保存文章</button>
            </div>
            <div class="am-u-md-1 am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-radius" onclick="publish();">发布文章</button>
            </div>
        </div>
        <div class="am-g am-g-fixed blog-fixed">
            <div class="am-u-md-7 am-u-sm-12">
                <input name="article_lable" type="text" class="am-form-field am-input-sm" placeholder="文章标签(,号隔开)" value="{{$article!=null?$article->label:""}}">
            </div>
        </div>
        <hr>
        <div id="article-editormd">
            <textarea style="display:none;">{{$article!=null?$article->content:""}}</textarea>
        </div>
    </form>
@endsection

@section('script-extend')
    {{--<script src="assets/editormd/js/jquery.min.js"></script>--}}
    <script src="{{asset("assets/editormd/js/editormd.min.js")}}"></script>
    <script type="text/javascript">
        var articleEditor;
        $(function() {
            articleEditor = editormd("article-editormd", {
                placeholder: '享受Markdown！开始编写...',
                width   : "95%",
                height  : 730,
                syncScrolling : true,
                path    : "{{url('assets/editormd/lib').'/'}}",
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
                imageFormats : ["jpg", "JPG", "jpeg", "JPEG", "gif", "png", "bmp", "webp"],
                imageUploadURL : "{{route('upload-img')}}",
            });
        });
        function save() {
            document.getElementById("submit_type").value = "save";
            document.getElementById("article_from").submit();
        }
        function publish() {
            document.getElementById("submit_type").value = "publish";
            document.getElementById("article_from").submit();
        }
    </script>
@endsection