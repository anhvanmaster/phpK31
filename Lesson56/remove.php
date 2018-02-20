<?php
require 'sql.php';
$productID = $_GET['id'];
delData("delete from products where productid = :id", $productID, $connect);
header("location: index.php");




?>