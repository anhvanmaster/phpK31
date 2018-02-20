<?php
require "lib.php";
$students = getStudents();
$fullname = $_POST['fullname'];
$hometown = $_POST['hometown'];
$birthDate = $_POST['birthDate'];
$date = date_create($birthDate);
$birthDate = date_format($date, "d/m/Y");
if (empty($students)) {
	$maxID = 1;
} else
{
	$maxID = $students[count($students)-1][0]+1;
}
$students[] = [$maxID, $fullname, $hometown, $birthDate];
saveStudents($students);
header("location: index.php");

?>