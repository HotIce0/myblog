<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{asset('assets/i/favicon.png')}}">
    <title>诶呀，有个小错误</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/errors/css/bootstrap.css')}}" rel="stylesheet">
    <!-- FONT AWESOME CSS -->
    <link href="{{asset('assets/errors/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href="{{asset('assets/errors/css/font-css.css')}}" rel='stylesheet' type='text/css'>
    <!-- custom CSS here -->
    <link href="{{asset('assets/errors/css/style.css')}}" rel="stylesheet" />
</head>
<body>


<div class="container">

    <div class="row pad-top text-center">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h2>  诶呀，有个小错误 </h2>
            <h5> 幸运的你 </h5>
            <span id="error-code" style="display: none">{{$errorCode}}</span>
            <span id="error-link"></span>
            <h1>{{$errorMsg}}</h1>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-8 col-md-offset-2">
            <h3> <i  class="fa fa-lightbulb-o fa-5x"></i> </h3>
            <a href="{{route('index')}}" class="btn btn-primary">回到首页</a>
        </div>
    </div>

</div>
<!-- /.container -->


<!--Core JavaScript file  -->
<script src="{{asset('assets/errors/js/jquery-1.10.2.js')}}"></script>
<!--bootstrap JavaScript file  -->
<script src="{{asset('assets/errors/js/bootstrap.js')}}"></script>
<!--Count Number JavaScript file  -->
<script src="{{asset('assets/errors/js/countUp.js')}}"></script>
<!--Custom JavaScript file  -->
<script src="{{asset('assets/errors/js/custom.js')}}"></script>
</body>
</html>
