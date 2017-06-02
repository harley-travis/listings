<?php 

	class Jobs_DB{
		
		public static function get_all_jobs(){
			$db = Database::getDB();
			
			$db = Database::getDB();
			$query = 'SELECT * FROM jobs';
			$statement = $db->prepare($query);
			$statement->execute();
			$jobs = $statement->fetchAll();
			$statement->closeCursor();

			return $jobs;    
			
		}
		
	}

?>