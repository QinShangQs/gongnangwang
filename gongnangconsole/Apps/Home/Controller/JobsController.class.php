<?php

namespace Home\Controller;

use Home\Service\PartnerExtendService;
use Home\Service\PartnerJobAuditService;

class JobsController extends BaseController {
	private $_service = null;
	private $_auditService = null;
	public function __construct() {
		parent::__construct ();
		$this->_service = new PartnerExtendService ();
		$this->_auditService = new PartnerJobAuditService ();
	}
	public function index() {
		$this->display ();
	}
	public function search($key, $publish_status, $limit, $page) {
		$conditions = array ();
		if ($publish_status > 0) {
			$conditions ['publish_status'] = array (
					'eq',
					$publish_status 
			);
		}
		$conditions ['_string'] = "par_position like '%{$key}%'";
		
		$result = $this->_service->search ( $conditions, $limit, $page );
		$this->ajaxReturn ( $result );
	}
	public function detail($id) {
		$inst = $this->_service->getById ( $id );
		$this->assign ( 'inst', $inst );
		$this->display ();
	}
	public function lists($id) {
		$conditions = array ();
		$conditions ['par_id'] = array (
				'eq',
				$id 
		);
		$datas = $this->_service->findBy ( $conditions );
		$this->assign ( 'datas', $datas );
		$this->display ();
	}
	public function getOpers($pro_id, $publish_status) {
		$prefix = __CONTROLLER__;
		switch ($publish_status) {
			case _JOB_PUB_STATUS_COMMIT :
				echo '<a style="text-decoration:none" onclick="layer_show(\'审核\',\'' .  $prefix. '/audit?id=' . $pro_id . '\',600,400)" href="#" title="审核">审核</a>';
				break;
			case _JOB_PUB_STATUS_RECOMMIT :
			case _JOB_PUB_STATUS_REFUSE :
				echo '<a style="text-decoration:none" onclick="layer_show(\'审核明细\',\'' . $prefix . '/audit?id=' . $pro_id . '\',600,400)" href="#" title="重新审核">重审</a>&nbsp;&nbsp;' . '<a style="text-decoration:none" onclick="layer_show(\'审核历史\',\'' . $prefix . '/auditlist?id=' . $pro_id . '\',400,250)" href="#" title="审核历史"><i class="Hui-iconfont">&#xe6b6;</i></a>';
				break;
			case _JOB_PUB_STATUS_PASS :
			default :
				echo '<a style="text-decoration:none" onclick="layer_show(\'审核历史\',\'' . $prefix . '/auditlist?id=' . $pro_id . '\',400,250)" href="#" title="审核历史"><i class="Hui-iconfont">&#xe6b6;</i></a>';
				;
				break;
		}
	}
	public function audit($id) {
		$inst = $this->_service->getById ( $id );
		$this->assign ( 'inst', $inst );
		$this->display ();
	}
	public function doAudit() {
		$std = parent::_getPostStd ();
		$result = $this->_auditService->auditIt ( $std );
		$result->success ? $this->_ajax_success ( '操作成功', $std ) : $this->_ajax_failed ( '操作失败', $std );
	}
	public function auditList($id) {
		$conditions ['pro_id'] = array (
				'eq',
				$id 
		);
		$datas = $this->_auditService->findBy ( $conditions, 'id desc' );
		$this->assign ( 'datas', $datas );
		$this->display ();
	}
}