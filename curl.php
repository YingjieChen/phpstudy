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
        //执行并获取HTML文档内容
        $output         =       curl_exec($ch);
        //释放curl句柄
        curl_close($ch);
        //打印获得的数据
        print_r($output);
?>
