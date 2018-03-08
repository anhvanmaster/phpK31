<?php
require_once 'app/models/database.php';
class Category extends database
{
	const TABLE_NAME = 'categories';
	function getCateList(){
		$sql = "SELECT * FROM ".self::TABLE_NAME;
		$this->setQuery($sql);
		$this->execute();
		return $this->loadAllRows();
	}
}






?>