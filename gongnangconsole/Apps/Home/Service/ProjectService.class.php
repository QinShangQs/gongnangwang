<?php
namespace Home\Service;

use Home\Logic\ProjectLogic;
use Home\Mapper\ProjectMapper;
class ProjectService extends BaseService{
	public function __construct(){
		parent::__construct();
		$this->_logic = new ProjectLogic();
		$this->_mapper = new ProjectMapper();
	}
	
}