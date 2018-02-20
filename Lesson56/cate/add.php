<?php require '../mydb.php'; ?>

<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm danh mục</title>
	<link rel="stylesheet" href="../public/css/font-awesome.min.css">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body>
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<legend>Form title</legend>

		<div class="form-group">
			<label for="">Tên sản phẩm</label>
			<input type="text" class="form-control" name="CategoryName" placeholder="Nhập tên sản phẩm">
		</div>
		<div class="form-group">
			<label for="">Mô tả sản phẩm</label>
			<textarea class="form-control" rows="3" name="Description" placeholder="Nhập mô tả sản phẩm"></textarea>
		</div>
		<div class="form-group">
			<label>
				Ảnh mô tả:
				<input type="file" name="upfile">
			</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$id = array();
		$id[] = $_POST["CategoryName"];
		$id[] = $_POST["Description"];
		if ($_FILES['upfile']['error']==0) {
			$opf = fopen($_FILES['refile']['tmp_name'], 'rb');
			$str = fread($opf, filesize($_FILES['refile']['tmp_name']));
			fclose($opf);
			$id[] = $str;
		} else {
			$opf = fopen("../public/img/noimg.png","rb");
			$str = fread($opf,filesize("../public/img/noimg.png"));
			fclose($opf);
			$id[] = $str;
		}
		$conn->setQuery("INSERT INTO categories(CategoryName,Description,Picture)
						VALUES (?,?,?)");
		$conn->runQuery($id);
		header("location: index.php");
	}
	?>



	<script src="../public/js/jquery-3.2.1.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>