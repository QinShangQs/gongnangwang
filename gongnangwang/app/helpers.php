<?php
/**
 * 项目状态列表
 * @return multitype:string
 */
function _getProStates(){
	$arr = array();
	$arr[0] = "请选择方向";
	$arr[1] = "未上线";
	$arr[2] = "概念阶段";
	$arr[3] = "已上线";
	$arr[4] = "已盈利";
	$arr[5] = "IPO阶段";
	return $arr;	
}
/**
 * 当前项目状态名称
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getProStateById($id){
	$arr = _getProStates();
	return $arr[$id];
}

/**
 * 项目阶段列表
 * @return multitype:string
 */
function _getProStages(){
	$arr = array();
	$arr[0] = '请选择类型';
	$arr[1] = '融资阶段';
	$arr[2] = '天使轮';
	$arr[3] = 'A轮';
	$arr[4] = 'B轮';
	$arr[5] = 'C轮';
	$arr[6] = 'D轮';
	$arr[7] = '上市公司';
	return $arr;	
}

/**
 * 获取当前项目阶段名称
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getProStageById($id){
	$arr = _getProStages();
	return $arr[$id];
}

/**
 * 项目分类列表
 */
function _getProtypes(){
	$arr = array();
	$arr[0] = '请选择方向';
	$arr[1] = '移动互联网';
	$arr[2] = '电子商务';
	$arr[3] = 'O2O';
	$arr[4] = '互联网金融';
	$arr[5] = '网络社区';
	$arr[6] = '旅游';
	$arr[7] = '娱乐';
	$arr[8] = '网络游戏';
	$arr[9] = '信息技术';
	$arr[10] = '硬件';
	$arr[11] = '工具软件';
	$arr[12] = '企业服务';
	$arr[13] = '农业相关';
	
	return $arr;
}

/**
 * 获取当前项目分类名称名称
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getProtypeById($id){
	$arr = _getProtypes();
	return $arr[$id];
}

/**
 * 项目金额设置列表
 * @return multitype:string
 */
function _getProValues(){
	$arr = array();
	$arr[1] = '百元';
	$arr[2] = '千元';
	$arr[3] = '万元';
	$arr[4] = '十万元';

	return $arr;
}

/**
 * 获取当前项目金额设置名称
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getProValueById($id){
	$arr = _getProValues();
	return $arr[$id];
}

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

/**
 * 合伙人团队规模列表
 * @return multitype:string
 */
function _getParTeams(){
	$arr = array();
	$arr[0] = "请选择";
	$arr[1] = "少于15人";
	$arr[2] = "15-50人";
	$arr[3] = "50-200人";
	$arr[4] = "200-500人";
	$arr[5] = "500-2000人";
	$arr[6] = "2000人以上";
	return $arr;
}

/**
 * 获取当前合伙人的团队规模
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getParTeamById($id){
	$arr = _getParTeams();
	return $arr[$id];
}

/**
 * 合伙人融资说明列表
 * @return multitype:string
 */
function _getParFinances(){
	$arr = array();
	$arr[0] = "请选择融资说明";
	$arr[1] = "未融资";
	$arr[2] = "天使轮";
	$arr[3] = "A 轮";
	$arr[4] = "B 轮";
	$arr[5] = "C 轮";
	$arr[6] = "D轮及以上";
	$arr[7] = "上市公司";
	$arr[8] = "不需要融资";
	return $arr;
}

/**
 * 获取当前合伙人的融资说明
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getParFinanceById($id){
	$arr = _getParFinances();
	return $arr[$id];
}

/**
 * 公司 - 合伙人身份
 * @var unknown
 */
define("_PAR_TYPE_COMPANY", 1);
/**
 * 个人 - 合伙人身份
 * @var unknown
 */
define("_PAR_TYPE_PERSON", 2);

/**
 * 获取合伙人身份列表
 * @return multitype:string
 */
function _getPartypes(){
	$arr = array();
	$arr[0] = "请选择身份";
	$arr[_PAR_TYPE_COMPANY] = "公司";
	$arr[_PAR_TYPE_PERSON] = "个人";
	return $arr;	
}

/**
 * 获取当前合伙人身份
 * @param unknown $id
 * @return Ambigous <>
 */
function _getPartypeById($id){
	$arr = _getPartypes();
	return $arr[$id];
}

/**
 * 工作经验列表 - 岗位 - 合伙人
 * @return multitype:string
 */
function _getParWorks(){
	$arr = array();
	$arr[0] = "请选择工作经验";
	$arr[1] = "不限";
	$arr[2] = "1-3年";
	$arr[3] = "3-5年";
	$arr[4] = "5-10年";
	$arr[5] = "十年以上";
	
	return $arr;
}

