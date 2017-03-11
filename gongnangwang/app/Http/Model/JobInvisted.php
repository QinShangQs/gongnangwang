<?php

namespace App\Http\Model;

use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

/**
 * 岗位面试邀请模型
 * 
 * @author lizq
 *         2017-03-08
 */
class JobInvisted extends Model {
	private $_table = "gon_job_invited";
	public function insert($data) {
		$id = DB::table ( $this->_table )->insertGetId ( $data );
		return $id;
	}
	
	public function add($data){
		$id = DB::table($this->_table)->insertGetId($data);
		return $id;
	}

	public function getById($id) {
		$inst = DB::table ($this->_table )
			->where ( ['id'=> $id] )
			->first ();
		return $inst;
	}

}