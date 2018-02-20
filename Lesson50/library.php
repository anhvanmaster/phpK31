<?php
function randomArray($x){
	$result = [];
	for ($i=0; $i < $x; $i++) { 
		// them phan tu vao trong mang
		// moi phan tu la 1 so random trong khoan 1-1000
		$result[] = rand(1, 50);
	}
	return $result;
}



?>