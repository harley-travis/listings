<?php
include('../header.php');
?>
<div class="login-content">
	<div class="reg-form-wrapper">
		<h1 class="sign-in-header">White July</h1>
		<h2>Register an account</h2>


		<form action="<?php echo D_ROOT; ?>/../../index.php" method="post">

			<input type="hidden" name="action" value="register-account">

			<div class="form-group">
				<label for="firstName">First Name</label><span class="red">*</span>
				<input type="text" class="form-control" name="firstName" placeholder="first name">
			</div>
			<div class="form-group">
				<label for="lastName">Last Name</label><span class="red">*</span>
				<input type="text" class="form-control" name="lastName" placeholder="last name">
			</div>
			<div class="form-group">
				<label for="email">Email address</label><span class="red">*</span>
				<input type="text" class="form-control" name="email" placeholder="email">
			</div>
			<div class="form-group">
				<label for="password">Create Password</label><span class="red">*</span>
				<input type="password" class="form-control" name="password" placeholder="password">
			</div>
			<div class="form-group">
				<label for="verifyPassword">Re-enter Password</label><span class="red">*</span>
				<input type="password" class="form-control" name="verifyPassword" placeholder="verify password">
			</div>
			<div class="form-group">
				<label for="companyName">Company Name</label><span class="red">*</span>
				<input type="text" class="form-control" name="companyName" placeholder="company name">
			</div>
			<div class="form-group">
				<label for="logo-file">Select Logo</label>
				<input type="file" name="logo-file" value="logo-file">
				<p class="help-block">Do not upload files larger than 1GB.</p>
			</div>

			<input type="submit" value="Create Account" class="btn btn-success">

		</form>
	
		<div class="copyright">
			<?php echo date('Y'); ?> &copy; <span class="logo-font">White July</span> | All Rights Reserved
		</div><!-- copyright -->
	</div><!-- reg-form-wrapper -->
</div><!-- login-content -->

