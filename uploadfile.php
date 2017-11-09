<?php
	// 指定允许其他域名访问
	header('Access-Control-Allow-Origin:*');
	// 响应类型
	header('Access-Control-Allow-Methods:POST');
	$time		=	time();
	$date		=	date("Y-m-d",$time);
	//判断是否为图片  
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		file_put_contents("uploads/$date/index.html","");
		$upfile         =       $_FILES["file"];
		$name           =       $upfile["name"];//上传文件的文件名  
		$type           =       $upfile["type"];//上传文件的类型  
		$size           =       $upfile["size"];//上传文件的大小  
		$tmp_name	=	$upfile["tmp_name"];//上传文件的临时存放路径
		if(!file_exists("uploads/$date")){
			mkdir("uploads/$date");
		}
		$filename	=	"";
		switch ($type){  
			case 'image/pjpeg':
				$filename	=	"$time.jpg";
				move_uploaded_file($tmp_name,"uploads/$date/$time.jpg");
			break;  
			case 'image/jpeg':
				$filename       =       "$time.jpg";
				move_uploaded_file($tmp_name,"uploads/$date/$time.jpg");
			break;  
			case 'image/gif':
				$filename       =       "$time.gif";
				move_uploaded_file($tmp_name,"uploads/$date/$time.gif");
			break;  
			case 'image/png':
				$filename       =       "$time.png";
				move_uploaded_file($tmp_name,"uploads/$date/$time.png");
			break;  
		}  
	}
	echo json_encode(array(
		'errcode'	=>	0,
		'msg'		=>	"success",
		'url'		=>	"uploads/$date/$filename",
	));
?>
