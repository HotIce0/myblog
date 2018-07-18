<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Blog Design By Saoguang">
    <meta name="keywords" content="Saoguang">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Saoguang | For Fun</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="assets/css/amazeui.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- 流量统计 start -->
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?a529b91311473760a077fd780db65c57";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <!-- 流量统计 end -->
</head>
<body  id="blog">

<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        {{--<img width="200" src="http://s.amazeui.org/media/i/brand/amazeui-b.png" alt="Amaze UI Logo" />--}}
        <h2 class="am-hide-sm-only">
            <a href="{{route('index')}}" title="Saoguang | For Fun">🙈Saoguang | For Fun😀</a>
        </h2>
    </div>
</header>
<hr>

<!-- nav start -->
<nav class="am-g am-g-fixed blog-fixed blog-nav">
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}">
        <span class="am-sr-only">导航切换</span>
        <span class="am-icon-bars"></span>
    </button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li class="{{Request::url() == route('index') ? 'am-active' : ''}}">
                <a href="{{route('index')}}">首页</a>
            </li>
            <li class="{{Request::url() == route('archives') ? 'am-active' : ''}}">
                <a href="{{route('archives')}}">我的文章</a>
            </li>
            <li class="{{Request::url() == route('about-me') ? 'am-active' : ''}}">
                <a href="{{route('about-me')}}">关于我</a>
            </li>
            <li class="{{Request::url() == route('it-resource') ? 'am-active' : ''}}">
                <a href="{{route('it-resource')}}">IT学习资料</a>
            </li>
        </ul>
        <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
            <div class="am-form-group">
                <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
            </div>
        </form>
    </div>
</nav>
<hr>
<!-- nav end -->

@yield('banner')

@yield('content')

<!-- footer start -->
<footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>👻Good Sentence</h3>
            <p class="am-text-sm">Sometimes it is the people who no one imagines anything of who do the things that no one can imagine. —— The Imitation Game
                <br>
                <br>Who will fall in love with ordinary？ —— The Imitation Game
                <br>
                <br>You got a dream, you gotta protect it. —— The Pursuit of Happyness
                <br>
            </p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>我的</h3>
            <p>
                <a href="https://github.com/saoguang" target="_blank">
                    <span class="am-icon-github am-icon-fw blog-icon blog-icon"></span>
                </a>
                <a href="https://weibo.com/u/5248740631" target="_blank">
                    <span class="am-icon-weibo am-icon-fw blog-icon blog-icon"></span>
                </a>
                <a href="">
                    <span class="am-icon-weixin am-icon-fw blog-icon blog-icon"></span>
                </a>
            </p>
            <h3>联系我:</h3>
            <p>Q Q : 51747708 (请注明来意)
                <br>邮箱 : saoguang@vip.qq.com
                <br>地点 : 湖南理工学院 5214
                <br>CSDN : <a href="https://blog.csdn.net/u011580175" target="_blank">@Saoguang</a>
            </p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h1>对知识需要的是贪婪</h1>
            <h3>The Method</h3>
            <p>
            <ul>
                <li>How to explore</li>
                <li>H t find out</li>
                <li>H t think.</li>
                <li>...</li>
                <li>@guest
                        <a href="{{route('login')}}">😆Magical Entrance</a>
                    @else
                        <a href="{{route('admin')}}">😆后台管理</a>
                    @endguest
                </li>
            </ul>
            </p>
        </div>
    </div>
    <div class="blog-text-center">Copyright © Saoguang All Rights Reserved
        <a href="http://www.miibeian.gov.cn" rel="nofollow" target="_blank">湘ICP备18013534号-1</a>
        <a href="https://tongji.baidu.com/web/25909160/welcome/login" title="百度统计" target="_blank">百度统计</a>
    </div>
</footer>
<!-- footer end -->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="assets/js/amazeui.min.js"></script>

</body>
</html>
