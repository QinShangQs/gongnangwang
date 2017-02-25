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
	
	public function getOpers($pro_id, $pro_publish_status){
		switch ($pro_publish_status){
			case _PRO_PUB_STATUS_COMMIT:
				echo '<a style="text-decoration:none" onclick="layer_show(\'众筹明细\',\''.U('project/audit').'?id='.$pro_id.'\',600,400)" href="#" title="审核">审核</a>';
				break;
			case _PRO_PUB_STATUS_RECOMMIT:
			case _PRO_PUB_STATUS_FAILED:
				echo '<a style="text-decoration:none" onclick="layer_show(\'众筹明细\',\''.U('project/audit').'?id='.$pro_id.'\',600,400)" href="#" title="重新审核">重审</a>&nbsp;&nbsp;'
						.'<a style="text-decoration:none" onclick="layer_show(\'审核历史\',\''.U('project/auditlist').'?id='.$pro_id.'\',400,250)" href="#" title="审核历史"><i class="Hui-iconfont">&#xe6b6;</i></a>';
				break;
			case _PRO_PUB_STATUS_SUCCESS:
			default:
				echo '<a style="text-decoration:none" onclick="layer_show(\'审核历史\',\''.U('project/auditlist').'?id='.$pro_id.'\',400,250)" href="#" title="审核历史"><i class="Hui-iconfont">&#xe6b6;</i></a>';;
				break;
		}
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
	
	public function auditList($id){
		$conditions['pro_id'] = array('eq', $id);
		$datas = $this->_auditService->findBy($conditions, 'id desc');
		$this->assign('datas', $datas);
		$this->display();
	}
	
}