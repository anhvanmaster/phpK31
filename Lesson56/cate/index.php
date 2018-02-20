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
	$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : null;
	$thutu = isset($_GET['thutu']) == true && empty($_GET['thutu']) != true ? $_GET['thutu'] : "ASC";
	$xeptheo = isset($_GET['xeptheo']) == true && empty($_GET['xeptheo']) != true ? $_GET['xeptheo'] : "CategoryID";
	if (empty($keyword)) {
		$conn->setQuery("SELECT * FROM `categories` order by $xeptheo $thutu");
	} else {
		$conn->setQuery("SELECT * FROM `categories` WHERE CategoryName LIKE '%$keyword%' order by $xeptheo $thutu");
	}
	$conn->runQuery();
	$cate = $conn->getAll();
	?>

	<div class="container">
		<div class="col-md-10">
			<form action="" method="get" role="form">

				<div class="form-group col-md-3">
					<input type="text" name="keyword" class="form-control" value="<?= $keyword ?>" placeholder="Nhập từ khóa">
				</div>
				<div class="col-md-3">
					<select name="xeptheo" id="inputXeptheo" class="form-control">
						<option value="">Xếp theo</option>
						<?php foreach ($cate[0] as $key => $value) :?>
							<option value="<?= $key ?>"><?= $key ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-3">
					<select name="thutu" id="inputThutu" class="form-control">
						<option value="">Thứ tự</option>
						<option value="ASC">Tăng dần</option>
						<option value="DESC">Giảm dần</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Lọc</button>
			</form>
			<table class="table">
				<thead>
					<tr>
						<th class="col-md-2">Ảnh mô tả</th>
						<th class="col-md-6">Thông tin danh mục</th>
						<th class="col-md-2">
							Thao tác
							<a href="add.php" class="btn btn-success" title="">Thêm</a>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($cate as /*$key =>*/ $res) : ?>
						<tr>
							<td rowspan="3">
								<?= echoImg($res["Picture"]) ?>
							</td>
							<td>
								ID: <?= $res["CategoryID"] ?>
							</td>
							<td class="text-center">
								<a href="edit.php?id=<?= $res["CategoryID"] ?>" title="" class="btn btn-info">Sửa</a>
							</td>
						</tr>
						<tr>
							<td>
								Tên danh mục: <?= $res["CategoryName"] ?>
							</td>
							<td class="text-center">
								<a href="delete.php?id=<?= $res["CategoryID"] ?>" title="" class="btn btn-danger">Xóa</a>
							</td>
						</tr>
						<tr>
							<td>
								Mô tả: <?= $res["Description"] ?>
							</td>
							<td></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>






		<script src="../public/js/jquery-3.2.1.min.js"></script>
		<script src="../public/js/bootstrap.min.js"></script>
	</body>
	</html>