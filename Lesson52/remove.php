<?php
require "lib.php";
$id = $_GET['id'];
$students = getStudents();
echo '<pre>';
var_dump($students);
for ($i = 0; $i < count($students); $i++) {
	if ($students[$i][0] == $id) {
		array_splice($students, $i, 1);
		break;
	}
}
saveStudents($students);
var_dump($students);
header("location: index.php");



?>