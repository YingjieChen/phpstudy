<?php
	function getreviews($url,$page,&$reviews){
		//获取网页内容
		$filecontent		=	file_get_contents("$url$page");
		preg_match_all('/<a[^>]*data-hook="review-author"[^>]*>[^<]*/si',$filecontent,$author_source);
		preg_match_all('/<span[^>]*data-hook="review-body"[^>]*>[^<]*/si',$filecontent,$body_source);
		preg_match_all('/<i[^>]*data-hook="review-star-rating"[^>]* review-rating/si',$filecontent,$rating_source);
		//循环找出review_id
		preg_match_all('/<div[^>]*data-hook="review"[^>]*>/si',$filecontent,$divstart);
		$review_idsources	=	$divstart[0];
		foreach($review_idsources as $key=> $review_idsource){
			//评论id
			$review_id	=	str_replace("<div id=\"","",$review_idsource);
			$review_id      =       str_replace("\" data-hook=\"review\" class=\"a-section review\">","",$review_id);
			
			//作者
			$author		=	preg_replace('/<a[^>]*data-hook="review-author"[^>]*>/si',"",$author_source[0][$key]);
			preg_match_all('/Amazon/si',$author,$contain_amazon);
			if(count($contain_amazon)>1) $author="Anonymous";

			//内容
			$body			=	preg_replace('/<span[^>]*data-hook="review-body"[^>]*>/si',"",$body_source[0][$key]);

			//评分
			$rating		=	preg_replace('/<i[^>]*data-hook="review-star-rating"[^>]*a-star-/si',"",$rating_source[0][$key]);
			$rating         =       str_replace(' review-rating',"",$rating);
			$rating		=	intval($rating);
			if($rating<=3) continue;

			//抽出其中的图片
			preg_match("/<div id=\"".$review_id."_imageSection_main\"[^>]*a-section a-spacing-medium a-spacing-top-medium review-image-container[^>]*><div class=\"review-image-tile-section\">(.*)comments-for-$review_id/si",$filecontent,$reviews_pane);
			$reviews_strsource	=	count($reviews_pane)>1?$reviews_pane[1]:"";
			$images         =       array();
			if($reviews_strsource!=""){
				preg_match_all('/<img alt="review image"[^>]*/si',$reviews_strsource,$reviews_str);
				foreach($reviews_str[0] as $filekey=>$review_str){
					$review_str	=	preg_replace('/<img(.*)src="/si',"",$review_str);
					$review_str     =       preg_replace('/\"(.*)/si',"",$review_str);
					$review_str     =       str_replace('._SY88',"",$review_str);
					print_r($review_str);
					$time		=	time();
					$dir		=	date("Y-m-d",$time);
					if(!file_exists($dir)) 	{
						mkdir($dir);
					}
					$filecontent	=	file_get_contents($review_str);
					file_put_contents("$dir/$review_id"."_"."$filekey.jpg",$filecontent);
					$images[]	=	date("Y-m-d",$time)."/$review_id"."_"."$filekey.jpg";
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
