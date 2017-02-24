<?php

namespace Home\Controller;

use Think\Controller;
use Home\Service\LoginService;

class IndexController extends Controller {
	private $_service = null;
	public function __construct() {
		parent::__construct ();
		$this->_service = new LoginService ();
	}
	public function index() {
		if (! isset ( $_SESSION ['username'] )) {
			$this->display ();
		} else {
			$this->redirect ( '/center');
		}
	}
	public function doLogin() {
		$username = I ( 'username', '' );
		$password = I ( 'password', '' );
		$code = I('code','');

		$result = $this->_service->login ( $username, $password );
		if (! $result->success) {
			$this->ajaxReturn(array('info'=>$result->msg ,'status'=>'n'));
		} else {
			$_SESSION ['username'] = $username;
			$_SESSION ['expiretime'] = time () + 3600;
			$this->ajaxReturn(array('info'=>'登录成功' ,'status'=>'y'));
		}
	}
	public function ajaxCheckLogin() {
		if (! isset ( $_SESSION ['username'] )) {
			unset ( $_SESSION ['username'] );
			unset ( $_SESSION ['expiretime'] );
			$this->ajaxReturn ( array (
					'success' => false 
			) );
		} else {
			$this->ajaxReturn ( array (
					'success' => true 
			) );
		}
	}
	public function verfiy() {
		ob_clean ();
		$Verify = new \Think\Verify ();
		$Verify->fontSize = 16;
		$Verify->length = 4;
		$Verify->useNoise = false;
		$Verify->entry ();
	}
	public function checkVerfiy($param = '') {
		if (! check_verify ( $param )) {
			$this->ajaxReturn(array('info'=>'验证码错误！','status'=>'n'));
		}else{
			$this->ajaxReturn(array('info'=>'','status'=>'y'));
		}
	}
	public function logout() {
		if (! empty ( $_SESSION ['username'] )) {
			unset ( $_SESSION ['username'] );
			unset ( $_SESSION ['expiretime'] );
			$_SESSION = array ();
			session_destroy ();
			$this->redirect ( '/login' );
		} else {
			$this->error ( '已经登出了！', '/' );
		}
	}
}