<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Chou;
use App\Http\Model\User;
use Validator;
use Illuminate\Http\Request;
use Redirect, Input, Response;
use Session;
use DB;
use Illuminate\Support\Facades\Redis as Redis;

header("Content-Type:text/html;charset=utf-8");
class ChouController extends Controller
{
    /**
     *
     * @渲染众筹列表页面
     * @wei
     * @2016-10-25
     */
    public function chou()
    {
        $chou = new Chou();
        $data = $chou->chouSelect();
        //print_r($data);
       //
        return view('chou/chou',['data'=>$data]);
    }


    /**
     *
     * @渲染众筹添加页面
     * @wei
     * @2016-10-25
     */
    public function chouadd()
    {
        $id = Session::get('user_id');
        $user_name = Session::get('user_name');

        $User = new User();
        $data = $User->userSelect($id);
        //限制一个用户只能发布一个众筹

        $Chou = new Chou();
        $chou_name = $Chou->ChouOneSelect($id);

        if(!isset($id) || !isset($user_name))
        {
            echo "<script>alert('请先登录'); location.href='/login'</script>";
        }
        elseif($data=='' || empty($data))
        {
            echo "<script>alert('请先完善个人信息'); location.href='/useradd'</script>";
        }
        elseif($chou_name=='' || empty($chou_name))
        {
            return view('chou/chouadd');
        }
        else
        {
            echo "<script>alert('您只能发布一个众筹项目');location.href='/chou';</script>";
        }
    }

 /*   static function checkValid($require_data,$rules_data){
        if(empty($require_data) or empty($rules_data)){
            self::_show_error('check input array is error');
        }

        $validator = Validator::make(
            $require_data,
            $rules_data
        );
        $messages = $validator->messages();
        foreach ($messages->all() as $message)
        {
            self::_show_error($message);
        }
    }*/


