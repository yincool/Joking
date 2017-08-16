<!DOCTYPE html>
<html>
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>注册 - 简书</title>
    <link rel="stylesheet" media="all" href="{{asset('css/web-d820b2fb6ae95261c627.css')}}">
    <link rel="stylesheet" media="all" href="{{asset('css/entry-d820b2fb6ae95261c627.css')}}">
    <link rel="stylesheet" href="{{asset('css/iconfont.css')}}">
    <link href="https://cdn2.jianshu.io/assets/favicons/favicon-783beb88ed621ceab614de960376ac0c.ico" rel="icon">
    <script src="{{asset('js/jquery3.1.1.min.js')}}"></script>
    <script src="{{asset('js/register.js')}}"></script>
    <script src="{{asset('js/msg.js')}}"></script>
</head>

<body class="no-padding reader-black-font" lang="zh-CN">
<div class="sign">
    <div class="logo"><a href="#"><img src="{{asset('image/logo-58fd04f6f0de908401aa561cda6a0688.png')}}" alt="Logo"></a></div>
    <div class="main">
        <h4 class="title">
            <div class="normal-title">
                <a class="" href="{{url('login')}}">登录</a>
                <b>·</b>
                <a id="js-sign-up-btn" class="active" href="{{url('register')}}">注册</a>
            </div>
        </h4>
        <div class="js-sign-up-container">
            <form class="new_user" id="new_user" accept-charset="UTF-8" method="post">
                <div class="input-prepend restyle">
                    <input placeholder="你的昵称" type="text" value="" name="username" id="username" maxlength="15">
                    <i class="iconfont">&#xe607;</i>
                </div>
                <div class="input-prepend restyle no-radius js-normal">
                    <input type="hidden" value="CN" name="user[mobile_number_country_code]" id="user_mobile_number_country_code">
                    <input placeholder="手机号" type="tel" name="phone" id="phone" maxlength="11">
                    <i class="iconfont">&#xe624;</i>
                </div>
                <div class="input-prepend no-radius restyle">
                    <input placeholder="设置密码" type="password" name="password" id="password" maxlength="16">
                    <i class="iconfont">&#xe6a8;</i>
                </div>
                <div class="input-prepend">
                    <input placeholder="验证码" type="text" name="captcha" id="captcha" maxlength="16" style="width: 70%">
                    <img id="captchaimg" src="{{URL('/captcha/1')}}" style="width: 28.5%">
                    <i class="iconfont">&#xe633;</i>
                </div>
                <input type="button" name="commit" value="注册" class="sign-up-button">
                <p class="sign-up-msg">点击 “注册” 即表示您同意并愿意遵守简书<br>
                    <a target="_blank" href="http://www.jianshu.com/p/c44d171298ce">用户协议</a>
                    和
                    <a target="_blank" href="http://www.jianshu.com/p/2ov8x3">隐私政策</a>
                    。
                </p>
            </form>
        </div>

        {{--输入提示框--}}
        <div class="tooltip tooltip-error tooltip-error-username fade right in" role="tooltip" id="tooltip487731" style="top: 240px; left: 870px; display: none;">
            <div class="tooltip-arrow tooltip-arrow-border" style="top: 50%;"></div>
            <div class="tooltip-arrow tooltip-arrow-bg" style="top: 50%;"></div>
            <div class="tooltip-inner">
                <i class="iconfont">&#xe637;</i>
                <span>请输入昵称</span>
            </div>
        </div>

        <div class="tooltip tooltip-error tooltip-error-phone fade right in" role="tooltip" id="tooltip487731" style="top: 290px; left: 870px; display: none;">
            <div class="tooltip-arrow tooltip-arrow-border" style="top: 50%;"></div>
            <div class="tooltip-arrow tooltip-arrow-bg" style="top: 50%;"></div>
            <div class="tooltip-inner">
                <i class="iconfont">&#xe637;</i>
                <span>请输入正确的手机号码</span>
            </div>
        </div>

        <div class="tooltip tooltip-error tooltip-error-password fade right in" role="tooltip" id="tooltip487731" style="top: 340px; left: 870px; display: none;">
            <div class="tooltip-arrow tooltip-arrow-border" style="top: 50%;"></div>
            <div class="tooltip-arrow tooltip-arrow-bg" style="top: 50%;"></div>
            <div class="tooltip-inner">
                <i class="iconfont">&#xe637;</i>
                <span>请输入不小于6位数的密码</span>
            </div>
        </div>

        <div class="tooltip tooltip-error tooltip-error-captcha fade right in" role="tooltip" id="tooltip487731" style="top: 390px; left: 870px; display: none;">
            <div class="tooltip-arrow tooltip-arrow-border" style="top: 50%;"></div>
            <div class="tooltip-arrow tooltip-arrow-bg" style="top: 50%;"></div>
            <div class="tooltip-inner">
                <i class="iconfont">&#xe637;</i>
                <span>请输入验证码</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>