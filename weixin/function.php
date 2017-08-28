<?php
	global $curl_handle;
	function curlgetdata($url){
		global $curl_handle;
		$curl_handle	=       curl_init();
		//设置选项，包括URL
		curl_setopt($curl_handle,CURLOPT_URL,$url);
		curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl_handle,CURLOPT_HEADER,0);
		curl_setopt($curl_handle,CURLOPT_COOKIEJAR,"weixin.cookie");
		/*
			// post数据
			curl_setopt($ch, CURLOPT_POST, 1);
			// post的变量
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		*/
		//执行并获取HTML文档内容
		$output         =       curl_exec($curl_handle);
		//打印获得的数据
		return $output;
	}

	function curlclose(){
		global $curl_handle;
		curl_close($curl_handle);
	}
?>
