<?php
	function getreviews($url,$page,&$reviews){
		//获取网页内容
		$reviews		=	array();
		$filecontent		=	file_get_contents("$url$page");
		preg_match_all('/<span class="user-name">(.+?)<\/span>/si',$filecontent,$author_source);
		preg_match_all('/<dt class="buyer-feedback">(.+?)<\/span>/si',$filecontent,$body_source);
		preg_match_all('/<span class="star-view"><span style="width:(.+?)%"><\/span><\/span>/si',$filecontent,$rating_source);
		//循环找出review_id
		preg_match_all('/<input id="feedback-(.+?)"/si',$filecontent,$divstart);
		$review_idsources	=	$divstart[1];

		//图片feedback-id____r-time
		preg_match_all('/feedback-id(.+?)r-time/si',$filecontent,$picstart);
		$picture_source		=	$picstart[1];
		foreach($review_idsources as $key=> $review_id){
			//作者
			$author		=	preg_replace('/<a[^>]*data-hook="review-author"[^>]*>/si',"",$author_source[1][$key]);
			preg_match_all('/AliExpress/si',$author,$contain_amazon);
			$author		=	preg_replace('/<a[^>]*>/si',"",$author);
			$author         =       trim(preg_replace('/<\/a>/si',"",$author));
			if(count($contain_amazon)>0) $author="Anonymous";
			//内容
			$body			=	trim(str_replace('<span>',"",$body_source[1][$key]));
			if($body=="") continue;
			//print_r($body);
			//评分
			$rating		=	intval($rating_source[1][$key]);
			$rating		=	$rating/20;
			if($rating<=3) continue;
			
			//抽出其中的图片
			preg_match_all("/<li[^>]*pic-view-item[^>]*data-src=\"(.+?)\"[^>]*[^>]*>/si",$picture_source[$key],$pictures);
			//$reviews_strsource	=	count($reviews_pane)>1?$reviews_pane[1]:"";
			$images         =       array();
			if(count($pictures)>1){
				foreach($pictures[1] as $filekey=>$picture){
					$time		=	time();
					$dir		=	date("Y-m-d",$time);
					if(!file_exists($dir)) 	{
						mkdir($dir);
					}
					$filecontent	=file_get_contents($picture);
					file_put_contents("$dir/$review_id"."_"."$filekey.jpg",$filecontent);
					$images[]=date("Y-m-d",$time)."/$review_id"."_"."$filekey.jpg";
				}	
			}
			$reviews[$key]	=	array(
				"review_id"	=>	$review_id,
				"author"	=>	$author,
				"rating"	=>	$rating,
				"content"	=>	array(
					"body"		=>	$body,
					"review_images"	=>	$images,
				),
			);
		}
	}
?>
