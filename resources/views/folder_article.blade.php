@extends('layouts.layout_standard')

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content">
        <div class="am-u-sm-12">
            <h1 class="blog-text-center">分类</h1>
            @auth<a href="{{route('article-edit')}}" type="button" class="am-align-right am-badge am-badge-primary am-text-xl">写文章</a>@endauth
            <ul class="am-pagination blog-article-margin">
                @foreach($folders as $folder)
                    <a href="{{route('folder-article', $folder->folder_id)}}" role="button" class="am-btn am-btn-default {{$folder->folder_id==$id?"am-active":""}} am-radius">{{$folder->folder_name}}&nbsp;&nbsp;<span class="am-badge">{{$folder->archive_count}}</span></a>
                @endforeach
            </ul>
            <div class="timeline-year">
                <ul>
                    <hr>
                    @foreach($articles as $article)
                    <li>
                        <span class="am-u-sm-2 am-u-md-2 timeline-span">{{date('o-n-d', strtotime($article->created_at))}}</span>
                        <span class="am-u-sm-5 am-u-md-5">@if($article->is_publish == 0)<span class="am-badge am-badge-warning">未发布</span>&nbsp;&nbsp;@endif<a href="{{route('article', 'id='.($article->archive_id))}}">{{$article->titile}}</a></span>
                        <span class="am-u-sm-2 am-u-md-2">{{$article->folder_name}}</span>
                        <span class="am-u-sm-3 am-u-md-3">阅读数:{{$article->read_salvation}}
                            @auth
                                <a class="am-badge am-badge-primary" href="{{route('article-edit', $article->archive_id)}}">编辑</a>
                                @if($article->is_home == 0)
                                    <a class="am-badge am-badge-primary" href="{{route('show-home', $article->archive_id)}}">首页显示</a>
                                @endif
                                <a class="am-badge am-badge-danger" href="{{route('article-delete', $article->archive_id)}}">删除</a>
                            @endauth
                        </span>
                    </li>
                    @endforeach
                </ul>
                <br>
            </div>
        </div>
    </div>
    <!-- content end -->
@endsection