<?php
namespace Home\Logic;
use Think\Model;
use Home\Mapper\IMapper;
use Home\Model\PartnerModel;

class PartnerLogic extends BaseLogic{

	public function __construct(IMapper $_mapper){
		parent::__construct();
		$this->_repository = new PartnerModel();
		$this->_mapper = $_mapper;
	}
}