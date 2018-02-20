<?php require '../mydb.php'; ?>

<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="../public/css/font-awesome.min.css">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body>
	<?php
	$conn->setQuery("SELECT * FROM categories");
	$conn->runQuery();
	$cate = $conn->getAll();
	/*foreach ($result as $value) {
		// echo $value['Picture']; die;
		$img = imagecreatefromstring($value['Picture']);
		// ob_start();
		imagejpeg($img, '../public/img/'.$value['CategoryID'].'.jpg', 100);
		imagedestroy($img);
		// var_dump($img);
		
		// $data = ob_get_contents();
		// var_dump($data);
		// ob_end_clean();
		// echo '<img src="data:image/jpg;base64,' .  base64_encode($data)  . '" /><br>';
	}*/
	// $opf = fopen('../public/img/1.jpg', 'rb');
	// $str = fread($opf, filesize('../public/img/1.jpg'));
	// if ($opf) {
	// 	echo base64_encode($str);
	// }
	// fclose($opf);
	// $str = imagecreatefromstring($str);
	// imagepng($str, null, 9);
	// var_dump($cate);die;
	echo '<img src="data:image/jpg;base64,' .  base64_encode($cate[0]["Picture"])  . '" /><br>';

	?>
	


	<script src="../public/js/jquery-3.2.1.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>