<?php
namespace Home\Service;

use Home\Logic\ProjectAudtiLogic;
use Home\Mapper\ProjectAuditMapper;
use Home\Logic\ProjectLogic;
use Think\Model;
class ProjectAuditService extends BaseService{
	private $_projectLogic = null;
	public function __construct(){
		parent::__construct();
		$this->_logic = new ProjectAudtiLogic();
		$this->_mapper = new ProjectAuditMapper();
		$this->_projectLogic = new ProjectLogic();
	}
	
	public function auditIt(\stdClass $projectAudit){
		$model = new Model();
		$model->startTrans();
		
		$flag=false;
		$project = new \stdClass();
		$project->id = $projectAudit->pro_id;
		$project->pro_publish_status = $projectAudit->new_publish_status;
		$projectResult = $this->_projectLogic->update($project);
		$auditResult = $this->_logic->add($projectAudit);
		
		if($projectResult && $auditResult){
			$flag = true;
			$model->commit();
		}else{
			$model->rollback();
		}
		return $flag ?	parent::success() :parent::failed();
	}
}