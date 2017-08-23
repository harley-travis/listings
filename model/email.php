<?php

	class Email{
		
		// view the rejection template
		public static function get_rejection_template($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT rejection_letter 
					  FROM company 
					  WHERE company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(":company_id", $company_id);
			$statement->execute();
			$rejection = $statement->fetch();
			$reject = $rejection[0];
			$statement->closeCursor();
			
			return $reject;

		}
		
		// view the interview template
		public static function get_interview_template($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT interview_letter 
					  FROM company 
					  WHERE company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(":company_id", $company_id);
			$statement->execute();
			$interview = $statement->fetch();
			$interview_text = $interview[0];
			$statement->closeCursor();
			
			return $interview_text;

		}
		
		// view the offer template
		public static function get_offer_template($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT offer_letter 
					  FROM company 
					  WHERE company_id = :company_id';
			
			$statement = $db->prepare($query);
			$statement->bindValue(":company_id", $company_id);
			$statement->execute();
			$offer = $statement->fetch();
			$offer_text = $offer[0];
			$statement->closeCursor();
			
			return $offer_text;

		}
		
		// edit rejection template
		public static function edit_rejection_template($company_id){
			$db = Database::getDB();
			
			$query = 'SELECT * FROM users
					  WHERE user_id = :user_id';
			$statement = $db->prepare($query);
			$statement->bindValue(":user_id", $user_id);
			$statement->execute();
			$user = $statement->fetch();
			$statement->closeCursor();

		}
		
		// edit interview template
		
		// edit offer template
		
		// send rejection letter
		
		// send interview email
		
		// send offer letter
		
		/**
		*
		* NEED TO FIGURE OUT HOW TO INSERT THE DATA FOR THE EMAIL TEMPLATE SUCH AS APPLICANT NAME AND COMPANY INFOMRATION
		
		ALSO NEED TO FIGURE OUT HOW TO INCORPORATE LOGO AND DATE
		*/
		
		
		
	}


?>