<!-- <?php 
require "sql.php";
$sql = "SELECT * FROM `products` where ProductnName like";
//nạp câu lệnh vào kết nối csdl
$stmt = $connect->prepare($sql);
//thực thi lệnh trên csdl
$stmt->execute();
//lấy ra toàn bộ kết quả
$products = $stmt->fetchAll();
// var_dump($products[1]);
?>
<style>
table{
	background: lightblue;
}
table thead{
	background: blue;
}
table td{
	background: white;
}
</style>
<table>
	<thead>
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>id nha cung cap</th>
			<th>id danh muc</th>
			<th>cach dong goi</th>
			<th>gia</th>
			<th>ton kho</th>
			<th>dang duoc dat</th>
			<th>dat lai</th>
			<th>deo biet</th>
		</tr>
	</thead>
	<tbody>

		<?php
		foreach ($products as $key => $value) {
			?>

			<tr>
				<td><?= $products[$key][0] ?></td>
				<td><?= $products[$key][1] ?></td>
				<td><?= $products[$key][2] ?></td>
				<td><?= $products[$key][3] ?></td>
				<td><?= $products[$key][4] ?></td>
				<td><?= $products[$key][5] ?></td>
				<td><?= $products[$key][6] ?></td>
				<td><?= $products[$key][7] ?></td>
				<td><?= $products[$key][8] ?></td>
				<td><?= $products[$key][9] ?></td>
			</tr>
	<?php
}
?>

		</tbody>
	</table>
<?php

?> -->
<?php require "sql.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style>
	table{
		background: lightblue;
	}
	table thead{
		background: blue;
	}
	table td{
		background: white;
	}
</style>
</head>
<body>
	
</body>
</html>