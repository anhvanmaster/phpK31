<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<?php
	require "sql.php";
	$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : null;
	$thutu = isset($_GET['thutu']) == true && empty($_GET['thutu']) != true ? $_GET['thutu'] : "ASC";
	$xeptheo = isset($_GET['xeptheo']) == true && empty($_GET['xeptheo']) != true ? $_GET['xeptheo'] : "ProductID";
	if (empty($keyword)) {
		$products = getData("SELECT * FROM `products` order by $xeptheo $thutu",$connect);
	} else {
		$products = getData("SELECT * FROM `products` WHERE ProductName LIKE '%$keyword%' order by $xeptheo $thutu",$connect);
	}
	?>
	<form action="" method="get" role="form">

		<div class="form-group col-md-3">
			<input type="text" name="keyword" class="form-control" value="<?= $keyword ?>" placeholder="Nhập từ khóa">
		</div>
		<div class="col-md-3">
			<select name="xeptheo" id="inputXeptheo" class="form-control">
				<option value="">Xếp theo</option>
				<?php foreach ($products[0] as $key => $value) :?>
					<?php if (ord($key)>47 && ord($key)<58) continue;?>
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
				<th>ProductID</th>
				<th>ProductName</th>
				<th>SupplierID</th>
				<th>CategoryID</th>
				<th>QuantityPerUnit</th>
				<th>UnitPrice</th>
				<th>UnitsInStock</th>
				<th>UnitsOnOrder</th>
				<th>ReorderLevel</th>
				<th>Discontinued</th>
				<th><a href="add.php" class="btn btn-success" title="">Them moi</a></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $dt): ?>
				<tr>
					<td><?= $dt[0] ?></td>
					<td><?= $dt[1] ?></td>
					<td><?= $dt[2] ?></td>
					<td><?= $dt[3] ?></td>
					<td><?= $dt[4] ?></td>
					<td><?= $dt[5] ?></td>
					<td><?= $dt[6] ?></td>
					<td><?= $dt[7] ?></td>
					<td><?= $dt[8] ?></td>
					<td><?= $dt[9] ?></td>
					<td><a href="remove.php?id=<?= $dt[0] ?>" class="btn btn-danger" title="">Xoa</a></td>
					<td><a href="edit.php?id=<?= $dt[0] ?>" class="btn btn-info" title="">Sua</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	
	
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>