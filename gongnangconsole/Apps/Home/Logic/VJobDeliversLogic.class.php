<?php

namespace Home\Logic;
use Think\Model;
use Home\Mapper\IMapper;
use Home\Model\VJobDeliversModel;

class VJobDeliversLogic extends BaseViewLogic{

	public function __construct(IMapper $_mapper){
		parent::__construct();
		$this->_repository = new VJobDeliversModel();
		$this->_mapper = $_mapper;
	}
}