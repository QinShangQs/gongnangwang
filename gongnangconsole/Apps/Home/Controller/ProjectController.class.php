<?php

namespace Home\Controller;
use Home\Service\ProjectService;

class ProjectController extends BaseController {
	private $_service = null;
	public function __construct(){
		parent::__construct();
		$this->_service = new ProjectService();
	}
	
	public function index(){
		$result = $this->_service->search(array(), 10, 1);
		$this->ajaxReturn($result);
	}
	
}