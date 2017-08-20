<?php 

	class Reports{
		
		// get the number of visits for each report
		public static function get_all_job_visits($company_id){
			$db = Database::getDB();

			$query = 'SELECT * FROM jobs 
					  WHERE company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$stat = $statement->fetchAll();
			$statement->closeCursor();
			
			return $stat;
			
		}
		
		// get the number of visits 
		public static function get_number_visits($job_id){
			$db = Database::getDB();
			
			// select all find all
			$query = 'SELECT counter
					  FROM jobs
					  WHERE job_id = :job_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':job_id', $job_id);
			$statement->execute();
			$visits = $statement->fetch();
			$statement->closeCursor();
			
			return $visits;

		}
		
		// count the visits on the job post
		public static function update_number_visits($job_id){
			$db = Database::getDB();
			
			// grab the number from the db
			$current_count = Reports::get_number_visits($job_id);
			
			// grab value out of array
			$add = $current_count['counter'];
			
			// add count
			$add_count = $add + 1;
				
			$query = 'UPDATE jobs
					  SET counter  = :count
					  WHERE job_id = :job_id';

			$statement = $db->prepare($query);
			$statement->bindValue(':job_id', $job_id);
			$statement->bindValue(':count', $add_count);
			$statement->execute();
			$statement->closeCursor();

		}
		
		// time to fill job post then return the data
		public static function time_to_fill_job($company_id){
			$db = Database::getDB();
			
			// update the db
			$query = 'SELECT * FROM jobs 
					  WHERE company_id = :company_id';

			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$stat = $statement->fetchAll();
			$statement->closeCursor();
			
			return $stat;
				
		}

		
	}


?>