<?php

class database{

	public $conn;

	public function __construct() // here double underscore has been input.
	{
		$host="localhost";
		$dbUser="root";
		$dbPass="";
		$dbName="yousuf_ctg_331_php_crud";
		
		try {
		  $this->conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
		  // this is a PDO connection system
				
		} catch(PDOException $e) {

		  echo "Connection failed: " . $e->getMessage();
		}
	}

		public function exec($sql)
		{
				$statement = $this->conn->prepare($sql);
				$statement->execute();
		}

		public function fetch($sql)
		{
				$statement = $this->conn->prepare($sql);
				$statement->execute();
				return $statement->fetchAll();
		}
}

?>