<?php
include('../header.php');
include('../left-col.php');
?>

<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Add Users</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->

<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/users/index.php" method="post" id="add-user">
	
		<input type="hidden" name="action" value="add-user">
		
		<div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" name="userFirstName" placeholder="First Name">
		</div>
		<div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" name="userLastName" placeholder="Last Name">
		</div>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="Password">Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="Verify Password">Verify Password</label>
			<input type="password" class="form-control" name="verifyPassword" placeholder="Verify Password">
		</div>
		<a href="<?php echo D_ROOT; ?>/view/users/index.php?action=view-users" class="btn btn-primary">Go Back</a>
		<input type="submit" value="Add User" class="btn btn-success">
	</form>
</div><!-- form-wrapper -->
<?php include('../footer.php'); ?>