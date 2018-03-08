<?php
	//如何将五亿的数据进行有效排序
	//将五亿的数据分割成 20000 份
	//依次对这 25000 份数据进行内部排序
	//依次读取各个文件的最小值,比较后写入总文件

	//算法测试步骤
	//生成五亿个随机数写到文件里面去


	/*$filename	=	"data_bigsort";
	$numbersize	=	500000000;
	function generate(){
		global $filename,$numbersize;
		for($i=0;$i<$numbersize;$i++){
			$datanumber	=	rand(0,$numbersize);
			//echo $datanumber."\n";
			file_put_contents($filename,"$datanumber\n", FILE_APPEND);
		}
	}
	generate();*/
	//76828109
	//data_bigsort
	//head -$line	$filename
	//tail -$line	$filename
	//sed -n '2p;6,10p;' README.md
	//sed -i '{$number}d' $filename
	//sed -i '/echo "2";/aecho "3";/' $filename
	/*$linestr	=	"2p";
	$filename	=	"README.md";
	$handle = popen("sed -n '{$linestr}' $filename", 'r');
	while(!feof($handle)){
		echo $line = fgets($handle);
	}
	pclose($handle);*/
	
	$pagesize	=	10000;
	$filename	=	"data_bigsort";
	$filelines	=	exec("wc -l data_bigsort");
	$lines_arr	=	explode(" ",$filelines);
	$lines		=	$lines_arr[0];
	
	//文件分割
	/*for($i=0;$i<ceil($lines/$pagesize);$i++){
		$firstline	=	$pagesize*$i+1;
		$lastline	=	$pagesize*($i+1);
		$commandline	=	"sed -n '{$firstline},{$lastline}p' $filename > {$filename}_$i";
		echo $commandline;
		system($commandline);
	}*/

	// 文件内部排序
	$filename	=	"data_bigsort_0";
	$filecontent	=	file_get_contents($filename);
	$number_arr	=	explode("\n",$filecontent);
	for($i=0;$i<count($number_arr);$i++){
		for($j=$i+1;$j<count($number_arr);$j++){
			if($number_arr[$j]<$number_arr[$i]){
				$temp			=	$number_arr[$j];
				$number_arr[$j]		=	$number_arr[$i];
				$number_arr[$i]		=	$temp;
			}
		}
	}
	$resultcontent	=	implode("\n",$number_arr);
	file_put_contents($filename,$resultcontent);
?>
