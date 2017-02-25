<?php

/**
 * 支付方式 账期付款
 *
 * @var unknown
 */
define ( 'PAYMENT_PERIOD', 4 );
function export_xls($filename, $data) {
	header ( 'Content-Type: application/vnd.ms-excel' );
	header ( "Content-Disposition:attachment;filename=" . $filename );
	header ( 'Cache-Control:must-revalidate,post-check=0,pre-check=0' );
	header ( 'Expires:0' );
	header ( 'Pragma:public' );
	echo $data;
}

/**
 * +----------------------------------------------------------
 * 原样输出print_r的内容
 * +----------------------------------------------------------
 *
 * @param string $content
 *        	待print_r的内容
 *        	+----------------------------------------------------------
 */
function pre($content) {
	echo "<pre>";
	print_r ( $content );
	echo "</pre>";
}

/**
 * 验证验证码
 *
 * @param
 *        	$code
 * @param string $id        	
 * @return bool
 */
function check_verify($code, $id = '') {
	$verify = new \Think\Verify ();
	return $verify->check ( $code, $id );
}

/**
 * 快速文件数据读取和保存 针对简单类型数据 字符串、数组
 *
 * @param string $name
 *        	缓存名称
 * @param mixed $value
 *        	缓存值
 * @param string $path
 *        	缓存路径
 * @return mixed
 */
function set_config($name, $value = '', $path = DATA_PATH) {
	static $_cache = array ();
	$filename = $path . $name . '.php';
	if ('' !== $value) {
		if (is_null ( $value )) {
			// 删除缓存
			return false !== strpos ( $name, '*' ) ? array_map ( "unlink", glob ( $filename ) ) : unlink ( $filename );
		} else {
			// 缓存数据
			$dir = dirname ( $filename );
			// 目录不存在则创建
			if (! is_dir ( $dir ))
				mkdir ( $dir, 0755, true );
			$_cache [$name] = $value;
			return file_put_contents ( $filename, strip_whitespace ( "<?php\treturn " . var_export ( $value, true ) . ";?>" ) );
		}
	}
	if (isset ( $_cache [$name] ))
		return $_cache [$name];
		// 获取缓存数据
	if (is_file ( $filename )) {
		$value = include $filename;
		$_cache [$name] = $value;
	} else {
		$value = false;
	}
	return $value;
}

/**
 * +----------------------------------------------------------
 * 加密密码
 * +----------------------------------------------------------
 *
 * @param string $data
 *        	待加密字符串
 *        	+----------------------------------------------------------
 * @return string 返回加密后的字符串
 */
function encrypt($data) {
	return md5 ( C ( "AUTH_CODE" ) . md5 ( $data ) );
}

/**
 * +----------------------------------------------------------
 * 将一个字符串转换成数组，支持中文
 * +----------------------------------------------------------
 *
 * @param string $string
 *        	待转换成数组的字符串
 *        	+----------------------------------------------------------
 * @return string 转换后的数组
 *         +----------------------------------------------------------
 */
function strToArray($string) {
	$strlen = mb_strlen ( $string );
	while ( $strlen ) {
		$array [] = mb_substr ( $string, 0, 1, "utf8" );
		$string = mb_substr ( $string, 1, $strlen, "utf8" );
		$strlen = mb_strlen ( $string );
	}
	return $array;
}

/**
 * +----------------------------------------------------------
 * 生成随机字符串
 * +----------------------------------------------------------
 *
 * @param int $length
 *        	要生成的随机字符串长度
 * @param string $type
 *        	随机码类型：0，数字+大写字母；1，数字；2，小写字母；3，大写字母；4，特殊字符；-1，数字+大小写字母+特殊字符
 *        	+----------------------------------------------------------
 * @return string +----------------------------------------------------------
 */
function randCode($length = 5, $type = 0) {
	$arr = array (
			1 => "0123456789",
			2 => "abcdefghijklmnopqrstuvwxyz",
			3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
			4 => "~@#$%^&*(){}[]|" 
	);
	$code = '';
	if ($type == 0) {
		array_pop ( $arr );
		$string = implode ( "", $arr );
	} else if ($type == "-1") {
		$string = implode ( "", $arr );
	} else {
		$string = $arr [$type];
	}
	$count = strlen ( $string ) - 1;
	for($i = 0; $i < $length; $i ++) {
		$str [$i] = $string [rand ( 0, $count )];
		$code .= $str [$i];
	}
	return $code;
}

/**
 * +-----------------------------------------------------------------------------------------
 * 删除目录及目录下所有文件或删除指定文件
 * +-----------------------------------------------------------------------------------------
 *
 * @param str $path
 *        	待删除目录路径
 * @param int $delDir
 *        	是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
 *        	+-----------------------------------------------------------------------------------------
 * @return bool 返回删除状态
 *         +-----------------------------------------------------------------------------------------
 */
