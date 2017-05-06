<?php
	// not real login information. this is for testing purposes
	// it is only effective on XAMMP. Nice try suckas
//    $dsn = 'mysql:host=localhost;dbname=white_july';
//    $username = 'root';
//    $password = '';
//    try {
//        $db = new PDO($dsn, $username, $password);
//    } catch (PDOException $e) {
//        $error_message = $e->getMessage();
//		echo "Error: There was an error establashing a connection to the database.";
//        exit();
//    }

	class Database{
		private static $dsn = 'mysql:host=localhost;dbname=white_july';
		private static $username = 'root';
		private static $password = '';
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




