<?php 

	class Applicants{
		
		public function get_applicants_by_user_id($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
				      INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.company_id = :company_id
					  AND NOT applicants.stage = 6
					  AND applicants.is_active = 0';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;

		}
		
		public function get_applicants(){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.is_active=0 
					  AND jobs.is_active=0
					  AND NOT stage=6';

			$statement = $db->prepare($query);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		public function get_recent_applicants($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.is_active=0 
					  AND jobs.is_active=0
					  AND applicants.company_id = :company_id
					  ORDER BY date_applied DESC
					  LIMIT 10';

			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		public function get_archive_applicants($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  AND applicants.company_id = :company_id
					  WHERE applicants.is_active=1';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
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
		public static function get_all_phone($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=1
					  AND applicants.company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for one
		public function get_all_one($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=2
					  AND applicants.company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}

		// search for two
		public function get_all_two($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=3
					  AND applicants.company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for three
		public function get_all_three($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=4
					  AND applicants.company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for four
		public function get_all_four($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=5
					  AND applicants.company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// search for hired
		public function get_all_hired($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM applicants 
			          INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.stage=6
					  AND applicants.company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$applicants = $statement->fetchAll();
			$statement->closeCursor();
			
			return $applicants;
		}
		
		// add applicant
		function add_applicant($firstName, $lastName, $email, $phone, $job_id, $company_id){
			$db = Database::getDB();

			$timestamp = date("Y-m-d H:i:s A");

			$query = 'INSERT INTO applicants
					  (applicant_firstName, applicant_lastName, applicant_email, applicant_phone, date_applied, job_id, company_id)
					  VALUES
					  (:applicant_firstName, :applicant_lastName, :applicant_email, :applicant_phone, :date, :job_id, :company_id)';

			$statement = $db->prepare($query);
			$statement->bindValue(':applicant_firstName', $firstName);
			$statement->bindValue(':applicant_lastName', $lastName);
			$statement->bindValue(':applicant_email', $email);
			$statement->bindValue(':applicant_phone', $phone);
			$statement->bindValue(':date', $timestamp);
			$statement->bindValue(':job_id', $job_id);
			$statement->bindValue(':company_id', $company_id);
			$statement->execute();
			$statement->closeCursor();

		}

		// get applicant id
		public static function get_applicant_by_id($email){
			$db = Database::getDB();
			
			$query = 'SELECT applicant_id 
					  FROM applicants 
					  WHERE applicant_email = :email';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':email', $email);
			$statement->execute();
			$stage = $statement->fetch();
			$statement->closeCursor();
			
			return $stage;
		}
		
		// get interview stage by employee
		public static function get_applicant_interview_stage($email){
			$db = Database::getDB();
			
			$query = 'SELECT stage 
					  FROM applicants 
					  WHERE applicant_email = :email';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':email', $email);
			$statement->execute();
			$stage = $statement->fetch();
			$statement->closeCursor();
			
			return $stage;
		}
		
		// get the applicant by applicant id
		public static function get_applicant_by_applicant_id($applicant_id){
			$db = Database::getDB();
			
			$query = 'SELECT * from applicants 
					  INNER JOIN jobs 
					  ON applicants.job_id = jobs.job_id 
					  WHERE applicants.applicant_id = :applicant_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':applicant_id', $applicant_id);
			$statement->execute();
			$applicant = $statement->fetch();
			//$applicant_data = $applicant[0];
			$statement->closeCursor();
			
			return $applicant;
		}
		
		// create the user profile page
		public static function create_applicant_profile($ftp_server, $ftp_username, $ftp_userpass, $company_name, $firstName, $lastName, $email, $phone, $job_id, $company_id){
		
			// login FTP
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
			
			// get the time 
			$date_applied = date("Y-m-d"); // time applied
			
			// function to pass job_id to grab job information
			$job_name = Jobs::get_job_by_id($job_id, $company_id);
			
			// get applicant interview stage
			$stage = Applicants::get_applicant_interview_stage($email);
			
			// get applicant id
			$applicant_id = Applicants::get_applicant_by_id($email);
			
			// create page 
			$applicant_profile = "/home/trahar20/careers.whitejuly.com/profile/".$company_name."/applicants/".$lastName."_".$firstName."/applicant_profile.php";
			
			$listingsFile = "/home/trahar20/careers.whitejuly.com/profile/".$company_name."/applicants/".$lastName."_".$firstName."/header.php";
			
			$applicant_resume = "/profile/".$company_name."/applicants/".$lastName."_".$firstName."/".$lastName."_".$firstName."_resume.pdf";
			
			// create header
			$listings_header_file = fopen($listingsFile, "a");
			$header = '<?php

						$ftp_server = "'.$ftp_server.'";
						$ftp_username = "'.$ftp_username.'";
						$ftp_userpass = "'.$ftp_userpass.'";

						$applicant_id = "'.$applicant_id['applicant_id'].'";
						$job_id = "'.$job_id.'";
						$company_name = "'.$company_name.'";
						$firstName = "'.$firstName.'";
						$lastName = "'.$lastName.'";
						$email = "'.$email.'";
						$phone = "'.$phone.'";
						$job_name = "'.$job_name['job_title'].'";
						$resume = "'.$applicant_resume.'";
						$date_applied = "'.$date_applied.'";
						$stage = "'.$stage['stage'].'";
						
						// phone number display
						
						
						// sort out the stage
						$stage_num = "";
						
						if($stage == 0){
							$stage_num = "Schedule Phone Interview";
						}else if($stage == 1){
							$stage_num = "Phone Interview Complete";
						}else if($stage == 2){
							$stage_num = "1st Interview Complete";
						}else if($stage == 3){
							$stage_num = "2nd Interview Complete";
						}else if($stage == 4){
							$stage_num = "3rd Interview Complete";
						}else if($stage == 6){
							$stage_num = "Hired";
						}else{
							$stage_num = "<b>ERROR:</b> There was an error displaying the interview stage. Please contact White July if this persists.";
						}
						
	
					?>';
			
			fwrite($listings_header_file, $header);
			fclose($listings_header_file);
			
			// open the file
			//$applicant_file = fopen($applicant_profile, "a") or die("Unable to open file!");
			
			// get the applicant profile php template
			//$applicant_html = file_get_contents( __DIR__ . '/../profile/_util/applicant-profile.php' );
			
			//write then close this ish
			//fwrite($applicant_file, $applicant_html);
			//fclose($applicant_file);
			ftp_quit($ftp_conn);

		}
		
		// update the applicant profile information
		public static function update_applicant_profile($ftp_server, $ftp_username, $ftp_userpass, $applicant_id, $company_name, $job_id, $firstName, $lastName, $job_name, $date_applied, $phone, $email){
			
			// connect to FTP
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
			
			// links
			$applicant_profile_delete = "/careers.whitejuly.com/profile/".$company_name."/applicants/".$lastName."_".$firstName."/applicant_profile.php";
			
			$listingsFile_delete = "/careers.whitejuly.com/profile/".$company_name."/applicants/".$lastName."_".$firstName."/header.php";
			
			$applicant_resume_delete = "/profile/".$company_name."/applicants/".$lastName."_".$firstName."/".$lastName."_".$firstName."_resume.pdf";
			
			// delete file
			//ftp_delete($ftp_conn, $applicant_profile_delete);
			//ftp_delete($ftp_conn, $listingsFile_delete);
					
			// check the database if the information is updated
			$db = Database::getDB();
			
			$query = 'SELECT stage 
					  FROM applicants 
					  WHERE applicant_id = :applicant_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':applicant_id', $applicant_id);
			$statement->execute();
			$newstage = $statement->fetch();
			$statement->closeCursor();
			
			// create page 
			$applicant_profile = "/home/trahar20/careers.whitejuly.com/profile/".$company_name."/applicants/".$lastName."_".$firstName."/applicant_profile.php";
			
			$listingsFile = "/home/trahar20/careers.whitejuly.com/profile/".$company_name."/applicants/".$lastName."_".$firstName."/header.php";
			
			$applicant_resume = "/profile/".$company_name."/applicants/".$lastName."_".$firstName."/".$lastName."_".$firstName."_resume.pdf";
			
			// recopy the applicant profile page
			// create header
			$listings_header_file = fopen($listingsFile, "w");
			$header = '<?php

						$applicant_id = "'.$applicant_id.'";
						$job_id = "'.$job_id.'";
						$company_name = "'.$company_name.'";
						$firstName = "'.$firstName.'";
						$lastName = "'.$lastName.'";
						$email = "'.$email.'";
						$phone = "'.$phone.'";
						$job_name = "'.$job_name.'";
						$resume = "'.$applicant_resume.'";
						$date_applied = "'.$date_applied.'";
						$newstage = "'.$newstage['stage'].'";

						
						// phone number display
						
						
						// sort out the stage
						$stage_num = "";
						
						if($stage == 0){
							$stage_num = "Schedule Phone Interview";
						}else if($stage == 1){
							$stage_num = "Phone Interview Complete";
						}else if($stage == 2){
							$stage_num = "1st Interview Complete";
						}else if($stage == 3){
							$stage_num = "2nd Interview Complete";
						}else if($stage == 4){
							$stage_num = "3rd Interview Complete";
						}else if($stage == 6){
							$stage_num = "Hired";
						}else{
							$stage_num = "<b>ERROR:</b> There was an error displaying the interview stage. Please contact White July if this persists.";
						}
						
	
					?>';
			
			fwrite($listings_header_file, $header);
			fclose($listings_header_file);
			
			// open the file
			//$applicant_file = fopen($applicant_profile, "w") or die("Unable to open file!");
			
			// get the applicant profile php template
			//$applicant_html = file_get_contents( __DIR__ . '/../profile/_util/applicant-profile.php' );
			
			//write then close this ish
			//fwrite($applicant_file, $applicant_html);
			//fclose($applicant_file);
			ftp_quit($ftp_conn);
			
			// redirect user to user_profile.php
			header();

		}
		

		
	}






?>