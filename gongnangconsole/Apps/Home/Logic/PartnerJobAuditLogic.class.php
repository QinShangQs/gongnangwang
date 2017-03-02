<?php
namespace  Home\Logic;

use Think\Model;
use Home\Mapper\IMapper;
use Home\Model\PartnerJobAuditModel;

class PartnerJobAuditLogic extends BaseLogic{
	
	public function __construct(IMapper $_mapper){
		parent::__construct();
		$this->_repository = new PartnerJobAuditModel();
		$this->_mapper = $_mapper;
	}
}