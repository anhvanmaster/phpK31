<?php
require 'sql.php';

$ProductName = $_POST['ProductName'];
$SupplierID = $_POST['SupplierID'];
$CategoryID = $_POST['CategoryID'];
$QuantityPerUnit = $_POST['QuantityPerUnit'];
$UnitPrice = $_POST['UnitPrice'];
$UnitsInStock = $_POST['UnitsInStock'];
$UnitsOnOrder = $_POST['UnitsOnOrder'];
$Discontinued = isset($_POST['Discontinued']) == true ? 0 : 1;
$dataIns = [$ProductName, $SupplierID, $CategoryID, $QuantityPerUnit, $UnitPrice, $UnitsInStock, $UnitsOnOrder, $Discontinued];
insData("INSERT INTO products(ProductName, SupplierID, CategoryID, QuantityPerUnit, UnitPrice, UnitsInStock, UnitsOnOrder, Discontinued)
	VALUES
	(:ProductName, :SupplierID, :CategoryID, :QuantityPerUnit, :UnitPrice, :UnitsInStock, :UnitsOnOrder, :Discontinued)", $dataIns, $connect);






	?>