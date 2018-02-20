<?php
function randomAlpha($x){
	$al = [];
	$i = 1;
	while ($i<=$x) {
		$num = rand(1,2);
		if ($num ==1) {
			$randCh = rand(65,90);
			$al[] = [chr($randCh), $randCh];
		} else {
			$randCh = rand(97,122);
			$al[] = [chr($randCh), $randCh];
		}
		$i++;
	}
	return $al;
}
function sortAl($al){
	$lc = [];
	$uc = [];
	for ($i = 0; $i < count($al); $i++) {
		if ($al[$i][1] >= 65 && $al[$i][1] <= 90)  {
			$uc[] = $al[$i][0];
		} elseif ($al[$i][1] >= 97 && $al[$i][1] <= 122) {
			$lc[] = $al[$i][0];
		}
	}
	var_dump($lc);
	var_dump($uc);
}
echo '<pre>';
sortAl(randomAlpha(20));
// var_dump(randomAlpha(20));


?>