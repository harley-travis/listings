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

	if($action == 'store-locations'){
			// grab the database info like you're supposed to do 
			require_once('../model/database.php');
			require_once('./model/stores.php');
		}else if($action == 'edit-store' || $action == 'edit-store-id' || $action == 'add-store' || $action == 'view-store'){
			// grab the database info like you're supposed to do 
			require_once('../../model/database.php');
			require_once('../../model/stores.php');
		}else{
			echo "Could not retrevie the database for the stores page.";
		}

	switch ($action){
			
		case 'view-store':
			$stores = Stores::get_stores();
			include('../header.php');
			include('../left-col.php');
			include('stores.php');
			include('../footer.php');
			break;
			
		case 'add-store':
			// add store location
			$store_number = filter_input(INPUT_POST, 'store_number');
			$district_number = filter_input(INPUT_POST, 'district_number');
			$store_address_one = filter_input(INPUT_POST, 'store_address_one');
			$store_address_two = filter_input(INPUT_POST, 'store_address_two');
			$store_city = filter_input(INPUT_POST, 'store_city');
			$store_state = filter_input(INPUT_POST, 'store_state');
			$store_zip = filter_input(INPUT_POST, 'store_zip');
			$store_phone = filter_input(INPUT_POST, 'store_phone');

			// verify that the fields are completed
			if($store_number == NULL || $store_number == FALSE || $district_number == NULL || $district_number == FALSE || $store_address_one == NULL || $store_address_one == FALSE || $store_city == NULL || $store_city == FALSE || $store_state == NULL || $store_state == FALSE || $store_zip == NULL || $store_zip == FALSE || $store_phone == NULL || $store_phone == FALSE){

				echo "There was an error adding your store. Make sure that all fields are filled out. Try again.";
			}else{
				// add the feedback to the db, return the subject lines
				Stores::add_store($store_number, $district_number, $store_address_one, $store_address_two, $store_city, $store_state, $store_zip, $store_phone);
				$stores = Stores::get_stores();
				include('../header.php');
				include('../left-col.php');
				include('stores.php');
				include('../footer.php');

			}
			
			break;
			
		case 'edit-store-id':
			// get the feedback id to make changes
			include('../header.php');
			include('../left-col.php');
			// get the user id
			$store_id = $_POST['storeID'];

			// get the user info from the db and put it in a var
			$store = Stores::get_store_by_id($store_id);

			// redirect to the edit page
			include('edit-store.php');
			include('../footer.php');
			break;
			
		case 'edit-store':
			include('../header.php');
			
			// edit feadback
			$store_id = filter_input(INPUT_POST, 'store_id');
			$store_number = filter_input(INPUT_POST, 'store_number');
			$district_number = filter_input(INPUT_POST, 'district_number');
			$store_address_one = filter_input(INPUT_POST, 'store_address_one');
			$store_address_two = filter_input(INPUT_POST, 'store_address_two');
			$store_city = filter_input(INPUT_POST, 'store_city');
			$store_state = filter_input(INPUT_POST, 'store_state');
			$store_zip = filter_input(INPUT_POST, 'store_zip');
			$store_phone = filter_input(INPUT_POST, 'store_phone');
			
			// verify that the fields are completed
			if($store_number == NULL || $store_number == FALSE || $district_number == NULL || $district_number == FALSE || $store_address_one == NULL || $store_address_one == FALSE || $store_city == NULL || $store_city == FALSE || $store_state == NULL || $store_state == FALSE || $store_zip == NULL || $store_zip == FALSE || $store_phone == NULL || $store_phone == FALSE){

				echo "There was an error updating your store. Make sure that all fields are filled out.";

			}else{
				// edit the user in the db, get the users and display on the users page
				Stores::edit_store($store_id, $store_number, $district_number, $store_address_one, $store_address_two, $store_city, $store_state, $store_zip, $store_phone);
				$stores = Stores::get_stores();
				include('../left-col.php');
				include('stores.php');
				include('../footer.php');
			}
			break;
			
		default:
			$stores = Stores::get_stores();
			include('stores.php');
			
	}

?>