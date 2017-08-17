<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Users;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;
class ArticleController extends Controller
{
    //首页显示
    public function index(Request $request){
        if($request->session()->has('username')){
            $username = $request->session()->get('username');
            return view('Article.index',compact('username'));
        }else{
            return view('Article.index');
        }
    }

    //文章录入页面
    public function writeArticle(){
        return view('Article.write_article');
    }
}
