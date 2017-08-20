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
	require_once  __DIR__ . "/../../model/reports.php";

	// controll the action the user selects
	switch ($action){
		case "view-reports":
			include('../header.php');
			include('../left-col.php');
			include('reports.php');
			include('../footer.php');
			break;
		case "fill-job":
			$numbers = Reports::time_to_fill_job($_SESSION['company_id']);
			include('../header.php');
			include('../left-col.php');
			include('time-to-fill-job.php');
			include('../footer.php');
			break;
		case "number-visits":
			$numbers = Reports::get_all_job_visits($_SESSION['company_id']);
			include('../header.php');
			include('../left-col.php');
			include('number_visits.php');
			include('../footer.php');
			break;
		default: 
			include('reports.php');
			
	}

?>
