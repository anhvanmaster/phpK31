<?php 
class Category
{
	var $host = 'localhost';
	var $dbname = 'l62';
	var $dbusername = 'root';
	var $dbpwd = '';
	var $connect; //= new PDO("mysql:host".$this->host.";dbname=".$this->dbname.";charset=utf8;", $this->dbusername, $this->dbpwd);
	var $table = 'categories';
/*	function connect(){
		$this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8;",$this->dbusername,$this->dbpwd);
	}*/
	function __construct(){
		$this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8;",$this->dbusername,$this->dbpwd);
	}
	// Hien thi danh sach danh muc trong db
	function getAll(){
		
		$query = "select * from ". $this->table;
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');//PDO::FETCH_ASSOC
		return $result;// ket qua cua cau lenh sql
	}
	// insert data vao trong table

	function insert(){
		$query = "INSERT INTO $this->table(name,description)
					VALUES ('$this->name', '$this->description')";
					var_dump($query);
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		
	}
	// update data vao trong table
	function update(){
		$query = "UPDATE $this->table
				  SET name = '$this->name',
				  	  description = '$this->description'
				  WHERE id = $this->id";
		var_dump($query);
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
	}
	// xoa data dua vao id
	function delete($id){
		
		$query = "DELETE FROM $this->table WHERE id = $id";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
	}
	// lay ra 1 ban ghi dua vao id
	function findOne($id){
		$query = "SELECT * FROM $this->table WHERE id = $id";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
		if (count($result) > 0) return $result[0];
		return null;
	}
	function uppercaseName(){
	return strtoupper($this->name);
	}
}

?>
<?php
/*class CSDL
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
		$this->setQuery("select * from categories");
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

}

$sql = new CSDL("localhost","root","l62","");
// $sql->setQuery("select * from categories");
echo '<pre>';
var_dump($sql->getAll());


*/
?>