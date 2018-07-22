@extends('layouts.layout_standard')

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed">
        <div class="am-u-md-12 am-u-sm-12">
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>真实的我</span></h2>
                <img src="{{asset('assets/i/aboutme.jpg')}}" alt="about me" class="blog-entry-img" >
                <p>Saoguang</p>
                <p>
                    For Fun, For the Future
                </p>
                <p>
                    我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？
                </p>
                <p>
                    2018年： 一位20岁的，从小对计算机无限憧憬的中年人。从前是单纯的喜欢编程，现在是为了自己的未来，编程的世界成了我逃避现实，逃避痛苦的地方。又成了我实现自己梦想的工具。
                </p>
                <p>
                    只希望自己永远记住，思想不该有限制
                </p>
            </div>
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>联系我</span></h2>
                <p>
                    <a href="https://github.com/saoguang" target="_blank"><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                    <a href="https://weibo.com/u/5248740631" target="_blank"><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                    <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
                </p>
            </div>
        </div>
    </div>
    <!-- content end -->
@endsection