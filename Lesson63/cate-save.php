<?php
require_once 'models/mysql.php';
$cateModel = new Category();
$id = $_POST['id'];
if ($id > 0) {
	$models = $cateModel->findOne($id);
} else {
	$models = new Category();
}
$models->name = $_POST['name'];
$models->description = $_POST['description'];

if ($id > 0) {
	$models->update();
} else {
	$models->insert();
}
header("location: btvn.php")





?>