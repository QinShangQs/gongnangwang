<?php

namespace Home\Logic;
use Think\Model;
use Home\Model\ProjectAuditModel;
class ProjectAudtiLogic extends BaseLogic{
	public function __construct(){
		$this->_repository = new ProjectAuditModel();
	}
}