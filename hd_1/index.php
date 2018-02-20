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
	<div class="container">
	<!-- xây dựng sơ đồ thuật toán các chức năng
	xuất dữ liệu ra bảng
	thêm sinh viên
	sửa dòng
	xóa dòng
	xây dựng function để làm các chức năng liên quan tới file -->
	<?php
	function toFile($typef, $text = ""){
		$fn = "data.txt";
		switch ($typef) {
			case "doc":
				$opf = fopen($fn, "r");
				if (filesize($fn) != 0) {
					$text = fread($opf, filesize($fn));
				}
				fclose($opf);
				return $text;
			break;
			case "ghi":
				$opf = fopen($fn, "a+");
				$text .= "|end"."\n";
				fwrite($opf, $text);
				fclose($opf);
			break;
			case "xoa":
				$strF = toFile("doc");
				$opf = fopen($fn, "w+");
				$text .= "|end"."\n";
				$strF = str_replace($text, "", $strF);
				fwrite($opf, $strF);
				fclose($opf);
			break;
			case "sua":
				$strF = toFile("doc");
				$opf = fopen($fn, "w+");
				var_dump($text);
				$strF = str_replace($text[0], $text[1], $strF);
				fwrite($opf, $strF);
				fclose($opf);
			break;

		}
	}
	$strXL = toFile("doc");
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		if (isset($_GET['addsv'])) {
			?>
			<form action="" method="POST" role="form">
				<legend>Form title</legend>
			
				<div class="form-group">
					<label for="">ID</label>
					<input type="text" class="form-control" name="id">
				</div>
				<div class="form-group">
					<label for="">Tên lớp</label>
					<input type="text" class="form-control" name="clsname">
				</div>
				<div class="form-group">
					<label for="">Số sinh viên</label>
					<input type="text" class="form-control" name="stdnum">
				</div>
				<div class="form-group">
					<label for="">Số phòng</label>
					<input type="text" class="form-control" name="rnum">
				</div>
				<div class="form-group">
					<label for="">Giáo viên</label>
					<input type="text" class="form-control" name="teacher">
				</div>
				<button type="submit" class="btn btn-primary" name="addsv">Gửi dữ liệu</button>
			</form>
			<?php
		}
		if (isset($_GET['delete'])) {
			toFile("xoa", $_GET['delete']);
			header("location: index.php");
		}
		if (isset($_GET['edit'])) {
			$strXL = explode("|",$_GET['edit']);
			echo '
				<form action="" method="POST" role="form">
				<legend>Sửa dữ liệu</legend>
			
				<div class="form-group">
					<label for="">ID</label>
					<input type="text" class="form-control" name="id" value="'.$strXL[0].'">
				</div>
				<div class="form-group">
					<label for="">Tên lớp</label>
					<input type="text" class="form-control" name="clsname" value="'.$strXL[1].'">
				</div>
				<div class="form-group">
					<label for="">Số sinh viên</label>
					<input type="text" class="form-control" name="stdnum" value="'.$strXL[2].'">
				</div>
				<div class="form-group">
					<label for="">Số phòng</label>
					<input type="text" class="form-control" name="rnum" value="'.$strXL[3].'">
				</div>
				<div class="form-group">
					<label for="">Giáo viên</label>
					<input type="text" class="form-control" name="teacher" value="'.$strXL[4].'">
				</div>
				<button type="submit" class="btn btn-primary" name="editsv" value="'.$_GET['edit'].'">Gửi dữ liệu</button>
			</form>
			';
		}
	}
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['addsv'])) {
			$strXL = trim($_POST['id']."|".$_POST['clsname']."|".$_POST['stdnum']."|".$_POST['rnum']."|".$_POST['teacher']);
			toFile("ghi", $strXL);
			header("location: index.php");
		}
		if (isset($_POST['editsv'])) {
			$tmp = array();
			$tmp[0] = $_POST['editsv'];
			$tmp[1] = trim($_POST['id']."|".$_POST['clsname']."|".$_POST['stdnum']."|".$_POST['rnum']."|".$_POST['teacher']);
			toFile("sua", $tmp);
			header("location: index.php");
		}
	}
	?>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>
					ID
				</th>
				<th>
					Tên lớp
				</th>
				<th>
					Số sinh viên
				</th>
				<th>
					Số phòng
				</th>
				<th>
					Giáo viên
				</th>
				<th>
					<a href="?addsv" title="" class="btn btn-success">Thêm</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
			</tr>
			<?php
			$strXL = explode("|end"."\n", toFile("doc"));
			if (toFile("doc" != "")) {
				for ($i = 0; $i < count($strXL); $i++) {
					if ($strXL[$i] == "") continue;
					$dataSV = explode("|",$strXL[$i]);
					echo '
						<tr>
							<td>'.$dataSV[0].'</td>
							<td>'.$dataSV[1].'</td>
							<td>'.$dataSV[2].'</td>
							<td>'.$dataSV[3].'</td>
							<td>'.$dataSV[4].'</td>
							<td>
								<a href="?edit='.$strXL[$i].'" title="" class="btn btn-info">Sửa</a>
								<a href="?delete='.$strXL[$i].'" title="" class="btn btn-danger">Xóa</a>
							</td>
						</tr>	
					';
				}
			}
			?>
		</tbody>
	</table>
	<?php

	?>
	
	
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>