<?php
	$headers[]	=	'From: support@prosteel-jewelry.com';
	$headers[]      =       'Reply-To: support@prosteel-jewelry.com';
	$headers[] 	= 	'Cc: 2853397395@qq.com';
	$headers[]      =       'X-Mailer: PHP/'.phpversion();
	$headers[]	=	'Content-type:text/html;charset=\"utf-8\"';
	/*$headers = 'From: yingjiechen@live.cn' . "\r\n" .
	'Reply-To: 1038546502@qq.com' . "\r\n" .
	'X-Mailer: PHP/'.phpversion();*/
	/*$headers = 'From: support@HAHAHAHA.com'."\r\n" .
	'Reply-To: 1038546502@qq.com'."\r\n".
	'X-Mailer: PHP/'.phpversion();*/
	mail("1038546502@qq.com","This is a subject","<font color=\"red\">This is a message</font>",implode("\r\n", $headers));
?>
