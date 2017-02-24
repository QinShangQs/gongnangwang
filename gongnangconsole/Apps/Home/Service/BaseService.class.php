<?php

namespace Home\Service;

use Think\Model;

class BaseService {
	protected $_logic = null;
	protected $_mapper = null;
	const _SUCCESS = 0;
	const _FAILED = 1;
	public function __construct() {
	}
	public function getById($id) {
		$inst = $this->_logic->getById ( $id );
		if(!empty($this->_mapper)){
			$inst = $this->_mapper->tranlate($inst,false);
		}
		return $inst;
	}
	public function search(array $conditions, $rows, $page, $order = 'id desc') {
		$result = $this->_logic->pagein ( $conditions, $rows, $page, $order );
		if(!empty($this->_mapper)){
			$result['data'] = $this->_mapper->tranlate($result['data'],true);
		}
		return $result;
	}
	public function findBy(array $conditions) {
		$result = $this->_logic->findAll ( $conditions );
		if(!empty($this->_mapper)){
			$result = $this->_mapper->tranlate($result,true);
		}
		return $result;
	}
	public function findAll() {
		$result = $this->_logic->findAll ();
		if(!empty($this->_mapper)){
			$result = $this->_mapper->tranlate($result,true);
		}
		return $result;
	}
	protected function result($code, $msg, $data = array()) {
		$std = new \stdClass ();
		$std->code = $code;
		$std->success = $code == 0;
		$std->msg = $msg;
		
		if (! empty ( $data )) {
			foreach ( $data as $key => $val ) {
				$std->$key = $val;
			}
		}
		return $std;
	}
	protected function success($data = array(), $msg = '操作成功！') {
		return $this->result ( self::_SUCCESS, $msg, $data );
	}
	protected function failed($msg = '操作失败！') {
		return $this->result ( self::_FAILED, $msg );
	}
}