<?php

namespace Home\Model;

use Think\Model\RelationModel;

class ProjectModel extends RelationModel {
	protected $_link = array (
			'extend' => array (
					'mapping_type' => self::HAS_ONE,
					'mapping_name' => "extend",
					'class_name' => 'ProjectExtend',
					'foreign_key' => 'pro_id' 
			) ,
			'user_info' => array (
					'mapping_type' => self::BELONGS_TO,
					'mapping_name' => "user_info",
					'class_name' => 'Userinfo',
					'foreign_key' => 'user_id'
 			)
//,
// 			'audits' => array (
// 					'mapping_type' => self::HAS_MANY,
// 					'mapping_name' => "audits",
// 					'class_name' => 'ProjectAudit',
// 					'foreign_key' => 'pro_id'
// 			)
	);
}