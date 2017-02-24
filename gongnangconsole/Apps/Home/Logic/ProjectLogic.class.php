<?php

namespace Home\Logic;

use Think\Model;
use Home\Model\ProjectModel;

class ProjectLogic extends BaseLogic {
	public function __construct() {
		$this->_repository = new ProjectModel ();
	}
	

}