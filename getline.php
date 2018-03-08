<?php
	//head -$line	$filename
	//tail -$line	$filename
	//sed -n '2p;6,10p;' README.md
	//sed -i '{$number}d' $filename
	//sed -i '/echo "2";/aecho "3";/' $filename
	$linestr	=	"2p";
	$filename	=	"README.md";
	$handle = popen("sed -n '{$linestr}' $filename", 'r');
	while(!feof($handle)){
		echo $line = fgets($handle);
	}
	pclose($handle);
?>
