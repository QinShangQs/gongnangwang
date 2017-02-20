<?php
namespace Home\Service;

use Home\Logic\ProjectLogic;
class ProjectService extends BaseService{
	public function __construct(){
		parent::__construct();
		$this->_logic = new ProjectLogic();
	}
	
}