<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    protected $table = 'users';
    //注册
    public function addUser($param){
        $res = DB::table($this->table)->insertGetId($param);
        return $res;
    }

    //验证手机号是否被注册
    public function checkPhone($param){
        $res = DB::table($this->table)->select('phone')->where($param)->get();
        return $res;
    }

    //手机号登陆
    public function phoneLogin($param){
        $res = DB::table($this->table)->select('username','phone','password')->where(['phone'=>$param['usernumber'],'password'=>$param['password']])->get();
        return $res;
    }

    //邮箱登陆
    public function emailLogin($param){
        $res = DB::table($this->table)->select('username','phone','password')->where(['email'=>$param['usernumber'],'password'=>$param['password']])->get();
        return $res;
    }
}
