<?php
use \Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Blade;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//首页
Route::get('/',['uses'=>'ArticleController@index']);

//登录页面
Route::get('/login',['uses'=>'UsersController@login']);

//登陆校验
Route::post('/checkLogin',['uses'=>'UsersController@checkLogin']);

//注册
Route::get('/register',['uses'=>'UsersController@register']);

//注册逻辑
Route::post('/registerLogic',['uses'=>'UsersController@registerLogic']);

//验证手机号
Route::post('/checkPhone',['uses'=>'UsersController@checkPhone']);

//验证码
Route::get('/captcha/{tmp}',['uses'=>'UsersController@captcha']);

//账号注销
Route::get('/exitLogin',['uses'=>'UsersController@exitLogin']);

Route::get('/test',['uses'=>'UsersController@test']);

Route::post('/uploadImage',['uses'=>'UsersController@uploadImage']);

//文章录入页面
Route::get('/write',['uses'=>'ArticleController@writeArticle'])->middleware('checkLogin');

