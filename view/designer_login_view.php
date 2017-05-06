<?php //require_once('model/secure_conn.php'); ?>

<div class="container-fluid login_block">
	<div class="container">
		<div class="login_wrapper">
			<div class="row">
				<h1 class="sign-in-header">White July</h1>
			</div><!-- row -->	
			<form action="." method="post" id="sign-in">
				<!-- action -->
				<input type="hidden" name="action" value="sign-in">
				
				<div class="form-group">
					<label>Email</label><br />
					<input type="text" class="form-control" name="email" placeholder="email">
				</div><!-- form-grop -->
				<div class="form-group">
					<label>Password</label><br />
					<input type="password" class="form-control" name="password" placeholder="password">
				</div><!-- form-group -->
				<label></label>
				<input type="submit" class="btn btn-primary form-control" value="Sign in">
			</form>
			<div class="bottom-links">
				<ul>
					<li><a href="#">Forgot Password</a></li>
<!--					<li><a href="#" onClick="register_account()">Register Account</a></li>-->
					<li><a href="model/logout.php">Logout</a></li>
				</ul>
			</div><!-- bottom-links -->
		</div><!-- login-wrapper -->
	</div><!-- container -->
	<br />

	<div class="container">
		<div class="register_wrapper">
			<div class="row">
				<h1 class="sign-in-header">Register Account</h1>
			</div><!-- row -->
			<form action="." method="post" id="register-account">
				<!-- action -->
				<input type="hidden" name="action" value="register-account">

				<div class="form-group">
					<label>First Name</label><br />
					<input type="text" class="form-control" name="firstName" placeholder="first name">
				</div><!-- form-group -->
				<div class="form-group">
					<label>Last Name</label><br />
					<input type="text" class="form-control" name="lastName" placeholder="last name">
				</div><!-- form-group -->
				<div class="form-group">
					<label>Email</label><br />
					<input type="text" class="form-control" name="email" placeholder="email">
				</div><!-- form-group -->
				<div class="form-group">
					<label>Password</label><br />
					<input type="password" class="form-control" name="password" placeholder="password">
				</div><!-- form-group -->
				<div class="form-group">
					<label>Verify Password</label><br />
					<input type="password" class="form-control" name="verifyPassword" placeholder="verify password">
				</div><!-- form-group -->

				<label></label>
				<input type="submit" class="btn btn-primary form-control" value="Register Account">
			</form>
			<div class="bottom-links">
				<ul>
					<li><a href="#">Forgot Password</a></li>
					<li><a href="#" onClick="sign_in()">Sign In</a></li>
					<li><a href="model/logout.php">Logout</a></li>
				</ul>
			</div><!-- bottom-links -->
		</div><!-- register_wrapper -->
		
			
			<!--
			** THIS SHOULD NOT BE VISIBLE FOR THE OUTSIDE WORLD
			** USER ACCOUNTS SHOULD ONLY BE CREATED BY USERS IN
			** THE USER DASHBOARD
			-->
			
		
	</div><!-- login-wrapper -->
</div><!-- login_block -->


<!-- 

// SETUP THIS PAGE

1. need to set up the action for the field
2. uncomment includes
3. check out new db / connect 
4. pass login to index.php 
5. log the user in php function
6. display the designer


-->