<?php
        $url            =       "https://api.bigcommerce.com/stores/lmbldchmj8/v3/catalog/products";
        $xauclient      =       "dj67sy3if3sy8nen4pkrm1jhup1afv";
        $xautoken       =       "s7icu5mbao4drv3509k8hc4e6krhulj";
        $accept         =       "application/json";
        $content_type   =       "application/json";
        $headers        =       array(
                "X-Auth-Client:$xauclient",
                "X-Auth-Token:$xautoken",
                "Accept:$accept",
                "Content-type:$content_type",
        );
        $ch             =       curl_init();
        //设置选项，包括URL
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
	/*
		// post数据
		curl_setopt($ch, CURLOPT_POST, 1);
		
		// post的变量
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		
		// put 数据
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

		//seconds to allow for connection
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);

		//seconds to allow for cURL commands
		curl_setopt($ch, CURLOPT_PUT, 1);
		$header[] = "Authorization:Basic MTczZWU4MTE1ZmVkMGUxMTNmNTVkMWQ2YWQwMmIzN2Q6NzBiOGQ3OTM0MTE5OTA3N2ViYjFhYzNkYzQxNzllYmM=";

		//定义header，可以加多个
		$header[] = "Content-Type: application/json; charset=utf-8";
		
		//定义header，可以加多个
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		
		//定义header
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); 
		//设置请求体，提交数据包
		// delete 数据
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
	*/
        //执行并获取HTML文档内容
        $output         =       curl_exec($ch);
        //释放curl句柄
        curl_close($ch);
        //打印获得的数据
        print_r($output);
?>
