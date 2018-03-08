<?php 
require 'models/mysql.php';
$cateModels = new Category();
$models  = $cateModels->findOne($_GET['id']);
include_once 'form.php';



 ?>