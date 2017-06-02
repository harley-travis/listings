<?php 

	// establish an action for the user
	$action = filter_input(INPUT_POST, 'action');

	// if there is no action then show a page 
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL){
			require_once  __DIR__ . "/../header.php";	
			require_once  __DIR__ . "/../dashboard_login_view.php";	
		}
	}

	// require these files
	require_once  __DIR__ . "/../header.php";	
	require_once  __DIR__ . "/../../model/database.php";
	require_once  __DIR__ . "/../../model/login-dashboard.php";
	require_once  __DIR__ . "/../../model/ftp.php";

	// controll the action the user selects
	switch ($action){
		case "create-file":
			FTP_functions::createJobFile();
			echo "lets add a job";
			break;
		case "upload-logo":
			
			$file_result = "";
	
			// if there is an error uploading the file, display a message
			if($_FILES["logo-file"]["error"] > 0){
				
				$file_result .= "No file uploaded, or invalid file";
				$file_result .= "Error code: " .$_FILES["logo-file"]["error"] . "<br>";
				
			}else{
				// "Upload: " . $_FILES["logo-file"]["name"] . "<br>" .
				// "Type: " . $_FILES["logo-file"]["type"] . "<br>" .
				// "Size: " . $_FILES["logo-file"]["size"] . "<br>" .
				// "Temp File: " . $_FILES["logo-file"]["tmp_name"] . "<br>";
				
				// move the file to the specific folders
				move_uploaded_file($_FILES["logo-file"]["tmp_name"], "/home/trahar20/careers.whitejuly.com/view/profile/company_name/white-july/logo/" . $_FILES["logo-file"]["name"]);
								
				include('../header.php');
				echo "<div class='alert alert-success alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
							<span aria-hidden='true'>&times;</span>
						</button>
							<strong>Success!</strong> Your logo has uploaded successfully!</div>";
				include('../left-col.php');
				include("profile.php");
				include('../footer.php');
				
				
				
			}
			
			break;
		case "overwrite-logo": 
			echo " delete this mofo";
			break;
		case "view-profile":
			include('../header.php');
			include('../left-col.php');
			include("profile.php");
			include('../footer.php');
			break;
		case "company-bio":
			echo " company bio";
			break;
		default: 
			//$jobs = Jobs_DB::get_all_jobs();
			include('profile.php');
			echo "the default switch message";
	}

?>


