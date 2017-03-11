<?php

namespace App\Http\Model;

use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

/**
 * 岗位投递记录模型
 * 
 * @author lizq
 *         2017-03-04
 */
class JobDelivers extends Model {
	private $_table = "gon_job_delivers";
	public function insert($data) {
		$id = DB::table ( $this->_table )->insertGetId ( $data );
		return $id;
	}
	
	/**
	 * 获取用户是否投递过此岗位记录
	 * @param unknown $job_id @see PartnerExtend.id
	 * @return array
	 */
	public function getByJobId($job_id, $user_id) {
		$inst = DB::table ($this->_table )
			->where ( ['extend_id'=> $job_id, 'user_id'=> $user_id] )
			->first ();
		return $inst;
	}
	
	/**
	 * 我的投递记录
	 * @param unknown $user_id
	 */
	public function getMyDelivers($user_id)	{
		$datas = DB::table('gon_partner_extend as job')
		->select("job.par_position","par.par_proname","par.par_title","vjd.*")
		->join('gon_partner as par', 'par.id', '=', 'job.par_id')
		->join('gon_v_job_delivers as vjd', 'vjd.extend_id', '=', 'job.id')
		->where('vjd.account_id', '=', $user_id)
		->orderby('vjd.add_time','desc')
		->get();
		return $datas;
	}
	
	/**
	 * 岗位投递记录列表
	 * @param unknown $exntend_id
	 */
	public function getPositionDelivers($exntend_id){
		$datas = DB::table("gon_job_delivers as jd")
			->select("ui.*","u.user_name as phone","jd.id as deliver_id","jd.invited_id","jd.add_time as deliver_time","jiv.*")
			->join("gon_user as u","u.id","=","jd.user_id")
			->join("gon_userinfo as ui","ui.user_id","=","u.id")
			->leftJoin("gon_job_invited as jiv","jiv.job_deliver_id","=","jd.id")
			->where("jd.extend_id","=",$exntend_id)
			->orderby("jd.add_time","desc")
			->get();
		return $datas;
	}
	
	public function changeInvitedId($id, $invited_id){
		$res = DB::table($this->_table)
			->where('id', '=', $id)
			->update(['invited_id'=>$invited_id	]);
		return $res;
	}
	
}