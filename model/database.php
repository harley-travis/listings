<?php

	class Database{
		private static $dsn = 'mysql:host=db.whitejuly.com;dbname=whitejuly_store';
		private static $username = 'whitejuly_admin';
		private static $password = 'Spiderman1!';
		private static $db;
		
		private function __construct(){}
		
		public static function getDB() {
			if (!isset(self::$db)){
				try{
					self::$db = new PDO(self::$dsn,
									    self::$username,
									   	self::$password);
				} catch (PDOException $e){
					$error_message = $e->getMessage();
					echo "Error: There was an error establashing a connection to the database.";
					exit();
				}
			}
			return self::$db;
		}
	}

?>




