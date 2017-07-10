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
				
				$ftp_server 	= "sundance.dreamhost.com";
				$ftp_username = 'trahar20';
				$ftp_userpass = 'Spiderman1!';
				$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
				$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);	
				
				$logo_file = $_FILES["logo-file"]["name"];
				$tempFile = $_FILES["logo-file"]["tmp_name"];
				
				$logoLocation = "/home/trahar20/careers.whitejuly.com/profile/white-july/" . $logo_file;
				
				// move the file to the specific folders
				move_uploaded_file($tempFile, $logoLocation);
				
				// the new file location
				$urlLocation = "/careers.whitejuly.com/profile/white-july/".$logo_file;
				$renameLogo = "/careers.whitejuly.com/profile/white-july/logo.png";
				
				// rename the resume file
				ftp_rename($ftp_conn, $urlLocation, $renameLogo);
				
				
				
				
				
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
		case "delete-logo":
			$ftp_server = "sundance.dreamhost.com";
			$ftp_username = 'trahar20';
			$ftp_userpass = 'Spiderman1!';
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
			$delete_file_name  = '/careers.whitejuly.com/profile/white-july/logo.png';
			
			if(ftp_delete($ftp_conn, $delete_file_name)){
				echo "file deleted";
			}else{
				echo "there was an error deleting the file";
			}

			ftp_close($ftp_conn);
			header("Refresh:0; url=https://www.careers.whitejuly.com/index.php?action=profile"); // refresh page and redirect to this page
			include('../header.php');
			include('../left-col.php');
			include('profile.php');
			include('../footer.php');
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
		case "embed":
			include('../header.php');
			include('../left-col.php');
			include("embed.php");
			include('../footer.php');
			break;
		default: 
			//$jobs = Jobs_DB::get_all_jobs();
			include('profile.php');
	}

?>


