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

	// connect to the database
	if($action == 'products'){
		// grab the database info like you're supposed to do 
		require_once('../model/database.php');
		require_once('./model/products.php');
		require_once('./model/products_db.php');
				
	}else if($action == 'add-band' || $action == 'add-stone'){
		// grab the database info like you're supposed to do 
		require_once('../../model/database.php');
		require_once('../../model/products.php');
		require_once('../../model/products_db.php');
	}else{
		echo "Could not retrevie the database for the products page.";
	}

	switch ($action){
		
		case 'add-band':
			include('../header.php');
			include('../left-col.php');
			include('band/index.php');
			include('../footer.php');
			break;
		case 'add-stone':
			include('../header.php');
			include('../left-col.php');
			include('stone/index.php');
			include('../footer.php');
			break;
		default:
			?>
			<div class="col-md-6 col-xs-12 product-selection">
				<div class="add-product">
					<a href="<?php echo D_ROOT; ?>/view/products/index.php?action=add-band" class="btn btn-primary">Add A Band</a>
				</div><!-- add-band -->
			</div><!-- product-selection -->
			<div class="col-md-6 col-xs-12 product-selection">
				<div class="add-product">
					<a href="<?php echo D_ROOT; ?>/view/products/index.php?action=add-stone" class="btn btn-primary">Add A Stone</a>
				</div><!-- add-band -->
			</div><!-- product-selection -->
			<?php
	}

?>