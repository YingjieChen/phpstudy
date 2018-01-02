<?php
	$sourcestr	=	'Mens Spike Earrings Huggie Hoop,For Guy,Gothic Punk Rocker,Gift,Goth&Earrings,Gothic,Statement,Minimalist,Black,Stainless Steel';
	$desstr         =       strtolower($sourcestr);
	$desstr		=	preg_replace('/[^a-zA-Z0-9](.+?)/i',"-",$desstr);
	echo $desstr;
?>
