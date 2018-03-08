<?php 
class Category
{
	var $host = 'localhost';
	var $dbname = 'l62';
	var $dbusername = 'root';
	var $dbpwd = '';
	var $connect; //= new PDO("mysql:host".$this->host.";dbname=".$this->dbname.";charset=utf8;", $this->dbusername, $this->dbpwd);
	var $table = 'categories';
	const TABLE_NAME = "categories";

/*	function connect(){
		$this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8;",$this->dbusername,$this->dbpwd);
	}*/
	function __construct(){
		$this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8;",$this->dbusername,$this->dbpwd);
	}
	// Hien thi danh sach danh muc trong db
	static function getAll(){
		$models = new static();
		$query = "select * from ". self::TABLE_NAME;
		$stmt = $models->connect->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');//PDO::FETCH_ASSOC
		return $result;// ket qua cua cau lenh sql
	}
	// insert data vao trong table

	static function insert(){
		$models = new static();
		$query = "INSERT INTO $models->table(name,description)
					VALUES ('$models->name', '$models->description')";
					var_dump($query);
		$stmt = $models->connect->prepare($query);
		$stmt->execute();
		
	}
	// update data vao trong table
	static function update(){
		$models = new static();
		$query = "UPDATE $models->table
				  SET name = '$models->name',
				  	  description = '$models->description'
				  WHERE id = $models->id";
		var_dump($query);
		$stmt = $models->connect->prepare($query);
		$stmt->execute();
	}
	// xoa data dua vao id
	static function delete($id){
		$models = new static();
		$query = "DELETE FROM $models->table WHERE id = $id";
		$stmt = $models->connect->prepare($query);
		$stmt->execute();
	}
	// lay ra 1 ban ghi dua vao id
	static function findOne($id){
		$models = new static();
		$query = "SELECT * FROM $models->table WHERE id = $id";
		$stmt = $models->connect->prepare($query);
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