<?php

namespace Home\Logic;

use Think\Model;
use Home\Model\ProjectModel;
use Home\Mapper\IMapper;

class ProjectLogic extends BaseLogic {
	public function __construct(IMapper $_mapper) {
		$this->_repository = new ProjectModel ();
		$this->_mapper = $_mapper;
	}
	

}