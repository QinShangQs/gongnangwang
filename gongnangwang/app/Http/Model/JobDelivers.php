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
}