<?php
require 'models/mysql.php';
$conn = new Category();
$cateList = $conn->getAll();
// echo '<pre>';
// var_dump($cateList);

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
		<caption></caption>
		<thead>
			<tr>
				<th>id</th>
				<th>Tên</th>
				<th>Mô tả</th>
				<th>
					<a href="create.php" title="">thêm</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($cateList as $key => $value): ?>
				<tr>
					<td><?= $value->id ?></td>
					<td>
						<a href="detail.php?id=<?= $value->id ?>" title="">
							<?= $value->uppercaseName() ?>
						</a>
					</td>
					<td><?= $value->description ?></td>
					<td>
						<a href="update.php?id=<?= $value->id ?>" title="">update</a>
						<a href="remove.php?id=<?= $value->id ?>" title="">remove</a>
						<a href="detail.php?id=<?= $value->id ?>" title="">chi tiết</a>
					</td>
				</tr>
			<?php endforeach ?>
			
		</tbody>
	</table>
</body>
</html>