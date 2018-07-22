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
            <div class="timeline-year">
                @auth<h1>{{$data['year']}}<a href="{{route('article-edit')}}" type="button" class="am-align-right am-btn am-btn-default am-radius">写文章</a></h1>@endauth
                <hr>
                @for($i = 12; $i >= 1; $i--)
                    @if(!empty($data[$i]))
                        <ul>
                            <h3>{{$i}}月</h3>
                            <hr>
                            @foreach($data[$i] as $item)
                                <li>
                                    <span class="am-u-sm-2 am-u-md-2 timeline-span">{{date('o-n-d', strtotime($item['created_at']))}}</span>
                                    <span class="am-u-sm-5 am-u-md-5"><a href="{{route('article', 'id='.($item['archive_id']))}}">{{$item['titile']}}</a></span>
                                    <span class="am-u-sm-2 am-u-md-2 am-hide-sm-only">{{$item['folder_name']}}</span>
                                    <span class="am-u-sm-3 am-u-md-3 am-hide-sm-only">阅读数:{{$item['read_salvation']}}
                                        @auth
                                            <a class="blog-color" href="{{route('article-edit', $item['archive_id'])}}">编辑</a>
                                            <a class="blog-color" href="{{route('article-delete', $item['archive_id'])}}">删除</a>
                                            @if($item['is_home'] == 0)
                                                <a class="blog-color" href="{{route('show-home', $item['archive_id'])}}">首页显示</a>
                                            @endif
                                        @endauth
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        <br>
                    @endif
                @endfor
            </div>
        </div>
    </div>
    <!-- content end -->
@endsection