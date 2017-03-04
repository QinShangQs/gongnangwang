<?php
///////////////项目发布状态 开始////////////////////
/**
 * 已申请 -项目发布状态
 * @var int
 */
define('_PRO_PUB_STATUS_COMMIT',1);

/**
 * 审核成功 -项目发布状态
 * @var int
*/
define('_PRO_PUB_STATUS_SUCCESS',2);

/**
 * 审核失败 -项目发布状态
 * @var int
*/
define('_PRO_PUB_STATUS_FAILED',3);

/**
 * 重新申请 -项目发布状态
 * @var int
*/
define('_PRO_PUB_STATUS_RECOMMIT',4);

/**
 * 项目发布状态列表
 * @return multitype:string
*/
function _getProPublishStatus(){
	$arr = array();
	$arr[0] = "请选择发布状态";
	$arr[_PRO_PUB_STATUS_COMMIT] = "已申请";
	$arr[_PRO_PUB_STATUS_SUCCESS] = "审核成功";
	$arr[_PRO_PUB_STATUS_FAILED] = "审核失败";
	$arr[_PRO_PUB_STATUS_RECOMMIT] = "重新申请";
	return $arr;
}
/**
 * 获取当前项目的发布状态
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getProPublishStatusById($id){
	$arr = _getProPublishStatus();
	return $arr[$id];
}
///////////////项目发布状态 结束////////////////////

/**
 * 在线状态列表 - 岗位 - 合伙人
 * @return multitype:string
 */
function _getParLineStatus(){
	$arr = array();
	$arr[""] = "请选择在线状态";
	$arr["on"] = "在线";
	$arr["off"] = "下线";
	return $arr;
}

/**
 * 获取当前在线状态
 * @param string $id
 * @return unknown
 */
function _getParLineStatusById($id){
	$arr = _getParLineStatus();
	return $arr[$id];
}

/**
 * 已申请 - 岗位发布状态
 * @var int
 */
define("_JOB_PUB_STATUS_COMMIT", 1);
/**
 * 通过 - 岗位发布状态
 * @var int
*/
define("_JOB_PUB_STATUS_PASS", 2);
/**
 * 拒绝- 岗位发布状态
 * @var int
*/
define("_JOB_PUB_STATUS_REFUSE", 3);
/**
 * 重新申请 - 岗位发布状态
 * @var int
*/
define("_JOB_PUB_STATUS_RECOMMIT", 4);

/**
 * 岗位发布列表 - 岗位 - 合伙人
 * @return multitype:string
*/
function _getParPublishStatus(){
	$arr = array();
	$arr[0] = "请选择发布状态";
	$arr[_JOB_PUB_STATUS_COMMIT] = "已申请";
	$arr[_JOB_PUB_STATUS_PASS] = "通过";
	$arr[_JOB_PUB_STATUS_REFUSE] = "拒绝";
	$arr[_JOB_PUB_STATUS_RECOMMIT] = "重新申请";
	return $arr;
}
/**
 * 获取当前岗位的发布状态
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getParPublishStatusById($id){
	$arr = _getParPublishStatus();
	return $arr[$id];
}


