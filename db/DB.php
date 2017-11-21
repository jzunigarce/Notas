<?php 
	
	class DB {
		const HOST = 'localhost';
		const USERNAME = 'homestead';
		const PASSWORD = 'secret';
		const DB_NAME = 'NOTES';

		private $conn;

		public function getConnection () 
		{
			if ($this->conn == null) {
				$dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME;
				$this->conn = new PDO($dsn, self::USERNAME, self::PASSWORD);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		}
	}