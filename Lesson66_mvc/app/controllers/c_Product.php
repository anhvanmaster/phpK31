<?php
require_once 'app/models/Product.php';
class ProductController{
	function index(){
		$id = $_GET['cateid'];
		$models = new Product();
		$data = $models->getProductList($id);
		
		$title = "danh sach san pham";
		$view = "app/views/product/list.php";
		include_once 'app/views/layouts/main.php';
	}
}







?>