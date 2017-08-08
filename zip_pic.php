<?php
	//遍历获取文件
	//test下方创建新文件夹
	//写入文件
	function resizeimage($srcfile,$desfile,$deswidth,$desheight,$method){
                list($width, $height)=getimagesize($srcfile);
                $new=imagecreatetruecolor($deswidth,$desheight);
                $img="";
                $method         =       strtolower($method);
                switch($method){
                        case("jpg"):
                                $img=imagecreatefromjpeg($srcfile);
                        break;
                        case("png"):
                                $img=imagecreatefrompng($srcfile);
                        break;
                }
                //copy部分图像并调整
                imagecopyresized($new,$img,0,0,0,0,$deswidth,$desheight,$width,$height);
                //图像输出新图片、另存为
                switch($method){
                        case("jpg"):
                                imagejpeg($new,$desfile);
                        break;
                        case("png"):
                                imagepng($new,$desfile);
                        break;
                }
                imagedestroy($new);
                imagedestroy($img);
        }

	function emun_dir($filepathroot){
		if(is_dir($filepathroot)){
			if( $dh = opendir($filepathroot) ){
				while( ($file=readdir($dh)) !==false){
					if($file!="."&& $file!=".."){
						if(is_dir($file)){
							emun_dir($filepathroot.$file);
						}
						else{
							$srcfilepath	=	"$filepathroot/$file";
							preg_match('/\.(.*)/si',$file,$match);
							$desfiledir	=	"../testout/747X747/$filepathroot";
							if(!file_exists($desfiledir)) mkdir($desfiledir);
							resizeimage($srcfilepath,"$desfiledir/$file",1024,1024,$match[1]);
						}
					}
				}
				closedir($dh);
			}
		}
	}
	emun_dir("./");
?>
