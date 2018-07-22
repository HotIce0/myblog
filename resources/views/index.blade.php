@extends('layouts.layout_standard')

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed">
        <div class="am-u-md-8 am-u-sm-12">
            @foreach($articles as $article)
            <article class="am-g blog-entry-article">
                <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                    <span><a>{{$article->folder_name}} &nbsp;</a></span>
                    <span class="blog-color"> @saoguang &nbsp;</span>
                    <span>{{date('o-n-d', strtotime($article->created_at))}}</span>
                    <span>阅读量:{{$article->read_salvation}}</span>
                    <h1><a href="{{route('article', 'id='.($article->archive_id))}}">{{$article->titile}}</a></h1>
                    <p>{!! substr($article->content,0,100) !!}</p>
                </div>
                @auth
                <div class="am-u-lg-6 am-u-md-12 am-u-sm-12">
                    <span><a href="{{route('hide-home', $article->archive_id)}}" type="button" class="am-align-right am-btn am-btn-default am-radius">取消首页显示</a></span>
                </div>
                @endauth
            </article>
            @endforeach
        </div>
        <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
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