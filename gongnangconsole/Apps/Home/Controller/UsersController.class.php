<?php

namespace Home\Controller;

use Home\Service\UserInfoService;

class UsersController extends BaseController {
	private $_service = null;
	public function __construct() {
		parent::__construct ();
		$this->_service = new UserInfoService ();
	}
	public function index() {
		$this->display ();
	}
	public function search($key, $identity, $limit, $page) {
		$conditions = array ();
		if ($identity > 0) {
			$conditions ['identity'] = array (
					'eq',
					$identity 
			);
		}
		$conditions ['_string'] = "nickname like '%{$key}%' or company like '%{$key}%' or sign like '%{$key}%'";
		$result = $this->_service->search ( $conditions, $limit, $page );
		$this->ajaxReturn ( $result );
	}
	public function detail($id) {
		$inst = $this->_service->getById ( $id );
		$this->assign ( 'inst', $inst );
		$this->display ();
	}
}