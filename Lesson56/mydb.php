<?php
// define("PATHHOME", str_replace( '\\','/',dirname(dirname(__FILE__) ) ).'/');
class connSQL
{
	var $_conn;
	var $_sql = "";
	var $_stmt;
	var $_option = array();
	public function __construct($host,$dbUser,$dbName,$dbPass) {
		try{
			$this->_conn = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8",$dbUser,$dbPass);
		} catch (PDOException $e) {
			echo "Lỗi kết nối CSDL ".$e->getMessage();
		}
	}
	public function setQuery($query){
		$this->_sql = $query;
	}
	public function runQuery($options = array()){
		$this->_stmt = $this->_conn->prepare($this->_sql);
		if ($options) {
			for ($i = 0; $i < count($options); $i++) {
				$this->_stmt->bindParam($i+1, $options[$i]);
			}
		}
		$this->_stmt->execute();
		return $this->_stmt;
	}
	public function getAll($options = array()) {
		if (!$options) {
			if (!$result = $this->runQuery()) {
				return false;
			}
		} else {
			if (!$result = $this->runQuery($options)) 
				return false;	
		}
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getOnly($options = array()) {
		if (!$options) {
			if (!$result = $this->runQuery()) {
				return false;
			}
		} else {
			if (!$result = $this->runQuery($options)) 
				return false;	
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}
	public function disconnect(){
		$this->_conn = NULL;
	}
}
function echoImg($str){
	return '<img class="img-thumbnail" src="data:image/jpg;base64, '.base64_encode($str).'" />';
}

$host = "localhost";
$dbUser = "root";
$dbName = "homework";
$dbPass = "";
$conn = new connSQL($host,$dbUser,$dbName,$dbPass);

// categories






?>