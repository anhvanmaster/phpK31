<?php
require '../mydb.php';
if (isset($_GET['id'])){
	$id = [0 => $_GET['id']];
	$conn->setQuery("SELECT * FROM categories WHERE CategoryID = ?");
	$cate = $conn->getOnly($id);
?>

<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sửa danh mục <?= $cate["CategoryName"] ?></title>
	<link rel="stylesheet" href="../public/css/font-awesome.min.css">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body>
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<legend>Sửa danh mục <?= $cate["CategoryName"] ?></legend>

		<div class="form-group">
			<label for="">Tên sản phẩm</label>
			<input type="text" class="form-control" name="CategoryName" placeholder="Nhập tên sản phẩm" value="<?= $cate['CategoryName'] ?>">
		</div>
		<div class="form-group">
			<label for="">Mô tả sản phẩm</label>
			<textarea class="form-control" rows="3" name="Description" placeholder="Nhập mô tả sản phẩm"><?= $cate['Description'] ?></textarea>
		</div>
		<div class="form-group">
			<label>
				Ảnh mô tả:
				<input type="file" name="refile">
			</label>
		</div>
		<button type="submit" class="btn btn-info">Sửa</button>
	</form>

	<?php } ?>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$id = array();
		$id[] = $cate["CategoryName"];
		$id[] = $cate["Description"];
		if ($_FILES['refile']['error']==0) {
			$opf = fopen($_FILES['refile']['tmp_name'], 'rb');
			$str = fread($opf, filesize($_FILES['refile']['tmp_name']));
			fclose($opf);
			$id[] = $str;
		} else {
			$id[] = $cate['Picture'];
		}
		$id[] = $cate["CategoryID"];
		$conn->setQuery("UPDATE categories
						SET CategoryName 	= 	?,
							Description 	= 	?,
							Picture 		= 	?
						WHERE CategoryID 	= 	?");
		$conn->runQuery($id);
		header("location: index.php");
	}
	?>
	<script src="../public/js/jquery-3.2.1.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>