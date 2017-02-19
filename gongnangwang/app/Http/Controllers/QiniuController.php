<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Model\Pai;
use DB;
use Qiniu\Auth as QiniuAuth;
use Qiniu;
header('Access-Control-Allow-Origin:*');
class QiniuController extends Controller
{
	public function uptoken()
	{
		header('Access-Control-Allow-Origin:*');
		$bucket = "gongnang";
		$auth = new QiniuAuth('kUEkJDHTkyF7UDT2_UOr90oPXDG8NyLZysOpbEI4', 'Q26KC5SrKJUQm5ixrUw8q041wGulX-sDXNkpqKoX');
		
		//'oh8ny9g1a.bkt.clouddn.com'
		//notify url
		
		$wmImg = Qiniu\base64_urlSafeEncode('http://rwxf.qiniudn.com/logo-s.png');
		$pfopOps = "avthumb/m3u8/wmImage/$wmImg";
		$policy = array(
				'persistentOps' => $pfopOps,
				'persistentNotifyUrl' => 'http://127.0.0.1:8082/cb.php',
				'persistentPipeline' => '',
		);
		
		$upToken = $auth->uploadToken($bucket, null, 3600, $policy);
		
		echo json_encode(array('uptoken' => $upToken));
	}
	
	public function pfop_status(Request $request){
		$input = $request->all();
		$url = "http://api.qiniu.com/status/get/prefop?id=".$input['id'];
		
		$resp = file_get_contents($url);
		
		error_log($resp);
		
		header("Access-Control-Allow-Origin:*");
		echo $resp;
	}
}