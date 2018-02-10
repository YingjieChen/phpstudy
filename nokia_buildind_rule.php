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
		for($x=0;$x<4;$x++){
			for($y=0;$y<4;$y++){
				$v1	=	isset($numberset[$x+1][$y])?isset($numberset[$x+1][$y]):0;
				$v2	=	isset($numberset[$x][$y+1])?isset($numberset[$x][$y+1]):0;
				$v3	=	isset($numberset[$x-1][$y])?isset($numberset[$x-1][$y]):0;
				$v4	=	isset($numberset[$x][$y-1])?isset($numberset[$x][$y-1]):0;
				$four	=	$v1|$v2|$v3|$v4;
				$middle	=	$numberset[$x][$y]-1;
				if($middle&$four==$middle){
					continute;
				}else{
					return false;
				}
			}
		}
		return true;
	}
	
	for($a=0;$a<4;$a++){
			$numberset[0][0]      =       $number_pixel[$a];
			for($b=0;$b<4;$b++){
				$numberset[0][1]      =       $number_pixel[$b];
				for($c=0;$c<4;$c++){
					$numberset[0][2]      =       $number_pixel[$c];
                    for($d=0;$d<4;$d++){
						$numberset[0][3]      =       $number_pixel[$d];
						for($e=0;$e<4;$e++){
							$numberset[0][4]      =       $number_pixel[$e];
							for($f=0;$f<4;$f++){
								$numberset[1][0]      =       $number_pixel[$f];
								for($g=0;$g<4;$g++){
									$numberset[1][1]      =       $number_pixel[$g];
									for($h=0;$h<4;$h++){
										$numberset[1][2]      =       $number_pixel[$h];
										for($i=0;$i<4;$i++){
											$numberset[1][3]      =       $number_pixel[$i];
											for($j=0;$j<4;$j++){
												$numberset[1][4]      =       $number_pixel[$j];
												for($k=0;$k<4;$k++){
													$numberset[2][0]      =       $number_pixel[$k];
													for($l=0;$l<4;$l++){
														$numberset[2][1]      =       $number_pixel[$l];
														for($m=0;$m<4;$m++){
															$numberset[2][2]      =       $number_pixel[$m];
															for($n=0;$n<4;$n++){
																$numberset[2][3]      =       $number_pixel[$n];
																for($o=0;$o<4;$o++){
																	$numberset[2][4]      =       $number_pixel[$o];
																	for($p=0;$p<4;$p++){
																		$numberset[3][0]      =       $number_pixel[$p];
																		for($q=0;$q<4;$q++){
																			$numberset[3][1]      =       $number_pixel[$q];
																			for($r=0;$r<4;$r++){
																				$numberset[3][2]      =       $number_pixel[$r];
																				for($s=0;$s<4;$s++){
																					$numberset[3][3]      =       $number_pixel[$s];
																					for($t=0;$t<4;$t++){
																						$numberset[3][4]      =       $number_pixel[$t];
																						for($u=0;$u<4;$u++){
																							$numberset[4][0]      =       $number_pixel[$u];
																							for($v=0;$v<4;$v++){
																								$numberset[4][1]      =       $number_pixel[$v];
																								for($w=0;$w<4;$w++){
																									$numberset[4][2]      =       $number_pixel[$w];
																									for($x=0;$x<4;$x++){
																										$numberset[4][3]      =       $number_pixel[$x];
																										for($y=0;$y<4;$y++){
																											$numberset[4][4]      =       $number_pixel[$y];
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