function delDirAndFile($path, $delDir = FALSE) {
	$handle = opendir ( $path );
	if ($handle) {
		while ( false !== ($item = readdir ( $handle )) ) {
			if ($item != "." && $item != "..")
				is_dir ( "$path/$item" ) ? delDirAndFile ( "$path/$item", $delDir ) : unlink ( "$path/$item" );
		}
		closedir ( $handle );
		if ($delDir)
			return rmdir ( $path );
	} else {
		if (file_exists ( $path )) {
			return unlink ( $path );
		} else {
			return FALSE;
		}
	}
}

/**
 * +----------------------------------------------------------
 * 将一个字符串部分字符用*替代隐藏
 * +----------------------------------------------------------
 *
 * @param string $string
 *        	待转换的字符串
 * @param int $bengin
 *        	起始位置，从0开始计数，当$type=4时，表示左侧保留长度
 * @param int $len
 *        	需要转换成*的字符个数，当$type=4时，表示右侧保留长度
 * @param int $type
 *        	转换类型：0，从左向右隐藏；1，从右向左隐藏；2，从指定字符位置分割前由右向左隐藏；3，从指定字符位置分割后由左向右隐藏；4，保留首末指定字符串
 * @param string $glue
 *        	分割符
 *        	+----------------------------------------------------------
 * @return string 处理后的字符串
 *         +----------------------------------------------------------
 */
function hideStr($string, $bengin = 0, $len = 4, $type = 0, $glue = "@") {
	if (empty ( $string ))
		return false;
	$array = array ();
	if ($type == 0 || $type == 1 || $type == 4) {
		$strlen = $length = mb_strlen ( $string );
		while ( $strlen ) {
			$array [] = mb_substr ( $string, 0, 1, "utf8" );
			$string = mb_substr ( $string, 1, $strlen, "utf8" );
			$strlen = mb_strlen ( $string );
		}
	}
	switch ($type) {
		case 1 :
			$array = array_reverse ( $array );
			for($i = $bengin; $i < ($bengin + $len); $i ++) {
				if (isset ( $array [$i] ))
					$array [$i] = "*";
			}
			$string = implode ( "", array_reverse ( $array ) );
			break;
		case 2 :
			$array = explode ( $glue, $string );
			$array [0] = hideStr ( $array [0], $bengin, $len, 1 );
			$string = implode ( $glue, $array );
			break;
		case 3 :
			$array = explode ( $glue, $string );
			$array [1] = hideStr ( $array [1], $bengin, $len, 0 );
			$string = implode ( $glue, $array );
			break;
		case 4 :
			$left = $bengin;
			$right = $len;
			$tem = array ();
			for($i = 0; $i < ($length - $right); $i ++) {
				if (isset ( $array [$i] ))
					$tem [] = $i >= $left ? "*" : $array [$i];
			}
			$array = array_chunk ( array_reverse ( $array ), $right );
			$array = array_reverse ( $array [0] );
			for($i = 0; $i < $right; $i ++) {
				$tem [] = $array [$i];
			}
			$string = implode ( "", $tem );
			break;
		default :
			for($i = $bengin; $i < ($bengin + $len); $i ++) {
				if (isset ( $array [$i] ))
					$array [$i] = "*";
			}
			$string = implode ( "", $array );
			break;
	}
	return $string;
}

/**
 * +----------------------------------------------------------
 * 功能：字符串截取指定长度
 * leo.li hengqin2008@qq.com
 * +----------------------------------------------------------
 *
 * @param string $string
 *        	待截取的字符串
 * @param int $len
 *        	截取的长度
 * @param int $start
 *        	从第几个字符开始截取
 * @param boolean $suffix
 *        	是否在截取后的字符串后跟上省略号
 *        	+----------------------------------------------------------
 * @return string 返回截取后的字符串
 *         +----------------------------------------------------------
 */
function cutStr($str, $len = 100, $start = 0, $suffix = 1) {
	$str = strip_tags ( trim ( strip_tags ( $str ) ) );
	$str = str_replace ( array (
			"\n",
			"\t" 
	), "", $str );
	$strlen = mb_strlen ( $str );
	while ( $strlen ) {
		$array [] = mb_substr ( $str, 0, 1, "utf8" );
		$str = mb_substr ( $str, 1, $strlen, "utf8" );
		$strlen = mb_strlen ( $str );
	}
	$end = $len + $start;
	$str = '';
	for($i = $start; $i < $end; $i ++) {
		$str .= $array [$i];
	}
	return count ( $array ) > $len ? ($suffix == 1 ? $str . "&hellip;" : $str) : $str;
}

