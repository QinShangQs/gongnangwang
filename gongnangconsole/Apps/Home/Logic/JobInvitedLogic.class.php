<?php
namespace Home\Logic;
use Think\Model;
use Home\Mapper\IMapper;
use Home\Model\JobInvitedModel;

class JobInvitedLogic extends BaseLogic{

	public function __construct(IMapper $_mapper){
		parent::__construct();
		$this->_repository = new JobInvitedModel();
		$this->_mapper = $_mapper;
	}
}