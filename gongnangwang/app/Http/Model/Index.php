<?php

namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    /**
     *
     * @首页数据查询
     * @wei
     * @2016-11-21
     */
    public function proSelect()
    {
        $users = DB::table('gon_project')
            ->join('gon_project_extend', 'gon_project.id', '=', 'gon_project_extend.pro_id')
            //->skip(2)
            ->take(8)            
            ->select('gon_project.id','gon_project.pro_name','gon_project.pro_logo')
            ->where('gon_project.pro_publish_status','=','2')//发布成功状态
            ->orderBy('gon_project.id', 'desc')
            ->get();
        return $users;
    }


    public function parSelect()
    {
        $users = DB::table('gon_partner')
            ->join('gon_userinfo', 'gon_partner.user_id', '=', 'gon_userinfo.id')
            //->skip(2)
            ->take(4)
            ->select('gon_partner.par_logo','gon_partner.par_proname','gon_userinfo.nickname','gon_userinfo.photo')
            ->get();
        return $users;
    }
}