<?php
namespace Home\Service;

class LoginService extends BaseService{
	public function __construct() {
		parent::__construct ();
	}
	public function login($userName, $password) {
		if($userName == 'admin' && $password == 'gongnangadmin'){
			return parent::success (array(),'登录成功' );
		}
	
		return parent::failed('账号或密码错误，请重新输入');
	}
}