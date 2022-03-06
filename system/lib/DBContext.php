
<?php
/**
* Main Lib
*/
class DBContext extends Connection
{
	public $lastid;
	function __construct(){
		parent::__construct();
	}


	public function addData($sql){
		$stmt = $this->db->prepare($sql);
		$lid = $stmt->execute();
		$this->lastid = $this->db->lastInsertId();
		if($lid == 1){
			return true;
		}else{
			return false;
		}
	}

	public function getData($sql){
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function deleteData($sql){
		$stmt = $this->db->prepare($sql);
		return $stmt->execute();
	}

	public function editData($sql){
		$stmt = $this->db->prepare($sql);
		return $stmt->execute();
	}

public function detailsData($tablename='',$colName= array(),$pram = array(),$limit = ""){
		$column = implode(",", $colName);
		$key = implode(",",array_keys($pram));
		if($limit == ""){
			$sql = "select $column from $tablename where $key = :$key";
		}else{
			 $sql = "select $column from $tablename where $key = :$key limit $limit";
		}
		$stmt = $this->db->prepare($sql);
		foreach ($pram as $key => $value) {
			$stmt->bindParam($key,$value);
		}
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			//print_r($stmt->errorInfo());
			return false;
		}
	}




}


?>