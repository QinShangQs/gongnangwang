<?php
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;


class Sendsms extends Model {

	public function mobilephone($cusername,$cpassword,$cgwid,$cmobile,$cmessage)
	{
		$http = 'http://api.106txt.com/smsGBK.aspx?';
		$data = array
			(
			'action'=>'Send',
			'username'=>$cusername,	//用户账号
			'password'=>$cpassword,	
			'gwid'=>$cgwid,		//企业ID
			'mobile'=>$cmobile,	//号码
			'message'=>$cmessage 	//内容
			
			);
		return $this->postSMS($http,$data);			//POST方式提交

		//判断$result 返回值
	}

	public function postSMS($url,$data='')
	{
		$row = parse_url($url);
		$host = $row['host'];
		$port = isset($row['port']) ? $row['port']:80;
		$file = $row['path'];
		$post = "";
		while (list($k,$v) = each($data)) 
		{
			$post .= rawurlencode($k)."=".rawurlencode($v)."&"; 
		}
		$post = substr( $post , 0 , -1 );
		$len = strlen($post);
		$fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
		if (!$fp) {
			return "$errstr ($errno)\n";
		} else {
			$receive = '';
			$out = "POST $file HTTP/1.1\r\n";
			$out .= "Host: $host\r\n";
			$out .= "Content-type: application/x-www-form-urlencoded\r\n";
			$out .= "Connection: Close\r\n";
			$out .= "Content-Length: $len\r\n\r\n";
			$out .= $post;      
			fwrite($fp, $out);
			while (!feof($fp)) {
				$receive .= fgets($fp, 128);
			}
			fclose($fp);
			$receive = explode("\r\n\r\n",$receive);
			unset($receive[0]);
            return iconv("GB2312","UTF-8",implode("",$receive));
			//return implode("",$receive);
		}
	}
	
}

?>