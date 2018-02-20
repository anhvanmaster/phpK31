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
$stmt = $connect->prepare("SELECT * FROM products");
var_dump($stmt->bindParam());
var_dump($stmt);
function getData($sql,$connect){
	$stmt = $connect->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}
function delData($sql,$delWhere,$connect){
	$stmt = $connect->prepare($sql);
	$stmt->bindValue(":id", $delWhere);
	$stmt->execute();
}
function insData($sql, $dataIns, $connect){
	$stmt = $connect->prepare($sql);
	$stmt->bindValue(":ProductName", $dataIns[0]);
	$stmt->bindValue(":SupplierID", $dataIns[1]);
	$stmt->bindValue(":CategoryID", $dataIns[2]);
	$stmt->bindValue(":QuantityPerUnit", $dataIns[3]);
	$stmt->bindValue(":UnitPrice", $dataIns[4]);
	$stmt->bindValue(":UnitsInStock", $dataIns[5]);
	$stmt->bindValue(":UnitsOnOrder", $dataIns[6]);
	$stmt->bindValue(":Discontinued", $dataIns[7]);
	$stmt->execute();
}
function updateData($sql,$options,$connect){
	$stmt = $connect->prepare($sql);
	
	$stmt->execute();
}

?>
