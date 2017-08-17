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
				
				/**
				 * SET UP THE USER SESSIONS
				**/

				// get user_id
				$_SESSION['user_id'] = LoginDatabase::get_user_by_id($email); // grab the user_id
				
				// get the company id
				$_SESSION['company_id'] = LoginDatabase::get_company_by_user_id($_SESSION['user_id']);
				
				// get the company name
				$_SESSION['company_name'] = LoginDatabase::get_company_by_name($_SESSION['company_id']);
				
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
			$email 			=   filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password 		=	filter_input(INPUT_POST, 'password');
			$verifyPassword = 	filter_input(INPUT_POST, 'verifyPassword');
			$userFirstName	= 	filter_input(INPUT_POST, 'firstName');
			$userLastName 	= 	filter_input(INPUT_POST, 'lastName');
			$_SESSION['company_name'] 	= 	filter_input(INPUT_POST, 'companyName');
			$agree = $_POST['agree'];	
			
			// display error messages on the form 
			
			// verify the form data	
			$email_entry = '';
			$invalid_email = '';
			$password_entry = '';
			$verifyPassword_entry = '';
			$passwordMatch = '';
			$userFirstName_entry = '';
			$userLastName_entry = '';
			$company_entry = '';
			$agree_entry = '';
			$error_account = '';
			
			// welcome mesage
			$newcommer = "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> Your account has been created!</div>";
			
			// see if the email already exists in the database
			$existing_email = LoginDatabase::already_user($email);
			
			if(empty($email)){
				$email_entry = '<div class="alert alert-danger" role="alert">You must enter a valid email address to continue.</div>';
				include('view/login/registration.php');
			}else{
				if($email == $existing_email){
					$invalid_email = '<div class="alert alert-danger" role="alert">This email already exists in the database. Please enter a different email.</div>';
					include('view/login/registration.php');
				}else{
					if(empty($password)){
						$password_entry = '<div class="alert alert-danger" role="alert">You must enter in a password.</div>';
						include('view/login/registration.php');
					}else{
						if(empty($verifyPassword)){
							$verifyPassword_entry = '<div class="alert alert-danger" role="alert">You must verify your password.</div>';
							include('view/login/registration.php');
						}else{
							if($password != $verifyPassword){
								$passwordMatch = '<div class="alert alert-danger" role="alert">Your password does not match. Please try again.</div>';
								include('view/login/registration.php');
							}else{
								if(empty($userFirstName)){
									$userFirstName_entry = '<div class="alert alert-danger" role="alert">You must enter your first name</div>';
									include('view/login/registration.php');
								}else{
									if(empty($userLastName)){
										$userFirstName_entry = '<div class="alert alert-danger" role="alert">You must enter your last name</div>';
										include('view/login/registration.php');
									}else{
										if(empty($_SESSION['company_name'])){
											$company_entry = '<div class="alert alert-danger" role="alert">You must enter your company name</div>';
											include('view/login/registration.php');
										}else{
											// if the email does not exist and if the user accept the terms and the fields are not blank
											if(!isset($agree)){
												$agree_entry = '<div class="alert alert-danger" role="alert">You must agree to the terms of use before creating an account.</div>';
												include('view/login/registration.php');
											}else if(isset($agree)){

												// send info to function, insert into database
												LoginDatabase::register($email, $password, $userFirstName, $userLastName, $_SESSION['company_name']);

												// login FTP
												$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
												$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

												// url locations for directories that need to be created
												$dirUrl 			= URL_PATH . "/profile/" . $_SESSION['company_name'];
												$jobsDirUrl 		= URL_PATH . "/profile/" . $_SESSION['company_name'] . "/jobs";
												$jDirUrl 			= URL_PATH . "/profile/" . $_SESSION['company_name'] . "/jobs/j";
												$resumeDirUrl 		= URL_PATH . "/profile/" . $_SESSION['company_name'] . "/resumes";
												$applicantsDirUrl 	= URL_PATH . "/profile/" . $_SESSION['company_name'] . "/applicants";
												$logoDirUrl 		= URL_PATH . "/profile/" . $_SESSION['company_name'] . "/logo";

												// create directories for the user account
												if(ftp_mkdir($ftp_conn, $dirUrl)){	

													// create a directory for the jobs folder
													if(ftp_mkdir($ftp_conn, $jobsDirUrl)){

														if(ftp_mkdir($ftp_conn, $jDirUrl)){

														}else{
															echo "There was an error creating the J directory for the new user";
														}


													}else{
														echo "There was an error creating the jobs directory for the new user";
													}

													// create the resumes directory
													if(ftp_mkdir($ftp_conn, $resumeDirUrl)){

													}else{
														echo "There was an error creating the resumes directory for the new user";
													}

													// create the applicants directory
													if(ftp_mkdir($ftp_conn, $applicantsDirUrl)){

													}else{
														echo "There was an error creating the resumes directory for the new user";
													}

													// create the logo directory
													if(ftp_mkdir($ftp_conn, $logoDirUrl)){

													}else{
														echo "There was an error creating the resumes directory for the new user";
													}


												}else{
													echo "there was an error creating the company directory. Please try again.";
												}

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
													
													// get user_id
													$_SESSION['user_id'] = LoginDatabase::get_user_by_id($email); // grab the user_id
													
													// get the company id
													$_SESSION['company_id'] = LoginDatabase::get_company_by_user_id($_SESSION['user_id']);
													
													// send img url to database
													LoginDatabase::logo_url($renameLogo, $_SESSION['company_id']);

												}

												ftp_quit($ftp_conn);
												echo $newcommer;
												include('view/dashboard_login_view.php');

											}else{
												$error_account = '<div class="alert alert-danger" role="alert">There was an error creating your account. Please try again.</div>';
											}
										}
									}
								}
							}
						}
					}
				}
			}
				
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


