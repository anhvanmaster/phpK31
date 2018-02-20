<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">

		<input type="file" name="filetg" value="" placeholder="">
		<button type="submit" name="uploadfile">upload</button>
	</form>
</body>
</html>


<?php
if (isset($_POST['uploadfile'])) {
	$target_dir = "upload/";
	echo '<pre>';
	$ext = pathinfo($_FILES['filetg']['name'], PATHINFO_EXTENSION);
	var_dump($ext);
	// print_r($_FILES['filetg']);
	die;
	$target_file = $target_dir . basename($_FILES["filetg"]["name"]);
	if (move_uploaded_file($_FILES["filetg"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["filetg"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}


?>