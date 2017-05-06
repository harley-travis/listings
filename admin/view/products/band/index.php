<?php
	
	// establish an action for the user
	$action = filter_input(INPUT_POST, 'action');

	// if there is no action then show a page 
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL){
			include('../../view/header.php');
			include('../../view/dashboard_login_view.php');
		}
	}

	// connect to the database
	if($action == 'add-new-band' || $action == 'delete-band' || $action == 'edit-band-id' || $action == 'edit-band' || $action == 'view-bands' ){
		// grab the database info like you're supposed to do 
		require_once('../../../model/database.php');
		require_once('../../../model/products.php');
		require_once('../../../model/products_db.php');
		
		// update json product file
		// NOTE: this functions needs to happen when user clicks SAVE
		ProductDB::bands_to_json();
		
	}else if($action == 'delete-band' || $action == 'add-band' ){
		// grab the database info like you're supposed to do 
		require_once('../../model/database.php');
		require_once('../../model/products.php');
		require_once('../../model/products_db.php');
	}else{
		echo "Could not retrevie the database for the products page.";
	}

	switch ($action){
		
		case 'add-new-band':
			// add a new user
			$bandName = filter_input(INPUT_POST, 'bandName');
			$bandDesc = filter_input(INPUT_POST, 'bandDesc');
			$bandPrice = filter_input(INPUT_POST, 'bandPrice');
			$bandCategory = filter_input(INPUT_POST, 'bandCategory');

			if($bandName == NULL || $bandName == FALSE ||  $bandDesc == NULL || $bandDesc == FALSE || $bandPrice == NULL || $bandPrice == FALSE){

				echo "There was an error adding a band, please try again.";
			}else{
				// add the user to the db, put the data in a variable, display the page
				$band = new Band($bandName, $bandPrice, $bandDesc, $bandCategory);
				ProductDB::add_band($band);
				
				//$bands = get_bands();
				ProductDB::bands_to_json(); // add new json file with new band information
				
				$bands = ProductDB::get_bands();
				
				include('../../header.php');
				include('../../left-col.php');
				include('bands.php');
				include('../../footer.php');

			}
			break;
		case 'edit-band':
			include('../../header.php');

			$band_id = filter_input(INPUT_POST, 'band_id');
			$band_name = filter_input(INPUT_POST, 'band_name');
			$band_price = filter_input(INPUT_POST, 'band_price');
			$band_desc = filter_input(INPUT_POST, 'band_desc');
			$band_category = filter_input(INPUT_POST, 'band_category');


			if($band_id == NULL || $band_id == FALSE || $band_name == NULL || $band_name == FALSE || $band_price == NULL || $band_price == FALSE || $band_desc == NULL || $band_desc == FALSE || $band_category == NULL || $band_category == FALSE){

				echo "There was an error editing the user, please try again.";

			}else{
				// edit the band in the db
				ProductDB::edit_band($band_id, $band_name, $band_price, $band_desc, $band_category);
				$bands = ProductDB::get_bands();

				//include('../header.php');
				include('../../left-col.php');
				include('bands.php');
				include('../../footer.php');
			}
			break;
		case 'edit-band-id':
			// get the user id to make changes
			include('../../header.php');
			include('../../left-col.php');
			
			// get the band id
			$band_id = $_POST['band_id'];

			// get the user band from the db and put it in a var
			$band = ProductDB::get_band_by_id($band_id);

			// redirect to the edit page
			include('edit-band.php');
			include('../../footer.php');
			break;
		case 'delete-band':
			// delete the user from the db
			$band_id = filter_input(INPUT_POST, 'band_id');
		
			if($band_id == NULL || $band_id == FALSE){

				echo "There was an error deleting the band";
			}else{
				ProductDB::delete_band($band_id);
				$bands = ProductDB::get_bands();
				ProductDB::bands_to_json();
				include('../../header.php');
				include('../../left-col.php');
				include('bands.php');
				include('../../footer.php');
			}
			break;
		case 'view-bands':
			// view all bands
			$bands = ProductDB::get_bands();
			include('../../header.php');
			include('../../left-col.php');
			include('bands.php');
			include('../../footer.php');
			break;
		default:
			$bands = ProductDB::get_bands();
			include('bands.php');
	}

?>