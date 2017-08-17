<?php 

	// grab the db files
	require_once  __DIR__ . "/../../config.php";
	require_once  __DIR__ . "/../../model/database.php";
	require_once  __DIR__ . "/../../model/applicant_db.php";

	// snatch the variables from the form
	$firstName = filter_input(INPUT_POST, 'applicant_firstName');
	$lastName = filter_input(INPUT_POST, 'applicant_lastName');
	$email = filter_input(INPUT_POST, 'applicant_email', FILTER_VALIDATE_EMAIL);
	$phone = filter_input(INPUT_POST, 'applicant_phone');
	$job_id = filter_input(INPUT_POST, 'job_id');
	$company_name = filter_input(INPUT_POST, 'company_name');
	$company_id = filter_input(INPUT_POST, 'company_id');

	// need to grab the company id






	// validate this ish
	if($firstName == NULL || $lastName == NULL || $email == NULL || $phone == NULL){
		echo "There was an error with the form. Please try again.";
	}else{
		
		Applicants::add_applicant($firstName, $lastName, $email, $phone, $job_id, $company_id);
		
		// upload the resume 
		// --------------------------

		$file_result = "";

		// if there is an error uploading the file, display a message
		if($_FILES["logo-file"]["error"] > 0){

			$file_result .= "No file uploaded, or invalid file";
			$file_result .= "Error code: " .$_FILES["logo-file"]["error"] . "<br>";

		}else{

			// ftp conn
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

			// create a folder for the applicant
			$applicant_folder = "/careers.whitejuly.com/profile/".$company_name."/applicants/". $lastName."_".$firstName ."/";
			
			if(ftp_mkdir($ftp_conn, $applicant_folder)){				 
				
				// file name and tmp file name
				$resume = $_FILES["resume"]["name"];
				
				$resumeLocation = "/home/trahar20/careers.whitejuly.com/profile/".$company_name."/applicants/". $lastName."_".$firstName ."/".$resume;
				
				$tempResume = $_FILES["resume"]["tmp_name"];

				// move the file to the specific folders
				move_uploaded_file($tempResume, $resumeLocation);
				
				// the new file location
				$urlLocation = "/careers.whitejuly.com/profile/".$company_name."/applicants/". $lastName."_".$firstName ."/".$resume;
				$renameResume = "/careers.whitejuly.com/profile/".$company_name."/applicants/". $lastName."_".$firstName ."/". $lastName."_".$firstName ."_resume.pdf";
				
				// rename the resume file
				ftp_rename($ftp_conn, $urlLocation, $renameResume);
				
				// function to create applicant profile page
				Applicants::create_applicant_profile($ftp_server, $ftp_username, $ftp_userpass, $company_name, $firstName, $lastName, $email, $phone, $job_id);
				
					
			}else{
				echo "there was an error uploading your resume";
			}

			ftp_quit($ftp_conn);

			include('thank-you.php');

		}
		
	}

?>