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
	require_once  __DIR__ . "/../../model/job_db.php";
	require_once  __DIR__ . "/../../model/login-dashboard.php";

	// controll the action the user selects
	switch ($action){
		case "add-job":
			echo "lets add a job";
			break;
		case "edit-job":
			echo "edit this mofo";
			break;
		case "delete-job": 
			echo " delete this mofo";
			break;
		case "view-jobs":
			$jobs = Jobs_DB::get_all_jobs();
			include('../header.php');
			include('../left-col.php');
			include('title.php');
			include('jobs.php');
			include('../footer.php');
			break;
		default: 
			$jobs = Jobs_DB::get_all_jobs();
			include('title.php');
			include('jobs.php');
	}

?>
