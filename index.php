<?php include('view/header.php'); ?>
       
	<?php 
		// establish an action. Action used to direct content flow
		$action = filter_input(INPUT_POST, 'action');

		if($action == NULL){
			
			// display the userlogin if they're not logged in
			include('view/designer_login_view.php');
			
		}else if($action == 'register-account'){
			
			// establish the variables. Then deal with it
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password 		=	filter_input(INPUT_POST, 'password');
			$verifyPassword = 	filter_input(INPUT_POST, 'verifyPassword');
			$userFirstName	= 	filter_input(INPUT_POST, 'firstName');
			$userLastName 	= 	filter_input(INPUT_POST, 'lastName');
			$_SESSION['firstName'] = $userFirstName; // put that name into a session variable hoe bag
						
			// display the info to make sure it's working. then party on
			echo 'Welcome, ' . $_SESSION['firstName'] . '<br />';
			echo 'Password = ' . $password . '<br />';
			echo 'Password encypt = ' . $encryptPass . '<br />';
			echo 'Verify Password = ' . $verifyPassword . '<br />';
			echo 'User First Name = ' . $userFirstName . '<br />';
			echo 'User Last Name = ' . $userLastName . '<br />';
			echo '<a href="model/logout.php">Logout</a>';
			
			// send info to function, insert into database
			register($email, $password, $userFirstName, $userLastName);
			
			echo "Your account has been registered! Click <a href='model/logout.php'>here</a> to sign in.";
			
		}else if($action == 'sign-in'){
			// THIS SIGN IN IS TO USE THE DESIGNER, NOT FOR THE DASHBOARD
				
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = filter_input(INPUT_POST, 'password');
			$_SESSON['is_valid_user'] = $email.$password;
			
			if(designer_login($email, $password)){
				$_SESSON['is_valid_user'] = true;
				include('view/designer.php');
			}else{
				echo "<div class='alert alert-danger alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
							<span aria-hidden='true'>&times;</span>
						</button>
							<strong>Error:</strong> You must login to view the designer</div>";
				include('view/designer_login_view.php');
			}
			
		}else if($action == 'customerInfo-form'){
			
			echo "success!";
			include('view/billingForm.php');
			
		}else if($action == 'billing-form'){
			
			echo "success!";
			include('view/shippingForm.php');
			
		}else if($action == 'shipping-form'){
			
			echo "Thank you your order has been placed!";
		}

		else{ 
			echo "ERROR: Something broke. Pls try again. Error in Controller";
		}
		
?>                
                
                
<?php include('view/footer.php'); ?>






