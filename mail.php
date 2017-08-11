<?php
	/*$headers[]	=	'From: yingjiechen@live.cn';
	$headers[]      =       'Reply-To: 1038546502@qq.com';
	$headers[]      =       'X-Mailer: PHP/'.phpversion();*/

	/*$headers = 'From: yingjiechen@live.cn' . "\r\n" .
	'Reply-To: 1038546502@qq.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();*/
	$headers = 'From: support@HAHAHAHA.com' . "\r\n" .
	'Reply-To: 1038546502@qq.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail("736291739@qq.com","This is a subject","This is a message",$headers);
?>
