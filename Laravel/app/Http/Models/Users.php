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

    //登陆校验
    public function checkLogin($param){
        $res = DB::table($this->table)->select('username','phone','password')->where(['phone'=>$param['usernumber'],'password'=>$param['password']])->get();
        return $res;
    }
}
