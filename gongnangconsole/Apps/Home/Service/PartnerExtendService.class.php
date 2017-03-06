<?php
namespace Home\Service;

use Home\Logic\PartnerExtendLogic;
use Home\Mapper\JobMapper;
use Home\Logic\VJobDeliversLogic;
use Home\Logic\JobInvitedLogic;
/**
 * 合伙人职位业务逻辑类
 * @author lizq
 * 
 */
class PartnerExtendService extends BaseService{
	private $_vJobDeliversLogic = null;
	private $_jobInvitedLogic = null;
	public function __construct(){
		parent::__construct();
		$this->_logic = new PartnerExtendLogic(new JobMapper());
		$this->_vJobDeliversLogic = new VJobDeliversLogic(null);
		$this->_jobInvitedLogic = new JobInvitedLogic(null);
	}	
	
	/**
	 * 投递信息记录
	 * @param unknown $id
	 */
	public function getDelivers($id){
		$conditions = array(array('extend_id'=>array('eq', $id)));
		return $this->_vJobDeliversLogic->findAll($conditions);
	}
	
	/**
	 * 面试邀请
	 * @param unknown $invited_id
	 */
	public function getInvited($invited_id){
		return $this->_jobInvitedLogic->getById($invited_id);
	}
}