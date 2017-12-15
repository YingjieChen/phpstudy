<?php
	$sourcestr	=	"Mens Spike Earrings Huggie Hoop,For Guy,Gothic Punk Rocker,Gift,Goth&Earrings,Gothic,Statement,Minimalist,Black,Stainless Steel";
	$desstr		=	preg_replace('/,| |\&/i',"-",$sourcestr);
	echo $desstr;
?>
