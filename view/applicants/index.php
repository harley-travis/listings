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
	require_once  __DIR__ . "/../../model/applicant_db.php";

	// controll the action the user selects
	switch ($action){
		case "view-applicants":
			$applicants = Applicants::get_applicants();
			include('../header.php');
			include('../left-col.php');
			include('applicants.php');
			include('../footer.php');
			break;
		case "archive-applicants":
			$applicants = Applicants::get_archive_applicants();
			
			include('../header.php');
			include('../left-col.php');
			include('archive-applicants.php');
			include('../footer.php');
			break;
		case "notQualified":

			$values = $_POST['applicant_action'];     // put values into array
			$marked = array(); 					     // put the marked box values into an array
			
			// put values into the array
			foreach($values as $value){
				$marked[] = $value;
			}
			
			// send array to function
			Applicants::marked_archived($marked);
			$applicants = Applicants::get_applicants();
			include('../header.php');
			include('../left-col.php');
			include('applicants.php');
			include('../footer.php');
			break;
		case "marked-archived":
			Applicants::marked_archived();
			
			$applicants = Applicants::get_applicants();
			include('applicants.php');
			break;
		case "markActive":
			
			$values = $_POST['applicant_action'];     // put values into array
			$marked = array(); 					     // put the marked box values into an array
			
			// put values into the array
			foreach($values as $value){
				$marked[] = $value;
			}
			
			// send array to function
			Applicants::marked_active($marked);
			$applicants = Applicants::get_applicants();
			include('../header.php');
			include('../left-col.php');
			include('applicants.php');
			include('../footer.php');

			break;
		case "phone":
			
			$values = $_POST['applicant_action'];     // put values into array
			$marked = array(); 					     // put the marked box values into an array
			
			// put values into the array
			foreach($values as $value){
				$marked[] = $value;
			}
			
			// send array to function
			Applicants::phone($marked);
			$applicants = Applicants::get_all_phone();
			include('../header.php');
			include('../left-col.php');
			include('phone.php');
			include('../footer.php');
			
			break;
		case "one":
			
			$values = $_POST['applicant_action'];     // put values into array
			$marked = array(); 					     // put the marked box values into an array
			
			// put values into the array
			foreach($values as $value){
				$marked[] = $value;
			}
			
			// send array to function
			Applicants::one($marked);
			$applicants = Applicants::get_all_one();
			include('../header.php');
			include('../left-col.php');
			include('first.php');
			include('../footer.php');
			
			break;
		case "two":
			
			$values = $_POST['applicant_action'];     // put values into array
			$marked = array(); 					     // put the marked box values into an array
			
			// put values into the array
			foreach($values as $value){
				$marked[] = $value;
			}
			
			// send array to function
			Applicants::two($marked);
			$applicants = Applicants::get_all_two();
			include('../header.php');
			include('../left-col.php');
			include('second.php');
			include('../footer.php');
			
			break;
		case "three":
			
			$values = $_POST['applicant_action'];     // put values into array
			$marked = array(); 					     // put the marked box values into an array
			
			// put values into the array
			foreach($values as $value){
				$marked[] = $value;
			}
			
			// send array to function
			Applicants::three($marked);
			$applicants = Applicants::get_all_three();
			include('../header.php');
			include('../left-col.php');
			include('third.php');
			include('../footer.php');
			
			break;
		case "hired":
			
			$values = $_POST['applicant_action'];     // put values into array
			$marked = array(); 					     // put the marked box values into an array
			
			// put values into the array
			foreach($values as $value){
				$marked[] = $value;
			}
			
			// send array to function
			Applicants::hired($marked);
			$applicants = Applicants::get_all_hired();
			include('../header.php');
			include('../left-col.php');
			include('hired.php');
			include('../footer.php');
			
			break;
		case "view-hired":
			$applicants = Applicants::get_all_hired();
			include('../header.php');
			include('../left-col.php');
			include('hired.php');
			include('../footer.php');
			break;
			
		case "stage-phone":
			$applicants = Applicants::get_all_phone();
			include('../header.php');
			include('../left-col.php');
			include('phone.php');
			include('../footer.php');
			break;
		case "stage-one":
			$applicants = Applicants::get_all_one();
			include('../header.php');
			include('../left-col.php');
			include('first.php');
			include('../footer.php');
			break;
		case "stage-two":
			$applicants = Applicants::get_all_two();
			include('../header.php');
			include('../left-col.php');
			include('second.php');
			include('../footer.php');
			break;
		case "stage-three":
			$applicants = Applicants::get_all_three();
			include('../header.php');
			include('../left-col.php');
			include('third.php');
			include('../footer.php');
			break;
		default: 
			$applicants = Applicants::get_applicants();
			include('applicants.php');
	}

?>
