<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="index.php" method="get">
		<input type="text" name="soA" placeholder="So A">
		<input type="text" name="soB" placeholder="So B">
		<input type="text" name="soC" placeholder="So C">
		<button type="submit" name="tinh">Tinh</button>
	</form>
	<?php
		// $name = 'van';
		// $age = 18;
		// echo "ten toi la $name"; //heredoc, chuoi
		// echo 'ten toi la'.$name; //nowdoc, ki tu
		// echo $age;
		// $arr = array(1,2,3,4,4,5,5,5,5,5,5);
		// var_dump($arr);die;
		// print_r($arr);
		if(isset($_GET['tinh']) && $_GET['soA'] != null && $_GET['soB'] != null && $_GET['soC'] != null){
			$a = $_GET['soA'];
			$b = $_GET['soB'];
			$c = $_GET['soC'];
			$total = $a+$b+$c;
			echo $a."+".$b."+".$c."=".$total.'<br/>';
			$max = 0;
			// so lon nhat
			foreach ($_GET as $key => $value) {
				if($_GET[$key]>=$max){
					$max = $_GET[$key];
				}
			}
			// tam giac
			echo "so lon nhat la $max <br/>";
			if (($a+$b>$c && $b+$c>$a && $a+$c>$b) && ($a!=0 && $b!=0 && $c!=0)) {
				echo 'day la 3 canh cua tam giac <br>';
				$p = $total/2;
				echo 'chu vi: '.$total.'<br>';
				$s = $p*($p-$a)*($p-$b)*($p-$c);
				echo 'dien tich: '.sqrt($s);
			}
		}
		
	?>
</body>
</html>