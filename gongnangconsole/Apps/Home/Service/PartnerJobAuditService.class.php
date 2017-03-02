<?php
namespace Home\Service;


use Think\Model;
use Home\Logic\PartnerJobAuditLogic;
use Home\Mapper\PartnerJobAuditMapper;
use Home\Logic\PartnerExtendLogic;
use Home\Mapper\JobMapper;
class PartnerJobAuditService extends BaseService{
	private $_partnerExtendtLogic = null;
	public function __construct(){
		parent::__construct();
		$this->_logic = new PartnerJobAuditLogic(new PartnerJobAuditMapper());
		$this->_partnerExtendtLogic = new PartnerExtendLogic(new JobMapper());
	}
	
	public function auditIt(\stdClass $instance){
		$model = new Model();
		$model->startTrans();
		
		$flag=null;
		$parent = new \stdClass();
		$parent->id = $instance->extend_id;
		$parent->publish_status = $instance->new_publish_status;
		$parentResult = $this->_partnerExtendtLogic->update($parent);
		$auditResult = $this->_logic->add($instance);
		
		if($parentResult && $auditResult){
			$flag = true;
			$model->commit();
		}else{
			$flag = null;
			$model->rollback();
		}

		return $flag !== false ? parent::success() :parent::failed();
	}
}