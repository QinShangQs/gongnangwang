<?php
namespace Home\Service;

use Home\Logic\PartnerExtendLogic;
use Home\Mapper\JobMapper;
use Home\Logic\VJobDeliversLogic;
/**
 * 合伙人职位业务逻辑类
 * @author lizq
 * 
 */
class PartnerExtendService extends BaseService{
	private $_vJobDeliversLogic = null;
	public function __construct(){
		parent::__construct();
		$this->_logic = new PartnerExtendLogic(new JobMapper());
		$this->_vJobDeliversLogic = new VJobDeliversLogic(null);
	}	
	
	/**
	 * 投递信息记录
	 * @param unknown $id
	 */
	public function getDelivers($id){
		$conditions = array(array('extend_id'=>array('eq', $id)));
		return $this->_vJobDeliversLogic->findAll($conditions);
	}
}