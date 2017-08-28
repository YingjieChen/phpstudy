<?php
	require_once("config.php");
	require_once("function.php");
	class Wechat{
		public function __construct(){
			//To init the login
			$jslogin=$this->jslogin();
			//To get the generaged QR code
			preg_match_all('/window.QRLogin.uuid = \"(.+?)\"/si',$jslogin,$qrcodematch);
			$QRLogin_uuid	=	$qrcodematch[1][0];
			$QR_url		=	"https://login.weixin.qq.com/qrcode/$QRLogin_uuid";
			$QRimage	=	file_get_contents($QR_url);
			file_put_contents("$QRLogin_uuid.jpg",$QRimage);
			system("cp $QRLogin_uuid.jpg /home/website/bytoparty/");
			echo "http://www.bytoparty.com/$QRLogin_uuid.jpg\n";
	
			//Wait for login
			//Wait for the scaning
			$_			=	time();	
			$waitforloginurl	=	"https://login.weixin.qq.com/cgi-bin/mmwebwx-bin/login?tid=1&uuid=$QRLogin_uuid&_=$_";
			if(curlgetdata($waitforloginurl)=="window.code=408;"){
				echo "Fail to scan";
				exit();
			}
			//Login pass
			$waitforloginurl2	=	"https://login.weixin.qq.com/cgi-bin/mmwebwx-bin/login?tid=0&uuid=$QRLogin_uuid&_=$_";
			$redirecturlsource	=	curlgetdata($waitforloginurl2);
			preg_match_all('/ticket=(.+?)&uuid=(.+?)&lang=(.+?)&scan=(.+?)/si',$redirecturlsource,$redirecturlmatchs);
			$ticket	=	$redirecturlmatchs[1][0];
			$uuid 	=       $redirecturlmatchs[2][0];
			$lang 	=       $redirecturlmatchs[3][0];
			$scan 	=       $redirecturlmatchs[4][0];
			preg_match_all('/window.redirect_uri=\"(.+?)\"/si',$redirecturlsource,$redirecturlmatch);
			curlgetdata($redirecturlmatch[1][0]);
			//To get the cookie
			$cookieurl	=	"https://wx2.qq.com/cgi-bin/mmwebwx-bin/webwxnewloginpage?ticket=$ticket&uuid=$uuid&lang=$lang&scan=$scan&fun=new";
			$cookiedata	=	curlgetdata($cookieurl);
			print_r($cookiedata);
		}
	
		public function jslogin(){
			global $appid,$fun,$lang,$_;
			$url	=	"https://login.weixin.qq.com/jslogin?appid=$appid&fun=new&lang=zh_CN&_=$_";
			return curlgetdata($url);
		}
	}
?>
