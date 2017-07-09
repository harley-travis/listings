<?php
		
	// grab the database info like you're supposed to do 
	require_once('view/header.php'); // this needs to be here first. otherwise, you'll get the sessions_start error
	require_once('model/database.php');
	require_once('model/login-dashboard.php');
	require_once('model/ftp.php');

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
				 
				include('view/dashboard.php');
				
				print_r($_SESSION['userName'][$_SESSON['is_valid_user']]);
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
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password 		=	filter_input(INPUT_POST, 'password');
			$verifyPassword = 	filter_input(INPUT_POST, 'verifyPassword');
			$userFirstName	= 	filter_input(INPUT_POST, 'firstName');
			$userLastName 	= 	filter_input(INPUT_POST, 'lastName');
			$companyName 	= 	filter_input(INPUT_POST, 'companyName');
			$_SESSION['firstName'] = $userFirstName; // put that name into a session variable hoe bag
									
			// send info to function, insert into database
			LoginDatabase::register($email, $password, $userFirstName, $userLastName);
			
			// create folder for company in FTP
			FTP::createNewDir($companyName);
		
			// redirct to login page
			echo "<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
						<span aria-hidden='true'>&times;</span>
					</button>
						<strong>Success!</strong> Your account has been created!</div>";
			include('view/dashboard_login_view.php');
			break;
		case 'reports':
			// view the reports page
			include('view/header.php');
			include('view/left-col.php');
			include('view/reports/index.php');
			include('view/footer.php');
			break;
		case 'users':
			// view the users page
			include('view/header.php');
			include('view/left-col.php');
			include('view/users/index.php');
			include('view/footer.php');
			break;
		case 'applicants':
			// view the categories page
			include('view/header.php');
			include('view/left-col.php');
			include('view/applicants/index.php');
			include('view/footer.php');
			break;
		case 'jobs':
			// view the categories page
			include('view/header.php');
			include('view/left-col.php');
			include('view/jobs/index.php');
			include('view/footer.php');
			break;
		case 'settings':
			// view the categories page
			include('view/header.php');
			include('view/left-col.php');
			include('view/settings/index.php');
			include('view/footer.php');
			break;
		case 'profile':
			// view the categories page
			include('view/header.php');
			include('view/left-col.php');
			include('view/profile/index.php');
			include('view/footer.php');
			break;
			
	}


?>


