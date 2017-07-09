<?php

	function add_applicant($firstName, $lastName, $email, $phone, $job_id){
		$db = Database::getDB();
		
		$query = 'INSERT INTO applicants
				  (applicant_firstName, applicant_lastName, applicant_email, applicant_phone, job_id)
				  VALUES
				  (:applicant_firstName, :applicant_lastName, :applicant_email, :applicant_phone, :job_id)';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':applicant_firstName', $firstName);
		$statement->bindValue(':applicant_lastName', $lastName);
		$statement->bindValue(':applicant_email', $email);
		$statement->bindValue(':applicant_phone', $phone);
		$statement->bindValue(':job_id', $job_id);
		$statement->execute();
		$statement->closeCursor();
		
	}

?>