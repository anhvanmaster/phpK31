<?php
require_once 'models/mysql.php';
$cate = Category::getAll();
echo '<pre>';
var_dump($cate);



?>