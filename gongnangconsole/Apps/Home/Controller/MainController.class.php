<?php

namespace Home\Controller;

use Think\Controller;

class MainController extends BaseController {
	public function index() {
		if (! isset ( $_SESSION ['username'] )) {
			$this->redirect ( '/' );
		} else {
			$this->assign ( 'username', $_SESSION ['username'] );
			
			$this->display ();
		}
	}
	
	public function welcome(){
		$this->display();
	}
}
