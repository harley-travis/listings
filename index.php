<?php
		
	// grab the database info like you're supposed to do 
	require_once('view/header.php'); // this needs to be here first. otherwise, you'll get the sessions_start error
	require_once('model/database.php');
	require_once('model/login-dashboard.php');
	require_once  __DIR__ . "/model/applicant_db.php";
	require_once  __DIR__ . "/model/jobs.php";

	// establish an action for the user
	$action = filter_input(INPUT_POST, 'action');

	// if there is no action then show a page 
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL){
			//include('view/header.php');
			include('view/dashboard_login_view.php');
		}
	}

	// controller what to show based left nav
	switch ($action){
		case 'dashboard':
			// display the dashboard
			$applicants = Applicants::get_recent_applicants($_SESSION['company_id']);
			$jobs = Jobs::get_recent_jobs($_SESSION['company_id']);
			include('view/dashboard.php');
			break;
		case 'sign-in':
			// sign the user in
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = filter_input(INPUT_POST, 'password');
			$_SESSON['is_valid_user'] = $email.$password;
			$validUser = $_SESSON['is_valid_user'];
			$GLOBALS['validUser'];
			$GLOBALS['email'];
			
			if(LoginDatabase::dashboard_login($email, $password)){
				$_SESSON['is_valid_user'] = true;
				$isValidUser = $_SESSON['is_valid_user'];

				// get user_id
				$_SESSION['user_id'] = LoginDatabase::get_user_by_id($email); // grab the user_id
				
				// get the company id
				$_SESSION['company_id'] = LoginDatabase::get_company_by_user_id($_SESSION['user_id']);
				
				// display applicants
				$applicants = Applicants::get_applicants_by_user_id($_SESSION['company_id']);
				
				// display jobs
				$jobs = Jobs::get_recent_jobs_by_company($_SESSION['company_id']);
							
				// get the username
				$_SESSION['username'] = LoginDatabase::get_username($email);

				include('view/dashboard.php');
				
			}else{
				echo "<div class='alert alert-danger alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
							<span aria-hidden='true'>&times;</span>
						</button>
							<strong>Error:</strong> Email or Password not recognized. Please try again.</div>";
				include('view/dashboard_login_view.php');
			}
			
			break;
		case 'register-account':
			
			// establish the variables. Then deal with it
			$email 			= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password 		=	filter_input(INPUT_POST, 'password');
			$verifyPassword = 	filter_input(INPUT_POST, 'verifyPassword');
			$userFirstName	= 	filter_input(INPUT_POST, 'firstName');
			$userLastName 	= 	filter_input(INPUT_POST, 'lastName');
			$_SESSION['company_name'] 	= 	filter_input(INPUT_POST, 'companyName');
									
			// send info to function, insert into database
			LoginDatabase::register($email, $password, $userFirstName, $userLastName, $_SESSION['company_name']);
			
			// login FTP
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
			
			// url locations for directories that need to be created
			$dirUrl 		= "/careers.whitejuly.com/profile/" . $_SESSION['company_name'];
			$jobsDirUrl 	= "/careers.whitejuly.com/profile/" . $_SESSION['company_name'] . "/jobs";
			$resumeDirUrl 	= "/careers.whitejuly.com/profile/" . $_SESSION['company_name'] . "/resumes";
			
			// create directories for the user account
			if(ftp_mkdir($ftp_conn, $dirUrl)){	
				
				// create a directory for the jobs folder
				if(ftp_mkdir($ftp_conn, $jobsDirUrl)){

				}else{
					echo "There was an error creating the jobs directory for the new user";
				}
				
				// create the resumes directory
				if(ftp_mkdir($ftp_conn, $resumeDirUrl)){
					
				}else{
					echo "There was an error creating the resumes directory for the new user";
				}
				
	
			}else{
				echo "there was an error creating the company directory. Please try again.";
			}
			
			ftp_close($ftp_conn);

			// redirct to login page
			echo "<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
						<span aria-hidden='true'>&times;</span>
					</button>
						<strong>Success!</strong> Your account has been created!</div>";

			// refresh page and redirect to this page
			header("Refresh:0; url=https://www.careers.whitejuly.com/index.php"); 
			break;
		case 'reports':
			// view the reports page
			include('view/left-col.php');
			include('view/reports/index.php');
			include('view/footer.php');
			break;
		case 'users':
			// view the users page
			include('view/left-col.php');
			include('view/users/index.php');
			include('view/footer.php');
			break;
		case 'applicants':
			// view the categories page
			include('view/left-col.php');
			include('view/applicants/index.php');
			include('view/footer.php');
			break;
		case 'jobs':
			// view the categories page
			include('view/left-col.php');
			include('view/jobs/index.php');
			include('view/footer.php');
			break;
		case 'settings':
			// view the categories page
			include('view/left-col.php');
			include('view/settings/index.php');
			include('view/footer.php');
			break;
		case 'profile':
			// view the categories page
			include('view/left-col.php');
			include('view/profile/index.php');
			include('view/footer.php');
			break;
			
	}


?>


