<?php

namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class Chou extends Model
{

    /**
     *
     * @项目资料insert
     * @wei
     * @2016-11-1
     */
    public function projectInsert($data)
    {
        $id = DB::table('gon_project')->insertGetId($data);
        return $id;
    }

    /**
     *
     * @项目select
     * @author lizq
     * @since 20170219
     */
    public function getByProjectId($project_id)
    {
    	$users = DB::table('gon_project')
    	->join('gon_project_extend', 'gon_project.id', '=', 'gon_project_extend.pro_id')
    	->join('gon_userinfo', 'gon_project.user_id', '=', 'gon_userinfo.id')
    	->where('gon_project.id', '=', $project_id)
    	->get();
    	return $users;
    }

    /**
     *
     * @项目select
     * @wei
     * @2016-11-1
     */
    public function projectSelect($pro_name)
    {
        $users = DB::table('gon_project')
            ->join('gon_project_extend', 'gon_project.id', '=', 'gon_project_extend.pro_id')
            ->join('gon_userinfo', 'gon_project.user_id', '=', 'gon_userinfo.id')
            ->where('gon_project.pro_name', '=', $pro_name)
            ->get();
        return $users;
    }


    /**
     *
     * @众筹项目附属表insert
     * @wei
     * @2016-11-1
     */
    public function projectExtendInsert($extent)
    {
        $id = DB::table('gon_project_extend')->insertGetId($extent);
        return $id;
    }

    /**
     *
     * @众筹项目附属表insert
     * @wei
     * @2016-11-1
     */
    public function chouSelect()
    {
        $users = DB::table('gon_project')
           // ->join('gon_project_extend', 'gon_project.id', '=', 'gon_project_extend.pro_id')
            ->join('gon_userinfo', 'gon_project.user_id', '=', 'gon_userinfo.id')
            ->select('gon_project.id','gon_project.pro_name','gon_project.pro_publish_status','gon_project.pro_logo','gon_project.pro_target','gon_project.pro_state','gon_userinfo.nickname')
            //->skip(2)
            ->take(8)
            ->where('gon_project.pro_publish_status','=','2')//发布成功状态
            ->orderBy('gon_project.id', 'desc')
            ->get();
        return $users;
    }


    /**
     *
     * @众筹项目附属表insert
     * @wei
     * @2016-11-1
     */
    public function myChouSelect($id)
    {
        $users = DB::table('gon_userinfo')
             ->join('gon_user', 'gon_userinfo.user_id', '=', 'gon_user.id')
             ->join('gon_project', 'gon_project.user_id', '=', 'gon_userinfo.id')
             ->select('gon_project.id','gon_project.pro_name','gon_project.pro_logo','gon_project.pro_publish_status','gon_userinfo.identity')
             ->where('gon_user.id', '=', $id)
             ->take(4)
             ->get();
        
        foreach ($users as $k=>$v){
        	$audit = DB::table('gon_project')
        	->leftJoin('gon_project_audit','gon_project_audit.pro_id', '=', 'gon_project.id')
        	->select('gon_project_audit.*')
        	->where('gon_project.pro_publish_status','=','3')
        	->orderBy('gon_project_audit.id','desc')
        	->first();
        	
        	if($audit != null){
        		$users[$k]->publish_status_remark =$audit->remark;
        	}

        }
        return $users;
    }


    /**
     *
     * @众筹项目附属表insert
     * @wei
     * @2016-11-1
     */
    public function userChouSelect($id)
    {
        $users = DB::table('gon_userinfo')
            ->join('gon_user', 'gon_userinfo.user_id', '=', 'gon_user.id')
            ->join('gon_project', 'gon_project.user_id', '=', 'gon_userinfo.id')
            ->select('gon_project.pro_name','gon_project.pro_logo')
            ->where('gon_user.id', '=', $id)
            ->take(1)
            ->get();
        return $users;
    }


    /**
     *
     * @users众筹项目
     * @wei
     * @2016-11-1
     */
    public function usersChouSelect($user_name)
    {
        $users = DB::table('gon_userinfo')
            ->join('gon_project', 'gon_project.user_id', '=', 'gon_userinfo.id')
            ->select('gon_project.pro_name','gon_project.pro_logo')
            ->where('gon_userinfo.nickname', '=', $user_name)
            ->take(1)
            ->get();
        return $users;
    }


    /**
     *
     * @众筹项目修改页展示
     * @wei
     * @2016-12-1
     */
    public function updateChouPer($pro_name)
    {
        $users = DB::table('gon_project')
            ->join('gon_project_extend', 'gon_project.id', '=', 'gon_project_extend.pro_id')
            ->where('gon_project.pro_name', '=', $pro_name)
            ->select('gon_project.id as pid','gon_project.*' , 'gon_project_extend.*')
            ->get();
        return $users;
    }


    /**
     *
     * @根据ID查众筹一条数据
     * @wei
     * @2016-12-1
     */
    public function ChouID($chou_id)
    {
        $users = DB::table('gon_project')
            ->join('gon_project_extend', 'gon_project.id', '=', 'gon_project_extend.pro_id')
            ->where('gon_project.id', '=', $chou_id)
            ->get();
        return $users;
    }

    /**
     *
     * @众筹项目修改处理
     * @wei
     * @2016-12-1
     */
    public function updateChouDo($data)
    {
        $users = DB::table('gon_project')
            ->where('gon_project.id', '=', $data['id'])
            ->update(['pro_name'=>$data['pro_name'],'pro_logo'=>$data['pro_logo'],'pro_content'=>$data['pro_content'],'pro_address'=>$data['pro_address'],'pro_state'=>$data['pro_state'],
                'pro_stage'=>$data['pro_stage'],'pro_valuation'=>$data['pro_valuation'],'pro_return'=>$data['pro_return'],'pro_target'=>$data['pro_target'],'pro_value'=>$data['pro_value'],
                'pro_type'=>$data['pro_type'],'pro_advisor'=>$data['pro_advisor'],'pro_advisornum'=>$data['pro_advisornum'],'pro_picture'=>$data['pro_picture'],'user_id'=>$data['user_id']
            ]);

        $extent = DB::table('gon_project_extend')
            ->where('pro_id', '=', $data['id'])
            ->update(['bus_userdata'=>$data['bus_userdata'],'bus_profit'=>$data['bus_profit'],'bus_other'=>$data['bus_other'],'bus_operate'=>$data['bus_operate'],'bus_video'=>$data['bus_video'],
                'tea_core'=>$data['tea_core'],'tea_num'=>$data['tea_num'],'tea_tutor'=>$data['tea_tutor'],'tea_adviser'=>$data['tea_adviser'],'tea_video'=>$data['tea_video'],
                'roa_guest'=>$data['roa_guest'],'roa_video'=>$data['roa_video'],'att_name'=>$data['att_name'],'pro_datetime'=>$data['pro_datetime'],'pro_id'=>$data['pro_id']
            ]);

        if($users){
            return 2;
        }
        if($extent){
            return 1;
        }
    }


    //限制一个用户只能发布一个众筹
    public function ChouOneSelect($user_id)
    {
        $users = DB::table('gon_project')
            ->join('gon_userinfo', 'gon_project.user_id', '=', 'gon_userinfo.id')
            ->join('gon_user', 'gon_user.id', '=', 'gon_userinfo.user_id')
            ->where('gon_user.id', '=', $user_id)
            ->select('gon_project.pro_name')
            ->get();
        return $users;
    }
}