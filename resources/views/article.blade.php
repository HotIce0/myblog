@extends('layouts.layout_standard')

@section('title')
    <title>{{$data['titile']}}</title>
@endsection

@section('head-extend')
    <link rel="stylesheet" href="{{asset('assets/editormd/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/editormd/css/editormd.preview.min.css')}}" />
@endsection

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content">
        <div class="am-u-md-9 am-u-sm-12">
            <article class="am-article blog-article-p">
                <div class="am-article-hd">
                    <h1 class="am-article-title blog-text-center">{{$data['titile']}}</h1>
                    <p class="am-article-meta blog-text-center">
                        <span><a href="#">{{$data['folder_name']}} &nbsp;</a></span>-
                        <span><a href="#" class="blog-color">@saoguang &nbsp;</a></span>-
                        <span><a>{{date('o-n-d', strtotime($data['created_at']))}}</a></span>-
                        <span>阅读量：{{$data['read_salvation']}}</span>
                        <span class="blog-color">{{$data['is_publish']==0?"未发布":""}}</span>
                    </p>
                </div>
                <div class="am-article-bd">
                    <div id="article-editormd">
                        <textarea style="display: none;">{{$data['content']}}</textarea>
                    </div>
                </div>
            </article>
            <div class="am-g blog-article-widget blog-article-margin">
                <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
                    <span class="am-icon-tags"> &nbsp;</span>
                        @for($i = 0; $i < count($data['label']); $i++)
                            <a href="#">{{$data['label'][$i]}}</a>{{$i!=(count($data['label'])-1)?',':''}}
                        @endfor
                    <hr>
                    <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                    <a href=""><span class="am-icon-wechat am-icon-fw blog-icon"></span></a>
                    <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                </div>
            </div>
            <hr>
            <ul class="am-pagination blog-article-margin">
                <li class="am-pagination-prev"><a href="#" class="">&laquo; 一切的回顾</a></li>
                <li class="am-pagination-next"><a href="">不远的未来 &raquo;</a></li>
            </ul>
            <hr>
            <ul class="am-comments-list am-comments-list-flip">
                @foreach($data['comments'] as $comment)
                    <li class="am-comment">
                        <div class="am-comment-main">
                            <header class="am-comment-hd"><div class="am-comment-meta">
                                    <a href="#link-to-user" class="am-comment-author">{{$comment['user_name']}}</a> 评论于
                                    <time>{{$comment['created_at']}}</time>
                                </div>
                            </header>
                            <div class="am-comment-bd">
                                <p>{{$comment['content']}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <hr>
            <form class="am-form am-g" method="post" action="{{route('message', $data['archive_id'])}}">
                @csrf
                <h3 class="blog-comment">留言</h3>
                <fieldset>
                    <div class="am-u-sm-12 blog-clear-left am-form-group {{$errors->has('msgName')?'am-form-error':''}}">
                        <label class="am-form-label" for="msgName" style="{{$errors->has('msgName')?"":"display: none"}}">{{$errors->first('msgName')}}</label>
                        <input type="text" id="msgName" name="msgName" class="am-form-field" placeholder="名字(最多20个字)" value="{{ old('msgName') }}">
                    </div>
                    <div class="am-u-sm-12 blog-clear-left am-form-group {{$errors->has('msgEmail')?'am-form-error':''}}">
                        <label class="am-form-label" for="msgEmail" style="{{$errors->has('msgEmail')?"":"display: none"}}">{{$errors->first('msgEmail')}}</label>
                        <input type="text" id="msgEmail" name="msgEmail" class="am-form-field" placeholder="邮箱" value="{{ old('msgEmail') }}">
                    </div>
                    <div class="am-form-group blog-clear-left am-u-sm-12 {{$errors->has('msgContent')?'am-form-error':''}}">
                        <label class="am-form-label" for="msgContent" style="{{$errors->has('msgContent')?"":"display: none"}}">{{$errors->first('msgContent')}}</label>
                        <textarea id="msgContent" class="" name="msgContent" rows="6" placeholder="把想说的都写下来(最多500字)" value="{{ old('msgContent') }}"></textarea>
                    </div>
                    <p><button type="submit" class="am-btn am-btn-default">发表评论</button></p>
                </fieldset>
            </form>

            <hr>
        </div>

        <div class="am-u-md-3 am-u-sm-12 blog-sidebar">
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>关于我</span></h2>
                <img src="{{asset('assets/i/aboutme.jpg')}}" alt="about me" class="blog-entry-img" >
                <p>Saoguang</p>
                <p>
                    For Fun, For the Future
                </p><p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
            </div>
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>联系我</span></h2>
                <p>
                    <a href="https://github.com/saoguang" target="_blank"><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                    <a href="https://weibo.com/u/5248740631" target="_blank"><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                    <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
                </p>
            </div>
            <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
                <h2 class="blog-title"><span>链接中心</span></h2>
                <div class="am-u-sm-12 blog-clear-padding">
                    <a href="http://amazeui.org/" class="blog-tag" target="_blank">AmazeUI</a>
                </div>
            </div>
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-title"><span>暂时没东西</span></h2>
                <ul class="am-list">
                    <li><a href="#">我是个人才</a></li>
                    <li><a href="#">我真的是个人才</a></li>
                    <li><a href="#">我的确是个人才</a></li>
                    <li><a href="#">我就在人才市场等你</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- content end -->
@endsection

@section('script-extend')
    {{--<script src="assets/editormd/js/jquery.min.js"></script>--}}
    <script src="{{asset("assets/editormd/lib/marked.min.js")}}"></script>
    <script src="{{asset("assets/editormd/lib/prettify.min.js")}}"></script>
    <script src="{{asset("assets/editormd/lib/raphael.min.js")}}"></script>
    <script src="{{asset("assets/editormd/lib/underscore.min.js")}}"></script>
    <script src="{{asset("assets/editormd/lib/sequence-diagram.min.js")}}"></script>
    <script src="{{asset("assets/editormd/lib/flowchart.min.js")}}"></script>
    <script src="{{asset("assets/editormd/lib/jquery.flowchart.min.js")}}"></script>
    <script src="{{asset("assets/editormd/js/editormd.min.js")}}"></script>
    <script type="text/javascript">
        var articleEditor;
        $(function() {
            articleEditor = editormd.markdownToHTML("article-editormd", {//注意：这里是上面DIV的id
                width   : "95%",
                height  : 730,
                codeFold : true,
                emoji : true,
                taskList : true,
                tocm : true,
                tex  : true,
                flowChart : true,
                sequenceDiagram : true,
                htmlDecode : true,
            });
        });
    </script>
@endsection