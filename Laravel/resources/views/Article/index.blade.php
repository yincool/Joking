<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>简书 - 创作你的创作</title>
    <link rel="stylesheet" media="all" href="{{asset('css/web-85629238feda813871f6.css')}}">
    <link rel="stylesheet" media="all" href="{{asset('css/web-a22db2e2e120168cfb83.css')}}">
    <link rel="stylesheet" href="{{asset('css/iconfont.css')}}">
    <link rel="stylesheet" media="all" href="{{asset('css/entry-85629238feda813871f6.css')}}">
    <link href="http://cdn2.jianshu.io/assets/favicons/favicon-783beb88ed621ceab614de960376ac0c.ico" rel="icon">
    <script src="{{asset('js/jquery3.1.1.min.js')}}"></script>
    <script src="{{asset('js/top.js')}}"></script>
</head>
<body lang="zh-CN" class="reader-black-font">
<!-- 全局顶部导航栏 -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="width-limit">
        <!-- 左上方 Logo -->
        <a class="logo" href="{{asset('/')}}"><img src="{{asset('image/logo-58fd04f6f0de908401aa561cda6a0688.png')}}" alt="Logo"></a>

        <!-- 右上角 -->
        <!-- 未登录显示登录/注册/写文章 -->
        <a class="btn write-btn" href="#">
            <i class="iconfont">&#xe645;</i>写文章
        </a>
        @if(isset($username))
            <div class="user">
                <div data-hover="dropdown">
                    <a class="avatar" href="/u/060bb14f5d3d"><img src="//upload.jianshu.io/users/upload_avatars/7192090/e987cf33-84e3-4ba5-b752-09b0d0bf420c?imageMogr2/auto-orient/strip|imageView2/1/w/120/h/120" alt="120"></a>
                </div>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/u/060bb14f5d3d">
                            <i class="iconfont">&#xe607;</i><span>我的主页</span>
                        </a>
                    </li>
                    <li>
                        <!-- TODO bookmarks_path -->
                        <a href="/bookmarks">
                            <i class="iconfont">&#xe733;</i><span>收藏的文章</span>
                        </a>
                    </li>
                    <li>
                        <a href="/users/060bb14f5d3d/liked_notes">
                            <i class="iconfont">&#xe613;</i><span>喜欢的文章</span>
                        </a>
                    </li>
                    <li>
                        <a href="/wallet">
                            <i class="iconfont ic-navigation-wallet"></i><span>我的钱包</span>
                        </a>
                    </li>
                    <li>
                        <a href="/settings">
                            <i class="iconfont">&#xe625;</i><span>设置</span>
                        </a>
                    </li>
                    <li>
                        <a href="/faqs">
                            <i class="iconfont">&#xe608;</i><span>帮助与反馈</span>
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" data-method="delete" href="{{asset('/exitLogin')}}">
                            <i class="iconfont">&#xe63b;</i><span>退出</span>
                        </a>
                    </li>
                </ul>
            </div>
        @else
            <a class="btn sign-up" href="{{url('register')}}">注册</a>
            <a class="btn log-in" href="{{url('login')}}">登录</a>
        @endif
        <!-- 如果用户登录，显示下拉菜单 -->
    </div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        @if(isset($username))
            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="/">
                            <i class="iconfont menu-icon">&#xe632;</i><span class="menu-text">发现</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="/subscriptions">
                            <i class="iconfont menu-icon">&#xe62b;</i><span class="menu-text">关注</span>
                        </a>
                    </li>
                    <li class="notification">
                        <a data-hover="dropdown" href="/notifications" class="notification-btn">
                            <i class="iconfont menu-icon">&#xe640;</i><span class="menu-text">消息</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/notifications#/comments">
                                    <i class="iconfont">&#xe609;</i>
                                    <span>评论</span> <!---->
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/chats">
                                    <i class="iconfont">&#xe610;</i>
                                    <span>简信</span> <!---->
                                </a>
                            </li>
                            {{--<li>--}}
                            {{--<a href="/notifications#/requests">--}}
                            {{--<i class="iconfont ic-requests"></i>--}}
                            {{--<span>投稿请求</span> <!---->--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="/notifications#/likes">
                                    <i class="iconfont">&#xe604;</i>
                                    <span>喜欢和赞</span> <!---->
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/follows">
                                    <i class="iconfont">&#xe60e;</i>
                                    <span>关注</span> <!---->
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/money">
                                    <i class="iconfont ic-money"></i>
                                    <span>赞赏</span> <!---->
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/others">
                                    <i class="iconfont">&#xe614;</i>
                                    <span>其他消息</span> <!---->
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="search">
                        <form target="_blank" action="/search" accept-charset="UTF-8" method="get">
                            <input name="utf8" type="hidden" value="✓">
                            <input type="text" name="q" id="q" value="" autocomplete="off" placeholder="搜索" class="search-input" data-mounted="1">
                            <a class="search-btn" href="javascript:void(null)">
                                <i class="iconfont">&#xe651;</i>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="http://www.jianshu.com/">
                            <i class="iconfont">&#xe632;</i>
                            <span class="menu-text">首页</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="app-download-btn" href="#">
                            <i class="iconfont">&#xe6d4;</i>
                            <span class="menu-text">下载App</span>
                        </a>
                    </li>
                    <li class="search">
                        <form action="#" accept-charset="UTF-8" method="get">
                            <input name="utf8" type="hidden" value="✓">
                            <input type="text" name="q" id="q" value="" placeholder="搜索" class="search-input">
                            <a class="search-btn" href="javascript:void(null)"><i class="iconfont">&#xe651;</i></a>
                            <!-- <div id="navbar-trending-search"></div> -->
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>


<div class="container index">
    <div class="row">
        <!-- Banner -->
        <div id="indexCarousel" class="carousel slide">
            <!--ol class="carousel-indicators">
                <li data-target="#indexCarousel" data-slide-to="0"
                  class="active"></li>
                <li data-target="#indexCarousel" data-slide-to="1"
                  class=""></li>
                <li data-target="#indexCarousel" data-slide-to="2"
                  class=""></li>
                <li data-target="#indexCarousel" data-slide-to="3"
                  class=""></li>
                <li data-target="#indexCarousel" data-slide-to="4"
                  class=""></li>
                <li data-target="#indexCarousel" data-slide-to="5"
                  class=""></li>
                <li data-target="#indexCarousel" data-slide-to="6"
                  class=""></li>
            </ol-->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/6bda0054fdde22175f625fa9386b691722fe774e.jpg')}}" alt="540"></a>
                    </div>
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/4d5471ea52e91114b7e74d841641fef04bb4830f.jpg')}}" alt="540"></a>
                    </div><div class="banner">
                        <a href="#"><img src="{{asset('image/457b5730f33926103643a76631ad97797da1cb54.jpg')}}" alt="540"></a>
                    </div></div>
                <div class="item">
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/4d5471ea52e91114b7e74d841641fef04bb4830f.jpg')}}" alt="540"></a>
                    </div>
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/457b5730f33926103643a76631ad97797da1cb54.jpg')}}" alt="540"></a>
                    </div><div class="banner">
                        <a href="#"><img src="{{asset('image/f98aab23b0ee1912bed5665681d09c47a0bdcdaf.jpg')}}" alt="540"></a>
                    </div></div>
                <div class="item">
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/457b5730f33926103643a76631ad97797da1cb54.jpg')}}" alt="540"></a>
                    </div>
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/f98aab23b0ee1912bed5665681d09c47a0bdcdaf.jpg')}}" alt="540"></a>
                    </div><div class="banner">
                        <a href="#"><img src="{{asset('image/f9fac5e92af3749483c65aaf98e9415d2d661ef5.jpg')}}" alt="540"></a>
                    </div></div>
                <div class="item">
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/f98aab23b0ee1912bed5665681d09c47a0bdcdaf.jpg')}}" alt="540"></a>
                    </div>
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/f9fac5e92af3749483c65aaf98e9415d2d661ef5.jpg')}}" alt="540"></a>
                    </div><div class="banner">
                        <a href="#"><img src="{{asset('image/453e08bd24e2119a5f40142712f27683f325b89f.jpg')}}" alt="540"></a>
                    </div></div>
                <div class="item">
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/f9fac5e92af3749483c65aaf98e9415d2d661ef5.jpg')}}" alt="540"></a>
                    </div>
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/453e08bd24e2119a5f40142712f27683f325b89f.jpg')}}" alt="540"></a>
                    </div><div class="banner">
                        <a href="#"><img src="{{asset('image/0fbfcbbb3c3062f62724f55c33a9012e9e3c5e30.jpg')}}" alt="540"></a>
                    </div></div>
                <div class="item">
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/453e08bd24e2119a5f40142712f27683f325b89f.jpg')}}" alt="540"></a>
                    </div>
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/0fbfcbbb3c3062f62724f55c33a9012e9e3c5e30.jpg')}}" alt="540"></a>
                    </div><div class="banner">
                        <a href="#"><img src="{{asset('image/6bda0054fdde22175f625fa9386b691722fe774e.jpg')}}" alt="540"></a>
                    </div></div>
                <div class="item">
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/0fbfcbbb3c3062f62724f55c33a9012e9e3c5e30.jpg')}}" alt="540"></a>
                    </div>
                    <div class="banner">
                        <a href="#"><img src="{{asset('image/6bda0054fdde22175f625fa9386b691722fe774e.jpg')}}" alt="540"></a>
                    </div><div class="banner">
                        <a href="#"><img src="{{asset('image/4d5471ea52e91114b7e74d841641fef04bb4830f.jpg')}}" alt="540"></a>
                    </div></div>
            </div>
            <a class="left carousel-control" href="#" role="button" data-slide="prev"><i class="iconfont">&#xe618;</i></a>
            <a class="right carousel-control" href="#" role="button" data-slide="next"><i class="iconfont">&#xe64f;</i></a>
        </div>
        <!-- Banner -->
        <div class="col-xs-16 main">
            <div class="recommend-collection">
                <a class="collection" href="#">
                    <img src="{{asset('image/WechatIMG207.jpg')}}" alt="195">
                    <div class="name">书法</div>
                </a>
                <a class="more-hot-collection" href="#">
                    更多热门专题 <i class="iconfont">&#xe64f;</i>
                </a>        </div>
            <div class="split-line"></div>
            <div id="list-container">
                <!-- 文章列表模块 -->
                <ul class="note-list" infinite-scroll-url="/">

                    <li id="note-15296134" data-note-id="15296134" class="have-img">
                        <a class="wrap-img" href="#">
                            <img class="img-blur-done" src="{{asset('image/2542851-bd6e41d81284a281.jpg')}}" alt="120">
                        </a>
                        <div class="content">
                            <div class="author">
                                <a class="avatar" href="#">
                                    <img src="{{asset('image/0dca220dd6bb.jpeg')}}" alt="96">
                                </a>      <div class="name">
                                    <a class="blue-link" href="#">怀左同学</a>
                                    <span class="time" data-shared-at="2017-08-02T09:33:45+08:00">7 小时前</span>
                                </div>
                            </div>
                            <a class="title" href="#">喜欢和爱的区别，究竟有多大？</a>
                            <p class="abstract">
                                01 你有没有喜欢，或者真正地爱过一个人？ 原来喜欢和爱，终是有区别的。写文章的我，经常会捕捉到一些微妙的感情，只有真正面对微妙时，我才深感语言的无能。 我们常常不能直接用言...
                            </p>
                            <div class="meta">
                                <a class="collection-tag" href="#">青春</a>
                                <a href="#">
                                    <i class="iconfont">&#xe60a;</i> 11866
                                </a>        <a href="#">
                                    <i class="iconfont">&#xe603;</i> 137
                                </a>      <span><i class="iconfont">&#xe613;</i> 523</span>
                                <span><i class="iconfont">&#xe64e;</i> 3</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- 文章列表模块 -->
            </div>
        </div>
        <div class="col-xs-7 col-xs-offset-1 aside">
            <div class="board">
                <a href="#">
                    <img src="{{asset('image/banner-s-1-b8ff9ec59f72ea88ecc8c42956f41f78.png')}}" alt="Banner s 1">
                </a>        <a href="#"><img src="{{asset('image/banner-s-3-7123fd94750759acf7eca05b871e9d17.png')}}" alt="Banner s 3"></a>
                <a href="#"><img src="{{asset('image/banner-s-4-b70da70d679593510ac93a172dfbaeaa.png')}}" alt="Banner s 4"></a>
                <a utm_medium="index-banner-s" href="#"><img src="{{asset('image/banner-s-5-176b02fbb73db195e3bbd9ed5acf34ae.png')}}" alt="Banner s 5"></a>
                <a href="#"><img src="{{asset('image/banner-s-6-c4d6335bfd688f2ca1115b42b04c28a7.png')}}" alt="Banner s 6"></a>
            </div>

            <!-- 首页右侧 App 下载提示 -->
            <a class="col-xs-8 download" data-toggle="popover" data-placement="top" data-html="true" data-trigger="hover" data-content="&lt;img src=&quot;//cdn2.jianshu.io/assets/web/download-app-qrcode-0257cd2c1d094cba9caa7bdc9e5a1393.png&quot; alt=&quot;Download app qrcode&quot; /&gt;" href="#" data-original-title="" title="">
                <img class="qrcode" src="{{asset('image/download-app-qrcode-0257cd2c1d094cba9caa7bdc9e5a1393.png')}}" alt="Download app qrcode">
                <div class="info">
                    <div class="title">下载简书手机App<i class="iconfont">&#xe64f;</i></div>
                    <div class="description">随时随地发现和创作内容</div>
                </div>
            </a>
            <!-- 简书日报 -->
            <div class="jianshu-daily">
                <div class="title">
                    简书日报
                    <a href="#">查看往期</a>
                </div>
                <a class="note" href="#">
                    <img src="{{asset('image/568470-a44336a0859da6b6.png')}}" alt="96">
                    <div class="note-title">黛玉早报170802 —— 《亲爱的先生，你要爱你的寂寞》</div>
                </a>            <a class="note" href="#">
                    <img src="{{asset('image/568470-71ef6ac859bb8cb6.png')}}" alt="96">
                    <div class="note-title">黛玉早报170801 —— 《你还在向朝九晚五的工作要安全感吗？》</div>
                </a>
            </div>

            <!-- 推荐作者 -->
            <div class="recommend">
                <div class="title">
                    <span>推荐作者</span>
                    <div class="reload">
                        <div class="page-change">
                            <a><i class="iconfont">&#xe600;</i>换一换</a>
                        </div>
                    </div>
                </div>
                <ul class="list">
                    <li>
                        <a href="#" class="avatar">
                            <img src="{{asset('image/06c537002583.png')}}">
                        </a>
                        <a class="follow" state="0"><i class="iconfont">&#xe68e;</i>关注</a>
                        <a href="#" class="name">刘淼</a>
                        <p>写了390.6k字 · 18.4k喜欢</p>
                    </li>
                </ul>
                <a href="#" class="find-more">
                    查看全部
                    <i class="iconfont">&#xe64f;</i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="side-tool"><ul><li data-placement="left" data-toggle="tooltip" data-container="body" data-original-title="回到顶部" style="display: none;"><a class="function-button"><i class="iconfont ic-backtop"></i></a></li> <!----> <!----> <!----></ul></div>
<footer class="container">
    <div class="row">
        <div class="col-xs-17 main">
            <a href="#">关于简书</a><em> · </em>
            <a href="#">联系我们</a><em> · </em>
            <a href="#">加入我们</a><em> · </em>
            <a href="#">作者成书计划</a><em> · </em>
            <a href="#">品牌与徽标</a><em> · </em>
            <a href="#">帮助中心</a><em> · </em>
            <a href="#">合作伙伴</a>
        </div>
    </div>
</footer>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-35169517-1', 'auto');
    ga('send', 'pageview');
</script>

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?0c0e9d9b1e7d617b3e6842e85b9fb068";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
</body>
</html>