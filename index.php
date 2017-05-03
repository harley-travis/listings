<?php include('admin/includes/header.php'); ?>

<?php 

	// create an action
	$action = filter_input(INPUT_POST, 'action');

		if($action == NULL){
			
			// display the userlogin if they're not logged in
			include('admin/view/dashboard-login.php');

		}else{
			echo "test";
		}



?>
	
	
<?php include('admin/includes/footer.php'); ?>