<?php
require_once 'models/mysql.php';
$models = new Category();
$id = $_GET['id'];
$models->delete($id);
header("location: btvn.php");



?>