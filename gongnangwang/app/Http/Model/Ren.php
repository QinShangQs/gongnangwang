<?php

namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class Ren extends Model
{
    /**
     *
     * @合伙人insert
     * @wei
     * @2016-11-1
     */
    public function partnerInsert($data)
    {
        $id = DB::table('gon_partner')->insertGetId($data);
        return $id;
    }


    /**
     *
     * @合伙人附属表insert
     * @wei
     * @2016-11-5
     */
    public function partnerExtendInsert($data)
    {
        $id = DB::table('gon_partner_extend')->insertGetId($data);
        return $id;
    }

    /**
     *
     * @某个合伙人查询 按项目名称查询
     * @wei
     * @2016-11-5
     */
    public function partnerSelect($par_proname,$id){
        $users = DB::table('gon_partner')
            ->join('gon_userinfo','gon_partner.user_id','=','gon_userinfo.id')
            ->join('gon_partner_extend', 'gon_partner.id', '=', 'gon_partner_extend.par_id')
            ->where('gon_partner.par_proname', '=', $par_proname)
            ->where('gon_partner.id', '=', $id)
            ->select('gon_partner.id as pid','gon_partner.*','gon_userinfo.*')
            ->take(1)
            ->get();
        return $users;
    }

    public function extendParID($id)
    {
        $users = DB::table('gon_partner_extend')
            ->where('id', '=', $id)
            ->select('par_id')
            ->get();
        return $users;
    }


    //点击岗位 显示该条 json
    public function positionSelect($pid,$par_id)
    {
        $users = DB::table('gon_partner_extend')
            //->join('gon_partner_extend', 'gon_partner.id', '=', 'gon_partner_extend.par_id')
            ->where('gon_partner_extend.par_id', '=', $par_id)
            ->where('gon_partner_extend.id', '=', $pid)
            ->first();
        return $users;
    }

    //返回职位第一条
    public function positionFirst($par_id)
    {
        $users = DB::table('gon_partner_extend')
            ->where('gon_partner_extend.par_id', '=', $par_id)
            ->select('gon_partner_extend.id')
            ->first();
        return $users;
    }


    /*合伙人职位 按合伙人项目名称查询*/
    public function positionName($par_proname,$id)
    {
        $users = DB::table('gon_partner')
            ->join('gon_partner_extend', 'gon_partner.id', '=', 'gon_partner_extend.par_id')
            ->select('gon_partner_extend.id','gon_partner_extend.par_position')
            ->where('gon_partner.par_proname', '=', $par_proname)
            ->where('gon_partner.id', '=', $id)
            ->select('gon_partner_extend.id','gon_partner_extend.par_position')
            ->get();
        return $users;
    }


    /**
     *
     * @合伙人项目评论insert
     * @wei
     * @2016-11-11
     */
    public function partnerCommentInsert($data)
    {
        $id = DB::table('gon_partner_comment')->insertGetId($data);
        return $id;
    }


    /**
     *
     * @合伙人项目select
     * @wei
     * @2016-11-11
     */
    public function positionMoreSelect()
    {
        $users = DB::table('gon_partner_extend')
            ->join('gon_partner', 'gon_partner.id', '=', 'gon_partner_extend.par_id')
            ->select('gon_partner_extend.id','gon_partner_extend.par_position','gon_partner_extend.par_mode','gon_partner.par_protype','gon_partner.par_title','gon_partner.par_proname','gon_partner.par_address','gon_partner_extend.par_browse','gon_partner_extend.par_datetime')
            ->orderBy('gon_partner_extend.par_browse', 'desc')
            ->paginate(5);
        return $users;
    }

    //ren_p页面职位展示
    public function companyPositionSelect()
    {
        $users = DB::table('gon_partner_extend')
            ->join('gon_partner', 'gon_partner.id', '=', 'gon_partner_extend.par_id')
            ->select('gon_partner.par_finance','gon_partner_extend.id','gon_partner_extend.par_pay','gon_partner_extend.par_return','gon_partner_extend.par_position','gon_partner_extend.par_mode','gon_partner.par_protype','gon_partner.par_title','gon_partner.par_proname','gon_partner.par_address','gon_partner_extend.par_browse','gon_partner_extend.par_datetime','gon_partner_extend.par_work','gon_partner_extend.par_education')
            ->take(18)
            ->get();
        return $users;
    }


    /**
     *
     * @合伙人首页8条数据
     * @wei
     * @2016-11-11
     */
    public function partnerIndexSelect()
    {
        $users = DB::table('gon_userinfo')
           /* ->join('gon_userinfo', 'gon_partner.user_id', '=', 'gon_userinfo.id')
            ->select('gon_userinfo.nickname','gon_userinfo.identity','gon_userinfo.worklife','gon_userinfo.photo','gon_partner.par_proname','gon_partner.par_address','gon_partner.par_protype','gon_partner.par_logo')*/
            ->take(8)
            ->get();

        return $users;
    }

    /**
     *
     * @ren_s首页12条数据
     * @wei
     * @2016-11-22
     */
    public function ren_sSelect()
    {
        $users = DB::table('gon_userinfo')
                ->take(12)
                ->get();
        return $users;
    }


    public function partnerPosition($user_id)
    {
         $data = DB::table('gon_partner')
             ->join('gon_userinfo','gon_userinfo.id','=','gon_partner.user_id')
             ->join('gon_partner_extend','gon_partner_extend.par_id','=','gon_partner.id')
             ->where('gon_userinfo.user_id','=',$user_id)
             ->select('gon_partner_extend.*','par_position','par_duty','gon_partner.par_proname')
             //->take(4)
             ->orderby('gon_partner_extend.id','desc')
             ->get();
        return $data;
    }

    /*合伙人职位删除*/

    public function position_delete($pos_id)
    {
         return DB::table('gon_partner_extend')->where('id', '=', $pos_id)->delete();
    }

    /*合伙人修改职位修改*/
    public function position_per($pos_id)
    {
        $data = DB::table('gon_partner_extend')
            ->where('id', '=' , $pos_id)
            ->get();
        return $data;
    }

    /**
     * 合伙人职位先上状态修改
     * @param unknown $pos_id
     * @param unknown $line_status 新的下上状态
     * @return unknown
     */
    public function jobLineStatusUpdate($pos_id , $line_status)
    {
    
    	$res = DB::table('gon_partner_extend')
    	->where('id','=', $pos_id)
    	->update(['line_status' => $line_status ]);
    	return $res;
    }

    /*合伙人职位修改*/
    public function partnerExtendUpdate($extend)
    {

        $res = DB::table('gon_partner_extend')
                ->where('id','=', $extend['pos_id'])
                ->update(['par_position' => $extend['par_position'] , 'par_work'=>$extend['par_work'] , 'par_education'=>$extend['par_education'] , 'par_age'=>$extend['par_age'] , 'par_mode'=>$extend['par_mode'] ,
                		'par_pay_type'=>$extend['par_pay_type'] , 'par_pay'=>$extend['par_pay'] , 'par_return_type'=>$extend['par_return_type'] 
                		, 'par_return'=>$extend['par_return'] , 'par_duty'=>$extend['par_duty'] , 'par_ask'=>$extend['par_ask'] 
                		, 'par_datetime'=>$extend['par_datetime'] , 'par_id'=>$extend['par_id']
                		, 'publish_status'=>$extend['publish_status']
                ]);
        return $res;
    }


    //合伙人项目查询一条数据
    public function partnerUpdate($user_id)
    {
        $res = DB::table('gon_partner')
            ->join('gon_userinfo', 'gon_partner.user_id', '=', 'gon_userinfo.id')
            ->join('gon_user', 'gon_user.id', '=', 'gon_userinfo.user_id')
            ->where('gon_user.id' , '=' , $user_id)
            ->select('gon_partner.id as pid','gon_partner.*')
            ->get();
        return $res;
    }


    //合伙人修改处理
    public function partnerUpdateDo($data)
    {
        $res = DB::table('gon_partner')
            ->where('id','=', $data['id'])
            ->update(['par_title' => $data['par_title'] , 'par_proname'=>$data['par_proname'] , 'par_protype'=>$data['par_protype'] , 'par_website'=>$data['par_website'] ,
                'par_team'=>$data['par_team'] , 'par_finance'=>$data['par_finance'] , 'par_address'=>$data['par_address'] , 'par_logo'=>$data['par_logo'] , 'par_video'=>$data['par_video'] ,
                'par_datetime'=>$data['par_datetime'] , 'user_id'=>$data['user_id']
            ]);

        return $res;
    }


    //user页面职位展示
    public function UserpartnerPosition($user_name)
    {
        $res = DB::table('gon_userinfo')
            ->join('gon_partner', 'gon_partner.user_id', '=', 'gon_userinfo.id')
            ->join('gon_partner_extend','gon_partner_extend.par_id','=','gon_partner.id')
            ->where('nickname' , '=' , $user_name)
            ->select('gon_partner_extend.id','gon_partner_extend.par_position','gon_partner_extend.par_mode','gon_partner.par_protype','gon_partner.par_title','gon_partner.par_proname','gon_partner.par_logo','gon_partner.par_address','gon_partner_extend.par_browse','gon_partner_extend.par_datetime')
            ->take(4)
            ->get();
        return $res;
    }


    public function UserIDpartnerPosition($id)
    {
        $res = DB::table('gon_userinfo')
            ->join('gon_user', 'gon_userinfo.user_id', '=', 'gon_user.id')
            ->join('gon_partner', 'gon_partner.user_id', '=', 'gon_userinfo.id')
            ->join('gon_partner_extend','gon_partner_extend.par_id','=','gon_partner.id')
            ->where('gon_user.id', '=', $id)
            ->select('gon_partner_extend.id','gon_partner_extend.par_position','gon_partner_extend.par_mode','gon_partner.par_protype','gon_partner.par_title','gon_partner.par_proname','gon_partner.par_logo','gon_partner.par_address','gon_partner_extend.par_browse','gon_partner_extend.par_datetime')
            ->take(4)
            ->get();
        return $res;
    }

    //一个用户只能发布一个合伙人项目
    public function partnerOne($user_id)
    {
        $res = DB::table('gon_partner')
            ->join('gon_userinfo', 'gon_partner.user_id', '=', 'gon_userinfo.id')
            ->join('gon_user', 'gon_user.id', '=', 'gon_userinfo.user_id')
            ->where('gon_user.id', '=', $user_id)
            ->select('gon_partner.par_title')
            ->get();
        return $res;
    }

    //一个用户只能发布一个合伙人项目
    public function partnerByUserId($user_id)
    {
    	$res = DB::table('gon_partner')
    	->join('gon_userinfo', 'gon_partner.user_id', '=', 'gon_userinfo.id')
    	->join('gon_user', 'gon_user.id', '=', 'gon_userinfo.user_id')
    	->where('gon_user.id', '=', $user_id)
    	->select('gon_partner.*')
    	->first();
    	return $res;
    }
    
    public function countJobsByParId($par_id){
    	$count = DB::table('gon_partner_extend')
    	->where('gon_partner_extend.par_id', '=', $par_id)
    	->count();
    	
    	return $count;
    }

    //ren  职位ajax分页
    public function position_page($page=1,$number=5)
    {
        $count = DB::table('gon_partner_extend')->count();

        $page_count = ceil($count/$number);

        if ($page<=0) {
            $page = 1;
        }
        if ($page>$page_count) {
            $page = $page_count;
        }

        $start = ($page-1)*$number;

        $res = DB::table('gon_partner_extend')
            ->join('gon_partner', 'gon_partner.id', '=', 'gon_partner_extend.par_id')
            ->select('gon_partner_extend.id','gon_partner_extend.par_position','gon_partner_extend.par_mode','gon_partner.par_protype','gon_partner.par_title','gon_partner.par_proname','gon_partner.par_address','gon_partner_extend.par_browse','gon_partner_extend.par_datetime')
            ->offset($start)
            ->limit($number)
            ->get();

        return ['res' => $res, 'page_count' => $page_count];
    }
}