<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\Http\Model\Chou;
use App\Http\Model\Ren;

use DB;
use Session;
use Illuminate\Support\Facades\Cookie;
header("Content-Type:text/html;charset=utf-8");
class UserController extends Controller
{
    /**
     *
     * @渲染用户中心页面
     * @user/user
     * @2016-10-2
     */
    public function user()
    {
        $id = Session::get('user_id');
        $user_name = Session::get('user_name');

        if(!isset($id) || !isset($user_name))
        {
            return "<script>alert('请先登录'); location.href='/login';</script>";
        }else{
            $user = new User();
            $data = $user->userSelect($id);

//            print_r($data);
//            die;
            $chou = new Chou();
            $chou_data = $chou->userChouSelect($id);

            $ren = new Ren();
            $ren_data = $ren->UserIDpartnerPosition($id);

            return view('user/user',['data'=>$data,'chou_data'=>$chou_data,'ren_data'=>$ren_data]);
        }
    }


    /**
     *
     * @合伙人展示页面
     * @user/user
     * @2016-11-28
     */
    public function users()
    {
        $input = $_SERVER["REQUEST_URI"];
        $user_name = substr(urldecode($input),strrpos(urldecode($input),"/")+1);

        $user = new User();
        $data = $user->user_nameSelect($user_name);

        $chou = new Chou();
        $chou_data = $chou->usersChouSelect($user_name);

        $ren = new Ren();
        $ren_data = $ren->UserpartnerPosition($user_name);

        return view('user/user',['data'=>$data,'chou_data'=>$chou_data, 'ren_data'=>$ren_data]);
    }


}