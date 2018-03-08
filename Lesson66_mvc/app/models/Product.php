<?php
require_once 'app/models/database.php';
class Product extends database{
	const TABLE_NAME = 'products';
	function getProductList($cateId){
		$sql = "SELECT
					p.*,
					c.name as category_name
				FROM products AS p
				JOIN categories AS c
				on p.category_id = c.id
				WHERE p.category_id = $cateId";
		$this->setQuery($sql);
		$this->execute();
		return $this->loadAllRows();
	}
}

?>