<?php
function randomArray($x){
	$arr = [];
	for ($i = 0; $i < $x; $i++) {
		$arr[] = rand(1,1000);
	}
	return $arr;
}
function addOdd($x){
	$res = [];
	while (count($res)<=$x) {
		$num = rand(1,1000);
		if ($num%2==0) {
			$res[] = $num;
		}
	}
	return $res;
}
function minus($x, $y){
	$res = [];
	while (count($res)<$x) {
		$num = rand(1,1000);
		if ($num%$y==0) {
			$res[] = $num;
		}
	}
	echo $y.'<br>';
	return $res;
}
function sortArr($arr){
	// var_dump($arr);
	for ($i = count($arr)-1; $i > 0; $i--) {
		for ($j = 0; $j <= $i-1; $j++) {
			if ($arr[$j]>=$arr[$i]) {
				$tg = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $tg;
			}
		}
	}
	// var_dump($arr);
	return $arr;
}
function testSort($arr){
	var_dump($arr);
	for ($i = 0; $i < count($arr)-1; $i++) {
		for ($j = $i+1; $j < count($arr); $j++) {
			if ($arr[$j]<=$arr[$i]) {
				$tmp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $tmp;
			}
		}
	}
	return $arr;
}
function maxTest($arr, $num){
	$start = microtime(true);
	$arr = sortArr($arr);
	// var_dump($arr);
	$total = 0;
	for ($i = count($arr)-1; $i >= count($arr)-$num; $i--) {
		$total += $arr[$i];
	}
	echo microtime(true) - $start.'<br>';
	return $total;
}
function maxTotal($arr, $num){
	$start = microtime(true);
	if ($num>count($arr)) {
		return 'quá số lượng';
	} else {
		// var_dump($arr);
		$i = 0;
		$maxArr = [];
		$total = 0;
		$lengArr = count($arr)-1;
		while ($i<$num) {
			$m = [$arr[0],0];
			for ($j = 0; $j <= $lengArr; $j++) {
				if ($arr[$j] >= $m[0]){
					$m[0] = $arr[$j];
					$m[1] = $j;
				}
			}
			$arr[$m[1]] = null;
			$maxArr[] = $m;
			$total += $m[0];
			$i++;
		}
		var_dump($maxArr);
		echo microtime(true) - $start.'<br>';
		return $total;
	}
}
function randomAlpha($i){
	$al = [];
	while ($i<=20) {
	    $num = rand(65,122);
	    if (($num >= 65 && $num <= 90) || ($num >= 97 && $num <= 122)) {
	    	$al[] = chr($num);
	    	$i++;
	    }
	}
	return $al;
}
function alpha20($al){

}



?>