    //视频单独上传
    public function busUpload(Request $request)
    {
        //商业模式下的视频
        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["mp4" , "MP4"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage mp4.'];
            }
            $videoPath = 'video/business/';
            $vidName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $videoName = "video/business/".$vidName.'.'.$extension;
            $file->move($videoPath,$videoName);

            Redis::set(Session::get('user_id').'bus',$videoName);
            echo 1;
        }
    }

    //商业模式视频单独修改
    public function busUploadUpdate(Request $request)
    {
        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["mp4" , "MP4"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage mp4.'];
            }
            $videoPath = 'video/business/';
            $vidName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $videoName = "video/business/".$vidName.'.'.$extension;
            $file->move($videoPath,$videoName);
            $busVideo = Redis::get(Session::get('user_id').'bus');
            if(isset($busVideo)){
                unlink($busVideo);
            }
            Redis::set(Session::get('user_id').'bus',$videoName);
            echo 1;
        }

    }

    public function teaUpload(Request $request)
    {
        //团队模式下的视频
        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["mp4" , "MP4"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage mp4.'];
            }
            $videoPath = 'video/team/';
            $vidName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $videoName = 'video/team/'.$vidName.'.'.$extension;
            $file->move($videoPath,$videoName);

            Redis::set(Session::get('user_id').'tea',$videoName);
            echo 1;
        }
    }

    public function teaUploadUpdate(Request $request)
    {
        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["mp4" , "MP4"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage mp4.'];
            }
            $videoPath = 'video/team/';
            $vidName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $videoName = 'video/team/'.$vidName.'.'.$extension;
            $file->move($videoPath,$videoName);

            $teaVideo = Redis::get(Session::get('user_id').'tea');
            if(isset($teaVideo)){
                unlink($teaVideo);
            }

            Redis::set(Session::get('user_id').'tea',$videoName);
            echo 1;
        }
    }

    public function roaUpload(Request $request)
    {
        //路演模式下的视频
        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["mp4" , "MP4"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage mp4.'];
            }
            $videoPath = 'video/road/';
            $vidName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $videoName = 'video/road/'.$vidName.'.'.$extension;
            $file->move($videoPath,$videoName);

            Redis::set(Session::get('user_id').'road',$videoName);
            echo 1;
        }
    }

    public function roaUploadUpdate(Request $request)
    {
        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["mp4" , "MP4"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage mp4.'];
            }
            $videoPath = 'video/road/';
            $vidName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $videoName = 'video/road/'.$vidName.'.'.$extension;
            $file->move($videoPath,$videoName);

            $roaVideo = Redis::get(Session::get('user_id').'road');
            if(isset($roaVideo)){
                unlink($roaVideo);
            }

            Redis::set(Session::get('user_id').'road',$videoName);
            echo 1;
        }
    }

    /**
     *
     * @众筹添加功能
     * @wei
     * @2016-10-25
     */
    public function choudo(Request $request)
    {
/*        //laravel 自动验证
        $validator = Validator::make($request->all(), [
            'pro_name' => 'bail|required|min:1|regex:[[\x{4e00}-\x{9fa5}A-Za-z0-9_]+]',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return $messages;
        }*/

        $input = $request->all();
        /*=================项目资料======================*/
        $data['pro_name'] = $input['pro_name'];
        $data['pro_content'] = $input['pro_content'];
        $data['pro_address'] = $input['s_province'].','.$input['s_city'].','.$input['s_county'];
        $data['pro_state'] = $input['pro_state'];
        $data['pro_stage'] = $input['pro_stage'];
        $data['pro_valuation'] = $input['pro_valuation'];
        $data['pro_return'] = $input['pro_return'];
        $data['pro_target'] = $input['target'];
        $data['pro_value'] = $input['pro_value'];
        $data['pro_type'] = $input['pro_type'];
        $data['pro_advisor'] = $input['pro_advisor'];
        $data['pro_advisornum'] = $input['pro_advisornum'];

        //项目logo
        if($request->hasFile('pro_logo')){
            $file = $request->file('pro_logo');
            $allowed_extensions = ["png", "jpg", "gif","JPG" , "PNG" , "GIF"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            $picturePath = 'picture/chou/logo/';
            $picName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $pictureName = 'picture/chou/logo/'.$picName.'.'.$extension;
            $file->move($picturePath,$pictureName);
            $data['pro_logo'] = $pictureName;
        }
        //项目图片
        if($request->hasFile('pro_picture')){
            $file = $request->file('pro_picture');
            $allowed_extensions = ["png", "jpg", "gif","JPG" , "PNG" , "GIF"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            $picturePath = 'picture/chou/picture/';
            $picName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $pictureName = 'picture/chou/picture/'.$picName.'.'.$extension;
            $file->move($picturePath,$pictureName);
            $data['pro_picture'] = $pictureName;
        }
        $User = new User();
        $user_id = $User->userinfoID(Session::get('user_id')) ;

        $data['user_id'] =  $user_id[0]->id;

        $chou = new Chou();
        $res = $chou->projectInsert($data);


        /*=========================商业模式===========================*/
        $extent['bus_userdata'] = $input['bus_userdata'];
        $extent['bus_profit'] = $input['bus_profit'];
        $extent['bus_other'] = $input['bus_other'];
        $extent['bus_operate'] = $input['bus_operate'];
        $extent['bus_video'] = Redis::get(Session::get('user_id').'bus');


        /*众筹项目团队*/
        $extent['tea_core'] = $input['tea_core'];
        $extent['tea_num'] = $input['tea_num'];
        $extent['tea_tutor'] = $input['tea_tutor'];
        $extent['tea_adviser'] = $input['tea_adviser'];
        $extent['tea_video'] = Redis::get(Session::get('user_id').'tea');


        /*==========================路演==========================*/
        $extent['roa_guest'] = $input['roa_guest'];
        $extent['roa_video'] = Redis::get(Session::get('user_id').'road');

        /*附件资料*/
        if($request->hasFile('att_name')){
            $file = $request->file('att_name');
            $allowed_extensions = ["doc", "docx", "pdf"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage doc, docx or pdf.'];
            }
            $attachPath = 'file/attachment/';
            $attName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $attachName = 'file/attachment/'.$attName.'.'.$extension;
            $file->move($attachPath,$attachName);
            $extent['att_name'] = $attachName;
        }
        $extent['pro_datetime'] = date('Y-m-d H:i:s',time());
        $extent['pro_id'] = $res;
        $chou = new Chou();
        $res = $chou->projectExtendInsert($extent);
        if($res){
            return redirect('/chou_m/'.$input['pro_name']);
        }

    }


    /**
     *
     * @众筹单展示页面
     * @wei
     * @2016-10-2
     */
    public function chou_m()
    {
        $input = $_SERVER["REQUEST_URI"];
        $pro_name = substr(urldecode($input),strrpos(urldecode($input),"/")+1);

        $chou = new Chou();
        $data = $chou->projectSelect($pro_name);
//        print_r($data);
//        die;


      /*  $myfile = fopen($data[0]->att_name,"r");
        $name = fread($myfile,filesize($data[0]->att_name));
        echo $name;

        fclose($myfile);

        die;*/



        return view('chou/chou_m',['data'=>$data]);
    }


    /**
     *
     * @众筹修改页面
     * @wei
     * @2016-12-1
     */
    public function chouedit()
    {
        $input = $_SERVER["REQUEST_URI"];
        $pro_name = substr(urldecode($input),strrpos(urldecode($input),"/")+1);

        $Chou = new Chou();
        $chou_data = $Chou->updateChouPer($pro_name);

        return view('chou/chouedit',['chou_data'=>$chou_data]);
    }


    /**
     *
     * @众筹修改处理
     * @wei
     * @2016-12-1
     */
    public function choueditdo(Request $request)
    {
        $input = $request->all();
        $data['id'] = $input['pro_id'];
        $Chou = new Chou();
        $chou_data = $Chou->ChouID($data['id']);

        /*=================项目资料======================*/

        $data['pro_name'] = $input['pro_name'];
        $data['pro_content'] = $input['pro_content'];
        $data['pro_address'] = $input['s_province'].','.$input['s_city'].','.$input['s_county'];
        $data['pro_state'] = $input['pro_state'];
        $data['pro_stage'] = $input['pro_stage'];
        $data['pro_valuation'] = $input['pro_valuation'];
        $data['pro_return'] = $input['pro_return'];
        $data['pro_target'] = $input['target'];
        $data['pro_value'] = $input['pro_value'];
        $data['pro_type'] = $input['pro_type'];
        $data['pro_advisor'] = $input['pro_advisor'];
        $data['pro_advisornum'] = $input['pro_advisornum'];

        //项目logo
        if($request->hasFile('pro_logo')){
            $file = $request->file('pro_logo');
            $allowed_extensions = ["png", "jpg", "gif","JPG" , "PNG" , "GIF"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            $picturePath = 'picture/chou/logo/';
            $picName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $pictureName = 'picture/chou/logo/'.$picName.'.'.$extension;
            $file->move($picturePath,$pictureName);
            $data['pro_logo'] = $pictureName;
            if(isset($chou_data[0]->pro_logo)){
                unlink($chou_data[0]->pro_logo);
            }
        }else{
            $data['pro_logo'] = $chou_data[0]->pro_logo;
        }
        //项目图片
        if($request->hasFile('pro_picture')){
            $file = $request->file('pro_picture');
            $allowed_extensions = ["png", "jpg", "gif","JPG" , "PNG" , "GIF"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            $picturePath = 'picture/chou/picture/';
            $picName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $pictureName = 'picture/chou/picture/'.$picName.'.'.$extension;
            $file->move($picturePath,$pictureName);
            $data['pro_picture'] = $pictureName;

            if(isset($chou_data[0]->pro_picture)){
                unlink($chou_data[0]->pro_picture);
            }
        }else{
            $data['pro_picture'] = $chou_data[0]->pro_picture;
        }

        $User = new User();
        $user_id = $User->userinfoID(Session::get('user_id')) ;

        $data['user_id'] =  $user_id[0]->id;

        /*=============================商业模式===============================*/
        $data['bus_userdata'] = $input['bus_userdata'];
        $data['bus_profit'] = $input['bus_profit'];
        $data['bus_other'] = $input['bus_other'];
        $data['bus_operate'] = $input['bus_operate'];

        $data['bus_video'] = Redis::get(Session::get('user_id').'bus');


        /*众筹项目团队*/
        $data['tea_core'] = $input['tea_core'];
        $data['tea_num'] = $input['tea_num'];
        $data['tea_tutor'] = $input['tea_tutor'];
        $data['tea_adviser'] = $input['tea_adviser'];
        //项目团队模式下的视频
        $data['tea_video'] = Redis::get(Session::get('user_id').'tea');


        /*==========================路演==========================*/
        $data['roa_guest'] = $input['roa_guest'];
        //路演下的视频
        $data['roa_video'] = Redis::get(Session::get('user_id').'road');

        /*附件资料*/
        if($request->hasFile('att_name')){
            $file = $request->file('att_name');
            $allowed_extensions = ["doc", "docx", "pdf"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage doc, docx or pdf.'];
            }
            $attachPath = 'file/attachment/';
            $attName = md5(Session::get('user_id').date('YmdHis',time()).rand(1000,9999));
            $attachName = 'file/attachment/'.$attName.'.'.$extension;
            $file->move($attachPath,$attachName);
            $data['att_name'] = $attachName;

            if(isset($chou_data[0]->att_name)){
                unlink($chou_data[0]->att_name);
            }
        }else{
            $data['att_name'] = $chou_data[0]->att_name;
        }

        $data['pro_datetime'] = date('Y-m-d H:i:s',time());
        $data['pro_id'] = $input['pro_id'];

        $Chou = new Chou();
        $res = $Chou->updateChouDo($data);

        if($res==1 || $res==2){
            return redirect('/chou_m/'.$input['pro_name']);
        }
    }
}