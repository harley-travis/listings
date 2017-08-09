<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Users</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		<a href="<?php echo D_ROOT; ?>/view/users/add-user.php" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Add User</a>
	</div>	
</div><!-- page-title -->

<table class="table table-striped table-hover">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Role</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($users as $user) : ?>
	<tr>
		<td><?php echo $user['user_firstName']; ?></td>
		<td><?php echo $user['user_lastName']; ?></td>
		<td><?php echo $user['user_email']; ?></td>
		<td>
			
			<?php 
				
				$user_type = $user['user_type']; 
				if($user_type == 0){
					echo "Super Mega Admin";
				}else if($user_type == 1){
					echo "Super Admin";
				}else if($user_type == 2){
					echo "Manager";
				}else if($user_type == 3){
					echo "User";
				}else{
					echo "there was an error collecting the interview stage. Please try again.";
				}
			
			?>
			
		</td>
		<td>
			
			<form action="<?php echo D_ROOT; ?>/view/users/index.php" method="post">
				<input type="hidden" name="action" value="edit-user-id">
				<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
				<input type="submit" class="btn btn-primary" value="Edit user">
				<!-- SEND THE ID TO INDEX.PHP EDIT_CARD_FORM -->
			</form>
			
		</td>
		<td>
			
			<form action="<?php echo D_ROOT; ?>/view/users/index.php" method="post">
				<input type="hidden" name="action" value="delete-user">
				<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
				<input type="submit" class="btn btn-danger" value="Delete user">
			</form>
			
		</td>
	</tr>
	<?php endforeach; ?>
</table>
