<?php
namespace Home\Service;

use Home\Logic\PartnerExtendLogic;
use Home\Mapper\JobMapper;
/**
 * 合伙人职位业务逻辑类
 * @author lizq
 * 
 */
class PartnerExtendService extends BaseService{
	public function __construct(){
		parent::__construct();
		$this->_logic = new PartnerExtendLogic(new JobMapper());
	}	
}