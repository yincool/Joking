<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <!-- Start of Baidu Transcode -->
    <meta name="description" content="加入简书，开启你的创作之路，来这里接收世界的赞赏。">
    <!-- Apple -->
    <meta name="apple-mobile-web-app-title" content="简书">
    <title>登录 - 简书</title>
    <link rel="stylesheet" media="all" href="{{asset('css/web-d820b2fb6ae95261c627.css')}}">
    <link rel="stylesheet" media="all" href="{{asset('css/entry-d820b2fb6ae95261c627.css')}}">
    <link rel="stylesheet" href="{{asset('css/iconfont.css')}}">
    <script src="{{asset('js/jquery3.1.1.min.js')}}"></script>
    <script src="{{asset('js/login.js')}}"></script>
    <link href="https://cdn2.jianshu.io/assets/favicons/favicon-783beb88ed621ceab614de960376ac0c.ico" rel="icon">
    {{--<script charset="UTF-8" src="./登录 - 简书_files/get.php"></script>--}}
    {{--<link rel="stylesheet" href="./登录 - 简书_files/style_https.3.2.0.css">--}}
</head>
<body class="no-padding reader-black-font" lang="zh-CN">
<div class="sign">
    <div class="logo">
        <a href="{{url('/')}}">
            <img src="{{asset('image/logo-58fd04f6f0de908401aa561cda6a0688.png')}}" alt="Logo">
        </a>
    </div>
    <div class="main">
        <h4 class="title">
            <div class="normal-title">
                <a class="active" href="{{url('login')}}">登录</a>
                <b>·</b>
                <a id="js-sign-up-btn" class="" href="{{url('register')}}">注册</a>
            </div>
        </h4>
        <div class="js-sign-in-container">
            <form id="new_session" accept-charset="UTF-8" method="post">
                <!-- 正常登录登录名输入框 -->
                <div class="input-prepend restyle js-normal">
                    <input placeholder="手机号或邮箱" type="text" name="usernumber">
                    <i class="iconfont">&#xe607;</i>
                </div>
                <!-- 海外登录登录名输入框 -->
                <div class="input-prepend">
                    <input placeholder="密码" type="password" name="password">
                    <i class="iconfont">&#xe6a8;</i>
                </div>
                <div class="remember-btn">
                    <input type="checkbox" value="true" checked="checked" name="remember_me" id="remember_me">
                    <span>记住我</span>
                </div>
                <div class="forget-btn">
                    <a class="" data-toggle="dropdown" href="#">登录遇到问题?</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">用手机号重置密码</a></li>
                        <li><a href="#">用邮箱重置密码</a></li>
                    </ul>
                </div>
                <input type="button" name="commit" value="登录" class="sign-in-button">
            </form>
        </div>

        <div class="tooltip tooltip-error tooltip-error-usernumber fade right in" role="tooltip" id="tooltip487731" style="top: 285px; left: 850px; display: none;">
            <div class="tooltip-arrow tooltip-arrow-border" style="top: 50%;"></div>
            <div class="tooltip-arrow tooltip-arrow-bg" style="top: 50%;"></div>
            <div class="tooltip-inner">
                <i class="iconfont">&#xe637;</i>
                <span>请输入账号</span>
            </div>
        </div>

        <div class="tooltip tooltip-error tooltip-error-password fade right in" role="tooltip" id="tooltip487731" style="top: 335px; left: 850px; display: none;">
            <div class="tooltip-arrow tooltip-arrow-border" style="top: 50%;"></div>
            <div class="tooltip-arrow tooltip-arrow-bg" style="top: 50%;"></div>
            <div class="tooltip-inner">
                <i class="iconfont">&#xe637;</i>
                <span>请输入密码</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>