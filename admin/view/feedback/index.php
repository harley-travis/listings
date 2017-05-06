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

	if($action == 'feedback'){
			// grab the database info like you're supposed to do 
			require_once('../model/database.php');
			require_once('./model/feedback.php');
		}else if($action == 'edit-feedback' || $action == 'edit-feedback-id' || $action == 'add-feedback' || $action == 'view-feedback'){
			// grab the database info like you're supposed to do 
			require_once('../../model/database.php');
			require_once('../../model/feedback.php');
		}else{
			echo "Could not retrevie the database for the feedback page.";
		}

	switch ($action){
			
		case 'view-feedback':
			$subjects = Feedback::get_subject();
			include('../header.php');
			include('../left-col.php');
			include('feedback.php');
			include('../footer.php');
			break;
			
		case 'add-feedback':
			// add feadback
			$feedback_firstName = filter_input(INPUT_POST, 'feedback_firstName');
			$feedback_lastName = filter_input(INPUT_POST, 'feedback_lastName');
			$feedback_subject = filter_input(INPUT_POST, 'feedback_subject');
			$feedback_text = filter_input(INPUT_POST, 'feedback_text');

			// verify that the fields are completed
			if($feedback_firstName == NULL || $feedback_firstName == FALSE ||
			  $feedback_lastName == NULL || $feedback_lastName == FALSE ||
			  $feedback_subject == NULL || $feedback_subject == FALSE ||
			  $feedback_text == NULL || $feedback_text == FALSE){

				echo "There was an error adding your feedback. Make sure that all fields are filled out.";
			}else{
				// add the feedback to the db, return the subject lines
				Feedback::add_feedback($feedback_firstName, $feedback_lastName, $feedback_subject, $feedback_text);
				$subjects = get_subject();
				include('../header.php');
				include('../left-col.php');
				include('feedback.php');
				include('../footer.php');

			}
			
			break;
			
		case 'edit-feedback-id':
			// get the feedback id to make changes
			include('../header.php');
			include('../left-col.php');
			// get the user id
			$feedback_id = $_POST['feedbackID'];

			// get the user info from the db and put it in a var
			$feedback = Feedback::get_feedback_by_id($feedback_id);

			// redirect to the edit page
			include('edit-feedback.php');
			include('../footer.php');
			break;
			
		case 'edit-feedback':
			include('../header.php');
			
			// edit feadback
			$feedback_id = filter_input(INPUT_POST, 'feedback_id');
			$feedback_firstName = filter_input(INPUT_POST, 'feedback_firstName');
			$feedback_lastName = filter_input(INPUT_POST, 'feedback_lastName');
			$feedback_subject = filter_input(INPUT_POST, 'feedback_subject');
			$feedback_text = filter_input(INPUT_POST, 'feedback_text');

			// verify that the fields are completed
			if($feedback_firstName == NULL || $feedback_firstName == FALSE ||
			  $feedback_lastName == NULL || $feedback_lastName == FALSE ||
			  $feedback_subject == NULL || $feedback_subject == FALSE ||
			  $feedback_text == NULL || $feedback_text == FALSE){

				echo "There was an error updating your feedback. Make sure that all fields are filled out.";

			}else{
				// edit the user in the db, get the users and display on the users page
				Feedback::edit_feedback($feedback_id, $feedback_firstName, $feedback_lastName, $feedback_subject, $feedback_text);
				$subjects = Feedback::get_subject();
				include('../left-col.php');
				include('feedback.php');
				include('../footer.php');
			}
			break;
			
		default:
			$subjects = Feedback::get_subject();
			include('feedback.php');
			
	}

?>