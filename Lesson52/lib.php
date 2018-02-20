<?php
function getStudents(){
	$data = file_get_contents("data.txt");
	$arr = explode("|end", $data);
	$result = [];
	foreach ($arr as $row) {
		if (empty(trim($row))) continue;
		$student = explode("|", $row);
		$result[] = $student;
	}
	return $result;
}
function saveStudents($students){
	$content = "";
	foreach ($students as $row) {
		$content .= $row[0]."|".$row[1]."|".$row[2]."|".$row[3]."|end";
	}
	$file = fopen("data.txt", "w+");
	if (!$file) {
		echo 'Không mở được file!';
	}
	else {
		fwrite($file, $content);
		fclose($file);
	}
}
?>