<?php

namespace Home\Controller;

use Home\Service\ProjectService;

class ProjectController extends BaseController {
	private $_service = null;
	public function __construct() {
		parent::__construct ();
		$this->_service = new ProjectService ();
	}
	public function index() {
		$this->display ();
	}
	public function search($key='',$limit, $page) {
		$conditions = array();
		$conditions['pro_name'] = array('like','%'.$key.'%');
		$result = $this->_service->search ($conditions, $limit, $page );
		$this->ajaxReturn ( $result );
	}
}