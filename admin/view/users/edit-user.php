<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Edit A User</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->
<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/users/index.php" method="post" id="edit-user">
	
		<input type="hidden" name="action" value="edit-user">
		
		<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
		
		<div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" name="userFirstName" value="<?php echo $user['user_firstName']; ?>">
		</div>
		<div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" name="userLastName" value="<?php echo $user['user_lastName']; ?>">
		</div>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" name="email" value="<?php echo $user['user_email']; ?>">
		</div>
		<div class="form-group">
			<label for="Current Password">Current Password</label>
			<input type="password" class="form-control" name="password" value="<?php echo $user['user_password']; ?>">
		</div>
		<div class="form-group">
			<label for="New Password">New Password</label>
			<input type="text" class="form-control" name="newPassword">
		</div>
		<div class="form-group">
			<label for="Verify New Password">Verify New Password</label>
			<input type="text" class="form-control" name="verifyNewPassword">
		</div>
		<a href="<?php echo D_ROOT; ?>/view/users/index.php?action=view-users" class="btn btn-primary">Go Back</a>
		<input type="submit" value="Save Changes" class="btn btn-success">
	</form>
</div><!-- form-wrapper -->
