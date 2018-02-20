<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quan Ly Sinh Vien</title>
	<link rel="stylesheet" href="">
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
	<form action="" method="post">
		<label> nhập id:
			<input type="text" name="id">
		</label>
		<label>
			nhập lớp:
			<input type="text" name="classname">
		</label>
		<label>
			số sinh viên:
			<input type="text" name="studentid">
		</label>
		<label>
			số phòng:
			<input type="text" name="roomnumber">
		</label>
		<label>
			giáo viên:
			<input type="text" name="teacher">
		</label>
		<button type="submit">Gui du lieu</button>
	</form>
</body>
</html>
<?php
$fn = 'student_list.txt';
$opf = fopen($fn, "a+");
if (filesize($fn)!=0) {
	$content = fread($opf, filesize($fn));
	if ($content!='') {
		$arrStr = explode("\n", $content);
		for ($i = 0; $i < count($arrStr)-1; $i++) {
			if ($arrStr[$i] == '') {
				continue;
			} else {
				$str = explode('|',$arrStr[$i]);
				echo "<table>";
				echo "<tr> $str[0] $str[1] $str[2] $str[3] $str[4]</tr>";
				echo "</table>";
			}
		}
	}
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$str = $_POST['id'].'|'.$_POST['classname'].'|'.$_POST['studentid'].'|'.$_POST['roomnumber'].'|'.$_POST['teacher']."\n";
	fwrite($opf, $str);
}
fclose($opf);




?>