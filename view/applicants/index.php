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
		case "view-applicant":
			echo "lets add a job";
			break;
		default: 
			$applicants = Applicants::get_applicants();
			include('applicants.php');
	}

?>
