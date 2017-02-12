<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Model\Pai;
use DB;

class PaiController extends Controller
{
    /**
     *
     * @渲染单个拍卖列表页面
     * @wei
     * @2016-10-
     */
    public function pai_m()
    {
        $Ren = new Pai();
        $data = $Ren->auctionSelect();

        return view('pai/pai_m',['data'=>$data]);
    }


    /**
     *
     * @渲染知识产权添加页面
     * @wei
     * @2016-10-
     */
    public function paiadd()
    {
        return view('pai/paiadd');
    }


    /**
     *
     * @渲染知识产权添加页面
     * @wei
     * @2016-10-
     */
    public function paido(Request $request)
    {
        $input = $request->all();
        $data['auc_name'] = $input['auc_name'];
        $data['auc_type'] = $input['auc_type'];
        $data['auc_number'] = $input['auc_number'];
        $data['auc_term'] = $input['auc_term'];
        $data['auc_product_type'] = $input['auc_product_type'];
        $data['auc_industry'] = $input['auc_industry'];
        $data['auc_content'] = $input['auc_content'];
        $data['auc_price_type'] = $input['auc_price_type'];
        if($input['auc_price_type']==2){
            $data['auc_price'] = $input['goods_price_one'];
        }else{
            $data['auc_price'] = $input['goods_price'];
        }
        $data['user_id'] = 1;

        if($request->hasFile('upfile')){
            $file = $request->file('upfile');
            $allowed_extensions = ["png", "jpg", "gif","JPG"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            $picturePath = 'picture/pai/photo/';
            $pictureName = 'picture/pai/photo/'.date('YmdHis',time()).'.'.$extension;
            $file->move($picturePath,$pictureName);
            $data['auc_photo'] = $pictureName;
        }

        if($request->hasFile('protectphoto')){
            $file = $request->file('protectphoto');
            $allowed_extensions = ["png", "jpg", "gif","JPG"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            $picturePath = 'picture/pai/product/';
            $pictureName = 'picture/pai/product/'.date('YmdHis',time()).'.'.$extension;
            $file->move($picturePath,$pictureName);
            $data['auc_product_display'] = $pictureName;
        }



        $Ren = new Pai();
        $id = $Ren->auctionInsert($data);
        //echo $id;

        $extent['auc_id'] = $id;
        $extent['con_phone'] = $input['auc_phone'];
        $extent['con_wechat'] = $input['auc_wechat'];
        $extent['con_qqnumber'] = $input['auc_qqnumber'];
        $extent['con_email'] = $input['auc_email'];

        $Ren = new Pai();
        $id = $Ren->contactInsert($extent);
        echo $id;
    }
}