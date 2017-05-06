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

	// the db file is not pulling globally
	// this if statement finds the action of the user
	// then gives it a proper db connection
	if($action == 'add-user' || $action == 'delete-user' || $action == 'edit-user-id' || $action == 'view-users'  || $action == 'edit-user'){
		// grab the database info like you're supposed to do 
		require_once('../../model/database.php');
		require_once('../../model/users.php');
		require_once('../../model/login-dashboard.php');
	}else if($action == 'users'){
		// grab the database info like you're supposed to do 
		require_once('./model/database.php');
		require_once('./model/users.php');
		require_once('./model/login-dashboard.php');
	}else{
		echo "Could not retrevie the database for the users page.";
	}

	switch ($action){
		
		case 'add-user':
			// add a new user
			$userFirstName = filter_input(INPUT_POST, 'userFirstName');
			$userLastName = filter_input(INPUT_POST, 'userLastName');
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = filter_input(INPUT_POST, 'password');

			if($userFirstName == NULL || $userFirstName == FALSE ||  $userLastName == NULL || $userLastName == FALSE || $email == NULL || $email == FALSE || $password == NULL || $password == FALSE){

				echo "There was an error adding a new user, please try again.";
			}else{
				//add the user to the db, put the data in a variable, display the page
				$newUser = new Users($userFirstName, $userLastName, $email, $password);
				LoginDatabase::add_user($newUser);
				$users = LoginDatabase::get_users();
				include('../header.php');
				include('../left-col.php');
				include('users.php');
				include('../footer.php');

			}
			break;
		case 'edit-user':
			include('../header.php');
			// if password = password in db then change password. 
			// make a show password btn 

			$user_id = filter_input(INPUT_POST, 'user_id');
			$userFirstName = filter_input(INPUT_POST, 'userFirstName');
			$userLastName = filter_input(INPUT_POST, 'userLastName');
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = filter_input(INPUT_POST, 'password');


			if($user_id == NULL || $user_id == FALSE || $userFirstName == NULL || $userFirstName == FALSE || $userLastName == NULL || $userLastName == FALSE || $email == NULL || $email == FALSE || $password == NULL || $password == FALSE){

				echo "There was an error editing the user, please try again.";

			}else{
				// edit the user in the db, get the users and display on the users page
				LoginDatabase::edit_user($user_id, $userFirstName, $userLastName, $email, $password);
				$users = LoginDatabase::get_users();
				//include('../header.php');
				include('../left-col.php');
				include('users.php');
				include('../footer.php');
			}
			break;
		case 'edit-user-id':
			// get the user id to make changes
			include('../header.php');
			include('../left-col.php');
			// get the user id
			$user_id = $_POST['user_id'];

			// get the user info from the db and put it in a var
			$user = LoginDatabase::get_user_by_id($user_id);

			// redirect to the edit page
			include('edit-user.php');
			include('../footer.php');
			break;
		case 'delete-user':
			// delete the user from the db
			$user_id = filter_input(INPUT_POST, 'user_id');
		
			if($user_id == NULL || $user_id == FALSE){

				echo "There was an error deleting the user";
			}else{
				LoginDatabase::delete_user($user_id);
				$users = LoginDatabase::get_users();
				include('../header.php');
				include('../left-col.php');
				include('users.php');
				include('../footer.php');
			}
			break;
		case 'view-users':
			// view all users
			$users = LoginDatabase::get_users();
			include('../header.php');
			include('../left-col.php');
			include('users.php');
			include('../footer.php');
			break;
		default:
			$users = LoginDatabase::get_users();
			include('users.php');
	}

?>