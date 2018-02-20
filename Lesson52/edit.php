<?php require "lib.php"; ?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sửa sinh viên</title>
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<?php $students = getStudents(); ?>
	<?php
	$id = $_GET['id'];
	foreach ($students as $row) {
		if ($row[0] == $id) {
			$result = $row;
			break;
		}
	}
	?>
	<div class="container-fluid">
		<form action="" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>Sửa sinh viên</legend>
			</div>
			<div class="form-group">
				<div class="col-md-2">
					<label for="">Tên sinh viên</label>
				</div>
				<div class="col-md-10">
					<input type="text" class="form-control" name="fullname" value="<?= $result[1] ?>" placeholder="Nguyên Anh Văn">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-2">
					<label  for="">Quê quán</label>
				</div>
				<div class="col-md-10">
					<input type="text" class="form-control" name="hometown" value="<?= $result[2] ?>" placeholder="Quê quán">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-2">
					<label for="">Ngày sinh</label>
				</div>
				<div class="col-md-10">
					<input type="date" class="form-control" name="birthDate" value="<?= $result[3] ?>" placeholder="Ngày sinh">
				</div>
			</div>
			

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Lưu</button>
				</div>
			</div>
		</form>
	</div>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		for ($i = 0; $i < count($students); $i++) {
			if ($students[$i][0] == $id) {
				$students[$i] = [$id, $_POST['fullname'], $_POST['hometown'], $_POST['birthDate']];
			}
		}
		saveStudents($students);
		header("location: index.php");
	}
	
	?>
	
	
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>