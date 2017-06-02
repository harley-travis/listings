<?php //require_once('model/secure_conn.php'); ?>

<div class="login-content">
	<div class="container-fluid login_block">
		<div class="container login_block_wrapper">
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
<!--						<li><a href="#">Forgot Password</a></li>-->
						<li><a href="/view/login/registration.php">Register Account</a></li>
						<li><a href="model/logout.php">Logout</a></li>
					</ul>
				</div><!-- bottom-links -->
			</div><!-- login-wrapper -->
		</div><!-- container -->
	</div><!-- login_block -->
</div><!-- login-content -->

