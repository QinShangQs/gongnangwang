<?php

namespace Home\Logic;
use Think\Model;
use Home\Model\ProjectAuditModel;
use Home\Mapper\IMapper;
class ProjectAudtiLogic extends BaseLogic{
	
	public function __construct(IMapper $_mapper) {
		$this->_repository = new ProjectAuditModel ();
		$this->_mapper = $_mapper;
	}
}