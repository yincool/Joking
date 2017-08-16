<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Users;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    //登录页面
    public function login(){
        return view('Article.login');
    }

    //登陆校验
    public function checkLogin(Request $request){
        $param['usernumber'] = $request->input('usernumber');
//        echo $param['usernumber'];
        if(isset($param['usernumber'])){
            $param['password'] = md5($request->input('password').'@#');
//            echo $param['password'];exit;
            if(isset($param['password'])){
                $users = new Users();
                $res = $users->checkLogin($param);
                if($res->isNotEmpty()){
                    _successFormat('登陆成功');
                }else{
                    _errorFormat(2004);
                }
            }
        }
    }

    //注册页面
    public function register(){
        return view('Article.register');
    }

    //注册逻辑
    public function registerLogic(Request $request){
        $param['username'] = $request->input('username');
        if(isset($param['username'])){
            $param['phone'] = $request->input('phone');
            if(isset($param['phone'])){
                $param['password'] = md5($request->input('password').'@#');
                if(isset($param['password'])){
//                    $checkphoneres = $this->checkPhone($param['phone']);
//                    if($checkphoneres){
                    $captcha = strtolower($request->input('captcha'));
                    if(isset($captcha)){
//                        var_dump($request->session()->all());exit;
                        if(Session::pull('milkcaptcha')==$captcha){
                            $param['uid'] = 'ebook'.$param['phone'];
                            $users = new Users();
                            $res = $users->addUser($param);
                            if($res){
                                $request->session()->put('username',$param['username']);
                                $request->session()->put('password',$param['password']);
                                //不加此句将无法存储session
                                $request->session()->save();
//                                $userinfo = array('username'=>$param['username'],'password'=>$param['password']);
//                                $user = Cookie::make('username',$userinfo,86400);
//                                $response = new Response();
//                                $response->withCookie($user);
                                _successFormat();
                            }else{
                                _errorFormat(2001);
                            }
                        }else{
                            _errorFormat(2003);
                        }
                    }else{
                        _errorFormat(2001);
                    }
//                    }else{
//                        _errorFormat(2002);
//                    }
                }else{
                    _errorFormat(2001);
                }
            }else{
                _errorFormat(2001);
            }
        }else{
            _errorFormat(2001);
        }
    }

    //验证手机号是否被注册
    public function checkPhone(Request $request){
        $phone = array('phone'=>$request->input('phone'));
        if(!empty($phone)){
            $users = new Users();
            $res = $users->checkPhone($phone);
            $res = json_decode($res,true);
            if(empty($res)){
                return (string)true;
            }else{
                _errorFormat(2002);
            }
        }
    }

    //生成验证码
    public function captcha(Request $request,$tmp){
        $builder = new CaptchaBuilder();
        $builder->build(100,40);
        $phrase = $builder->getPhrase();
        $request->session()->put('milkcaptcha',$phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    //账号注销
    public function exitLogin(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function test(Request $request){
        $request->session()->put('username',222);
    }
}
