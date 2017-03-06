<?php
namespace Home\Logic;
use Think\Model;
use Home\Mapper\IMapper;
use Home\Model\UserinfoModel;

class UserInfoLogic extends BaseLogic{

	public function __construct(IMapper $_mapper){
		parent::__construct();
		$this->_repository = new UserinfoModel();
		$this->_mapper = $_mapper;
	}
}