/**
 * +----------------------------------------------------------
 * 功能：检测一个目录是否存在，不存在则创建它
 * +----------------------------------------------------------
 *
 * @param string $path
 *        	待检测的目录
 *        	+----------------------------------------------------------
 * @return boolean +----------------------------------------------------------
 */
function makeDir($path) {
	return is_dir ( $path ) or (makeDir ( dirname ( $path ) ) and @mkdir ( $path, 0777 ));
}

/**
 * +----------------------------------------------------------
 * 功能：检测一个字符串是否是邮件地址格式
 * +----------------------------------------------------------
 *
 * @param string $value
 *        	待检测字符串
 *        	+----------------------------------------------------------
 * @return boolean +----------------------------------------------------------
 */
function is_email($value) {
	return preg_match ( "/^[0-9a-zA-Z]+(?:[\_\.\-][a-z0-9\-]+)*@[a-zA-Z0-9]+(?:[-.][a-zA-Z0-9]+)*\.[a-zA-Z]+$/i", $value );
}

/**
 * +----------------------------------------------------------
 * 功能：剔除危险的字符信息
 * +----------------------------------------------------------
 *
 * @param string $val
 *        	+----------------------------------------------------------
 * @return string 返回处理后的字符串
 *         +----------------------------------------------------------
 */
