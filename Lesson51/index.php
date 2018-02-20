<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quan Li Sinh Vien</title>
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<?php
	/*
	-ham giup can thiep file.
	-co cac chuc nang:
	+ghi du lieu vao cuoi file.
	+doc toan bo file.
	+xoa du lieu theo dong.
	-truyen vao $typef la kieu can thiep file 'ghi', 'doc', 'xoa'
	*/

	function toFile($typef, $text = ''){
		$fn = 'student_list.txt';
		switch ($typef) {
			case "ghi":
			{
				$opf = fopen($fn, "a+");
				$text .= "|end"."\n";
				fwrite($opf, $text);
				fclose($opf);
			}
			break;
			case "doc":
			{
				$opf = fopen($fn, "r");
				if (filesize($fn)!=0) {
					$text = fread($opf,filesize($fn));
				}
				fclose($opf);
				return $text;
			}
			break;
			case "xoa":
			{
				$strFile = toFile('doc');
				$opf = fopen($fn, "w+");
				$text .= "|end"."\n";
				$strFile = str_replace($text, "", $strFile);
				fwrite($opf, $strFile);
				fclose($opf);
			}
			break;
			case "sua":
			{
				$strFile = toFile('doc');
				$opf = fopen($fn, "w+");
				$strFile = str_replace($text[0], $text[1], $strFile);
				fwrite($opf, $strFile);
				fclose($opf);
			}
			break;
		}
	}
	///////////////////////////



	/*
	khu xu li request
	*/
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// xu li them du lieu
		if (isset($_POST['addsv'])) {
			$text = trim($_POST['id'].'|'.$_POST['clsname'].'|'.$_POST['stdnum'].'|'.$_POST['roomnum'].'|'.$_POST['teacher']);
			toFile('ghi', $text);
			header('location: index.php');
		}
		// xu li su du lieu
		if (isset($_POST['editsv'])) {
			$edit[0] = $_POST['editsv'];
			$edit[1] = $_POST['id'].'|'.$_POST['clsname'].'|'.$_POST['stdnum'].'|'.$_POST['roomnum'].'|'.$_POST['teacher'];
			toFile('sua', $edit);
			header('location: index.php');
		}
	}
	//////////////////////////

	?>
	<div class="container">
		<?php

		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			
		/*
		khu vuc nhap them du lieu
		*/

			if (isset($_GET['addsv'])) {
				?>
				<div class="text-center">
					<form action="" method="POST" role="form">
						<legend>Nhap thong tin</legend>

						<div class="form-group">
							<label for="">Nhap ID:
								<input type="text" class="form-control" name="id">
							</label>
						</div>
						<div class="form-group">
							<label for="">Nhap ten lop:
								<input type="text" class="form-control" name="clsname">
							</label>
						</div>
						<div class="form-group">
							<label for="">Nhap so sinh vien:
								<input type="text" class="form-control" name="stdnum">
							</label>
						</div>
						<div class="form-group">
							<label for="">Nhap so phong:
								<input type="text" class="form-control" name="roomnum">
							</label>
						</div>
						<div class="form-group">
							<label for="">Nhap ten giao vien:
								<input type="text" class="form-control" name="teacher">
							</label>
						</div>
						<button type="submit" class="btn btn-primary" name="addsv">Gui du lieu</button>
					</form>
				</div>
				<?php
			}
			/////////////////////////
			/*
			khu vuc xoa du lieu
			*/

			if (isset($_GET['delete'])) {
				toFile('xoa', $_GET['delete']);
				// header('location: index.php');
			}
			//////////////////////

			/*
			khu vuc sua du lieu
			*/

			if (isset($_GET['edit'])) {
				$edit = [];
				$edit[0] = $_GET['edit'];
				$edit[1] = explode("|", $edit[0]);
				echo
				'<div class="text-center">
					<form action="" method="POST" role="form">
						<legend>Sua thong tin</legend>

						<div class="form-group">
							<label for="">Nhap ID:
								<input type="text" class="form-control" name="id" value="'.$edit[1][0].'">
							</label>
						</div>
						<div class="form-group">
							<label for="">Nhap ten lop:
								<input type="text" class="form-control" name="clsname" value="'.$edit[1][1].'">
							</label>
						</div>
						<div class="form-group">
							<label for="">Nhap so sinh vien:
								<input type="text" class="form-control" name="stdnum" value="'.$edit[1][2].'">
							</label>
						</div>
						<div class="form-group">
							<label for="">Nhap so phong:
								<input type="text" class="form-control" name="roomnum" value="'.$edit[1][3].'">
							</label>
						</div>
						<div class="form-group">
							<label for="">Nhap ten giao vien:
								<input type="text" class="form-control" name="teacher" value="'.$edit[1][4].'">
							</label>
						</div>
						<button type="submit" class="btn btn-primary" name="editsv" value="'.$edit[0].'">Cap nhat du lieu</button>
					</form>
				</div>';
			}

		}
		///////////////////
		?>


		<!-- khu vuc doc va xuat du lieu ra table -->
		<?php
		$txt = explode("|end"."\n", tofile('doc'));
		?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>id</th>
					<th>Ten lop</th>
					<th>So sinh vien</th>
					<th>So phong</th>
					<th>Giao vien</th>
					<th><a href="?addsv" title=""><button type="submit" class="btn btn-success">Them</button></a></th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (tofile('doc')!='') {
					for ($i = 0; $i < count($txt); $i++) {
						if ($txt[$i]=='') continue;
						$str = explode("|", $txt[$i]);
						echo '
							<tr>
								<td>
									'.$str[0].'
								</td>
								<td>
									'.$str[1].'
								</td>
								<td>
									'.$str[2].'
								</td>
								<td>
									'.$str[3].'
								</td>
								<td>
									'.$str[4].'
								</td>
								<td>
									<a href="?edit='.htmlspecialchars($txt[$i]).'" title=""><button type="button" class="btn btn-info">sua</button></a>
									<a href="?delete='.htmlspecialchars($txt[$i]).'" title=""><button type="button" class="btn btn-danger">xoa</button></a>
								</td>
							</tr>
						';	
					}
				}


				?>
				<!-- <tr>
					<td>
						<a href="" title=""><button type="button" class="btn btn-info">sua</button></a>
						<a href="" title=""><button type="button" class="btn btn-danger">sua</button></a>
					</td>
				</tr> -->
			</tbody>
		</table>



	</div>
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>