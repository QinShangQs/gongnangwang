<?php
namespace Home\Mapper;

interface IMapper {
	/**
	 * 给数据增加枚举字段的名称属性
	 * @param array $rows
	 * @param bool $isArray 是否集合
	 * @return 增加了枚举名称属性的数据 
	 */
	function tranlate(array $rows, $isArray);
}