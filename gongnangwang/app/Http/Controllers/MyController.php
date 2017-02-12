<?php

namespace App\Http\Controllers;

use App\Http\Model\Chou;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\Http\Model\Ren;

use DB;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Illuminate\Support\Facades\Redis as Redis;

header("Content-Type:text/html;charset=utf-8");
class MyController extends Controller
{

    /*验证码*/
    public function captcha($tmp)
    {

        $builder = new CaptchaBuilder;

        $builder->build($width = 117, $height = 47, $font = null);

        $phrase = $builder->getPhrase();


        Session::put('milkcaptcha', $phrase);

        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    /*修改密码*/
    public function pass_update(Request $request)
    {
        $input = $request->all();

        $old_pass = $input['old_pass'];
        if($old_pass == "" || empty($old_pass))
        {
            $array = array(
                'state'=>0,
                'error'=>'old_pass empty'
            );
            echo json_encode($array);
            exit;
        }
        $new_pass = $input['new_pass'];
        if($new_pass == "" || empty($new_pass))
        {
            $array = array(
                'state'=>1,
                'error'=>'new_pass empty'
            );
            echo json_encode($array);
            exit;
        }
        $re_pass = $input['re_pass'];
        if($re_pass == "" || empty($re_pass))
        {
            $array = array(
                'state'=>2,
                'error'=>'re_pass empty'
            );
            echo json_encode($array);
            exit;
        }
        $user_captcha = $input['captcha'];
        if($user_captcha == "" || empty($user_captcha))
        {
            $array = array(
                'state'=>3,
                'error'=>'captcha empty'
            );
            echo json_encode($array);
            exit;
        }

        $captcha = Session::get('milkcaptcha');
        $user_id = Session::get('user_id');

        if($user_captcha != $captcha)
        {
            $array = array(
                'state'=>4,
                'error'=>'captcha error'
            );
            echo json_encode($array);
            exit;
        }

        if($new_pass == $old_pass)
        {
            $array = array(
                'state'=>5,
                'error'=>'newpass error'
            );
            echo json_encode($array);
            exit;
        }
        if($re_pass != $new_pass)
        {
            $array = array(
                'state'=>6,
                'error'=>'repass error'
            );
            echo json_encode($array);
            exit;
        }

        $user = new User();
        $res = $user->selectOld($old_pass,$user_id);
        if($res=="" || empty($res))
        {
            $array = array(
                'state'=>7,
                'error'=>'oldpass error'
            );
            echo json_encode($array);
        }else{

            if( $user->updatePassword($user_id,$new_pass) )
            {
                $array = array(
                    'state'=>8,
                    'error'=>'null'
                );
                echo json_encode($array);
            }else{
                $array = array(
                    'state'=>9,
                    'error'=>'update error'
                );
                echo json_encode($array);
            }
        }

    }


    /**
     *
     * @渲染用户中心页面
     * @my/my
     * @2016-10-2
     */
    public function my()
    {

        $name =  substr($_SERVER['REQUEST_URI'],1);
        $id =Session::get('user_id');



        $user = new User();
        $user_data = $user->userSelect($id);

        if(empty($user_data) || $user_data==''){
            echo "<script>alert('请先完善个人信息'); location.href='/useradd';</script>";
        }else{
            $Chou = new Chou();
            $chou_data = $Chou->myChouSelect($id);

            $Ren = new Ren();
            $pos_data = $Ren->partnerPosition($id);

            return view('my/my',['user_data'=>$user_data,'name'=>$name,'chou_data'=>$chou_data,'pos_data'=>$pos_data]);
        }
    }


    //个人视频上传
    public function myVideoUpload(Request $request)
    {
        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["mp4" , "MP4"];
            $extension = $file->getClientOriginalExtension();
            //如果上传出错,返回错误信息
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage mp4.'];
            }
            $videoPath = 'video/my/';
            $vioName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $videoName = 'video/my/'.$vioName.'.'.$extension;
            $file->move($videoPath,$videoName);
            Redis::set(Session::get('user_id').'my',$videoName);
            echo 1;
        }

    }


    public function myVideoUpdate(Request $request)
    {
        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["mp4" , "MP4"];
            $extension = $file->getClientOriginalExtension();
            //如果上传出错,返回错误信息
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage mp4.'];
            }
            $videoPath = 'video/my/';
            $vioName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $videoName = 'video/my/'.$vioName.'.'.$extension;
            $file->move($videoPath,$videoName);
            Redis::set(Session::get('user_id').'my',$videoName);
            echo 1;
        }
    }

    /**
     *
     * @昵称唯一性验证
     * @my/mydo
     * @2016-10-2
     */
    public function nicknameVerify(Request $request)
    {
        $nickname = $request->input('nickname');

        $user_id = Session::get('user_id');
        $User = new User();
        $user_data = $User->userSelect($user_id);

        if(empty($user_data) || $user_data=="")
        {
            $data = $User->nickname($nickname);
            if(empty($data)){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            $data = $User->nickname($nickname);
            if(empty($data) || $nickname==$user_data[0]->nickname){
                echo 1;
            }else{
                echo 0;
            }
        }
    }


    /**
     *
     * @用户信息添加功能
     * @my/mydo
     * @2016-10-25
     */
    public function mydo(Request $request)
    {
        $input = $request->all();
        $data['nickname'] = $input['nickname'];
        $data['age'] = $input['s_age'];
        $data['identity'] = $input['identity'];
        $data['company'] = $input['company'];
        $data['posts'] = $input['posts'];
        $data['address'] = $input['s_province'].','.$input['s_city'].','.$input['s_county'];
        $data['worklife'] = $input['worklife'];
        $data['sign'] = $input['sign'];

        //判断是否上传照片
        if($request->hasFile('uploadPicture')){
            $file = $request->file('uploadPicture');
            $allowed_extensions = ["png", "jpg", "gif","JPG", "PNG" , "GIF"];
            $extension = $file->getClientOriginalExtension();

            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }

            $picturePath = 'picture/my/';
            $picName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $pictureName = 'picture/my/'.$picName.'.'.$extension;
            $file->move($picturePath,$pictureName);
            $data['photo'] = $pictureName;
            Session::put('user_photo',$data['photo']);
        }

        $data['video'] = Redis::get(Session::get('user_id').'my');

        //判断是否上传简历
        if($request->hasFile('uploadResume')){
            $file = $request->file('uploadResume');
            $allowed_extensions = ["doc", "docx", "pdf"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only doc, docx or pdf.'];
            }
            $resumePath = 'file/resume/';
            $resName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $resumeName = 'file/resume/'.$resName.'.'.$extension;
            $file->move($resumePath,$resumeName);
            $data['resume'] = $resumeName;
        }
        $data['datetime'] = date('Y-m-d H:i:s',time());
        $data['user_id'] = Session::get('user_id');
        $User = new User();
        $res = $User->userinfo($data);
        if ($res)
        {
            Session::put('user_nickname',$data['nickname']);
            return redirect('/user');
        }

    }

    /**
     *
     * @渲染用户信息修改页面
     * @my/myedit
     * @2016-11-30
     */
    public function myedit()
    {
        $user_id = Session::get('user_id');

        $user = new User();
        $user_data = $user->userSelect($user_id);

        return view('my/myedit',['user_data'=>$user_data]);
    }


    public function editdo(Request $request)
    {
        $user_id = Session::get('user_id');

        $User = new User();
        $user_data = $User->userSelect($user_id);

        $input = $request->all();
        $nickname = $input['nickname'];
        $age = $input['s_age'];
        $identity = $input['identity'];
        $company = $input['company'];
        $posts = $input['posts'];
        $address = $input['s_province'].','.$input['s_city'].','.$input['s_county'];
        $worklife = $input['worklife'];
        $sign = $input['sign'];

        //判断是否上传照片
        if($request->hasFile('uploadPicture')){
            $file = $request->file('uploadPicture');
            $allowed_extensions = ["png", "jpg", "gif","JPG"  , "PNG" , "GIF"];
            $extension = $file->getClientOriginalExtension();
            //如果上传出错,返回错误信息
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }

            $picturePath = 'picture/my/';
            $picName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $pictureName = 'picture/my/'.$picName.'.'.$extension;
            $file->move($picturePath,$pictureName);
            $photo = $pictureName;
            if(isset($user_data[0]->photo)){
                unlink($user_data[0]->photo);
            }
            Session::put('user_photo',$pictureName);

        }else{
            $photo = $user_data[0]->photo;
        }

        //判断是否上传视频

     /*   if(isset($user_data[0]->video)){
            unlink($user_data[0]->video);
        }*/
        $video = Redis::get(Session::get('user_id').'my');

        //判断是否上传简历
        if($request->hasFile('uploadResume')){
            $file = $request->file('uploadResume');
            $allowed_extensions = ["doc", "docx", "pdf"];
            $extension = $file->getClientOriginalExtension();
            //如果上传出错,返回错误信息
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only doc, docx or pdf.'];
            }
            $resumePath = 'file/resume/';
            $resName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $resumeName = 'file/resume/'.$resName.'.'.$extension;
            $file->move($resumePath,$resumeName);
            $resume = $resumeName;
            if(isset($user_data[0]->resume)){
                unlink($user_data[0]->resume);
            }
        }else{
            $resume = $user_data[0]->resume;
        }
        $datetime = date('Y-m-d H:i:s',time());
        $res = $User->updateUserinfo($nickname,$age,$identity,$company,$posts,$address,$worklife,$sign,$photo,$video,$resume,$datetime,$user_id);

        if ($res)
        {
            Session::put('user_nickname',$nickname);
            return redirect('/user');
        }
    }


    /**
     *
     * @渲染用户信息添加页面
     * @my/myadd
     * @2016-10-2
     */
    public function myadd()
    {
        $User = new User();
        $id = Session::get('user_id');
        $user_name = Session::get('user_name');
        $data = $User->userSelect($id);

        if(!isset($id) || !isset($user_name))
        {
            echo "<script>alert('请先登录'); location.href='/login';</script>";
        }
        elseif(!empty($data))
        {
            echo "<script>alert('您已经添加个人信息'); location.href='/user';</script>";
        }
        else
        {
            return view('my/myadd');
        }
    }


    /**
     *
     * @渲染用户合伙人页面
     * @my/partner
     * @2016-10-2
     */
    public function partner()
    {
        return view('my/partner');
    }


    /**
     *
     * @渲染用户活动页面
     * @my/mydong
     * @2016-10-2
     */
    public function mydong()
    {
        return view('my/mydong');
    }


    /**
     *
     * @退出方式页面
     * @my/out
     * @2016-10-2
     */
    public function out()
    {
        return view('my/out');
    }


    /**
     *
     * @风险页面
     * @wei
     * @2016-10-2
     */
    public function risk()
    {
        return view('my/risk');
    }


    /**
     *
     * @服务条款
     * @wei
     * @2016-11-18
     */
    public function service()
    {
        return view('my/service');
    }


    /**
     *
     * @关于我们
     * @wei
     * @2016-11-18
     */
    public function about()
    {
        $name =  substr($_SERVER['REQUEST_URI'],1);
        return view('my/about',['name'=>$name]);
    }

}