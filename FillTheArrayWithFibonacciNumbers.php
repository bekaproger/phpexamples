<?php

$arr = [

	[],
	[],
	[],
	[],
	[],
	[],

];


//filling up the array
function makeArr($arr){
	$l = count($arr);
	$row = 0;
	$i = 0;
	for($i = 0; $i< $l; $i++){
		for($row = 0 ; $row < $l; $row++){
			if($row < 2){
				if($i == 0){
					/*
						if we are filling first two rows and column ($i = 0) fill these cells with "1" 
						=> [
							[1],
							[1]
							[x]
							...
						]
					*/
					$arr[$row][$i] = 1;
				}else{
					/*
						if its first or second row we need to put the sum of two previous rows
					*/
					if($row == 0){
						/*
							[
							 $i= 0, 1, ...
								[x, C], $row = 0
								[x],    $row = 1
								[x],	$row = 2
								[x],	$row = 3 
								[A],	$row = 4
								[B],    $row = 5
							]
							C = A + B;
						*/
						$arr[$row][$i] = $arr[$l - 1][$i - 1] + $arr[$l-2][$i-1]; 
					}elseif($row == 1){
						/*
							[
								[x, B], 
								[x, C],
								[x],
								[x],
								[x],
								[A],
							]
							C = A + B;
						*/
						$arr[$row][$i] = $arr[$l - 1][$i - 1] + $arr[$row - 1][$i];
					}
				}
			}else{
				/*
					[
						[x],
						[x],
						[x],
						[A],
						[B],
						[C],
					]
					C = A + B;
				*/
				$arr[$row][$i] = $arr[$row-1][$i] + $arr[$row-2][$i];
			}
		}
	}
	return $arr;
}

//the sum of the diagonal
function countArr($arr){
	$l = count($arr);
	//getting the last row
	$row = $l - 1;
	$i = 0;
	$dCount = 0;
	while($i < $l){
		$dCount += $arr[$row][$i];
		$row--;
		$i++;

	}
	return $dCount;
}
$arr= makeArr($arr);

//To show the result
for ($i = 0; $i < count($arr); $i++) {
	foreach ($arr[$i] as $k) {
		echo "$k, | ";
	}
	echo "\n";
}

echo countArr($arr) . PHP_EOL;
