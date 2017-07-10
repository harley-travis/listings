<?php 

	class Applicants{
		
		public function get_applicants(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.is_active=0 
					  AND jobs.is_active=0';

			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		public function get_archive_applicants(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.is_active=1';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// move the applicant to the archived page
		public function marked_archived($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET is_active		   = 1
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		// make the applicant active again
		public function marked_active($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET is_active		   = 0
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		/*  assigning interview stages
		    ________________________________
			stage   \  status \
			--------------------------------
			pending \ 0       \
			phone   \ 1       \
			one     \ 2       \
			two     \ 3       \
			three   \ 4       \
			four    \ 5       \
			hired   \ 6       \
			--------------------------------
		*/
		
		// assign applicant pending
		public function pending($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET stage		   = 0
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		// assign applicant phone
		public function phone($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET stage		   = 1
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		// assign applicant one
		public function one($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET stage		   = 2
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		// assign applicant two
		public function two($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET stage		   = 3
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		// assign applicant three
		public function three($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET stage		   = 4
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		// assign applicant four
		public function four($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET stage		   = 5
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		// assign applicant four
		public function hired($marked){
			$db = Database::getDB();
			
			// foreach loop
			foreach($marked as $mark){
				
				$query = 'UPDATE applicants
				  SET stage		   = 6
				  WHERE applicant_id   = :applicant_id';
			
				$statement = $db->prepare($query);
				$statement->bindValue(':applicant_id', $mark);
				$statement->execute();
				$statement->closeCursor();
			}
		}
		
		
		/*
		 * SEARCH ALL INTERVIEW TYPES
		 * -----------------------------
		*/
		
		// search for pending
		public function get_all_pending(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=0';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for phone
		public function get_all_phone(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=1';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for one
		public function get_all_one(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=2';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}

		// search for two
		public function get_all_two(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=3';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for three
		public function get_all_three(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=4';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for four
		public function get_all_four(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=5';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for hired
		public function get_all_hired(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=6';
			
			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
	}






?>