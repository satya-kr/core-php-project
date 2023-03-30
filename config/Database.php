<?php

include_once "config.php";
class Database {
	public $conn;
	private $db_host = db_host;
	private $db_user = db_user;
	private $db_pass = db_pass;
	private $db_name = db_name;

			public function getConn() {

					$this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

					if ($this->conn->connect_error) {
						die("Connection failed: " . $this->conn->connect_error);
					}
					// echo "Connect";
					return $this->conn;

					// $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass);
					// if ($this->conn->connect_error) {
					// 	die("Connection failed: " . $this->conn->connect_error);
					// } else {
					// 		echo "<br>Connected successfully";
					// 		$dbnm = "USE ".db_name."";
					// 		if( $this->conn->query($dbnm) == TRUE ) {
					// 			echo "<br>DB Selected".db_name;
				 //
					// 			$this->conn->query('create table testox(id int, name varchar(30))');
					// 		} else {
					// 				$sql = "CREATE DATABASE ".db_name;
				 //
					// 				if( $this->conn->query($sql)) {
					// 					echo "<br>DB Create successfully";
				 //
					// 					if( $this->conn->query($dbnm) == TRUE ) {
					// 						echo "<br>DB Selected".db_name;
					// 						$this->conn->query('create table testox(id int, name varchar(30))');
					// 					}
					// 				}
					// 		}
				 // }
		 }
}
