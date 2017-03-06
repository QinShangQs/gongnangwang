<?php
namespace Home\Model;

use Think\Model\RelationModel;

class UserinfoModel extends RelationModel {
	protected $_link = array (
			'account' => array (
					'mapping_type' => self::BELONGS_TO,
					'mapping_name' => "account",
					'class_name' => 'User',
					'foreign_key' => 'user_id'
			) 
	);
}