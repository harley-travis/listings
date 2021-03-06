<?php 

	// establish an action for the user
	$action = filter_input(INPUT_POST, 'action');

	// if there is no action then show a page 
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL){
			include('../view/header.php');
			include('../view/dashboard_login_view.php');
		}
	}

	// require the database information
	require_once  __DIR__ . "/../header.php";
	require_once  __DIR__ . "/../../model/database.php";
	require_once  __DIR__ . "/../../model/jobs.php";
	require_once  __DIR__ . "/../../model/login-dashboard.php";

	// controll the action the user selects
	switch ($action){
		case "add-job":
			
			// grab the variables 
			$jobTitle = filter_input(INPUT_POST, 'jobTitle');
			$description = filter_input(INPUT_POST, 'description');
			$qualifications = filter_input(INPUT_POST, 'qualifications');
			$add_info = filter_input(INPUT_POST, 'add_info');
			$compensation = $_POST['compensation'];
			$salary = filter_input(INPUT_POST, 'salary-input');
			$location = filter_input(INPUT_POST, 'location');
			$department = filter_input(INPUT_POST, 'department');
			$duration = $_POST['duration'];

			// compensation
			// 0 = hourly
			// 1 = salary
			
			// validate 
		
				Jobs::add_the_job($jobTitle, $description, $qualifications, $add_info, $salary, $location, $duration, $compensation, $department, $_SESSION['company_id']); // send to the function
			
				$jobs = Jobs::get_all_jobs($_SESSION['company_id']); // grab the data and view
				
				// create the job listings page 
				Jobs::create_listings($ftp_server, $ftp_username, $ftp_userpass, $_SESSION['company_name'], $_SESSION['company_id']);
			
				include('../header.php');
				include('../left-col.php');
				include('jobs.php');
				include('../footer.php');
			
			break;
		case "edit-job":
			
			// grab the variables 
			$job_id = filter_input(INPUT_POST, 'job_id');
			$jobTitle = filter_input(INPUT_POST, 'jobTitle');
			$description = filter_input(INPUT_POST, 'description');
			$qualifications = filter_input(INPUT_POST, 'qualifications');
			$add_info = filter_input(INPUT_POST, 'add_info');
			$salary = filter_input(INPUT_POST, 'salary');
			$location = filter_input(INPUT_POST, 'location');
			$department = filter_input(INPUT_POST, 'department');
			
			Jobs::edit_job($job_id, $jobTitle, $description, $qualifications, $add_info, $salary, $location, $department, $_SESSION['company_id']);
			$jobs = Jobs::get_all_jobs($_SESSION['company_id']); // grab the data and view
			
			// create the job listings page 
			Jobs::create_listings($ftp_server, $ftp_username, $ftp_userpass, $_SESSION['company_name'], $_SESSION['company_id']);

			include('../header.php');
			include('../left-col.php');
			include('jobs.php');
			include('../footer.php');
						
			break;
		case "edit-job-id":
			
			$job_id = $_POST['job_id']; // get the job id
			$job = Jobs::get_job_by_id($job_id, $_SESSION['company_id']); // get the job id from the db and put it in a var

			include('../header.php');
			include('../left-col.php');
			include('edit-job.php');
			include('../footer.php');
			break;
		case "delete-job": 
			$job_id = filter_input(INPUT_POST, 'job_id');
			if($job_id == NULL || $job_id == FALSE){
				echo "There was an error deleting the band";
			}else{
				Jobs::delete_job($job_id);
				$jobs = Jobs::get_all_jobs($_SESSION['company_id']);
				
				// create the job listings page 
				Jobs::create_listings($ftp_server, $ftp_username, $ftp_userpass, $_SESSION['company_name'], $_SESSION['company_id']);
				
				include('../header.php');
				include('../left-col.php');
				include('jobs.php');
				include('../footer.php');
			}
			break;
		case "archive-job":
			$job_id = filter_input(INPUT_POST, 'job_id');
			if($job_id == NULL || $job_id == FALSE){
				echo "There was an error deleting the band";
			}else{
				Jobs::marked_archived($job_id);
				$jobs = Jobs::get_all_archive_jobs($_SESSION['company_id']);
				
				// create the job listings page 
				Jobs::create_listings($ftp_server, $ftp_username, $ftp_userpass, $_SESSION['company_name'], $_SESSION['company_id']);
				
				include('../header.php');
				include('../left-col.php');
				include('archive-jobs.php');
				include('../footer.php');
			}
			break;
		case "archive-many-jobs":
			
			$values = $_POST['job_action'];     // put values into array
			$marked = array(); 					     // put the marked box values into an array
			
			// put values into the array
			foreach($values as $value){
				$marked[] = $value;
			}
			
			// send array to function
			Jobs::marked_many_archived($marked);
			$jobs = Jobs::get_all_archive_jobs($_SESSION['company_id']);
			include('../header.php');
			include('../left-col.php');
			include('archive-jobs.php');
			include('../footer.php');

			
			break;
		case "archive-jobs":
			$jobs = Jobs::get_all_archive_jobs($_SESSION['company_id']);
			include('../header.php');
			include('../left-col.php');
			include('archive-jobs.php');
			include('../footer.php');
			break;
		case "activate-job":
			
			$job_id = filter_input(INPUT_POST, 'job_id');
			if($job_id == NULL || $job_id == FALSE){
				echo "There was an error deleting the band";
			}else{
				Jobs::marked_active($job_id);
				$jobs = Jobs::get_all_jobs($_SESSION['company_id']);
				include('../header.php');
				include('../left-col.php');
				include('jobs.php');
				include('../footer.php');
			}
			break;
		case "view-jobs":
			$jobs = Jobs::get_all_jobs($_SESSION['company_id']);
			include('../header.php');
			include('../left-col.php');
			include('jobs.php');
			include('../footer.php');
			break;
		default: 
			$jobs = Jobs::get_all_jobs($_SESSION['company_id']);
			include('jobs.php');
	}

?>
