<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Dong;
use App\Http\Requests;
use DB;

header("Content-Type:text/html;charset=utf-8");
class DongController extends Controller
{
    /**
     *
     * @渲染活动列表页面
     * @wei
     * @2016-10-
     */
    public function dong()
    {
        return view('dong/dong');
    }


    /**
     *
     * @活动添加页面
     * @wei
     * @2016-10-
     */
    public function dongadd()
    {
        return view('dong/dongadd');
    }


    /**
     *
     * @活动添加页面
     * @wei
     * @2016-10-
     */
    public function dongdo(Request $request)
    {
        $input = $request->all();
        $data['act_name'] = $input['act_name'];
        $data['act_address'] = $input['s_province'].','.$input['s_city'].','.$input['s_county'];
        $data['act_people_num'] = $input['act_peo_num'];
        $data['act_start'] = $input['start_date']." ".$input['start_time'];
        $data['act_end'] = $input['end_date']." ".$input['end_time'];
        $data['act_content'] = $input['act_content'];
        $data['act_class'] = $input['act_class'];
        $data['act_format'] = $input['act_format'];
        $data['act_sign'] = $input['sign_content'];
        $data['user_id'] = 1;

        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["png", "jpg", "gif","JPG"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            $picturePath = 'picture/dong/';
            $pictureName = 'picture/dong/'.date('YmdHis',time()).'.'.$extension;
            $file->move($picturePath,$pictureName);
            $data['act_photo'] = $pictureName;
        }
        $Ren = new Dong();
        $id = $Ren->activityInsert($data);
        echo $id;

    }


    /**
     *
     * @渲染活动展示页面
     * @wei
     * @2016-10-
     */
    public function dong_m()
    {
        $Ren = new Dong();
        $data = $Ren->activitySelect();
       /* print_r($data);
        die;*/
        return view('dong/dong_m',["data"=>$data]);
    }
}