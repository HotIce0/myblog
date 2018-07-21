@extends('layouts.layout_standard')

@section('title')
    <title>{{$data['titile']}}</title>
@endsection

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content">
        <div class="am-u-md-8 am-u-sm-12">
            <article class="am-article blog-article-p">
                <div class="am-article-hd">
                    <h1 class="am-article-title blog-text-center">{{$data['titile']}}</h1>
                    <p class="am-article-meta blog-text-center">
                        <span><a href="#">{{$data['folder_name']}} &nbsp;</a></span>-
                        <span><a href="#" class="blog-color">@saoguang &nbsp;</a></span>-
                        <span><a>{{date('o-n-d', strtotime($data['created_at']))}}</a></span>
                    </p>
                </div>
                <div class="am-article-bd">
                    {{$data['content']}}
                </div>
            </article>

            <div class="am-g blog-article-widget blog-article-margin">
                <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
                    <span class="am-icon-tags"> &nbsp;</span><a href="#">标签</a> , <a href="#">TAG</a> , <a href="#">啦啦</a>
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

            <form class="am-form am-g">
                <h3 class="blog-comment">评论</h3>
                <fieldset>
                    <div class="am-form-group am-u-sm-4 blog-clear-left">
                        <input type="text" class="" placeholder="名字">
                    </div>
                    <div class="am-form-group am-u-sm-4">
                        <input type="email" class="" placeholder="邮箱">
                    </div>

                    <div class="am-form-group am-u-sm-4 blog-clear-right">
                        <input type="password" class="" placeholder="网站">
                    </div>

                    <div class="am-form-group">
                        <textarea class="" rows="5" placeholder="一字千金"></textarea>
                    </div>

                    <p><button type="submit" class="am-btn am-btn-default">发表评论</button></p>
                </fieldset>
            </form>

            <hr>
        </div>

        <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
                <img src="assets/i/f18.jpg" alt="about me" class="blog-entry-img" >
                <p>🙈Saoguang</p>
                <p>
                    For Fun, For the Future
                </p><p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
            </div>
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>联系我</span></h2>
                <p>
                    <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                    <a href=""><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                    <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                    <a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>
                    <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
                </p>
            </div>
            <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
                <h2 class="blog-title"><span>TAG cloud</span></h2>
                <div class="am-u-sm-12 blog-clear-padding">
                    <a href="" class="blog-tag">amaze</a>
                    <a href="" class="blog-tag">妹纸 UI</a>
                    <a href="" class="blog-tag">HTML5</a>
                    <a href="" class="blog-tag">这是标签</a>
                    <a href="" class="blog-tag">Impossible</a>
                    <a href="" class="blog-tag">开源前端框架</a>
                </div>
            </div>
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-title"><span>么么哒</span></h2>
                <ul class="am-list">
                    <li><a href="#">每个人都有一个死角， 自己走不出来，别人也闯不进去。</a></li>
                    <li><a href="#">我把最深沉的秘密放在那里。</a></li>
                    <li><a href="#">你不懂我，我不怪你。</a></li>
                    <li><a href="#">每个人都有一道伤口， 或深或浅，盖上布，以为不存在。</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- content end -->
@endsection