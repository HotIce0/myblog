@extends('layouts.layout_standard')

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content">
        <div class="am-u-sm-12">
            <h1 class="blog-text-center">Archives Timeline</h1>
            <ul class="am-pagination blog-article-margin">
                <li class="am-pagination-prev"><a href="{{route('archives', 'year='.($data['year'] - 1))}}" class="">&laquo; 一切的回顾</a></li>
                <li class="am-pagination-next"><a href="{{route('archives', 'year='.($data['year'] + 1))}}">不远的未来 &raquo;</a></li>
            </ul>
            @auth<a href="{{route('article-edit')}}" type="button" class="am-align-right am-badge am-badge-primary am-text-default">写文章</a>@endauth
            <div class="doc-example">
                <h1>{{$data['year']}}</h1>
                @for($i = 12; $i >= 1; $i--)
                    @if(!empty($data[$i]))
                        <div class="am-panel am-panel-default">
                            <div class="am-panel-hd">
                                <h3 class="am-panel-title">{{$i}}月</h3>
                            </div>
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
                                    @foreach($data[$i] as $item)
                                        <tr>
                                            @auth
                                                <td>
                                                    <a class="am-badge am-badge-primary" href="{{route('article-edit', $item['archive_id'])}}">编辑</a>
                                                    <a class="am-badge am-badge-danger" onclick="return confirm('确定要删除该文章！');" href="{{route('article-delete', $item['archive_id'])}}">删除</a>
                                                    @if($item['is_home'] == 0)
                                                        <a class="am-badge am-badge-primary" href="{{route('show-home', $item['archive_id'])}}">首页显示</a>
                                                    @else
                                                        <a class="am-badge am-badge-warning" onclick="return confirm('确定取消该文章的首页显示?');" href="{{route('hide-home', $item['archive_id'])}}">取消首页显示</a>
                                                    @endif
                                                </td>
                                            @endauth
                                            <td>{{date('o-n-d', strtotime($item['created_at']))}}</td>
                                            <td>@if($item['is_publish'] == 0)<span class="am-badge am-badge-warning">未发布</span>&nbsp;&nbsp;@endif<a href="{{route('article', 'id='.($item['archive_id']))}}"><strong>{{$item['titile']}}</strong></a></td>
                                            <td>{{$item['folder_name']}}</td>
                                            <td>阅读数:{{$item['read_salvation']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
    <!-- content end -->
@endsection