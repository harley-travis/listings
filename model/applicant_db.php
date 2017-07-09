<?php 

	class Applicants{
		
		public function get_applicants(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}		
				
		
	}






?>