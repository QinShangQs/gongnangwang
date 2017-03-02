<?php
namespace  Home\Logic;

use Think\Model;
use Home\Model\PartnerExtendModel;
use Home\Mapper\IMapper;

class PartnerExtendLogic extends BaseLogic{
	
	public function __construct(IMapper $_mapper){
		parent::__construct();
		$this->_repository = new PartnerExtendModel();
		$this->_mapper = $_mapper;
	}
}