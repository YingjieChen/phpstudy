<?php
	require_once("./config.php");
	require_once("./function.php");
	//输入相应的页码
	$websites		=	$config["webdatas"];
	$websites_reviews	=	array();
	foreach($websites as $websitekey => $website){
		$reviews		=	array();
		$tmpreviews		=	array();
		$review_page_size	=	$website["review_page_size"];
		$sourceurl		=	$website["sourceurl"];
		$product_id		=	$website["product_id"];
		$starttime		=	isset($website["starttime"])?$website["starttime"]:$config["global_starttime"];
		$endtime		=	isset($website["endtime"])?$website["endtime"]:$config["global_endtime"];
		for($page=1;$page<=$review_page_size;$page++){
			getreviews($sourceurl,$page,$tmpreviews);
			$reviews	=	array_merge($reviews,$tmpreviews);
		}
		$websites_reviews[]	=	$reviews;
		file_put_contents("aa.json",json_encode($reviews,true));
		foreach($reviews as $key=>$review){
			echo "insert into reviewatt (product_id,author,rating,body,imageurl,isshow,create_at) values(\"$product_id\",\"$review[author]\",$review[rating],\"".$review["content"]["body"]."\",'".json_encode($review["content"]["review_images"])."',1,from_unixtime(unix_timestamp('$starttime')+rand()*(unix_timestamp('$endtime')-unix_timestamp('$starttime'))));\n";		
		}
	}
?>
