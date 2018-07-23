@extends('layouts.layout_standard')

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed">
        <div class="am-u-md-9 am-u-sm-12">
            @foreach($articles as $article)
            <article class="am-g blog-entry-article">
                <div class="am-u-lg-10 am-u-md-12 am-u-sm-12 blog-entry-text">
                    <span><a>{{$article->folder_name}} &nbsp;</a></span>
                    <span class="blog-color"> @saoguang &nbsp;</span>
                    <span>{{date('o-n-d', strtotime($article->created_at))}}</span>
                    <span>阅读量:{{$article->read_salvation}}</span>
                    <h1><a href="{{route('article', 'id='.($article->archive_id))}}">{{$article->titile}}</a></h1>
                    <p>{!! substr($article->content,0,100) !!}</p>
                </div>
                @auth
                <div class="am-u-lg-2 am-u-md-12 am-u-sm-12">
                    <span><a href="{{route('hide-home', $article->archive_id)}}" type="button" class="am-align-right am-badge am-badge-success am-text-lg">取消首页显示</a></span>
                </div>
                @endauth
            </article>
            @endforeach
        </div>
        @include('sidebar')
    </div>
    <!-- content end -->
@endsection