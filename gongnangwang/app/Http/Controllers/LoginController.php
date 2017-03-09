<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Session;
use App\Http\Requests;
use App\Http\Model\User;
use App\Http\Model\Index;
use App\Http\Model\Sendsms;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis as Redis;

class LoginController extends Controller
{
    /**
     * �
     * 渲染用户登录页面
     * @wei
     * @2016-10-25
     */
    public function login()
    {
        return view('login/login');
       /* $user_name = Cookie::get('user_name');
        if(empty($user_name) || $user_name=="")
        {
            return view('login/login');
        }else
        {
            $index = new Index();
            $pro = $index->proSelect();
            $par = $index->parSelect();
            return view('index',['pro'=>$pro,'par'=>$par]);
        }*/
    }


    /**
     * �
     * @处理用户登录信息
     * @wei
     * @2016-10-25
     */
    public function logindo(Request $request)
    {
        $user_name = $request->input('user_name');
        $user_pass = $request->input('user_pass');
        $remember = $request->input('remember');

        $User = new User();
        $data = $User->check_login($user_name,$user_pass);
        if($data){
            $id = $User->getUserId($user_name);
            $res = $User->userSelect($id[0]->id);

            if($remember=='true'){
                Cookie::queue('user_name', $user_name, 60*24*7);
                Session::put('user_name',$user_name);
                Session::put('user_id',$id[0]->id);
                if($res)
                {
                    Session::put('user_nickname',$res[0]->nickname);
                    Session::put('user_photo',$res[0]->photo);
                    return 4;
                }else{
                    return 1;
                }
            }else{
                Cookie::queue('user_name', $user_name ,0);
                Session::put('user_name',$user_name);
                Session::put('user_id',$id[0]->id);
                if($res)
                {
                    Session::put('user_nickname',$res[0]->nickname);
                    Session::put('user_photo',$res[0]->photo);
                    return 5;
                }else{
                    return 2;
                }
            }
        }else{
            return 0;
        }
    }


    /**
     *
     * @渲染用户注册页面
     * @wei
     * @2016-10-25
     */
    public function register()
    {
        return view('login/register');
    }


    /**
     *
     * @用户短信注册功能
     * @wei
     * @2016-10-26
     */
    public function mobile(Request $request)
    {
        //$username = 'zk_gnw';
        $id = '14';
        $password = '853821';
        $phone = $request->input('phone');
        $rand = rand(10000,99999);
        Redis::set($phone.'verify',$rand);
        $url = "http://182.92.217.239:18002/send.do?uid=".$id."&pw=".$password."&mb=".$phone."&ms=【共囊网】您的验证码是".$rand;
        echo substr(file_get_contents($url),0,3);
    }


    /**
     *
     * @注册处理功能
     * @wei
     * @2016-11-23
     */
    public function register_do(Request $request)
    {
        $user_phone = $request->input('phone');
        $user_verify = $request->input('verify');
        $user_pass = $request->input('password');
        $User = new User();
        $res= $User->check_register($user_phone);

        $data['user_name'] = $request->input('phone');
        $data['password'] = md5(md5($user_pass));

        $checkVerify =  Redis::get($user_phone.'verify');
        if($res){
            echo 0;
        }elseif(empty($checkVerify)){
            echo 1;
        }elseif($checkVerify!=$user_verify){
            echo 2;
        }else{
            $result = $User->register_do($data);
            if($result){
                Cookie::queue('user_name', $user_phone);
                Session::put('user_name',$user_phone);
                Session::put('user_id',$result);
                echo 3;
            }
        }
    }



    /**
     *
     * @用户退出功能
     * @wei
     * @2016-10-26
     */
    public function user_exit()
    {
        Cookie::queue(Cookie::forget('user_name'));
       // Cookie::queue('user_name', null , -1);
        Session::forget('user_name');
        Session::forget('user_id');
        Session::forget('user_nickname');
        Session::forget('user_photo');

        return redirect("/");
    }
    
    public function forget(Request $request){
    	if ($request->isMethod('post')){
    		$userName = $request->input('phone');
    		$userVerify = $request->input('verify');
    		$password = $request->input('password');   		
    		$checkVerify = Redis::get($userName.'verify');
    		
    		if(empty($userName) || empty($password)){
    			return ["code"=>-1,"msg"=>'参数错误'];
    		}
    		
    		if($checkVerify != $userVerify){
    			return ["code"=>1, "msg"=>'验证码错误！'];
    		}
    		
    		$userModel = new User();
    		$userIds = $userModel->getUserId($userName);
    		if(empty($userIds)){
    			return ["code"=>2, "msg"=>'您尚未注册！',"href"=>'/register'];
    		}
    		$userId = $userIds[0]->id;
    		$result = $userModel->updatePassword($userId, $password);
    		if(empty($result)){
    			return ["code"=>3, "msg"=>"系统忙，请稍后重试！"];
    		}
    		
    		return ["code"=>0,"msg"=>"密码已重置，请您使用新密码登录！","href"=>"/login"];
    	}
    	
    	return view('login/forget');
    }
}