function remove_xss($val) {
	// remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
	// this prevents some character re-spacing such as <java\0script>
	// note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
	$val = preg_replace ( '/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val );
	
	// straight replacements, the user should never need these since they're normal characters
	// this prevents like <IMG SRC=@avascript:alert('XSS')>
	$search = 'abcdefghijklmnopqrstuvwxyz';
	$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$search .= '1234567890!@#$%^&*()';
	$search .= '~`";:?+/={}[]-_|\'\\';
	for($i = 0; $i < strlen ( $search ); $i ++) {
		// ;? matches the ;, which is optional
		// 0{0,7} matches any padded zeros, which are optional and go up to 8 chars
		// @ @ search for the hex values
		$val = preg_replace ( '/(&#[xX]0{0,8}' . dechex ( ord ( $search [$i] ) ) . ';?)/i', $search [$i], $val ); // with a ;
		                                                                                                          // @ @ 0{0,7} matches '0' zero to seven times
		$val = preg_replace ( '/(&#0{0,8}' . ord ( $search [$i] ) . ';?)/', $search [$i], $val ); // with a ;
	}
	
	// now the only remaining whitespace attacks are \t, \n, and \r
	$ra1 = array (
			'javascript',
			'vbscript',
			'expression',
			'applet',
			'meta',
			'xml',
			'blink',
			'link',
			'style',
			'script',
			'embed',
			'object',
			'iframe',
			'frame',
			'frameset',
			'ilayer',
			'layer',
			'bgsound',
			'title',
			'base' 
	);
	$ra2 = array (
			'onabort',
			'onactivate',
			'onafterprint',
			'onafterupdate',
			'onbeforeactivate',
			'onbeforecopy',
			'onbeforecut',
			'onbeforedeactivate',
			'onbeforeeditfocus',
			'onbeforepaste',
			'onbeforeprint',
			'onbeforeunload',
			'onbeforeupdate',
			'onblur',
			'onbounce',
			'oncellchange',
			'onchange',
			'onclick',
			'oncontextmenu',
			'oncontrolselect',
			'oncopy',
			'oncut',
			'ondataavailable',
			'ondatasetchanged',
			'ondatasetcomplete',
			'ondblclick',
			'ondeactivate',
			'ondrag',
			'ondragend',
			'ondragenter',
			'ondragleave',
			'ondragover',
			'ondragstart',
			'ondrop',
			'onerror',
			'onerrorupdate',
			'onfilterchange',
			'onfinish',
			'onfocus',
			'onfocusin',
			'onfocusout',
			'onhelp',
			'onkeydown',
			'onkeypress',
			'onkeyup',
			'onlayoutcomplete',
			'onload',
			'onlosecapture',
			'onmousedown',
			'onmouseenter',
			'onmouseleave',
			'onmousemove',
			'onmouseout',
			'onmouseover',
			'onmouseup',
			'onmousewheel',
			'onmove',
			'onmoveend',
			'onmovestart',
			'onpaste',
			'onpropertychange',
			'onreadystatechange',
			'onreset',
			'onresize',
			'onresizeend',
			'onresizestart',
			'onrowenter',
			'onrowexit',
			'onrowsdelete',
			'onrowsinserted',
			'onscroll',
			'onselect',
			'onselectionchange',
			'onselectstart',
			'onstart',
			'onstop',
			'onsubmit',
			'onunload' 
	);
	$ra = array_merge ( $ra1, $ra2 );
	
	$found = true; // keep replacing as long as the previous round replaced something
	while ( $found == true ) {
		$val_before = $val;
		for($i = 0; $i < sizeof ( $ra ); $i ++) {
			$pattern = '/';
			for($j = 0; $j < strlen ( $ra [$i] ); $j ++) {
				if ($j > 0) {
					$pattern .= '(';
					$pattern .= '(&#[xX]0{0,8}([9ab]);)';
					$pattern .= '|';
					$pattern .= '|(&#0{0,8}([9|10|13]);)';
					$pattern .= ')*';
				}
				$pattern .= $ra [$i] [$j];
			}
			$pattern .= '/i';
			$replacement = substr ( $ra [$i], 0, 2 ) . '<x>' . substr ( $ra [$i], 2 ); // add in <> to nerf the tag
			$val = preg_replace ( $pattern, $replacement, $val ); // filter out the hex tags
			if ($val_before == $val) {
				// no replacements were made, so exit the loop
				$found = false;
			}
		}
	}
	return $val;
}

/**
 * +----------------------------------------------------------
 * 功能：计算文件大小
 * +----------------------------------------------------------
 *
 * @param int $bytes
 *        	+----------------------------------------------------------
 * @return string 转换后的字符串
 *         +----------------------------------------------------------
 */
function byteFormat($bytes) {
	$sizetext = array (
			" B",
			" KB",
			" MB",
			" GB",
			" TB",
			" PB",
			" EB",
			" ZB",
			" YB" 
	);
	return round ( $bytes / pow ( 1024, ($i = floor ( log ( $bytes, 1024 ) )) ), 2 ) . $sizetext [$i];
}
function checkCharset($string, $charset = "UTF-8") {
	if ($string == '')
		return;
	$check = preg_match ( '%^(?:
                                [\x09\x0A\x0D\x20-\x7E] # ASCII
                                | [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte
                                | \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs
                                | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
                                | \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates
                                | \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3
                                | [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15
                                | \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16
                                )*$%xs', $string );
	
	return $charset == "UTF-8" ? ($check == 1 ? $string : iconv ( 'gb2312', 'utf-8', $string )) : ($check == 0 ? $string : iconv ( 'utf-8', 'gb2312', $string ));
}

/**
 * 获得用户的真实IP地址
 *
 * @access public
 * @return string
 */
function real_ip() {
	static $realip = NULL;
	
	if ($realip !== NULL) {
		return $realip;
	}
	
	/* 添加 */
	if (isset ( $_COOKIE ['real_ipd'] ) && ! empty ( $_COOKIE ['real_ipd'] )) {
		$realip = $_COOKIE ['real_ipd'];
		return $realip;
	}
	/* 添加 */
	
	if (isset ( $_SERVER )) {
		if (isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
			$arr = explode ( ',', $_SERVER ['HTTP_X_FORWARDED_FOR'] );
			
			/* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
			foreach ( $arr as $ip ) {
				$ip = trim ( $ip );
				
				if ($ip != 'unknown') {
					$realip = $ip;
					
					break;
				}
			}
		} elseif (isset ( $_SERVER ['HTTP_CLIENT_IP'] )) {
			$realip = $_SERVER ['HTTP_CLIENT_IP'];
		} else {
			if (isset ( $_SERVER ['REMOTE_ADDR'] )) {
				$realip = $_SERVER ['REMOTE_ADDR'];
			} else {
				$realip = '0.0.0.0';
			}
		}
	} else {
		if (getenv ( 'HTTP_X_FORWARDED_FOR' )) {
			$realip = getenv ( 'HTTP_X_FORWARDED_FOR' );
		} elseif (getenv ( 'HTTP_CLIENT_IP' )) {
			$realip = getenv ( 'HTTP_CLIENT_IP' );
		} else {
			$realip = getenv ( 'REMOTE_ADDR' );
		}
	}
	
	preg_match ( "/[\d\.]{7,15}/", $realip, $onlineip );
	$realip = ! empty ( $onlineip [0] ) ? $onlineip [0] : '0.0.0.0';
	/* 添加 */
	setcookie ( "real_ipd", $realip, time () + 36000, "/" ); /* 添加 */
	return $realip;
}

/**
 * 设置文件访问域名
 * 若是文件路径则返回共囊地址否则返回原 http地址
 * @param string $filePath 文件路径或http地址
 */
function _asset_gn($filePath){
	if(!preg_match('/http/i', $filePath)){
		return C('SITE_MAIN_DOMAIN').$filePath;
	}
	return $filePath;
}

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

