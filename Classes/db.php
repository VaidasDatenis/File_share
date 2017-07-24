<?php

class DB {
	private $db_hostname = 'localhost';
	private $db_username = 'root';
	private $db_password = '';
	private $db = 'hello world';

	private $conn;

	// prisijungiam prie DB (construct)
	function __construct() {
		try {
		    $this->conn = new PDO("mysql:host=$this->db_hostname;dbname=$this->db;charset=utf8", $this->db_username, $this->db_password);
		    // set the PDO error mode to exception
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	}
		catch(PDOException $e) {
		    echo "Connection failed: " . $e->getMessage();
	    	}
	}



	// ivygdom uzklausa ir grazinam reiksmes
	public function query($sql) {
		$result = [];
		$query = $this->conn->query($sql);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);

		while ($row = $query->fetchObject()) {
			array_push($result, $row);
		}
		return $result;

	}

	public function store($sql) {
		$query = $this->conn->query($sql);
		$response = $query->execute();
		
		return $response;

	}





	// atsijungiam nuo db (destruct)
	function __destruct() {
		$this->conn = null;
	}


}

