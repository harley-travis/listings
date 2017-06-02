<?php 

	class SignedInUsers{
		
		public static function get_signed_in_user(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM users';
			$statement = $db->prepare($query);
			$statement->execute();
			$user = $statement->fetchAll();
			$statement->closeCursor();

			return $user;    
			
		}
		
	}

?>