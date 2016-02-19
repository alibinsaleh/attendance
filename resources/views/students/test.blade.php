<?php 


	class Database {

		private $server;
		private $username;
		private $password;
		private $db;

		private $conn;

		public function __construct($server, $username, $password, $db)
		{
			$this->server = $server;
			$this->username = $username;
			$this->password = $password;
			$this->db = $db;

		}

		public function connect_db()
		{
			try {
				$this->conn = new PDO('mysql:host='.$this->server.';dbname='.$this->db, $this->username, $this->password);
			} catch (PDOException $e) {
				die("Database connection failed: " . $e->getMassege() );
				exit();
			}
				

			return $this->conn;
		}

		public function query_db($sql)
		{
			$this->conn->query('SET NAMES UTF8');  // I use it to display arabic characters
			$result = $this->conn->query($sql);

			return $result;
		}

	}





	$conn = new Database("localhost", "homestead", "secret", "attendance");

	$conn->connect_db();

?>	

@extends('layout')




@section('content')

<?php

 		$result = $conn->query_db("SELECT * FROM students");
		
		if ( $result->rowCount() > 0 ){
			foreach ($result as $row) {
				echo "<h3>" .  $row["name"]  . "</h3>";
			}
		}

 	 ?>

@stop
 