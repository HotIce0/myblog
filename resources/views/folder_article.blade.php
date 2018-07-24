@extends('layouts.layout_standard')

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content">
        <div class="am-u-sm-12">
            <h1 class="blog-text-center">分类</h1>
            <ul class="am-pagination blog-article-margin">
                @foreach($folders as $folder)
                    <a href="{{route('folder-article', $folder->folder_id)}}" role="button" class="am-btn am-btn-default {{$folder->folder_id==$id?"am-active":""}} am-radius">{{$folder->folder_name}}&nbsp;&nbsp;<span class="am-badge">{{$folder->archive_count}}</span></a>
                @endforeach
            </ul>
            <div class="doc-example">
                <div class="am-panel am-panel-default">
                    @auth
                        <div class="am-panel-hd">
                            <a href="{{route('article-edit')}}" style="visibility:hidden;" role="button" class="am-badge am-badge-primary am-text-default">写文章</a>
                            <a href="{{route('article-edit')}}" role="button" class="am-fr am-badge am-badge-primary am-text-default">写文章</a>
                        </div>
                    @endauth
                    <div class="am-panel-bd">
                        <table class="am-table">
                            <thead>
                            <tr>
                                @auth
                                    <th>操作</th>
                                @endauth
                                <th>时间</th>
                                <th>文章标题</th>
                                <th>分类</th>
                                <th>阅读数量</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    @auth
                                        <td>
                                            <a class="am-badge am-badge-primary" href="{{route('article-edit', $article->archive_id)}}">编辑</a>
                                            @if($article->is_home == 0)
                                                <a class="am-badge am-badge-primary" href="{{route('show-home', $article->archive_id)}}">首页显示</a>
                                            @else
                                                <a class="am-badge am-badge-warning" onclick="return confirm('确定取消该文章的首页显示?');" href="{{route('hide-home', $article->archive_id)}}">取消首页显示</a>
                                            @endif
                                            <a class="am-badge am-badge-danger" onclick="return confirm('确定要删除该文章！');" href="{{route('article-delete', $article->archive_id)}}">删除</a>
                                        </td>
                                    @endauth
                                    <td>{{date('o-n-d', strtotime($article->created_at))}}</td>
                                    <td>@if($article->is_publish == 0)<span class="am-badge am-badge-warning">未发布</span>&nbsp;&nbsp;@endif<a href="{{route('article', 'id='.($article->archive_id))}}"><strong>{{$article->titile}}</strong></a></td>
                                    <td>{{$article->folder_name}}</td>
                                    <td>阅读数:{{$article->read_salvation}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->
@endsection