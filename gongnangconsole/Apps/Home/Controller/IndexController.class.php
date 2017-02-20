<?php

namespace Home\Controller;

use Think\Controller;
use Home\Service\LoginService;

class IndexController extends Controller {
	private $_service = null;
	public function __construct(){
		parent::__construct();
		$this->_service = new LoginService();
	}
	
	public function index() {
		if (! isset ( $_SESSION ['username'] )) {
			$this->display ();
		} else {
			$this->redirect ( 'Main/index');
		}
	}
	public function doLogin() {
// 		if (! IS_POST)
// 			exit;
		
		$username = I ( 'username','');
		$password = I ( 'password','');	
// 		$code = I('code','');
// 		if(!check_verify($code)){
// 			$this->error('验证码填写错误！');	
// 		}
		
		$result = $this->_service->login($username,$password);
		if (!$result->success) {
			$this->error ($result->msg );
		} else {
			$_SESSION ['username'] = $username;
			$_SESSION ['expiretime'] = time () + 3600;
			$this->redirect ( 'main/index' );
		}
	}
	public function ajaxCheckLogin() {
		if (! isset ( $_SESSION ['username'] )) {
			unset ( $_SESSION ['username'] );
			unset ( $_SESSION ['expiretime'] );
			$this->ajaxReturn( array (
					'success' => false 
			) );
		} else {
			$this->ajaxReturn(array (
					'success' => true 
			) );
		}
	}
	public function verfiy(){
		ob_clean();
		$Verify = new \Think\Verify();
		$Verify->fontSize = 16;
		$Verify->length   = 4;
		$Verify->useNoise = false;
		$Verify->entry();
	}
	
	public function logout() {
		if (! empty ( $_SESSION ['username'] )) {
			unset ( $_SESSION ['username'] );
			unset ( $_SESSION ['expiretime'] );
			$_SESSION = array ();
			session_destroy ();
			$this->redirect ( 'index/index' );
		} else {
			$this->error ( '已经登出了！', '/' );
		}
	}

}