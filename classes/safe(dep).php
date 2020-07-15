<?php
$db = new Database();

class safe{

public $conn;
//public $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	public function Stext($string){
	  $this->conn =mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	  $this->conn->real_escape_string(strip_tags($string));
	  return $string;
	}

}

$safe = new safe();

?>