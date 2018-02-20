<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm sinh viên</title>
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<div class="container-fluid">
		<form action="creat_submit.php" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>Thêm sinh viên</legend>
			</div>
			<div class="form-group">
				<div class="col-md-2">
					<label for="">Tên sinh viên</label>
				</div>
				<div class="col-md-10">
					<input type="text" class="form-control" name="fullname" placeholder="Nguyên Anh Văn">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-2">
					<label  for="">Quê quán</label>
				</div>
				<div class="col-md-10">
					<input type="text" class="form-control" name="hometown" placeholder="Quê quán">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-2">
					<label for="">Ngày sinh</label>
				</div>
				<div class="col-md-10">
					<input type="date" class="form-control" name="birthDate" placeholder="Ngày sinh">
				</div>
			</div>
			

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Lưu</button>
				</div>
			</div>
		</form>
	</div>
	
	
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>