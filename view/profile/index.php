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
	require_once  __DIR__ . "/../../model/jobs.php";
	require_once  __DIR__ . "/../../model/billing.php";

	// controll the action the user selects
	switch ($action){
		case "create-file":
			FTP_functions::createJobFile();
			echo "lets add a job";
			break;
		case "upload-logo":
			
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
			
			$file_result = "";
			$logoDirUrl  = URL_PATH . "/profile/" . $_SESSION['company_name'] . "/logo";
	
			// upload logo
			$file_result = "";

			// if there is an error uploading the file, display a message
			if($_FILES["logo-file"]["error"] > 0){

				$file_result .= "No file uploaded, or invalid file";
				$file_result .= "Error code: " .$_FILES["logo-file"]["error"] . "<br>";

			}else{

				$logo_file = $_FILES["logo-file"]["name"];
				$tempFile = $_FILES["logo-file"]["tmp_name"];

				$logoLocation = FULL_PATH . "/profile/". $_SESSION['company_name'] . "/logo/". $logo_file;

				// move the file to the specific folders
				move_uploaded_file($tempFile, $logoLocation);

				// the new file location
				$urlLocation = URL_PATH . "/profile/".$_SESSION['company_name']."/logo/".$logo_file;
				$renameLogo = $logoDirUrl."/logo.png";

				// rename the resume file
				ftp_rename($ftp_conn, $urlLocation, $renameLogo);
				
				// send img url to database
				LoginDatabase::logo_url($renameLogo, $_SESSION['company_id']);

				ftp_quit($ftp_conn);

			}

			include('../header.php');
			echo "<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
						<span aria-hidden='true'>&times;</span>
					</button>
						<strong>Success!</strong> Your logo has uploaded successfully!</div>";
			include('../left-col.php');
			include("profile.php");
			include('../footer.php');
			
			break;
		case "delete-logo":

			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
			$delete_file_name  = URL_PATH.'/profile/'.$_SESSION['company_name'].'/logo/logo.png';
			
			if(ftp_delete($ftp_conn, $delete_file_name)){
				echo "file deleted";
			}else{
				echo "there was an error deleting the file";
			}
			
			// send img url to database
			LoginDatabase::logo_url($renameLogo, $_SESSION['company_id']);

			ftp_quit($ftp_conn);
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
			$bio = filter_input(INPUT_POST, 'bio');
			LoginDatabase::add_bio($_SESSION['company_id'], $bio);
			include('../header.php');
			include('../left-col.php');
			include('profile.php');
			include('../footer.php');
			break;
		case "edit-bio":
			break;
		case "embed":
			include('../header.php');
			include('../left-col.php');
			include("embed.php");
			include('../footer.php');
			break;
		case "billing":
			include('../header.php');
			include('../left-col.php');
			include("billing.php");
			include('../footer.php');
			break;
		case "pkg-one-monthly":
			$token = $_POST['stripeToken'];
			Billing::pkg_one_monthly($token, $_SESSION['user_email']);
			break;
		case "pkg-one-yearly":
			$token = $_POST['stripeToken'];
			Billing::pkg_one_yearly($token, $_SESSION['user_email']);
			break;
		case "pkg-two-monthly":
			$token = $_POST['stripeToken'];
			Billing::pkg_two_monthly($token, $_SESSION['user_email']);
			break;
		case "pkg-two-yearly":
			$token = $_POST['stripeToken'];
			Billing::pkg_two_yearly($token, $_SESSION['user_email']);
			break;	
		case "success-billing":
			include('../header.php');
			include('../left-col.php');
			echo "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> Your payment was successful!</div>";
			include("billing.php");
			include('../footer.php');
			break;
		case "refresh-jobs":
			
			// create the job listings page 
			Jobs::create_listings($ftp_server, $ftp_username, $ftp_userpass, $_SESSION['company_name'], $_SESSION['company_id']);
			
			echo "<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
						<span aria-hidden='true'>&times;</span>
					</button>
						<strong>Success!</strong> The job listings embed has been refreshed</div>";
			
			break;
		default: 
			//$jobs = Jobs_DB::get_all_jobs();
			include('profile.php');
	}

?>


