<?php
require_once 'models/mysql.php';
$id = $_GET['id'];
$models = new Category();
$product = $models->findOne($id);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table>
		
		<thead>
			<tr>
				<th>thông số</th>
				<th>chi tiết</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>ID:</td>
				<td><?= $product->id ?></td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><?= $product->name ?></td>
			</tr>
			<tr>
				<td>image:</td>
				<td><?= $product->image ?></td>
			</tr>
			<tr>
				<td>description:</td>
				<td><?= $product->description ?></td>
			</tr>
		</tbody>
	</table>
</body>
</html>