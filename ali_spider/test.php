<?php
	$filecontent	=	file_get_contents("https://feedback.aliexpress.com/display/productEvaluation.htm?productId=32610734311&ownerMemberId=201798099&companyId=&memberType=seller&page=1");
	preg_match_all('/<span class="user-name">(.+?)<\/span>/si',$filecontent,$author_source);
	print_r($author_source);
?>
