<?php

namespace Home\Logic;

use Think\Model;
use Home\Model\ProjectExtendModel;
class ProjectExtendLogic extends BaseLogic {
	public function  __construct(){
		$this->_repository = new ProjectExtendModel();
	}
	
	public function getByName($userName){
		return $this->_repository->relation(true)->getByUserName($userName);
	}
}