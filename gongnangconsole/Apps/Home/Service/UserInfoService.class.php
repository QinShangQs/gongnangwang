<?php

namespace Home\Service;

use Home\Logic\UserInfoLogic;
use Home\Mapper\UserInfoMapper;

class UserInfoService extends BaseService {
	public function __construct() {
		parent::__construct ();
		$this->_logic = new UserInfoLogic ( new UserInfoMapper () );
	}
}