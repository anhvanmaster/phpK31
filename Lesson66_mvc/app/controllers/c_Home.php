<?php
require_once 'app/models/Category.php';
class HomepageController
{
	function index(){
		$models = new Category();
		$data = $models->getCateList();
		$title = "trang chu";
		$view = "app/views/homepage.php";
		include_once 'app/views/layouts/main.php';
	}
}




?>