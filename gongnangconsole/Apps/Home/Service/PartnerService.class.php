<?php

namespace Home\Service;

use Home\Logic\PartnerLogic;
use Home\Mapper\PartnerMapper;
class PartnerService extends BaseService {
	public function __construct(){
		parent::__construct();
		$this->_logic = new PartnerLogic(new PartnerMapper());
	}
}