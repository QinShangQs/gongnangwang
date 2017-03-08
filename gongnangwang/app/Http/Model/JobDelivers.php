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
	
	public function getMyDelivers($user_id)	{
		$users = DB::table('gon_partner_extend as job')
		->select("job.par_position","par.par_proname","par.par_title","vjd.*")
		->join('gon_partner as par', 'par.id', '=', 'job.par_id')
		->join('gon_v_job_delivers as vjd', 'vjd.extend_id', '=', 'job.id')
		->where('vjd.account_id', '=', $user_id)
		->orderby('vjd.add_time','desc')
		->get();
		return $users;
	}
}