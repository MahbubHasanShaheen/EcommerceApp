<?php
/**
* 
*/
class connection
{


	private $username = "root";
	private $pass = "";
	private $host = "localhost";
	private $dbname = "sarichuri_data";
	protected $db;
	
	function __construct(){
		$this->Connection();
	}

	private function Connection(){
		try{
			$this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->pass);
		}
		catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}

}









?>