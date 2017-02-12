<?php

namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * @wei
     * @验证用户登录
     * @2016-10-26
     */
    public function check_login($user_name,$user_pass)
    {
        $users = DB::table('gon_user')
            ->where('user_name', $user_name)
            ->where('password', md5(md5($user_pass)))
            ->get();
        return $users;
    }


    /**
     * @wei
     * @验证用户注册
     * @2016-11-24
     */
    public function check_register($user_phone)
    {
        $users = DB::table('gon_user')
            ->where('user_name', $user_phone)
            ->get();
        return $users;
    }


    /**
     * @wei
     * @用户信息入库
     * @2016-11-24
     */
    public function register_do($data)
    {
        $id = DB::table('gon_user')->insertGetId($data);
        return $id;
    }


    public function getUserId($user_name)
    {
        $users = DB::table('gon_user')
            ->where('user_name', $user_name)
            ->select('id')
            ->get();
        return $users;
    }


    /**
     * @wei
     * @验证昵称唯一性
     * @2016-10-26
     */
    public function nickname($nickname){
        $users = DB::table('gon_userinfo')
            ->where('nickname','=', $nickname)
            ->select('nickname')
            ->get();
        return $users;
    }


    /**
     * @wei
     * @完善用户信息
     * @2016-10-26
     */
    public function userinfo($data)
    {
        $id = DB::table('gon_userinfo')->insertGetId($data);
        return $id;
    }


    /**
     * @wei
     * @修改用户信息
     * @2016-10-26
     */
    public function updateUserinfo($nickname,$age,$identity,$company,$posts,$address,$worklife,$sign,$photo,$video,$resume,$datetime,$user_id)
    {
        $id = DB::table('gon_userinfo')
            ->where('user_id', '=', $user_id )
            ->update(['nickname' => $nickname , 'age'=>$age , 'identity'=>$identity , 'company'=>$company , 'posts'=>$posts , 'address'=>$address , 'worklife'=>$worklife , 'sign'=>$sign , 'photo'=>$photo , 'video'=>$video , 'resume'=>$resume ,'datetime'=>$datetime ,'user_id'=>$user_id]);
        return $id;
    }


    /**
     * @wei
     * @my页面 个人信息展示
     * @2016-11-29
     */
    public function userSelect($id)
    {
        $users = DB::table('gon_userinfo')
            ->where('user_id', '=', $id)
            ->get();
        return $users;
    }

    /**
     * @wei
     * @根据用户id查userinfo表的的id
     * @2016-11-29
     */
    public function userinfoID($id)
    {
        $users = DB::table('gon_userinfo')
            ->where('user_id', '=', $id)
            ->select('id')
            ->get();
        return $users;

    }

    /**
     * @wei
     * @查询用户信息
     * @2016-10-31
     */
    public function user_nameSelect($user_name)
    {
        $users = DB::table('gon_userinfo')
            ->where('nickname', '=', $user_name)
            ->get();
        return $users;
    }

    //查询旧密码
    public function selectOld($old_pass,$user_id)
    {
        $users = DB::table('gon_user')
            ->where('password', '=', md5(md5($old_pass)))
            ->where('id', '=', $user_id)
            ->get();
        return $users;
    }

    public function updatePassword($user_id,$new_pass)
    {
        $id = DB::table('gon_user')
            ->where('id', '=', $user_id )
            ->update(['password' => md5(md5($new_pass))]);
        return $id;
    }

}