/**
 * 获取当前工作经验
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getParWorkById($id){
	$arr = _getParWorks();
	return $arr[$id];
}

/**
 * 学历要求列表 - 岗位 - 合伙人
 * @return multitype:string
 */
function _getParEducations(){
	$arr = array();
	$arr[0] = "请选择学历";
	$arr[1] = "不限";
	$arr[2] = "大专";
	$arr[3] = "本科";
	$arr[4] = "博士、硕士、研究生";

	return $arr;	
}

/**
 * 获取当前的学历要求
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getParEducationById($id){
	$arr = _getParEducations();
	return $arr[$id];
}

/**
 * 年龄要求列表 - 岗位 - 合伙人
 * @return multitype:string
 */
function _getParAges(){
	$arr = array();
	$arr[0] = "请选择年龄要求";
	$arr[1] = "不限";
	$arr[2] = "20-30岁";
	$arr[3] = "30-40岁";
	$arr[4] = "40岁以上";	
	
	return $arr;
}

/**
 * 获取当前的年龄要求
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getParAgeById($id){
	$arr = _getParAges();
	return $arr[$id];
}

/**
 * 工作方式 - 岗位 - 合伙人
 * @return multitype:string
 */
function _getParModes(){
	$arr = array();
	$arr[0] = "请选择工作方式";
	$arr[1] = "全职";
	$arr[2] = "兼职";
	return $arr;
}

/**
 * 获取当前工作方式 
 * @param unknown $id
 * @return unknown
 */
function _getParModeById($id){
	$arr = _getParModes();
	return $arr[$id];
}

/**
 * 获取报酬方式列表 - 岗位 - 合伙人
 * @return multitype:string
 */
function _getParPayTypes(){
	$arr = array();
	$arr[0] = "请选择报酬方式";
	$arr[1] = "月薪";
	$arr[2] = "年薪";
	return $arr;
}

/**
 * 获取报酬工作方式
 * @param unknown $id
 * @return unknown
 */
function _getParPayTypeById($id){
	$arr = _getParPayTypes();
	return $arr[$id];
}

/**
 * 获取股权回报方式列表 - 岗位 - 合伙人
 * @return multitype:string
 */
function _getParReturnTypes(){
	$arr = array();
	$arr[0] = "请选择股权回报方式";
	$arr[1] = "股份回报";
	$arr[2] = "其它回报";
	return $arr;
}

/**
 * 获取股权回报方式
 * @param unknown $id
 * @return unknown
 */
function _getParReturnTypeById($id){
	$arr = _getParReturnTypes();
	return $arr[$id];
}

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

/**
 * 年龄区间  - 用户
 * @return multitype:string
 */
function _getUserAges(){
	$arr = array();
	$arr[0] = "请选择年龄区间";
	$arr[1] = "18-25";
	$arr[2] = "25-30";
	$arr[3] = "30-40";
	$arr[4] = "40-50";
	$arr[5] = "50以上";
	
	return $arr;
}

/**
 * 获取当前用户的年龄区间
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getUserAgeById($id){
	$arr = _getUserAges();
	return $arr[$id];
}

/**
 * 身份列表 - 用户
 * @return multitype:string
 */
function _getUserIndentities(){
	$arr = array();
	$arr[0] = "请选择身份";
	$arr[1] = "创始人";
	$arr[2] = "投资人";
	$arr[3] = "律师";
	$arr[4] = "上市高管";
	$arr[5] = "职业经理";
	$arr[6] = "设计师";
	$arr[7] = "技术开发";
	$arr[8] = "融资顾问";
	$arr[9] = "明星名人";
	$arr[10] = "在校大学生";
	$arr[11] = "海外海归";
	$arr[12] = "总裁董事长";
	$arr[13] = "创业导师";
	return $arr;
}

/**
 * 获取当前用户身份
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getUserIndentityById($id){
	$arr = _getUserIndentities();
	return $arr[$id];
}

/**
 * 工作经验列表 - 用户 
 * @return multitype:string
 */
function _getUserWorks(){
	$arr = array();
	$arr[0] = "请选择工作年限";
	$arr[1] = "1~3年";
	$arr[2] = "3~5年";
	$arr[3] = "5~10年";
	$arr[4] = "10~20年";

	return $arr;
}

/**
 * 获取当前用户工作经验
 * @param unknown $id
 * @return Ambigous <string>
 */
function _getUserWorkById($id){
	$arr = _getUserWorks();
	return $arr[$id];
}
