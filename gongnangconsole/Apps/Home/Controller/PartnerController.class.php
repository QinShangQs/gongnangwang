<?php

namespace Home\Controller;

use Home\Service\PartnerService;
class PartnerController extends BaseController{
	private $_service = null;
	public function __construct(){
		parent::__construct();
		$this->_service = new PartnerService();
	}
	public function index(){
		$this->display();
	}
	
	public function search($key,$finance,$limit, $page) {
		$conditions = array();
		if($finance > 0){
			$conditions['par_finance'] = array('eq',$finance);
		}
		$conditions['_string'] = "par_title like '%{$key}%' or par_proname like '%{$key}%'"
				." or par_website like '%{$key}%' or par_address like '%{$key}%'";
		$result = $this->_service->search ($conditions, $limit, $page );
		$this->ajaxReturn ( $result );
	}
	
	public function detail($id){
		$inst = $this->_service->getById($id);
		$this->assign('inst', $inst);
		$this->display();
	}
}