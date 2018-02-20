<?php
require "lib.php";
?>
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
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên lớp</th>
				<th>Quê quán</th>
				<th>Ngày sinh</th>
				<th>
					<a href="creat.php" title="" class="btn btn-success">Thêm mới</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php $students = getStudents(); ?>
			<?php foreach ($students as $st): ?>
			<tr>
				<td><?= $st[0] ?></td>
				<td><?= $st[1] ?></td>
				<td><?= $st[2] ?></td>
				<td><?= $st[3] ?></td>
				<td>
					<a href="edit.php?id=<?= $st[0]?>" class="btn btn-info" title="">Sửa</a>
					<a href="remove.php?id=<?= $st[0]?>" class="btn btn-danger" title="">Xóa</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	
	
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>