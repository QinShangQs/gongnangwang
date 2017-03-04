<?php

namespace Home\Logic;

use Think\Model;

class BaseLogic {
	protected $_repository = null;
	protected $_mapper = null;
	
	public function __construct(){
		
	}
	
	public function getById($id) {
		$inst = $this->_repository->relation ( true )->getById ( $id );
		if(!empty($this->_mapper)){
			$inst = $this->_mapper->tranlate($inst,false);
		}
		return $inst;
	}
	public function add(\stdClass $instance) {
		return $this->_repository->data ( $instance )->add ();
	}
	public function update(\stdClass $instance) {
		return $this->_repository->data ( $instance )->save ();
	}
	public function remove($id) {
		return $this->_repository->delete ( $id );
	}
	public function removes($conditions){
		return $this->_repository->where($conditions)->delete();
	}
	public function findAll($conditions = array(),$orderby = 'id asc') {
		$result = $this->_repository->where ( $conditions )->relation ( true )->order($orderby)->select ();
		if(!empty($this->_mapper)){
			$result = $this->_mapper->tranlate($result,true);
		}
		return $result;
	}
	
	public function countByProperty($propertyName, $value, $oper = 'eq') {
		$conditions [$propertyName] = array (
				$oper,
				$value
		);
		return $this->_repository->where($conditions)->count();
	}
	
	/**
	 * 从表中获取一部分字段值列构成的数组
	 * @param unknown $fields 字段 如"id,name"
	 * @param unknown $condtions 条件数组
	 * @param number $limit 限制数量
	 */
	public function getFieldsBy($fields ,array $condtions , $limit = 1, $order = 'id desc'){
		return $this->_repository->where($condtions)
		->field($fields)->order ( $order )->limit($limit)->select();
	}	
	
	public function getByProperty($propertyName, $value, $oper = 'eq', $order = 'id desc') {
		$conditions [$propertyName] = array (
				$oper,
				$value 
		);
		
		$result = $this->findAll ( $conditions ,$order);
		if(!empty($result)){
			return $result[0];
		}
		return $result;
	}
	public function pagein($conditions = array (), $rows = 10, $page = 1,$order = 'id desc') {
		$startRow = $rows * ($page - 1);
		$count = $this->_repository->where ( $conditions )->count ();
		$data = $this->_repository->relation ( true )->where ( $conditions )->order ( $order )->limit ( $startRow, $rows )->select ();
		if (empty ( $data ))
			$data = array ();

		$result = array (
				'total' => $count,
				'data' => $data ,
				'page' => $page,
				'limit' => $rows
		);
		
		if(!empty($this->_mapper)){
			$result['data'] = $this->_mapper->tranlate($result['data'],true);
		}
		
		return $result;
	}
}