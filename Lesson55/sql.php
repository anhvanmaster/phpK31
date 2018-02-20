<?php 
$host = "localhost";
$dbname = "homework";
$dbUsername = "root";
$dbPassword = "";
try{
	$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbUsername, $dbPassword);

}catch(Exception $ex){
	die($ex->getMessage());
}


?>
