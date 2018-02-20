<?php
require '../mydb.php';
if (isset($_GET['id'])) {
	$id = [0 => $_GET['id']];
	$conn->setQuery("DELETE FROM categories WHERE CategoryID = ?");
	$conn->runQuery($id);
	header("location: index.php");
}
?>