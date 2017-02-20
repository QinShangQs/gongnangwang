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
			) 
	);
}