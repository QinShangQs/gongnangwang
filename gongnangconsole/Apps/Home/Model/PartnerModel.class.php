<?php

namespace Home\Model;

use Think\Model\RelationModel;

class PartnerModel extends RelationModel {
	protected $_link = array (
			'user_info' => array (
					'mapping_type' => self::BELONGS_TO,
					'mapping_name' => "user_info",
					'class_name' => 'Userinfo',
					'foreign_key' => 'user_id'
 			)
	);
}