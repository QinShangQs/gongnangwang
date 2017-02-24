<?php

namespace Home\Controller;

use Home\Service\ProjectService;
use Home\Service\ProjectAuditService;

class ProjectController extends BaseController {
	private $_service = null;
	private $_auditService = null;
	public function __construct() {
		parent::__construct ();
		$this->_service = new ProjectService ();
		$this->_auditService = new ProjectAuditService();
	}
	public function index() {
		$this->display ();
	}
	public function search($key,$publish_status,$limit, $page) {
		$conditions = array();
		if($publish_status > 0){
			$conditions['pro_publish_status'] = array('eq',$publish_status);
		}
		$conditions['_string'] = "pro_name like '%{$key}%' or pro_content like '%{$key}%' or pro_address like '%{$key}%'";
		$result = $this->_service->search ($conditions, $limit, $page );
		$this->ajaxReturn ( $result );
	}
	
	public function detail($id){
		$inst = $this->_service->getById($id);
		$this->assign('inst', $inst);
		$this->display();
	}
	
	public function audit($id){
		$inst = $this->_service->getById($id);
		$this->assign('inst', $inst);
		$this->display();
	}
	
	public function doAudit(){
		$std = parent::_getPostStd();
		$result = $this->_auditService->auditIt($std);
		$result->success ? $this->_ajax_success('操作成功',$std):$this->_ajax_failed('操作失败',$std);
		
	}
}