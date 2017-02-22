<?php

namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller {
	/**
	 * 当前登录用户名
	 * 
	 * @var unknown
	 */
	protected static $_USER_NAME = '';
	public function _initialize() {
		if (! isset ( $_SESSION ['username'] )) {
			$this->error ( '请重新登录', '/');
		}
		
		static::$_USER_NAME = $_SESSION ['username'];
	}
	public function __construct() {
		parent::__construct ();
	}
	public function _empty($name) {
		$this->display ( 'Index:404' );
		exit ();
	}
	protected function _success($redirct = '', $msg = ':) 操作成功！', $code = 0) {
		$msg = empty ( $msg ) ? ':) 操作成功！' : $msg;
		$this->assign ( 'msg', nl2br ( $msg ) );
		$this->assign ( 'redirct', $redirct ? str_replace ( '.html', '', U ( $redirct ) ) : '' );
		$this->assign ( "code", $code );
		$this->display ( 'Main:result' );
		// $this->redirect('main/result');
		exit ();
	}
	protected function _failed($msg = ':( 操作失败!', $redirct = '') {
		$this->_success ( $redirct, $msg, 1 );
	}
	/**
	 * 获取POST的请求数据转换为对象
	 * 
	 * @param unknown $notins
	 *        	要排除进入对象的POST键
	 * @return \stdClass
	 */
	protected function _getPostStd($notins = array()) {
		if (! IS_POST)
			exit ( '非法请求' );
		$std = new \stdClass ();
		foreach ( $_POST as $key => $val ) {
			if (! in_array ( $key, $notins )) {
				if (is_array ( $val )) {
					$std->$key = implode ( ',', $val );
				} else {
					$std->$key = trim ( $val );
				}
			}
		}
		
		return $std;
	}
	/**
	 * 获取REQUEST的请求数据转换为对象
	 * 
	 * @param unknown $notins
	 *        	要排除进入对象的REQUEST键
	 * @return \stdClass
	 */
	protected function _getRequestStd($notins = array()) {
		$std = new \stdClass ();
		foreach ( $_REQUEST as $key => $val ) {
			if (! in_array ( $key, $notins )) {
				$std->$key = trim ( $val );
			}
		}
		
		return $std;
	}
}