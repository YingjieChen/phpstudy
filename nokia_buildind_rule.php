<?php
	echo "Caculating starts";
	$numberset	=	array(
		array(0,0,0,0,0),
		array(0,0,0,0,0),
		array(0,0,0,0,0),
		array(0,0,0,0,0),
		array(0,0,0,0,0)
	);
	$number_pixel	= 	array(0b0001,0b0010,0b0100,0b1000);
	$number_pixel2  =       array(0b0001,0b0010,0b0100);
	function output_result($numberset){
                echo "------------\n";
                for($rx=0;$rx<5;$rx++){
                        for($ry=0;$ry<5;$ry++){
                                echo "|".$numberset[$rx][$ry];
                        }
                        echo "|\n";
                }
                echo "------------\n";
        }
	
	function ispass($numberset){
		$result	=	true;
		$fournumber	=	0;
		for($x=0;$x<5;$x++){
			for($y=0;$y<5;$y++){
				$v1	=	isset($numberset[$x+1][$y])?$numberset[$x+1][$y]:0;
				$v2	=	isset($numberset[$x][$y+1])?$numberset[$x][$y+1]:0;
				$v3	=	isset($numberset[$x-1][$y])?$numberset[$x-1][$y]:0;
				$v4	=	isset($numberset[$x][$y-1])?$numberset[$x][$y-1]:0;
				$four	=	$v1|$v2|$v3|$v4;
				$middle	=	$numberset[$x][$y]-1;
				if(($middle&$four)==$middle||$numberset[$x][$y]==1){
					if($numberset[$x][$y]==8){ $fournumber++; }
					continute;
				}else{
					$result =  false;
				}
			}
		}
		if($fournumber<2){
			$result = false;
		}
		return $result;
	}

	for($a=0;$a<3;$a++){
			$numberset[0][0]      =       $number_pixel2[$a];
			for($b=0;$b<4;$b++){
				$numberset[0][1]      =       $number_pixel[$b];
				for($c=0;$c<4;$c++){
					$numberset[0][2]      =       $number_pixel[$c];
					for($d=0;$d<4;$d++){
						$numberset[0][3]      =       $number_pixel[$d];
						for($e=0;$e<3;$e++){
							$numberset[0][4]      =       $number_pixel2[$e];
							for($f=0;$f<3;$f++){
								$numberset[1][0]      =       $number_pixel2[$f];
								for($g=0;$g<4;$g++){
									$numberset[1][1]      =       $number_pixel[$g];
									for($h=0;$h<4;$h++){
										$numberset[1][2]      =       $number_pixel[$h];
										for($i=0;$i<4;$i++){
											$numberset[1][3]      =       $number_pixel[$i];
											for($j=0;$j<3;$j++){
												$numberset[1][4]      =       $number_pixel2[$j];
												for($k=0;$k<3;$k++){
													$numberset[2][0]      =       $number_pixel2[$k];
													for($l=0;$l<4;$l++){
														$numberset[2][1]      =       $number_pixel[$l];
														for($m=0;$m<4;$m++){
															$numberset[2][2]      =       $number_pixel[$m];
															for($n=0;$n<4;$n++){
																$numberset[2][3]      =       $number_pixel[$n];
																for($o=0;$o<3;$o++){
																	$numberset[2][4]      =       $number_pixel2[$o];
																	for($p=0;$p<3;$p++){
							$numberset[3][0]      =       $number_pixel2[$p];
							for($q=0;$q<4;$q++){
								$numberset[3][1]      =       $number_pixel[$q];
								for($r=0;$r<4;$r++){
									$numberset[3][2]      =       $number_pixel[$r];
									for($s=0;$s<4;$s++){
										$numberset[3][3]      =       $number_pixel[$s];
										for($t=0;$t<3;$t++){
											$numberset[3][4]      =       $number_pixel2[$t];
											for($u=0;$u<3;$u++){
												$numberset[4][0]      =       $number_pixel2[$u];
												for($v=0;$v<4;$v++){					
													$numberset[4][1]      =       $number_pixel[$v];
													for($w=0;$w<4;$w++){
														$numberset[4][2]      =       $number_pixel[$w];
														for($x=0;$x<4;$x++){
															$numberset[4][3]      =       $number_pixel[$x];
															for($y=0;$y<3;$y++){
																$numberset[4][4]      =       $number_pixel2[$y];
																if(ispass($numberset)){
																	output_result($numberset);
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
                }
			}
        }
?>
