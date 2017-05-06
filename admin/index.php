<?php
		
	// grab the database info like you're supposed to do 
	require_once('model/database.php');
	require_once('model/login-dashboard.php');

	// establish an action for the user
	$action = filter_input(INPUT_POST, 'action');

	// if there is no action then show a page 
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL){
			include('view/header.php');
			include('view/dashboard_login_view.php');
		}
	}

	// collect the user information
	class userInfo{
		public function getUser(){
			// grab the user info from the db
			//get_users();
			LoginDatabase::get_users();
			
			// store the user into a global variable
			$user = $_SESSION['user_firstName'];
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
			
			if(LoginDatabase::dashboard_login($email, $password)){
				$_SESSON['is_valid_user'] = true;
				include('view/dashboard.php');
			}else{
				echo "<div class='alert alert-danger alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
							<span aria-hidden='true'>&times;</span>
						</button>
							<strong>Error:</strong> You must login to view the designer</div>";
				include('view/dashboard_login_view.php');
			}
			
			break;
		case 'feedback':
			// view the feedback page
			include('view/header.php');
			include('view/left-col.php');
			include('view/feedback/index.php');
			include('view/footer.php');
			break;
		case 'job-status':
			// view the job status page
			include('view/header.php');
			include('view/left-col.php');
			include('view/job-status/index.php');
			include('view/footer.php');
			break;
		case 'orders':
			// view the orders page
			include('view/header.php');
			include('view/left-col.php');
			include('view/orders/index.php');
			include('view/footer.php');
			break;
		case 'products':
			// view the products page
			include('view/header.php');
			include('view/left-col.php');
			include('view/products/index.php');
			include('view/footer.php');
			break;
		case 'reports':
			// view the reports page
			include('view/header.php');
			include('view/left-col.php');
			include('view/reports/index.php');
			include('view/footer.php');
			break;
		case 'server-status':
			// view the server stats page
			include('view/header.php');
			include('view/left-col.php');
			include('view/server-status/index.php');
			include('view/footer.php');
			break;
		case 'users':
			// view the users page
			include('view/header.php');
			include('view/left-col.php');
			include('view/users/index.php');
			include('view/footer.php');
			break;
		case 'store-locations':
			// view the store locations page
			include('view/header.php');
			include('view/left-col.php');
			include('view/store-location/index.php');
			include('view/footer.php');
			break;
		case 'category':
			// view the categories page
			include('view/header.php');
			include('view/left-col.php');
			include('view/category/index.php');
			include('view/footer.php');
			break;
			
	}


?>


