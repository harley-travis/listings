<?php
include __DIR__ . "/../header.php";
?>
<style>
	.error-wrapper{
		margin-bottom: 20px;
	}
	.error{
		color: red;
	}
	.g-recaptcha{
		padding: 10px 0 10px 0;
	}
</style>
<div class="login-content">
	<div class="reg-form-wrapper">
		<h1 class="sign-in-header">White July</h1>
		<h2>Register an account</h2>
		
		<div class="error-wrapper">
			<?php 
				echo $passwordMatch; 
				echo $userFirstName_entry;
				echo $userLastName_entry;
				echo $email_entry;
				echo $password_entry;
				echo $verifyPassword_entry;
				echo $company_entry;
				echo $agree_entry;
				echo $invalid_email;
			?>
		</div>
	
		<form enctype="multipart/form-data" action="<?php echo D_ROOT; ?>/../../index.php" method="post">

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
			
			<div class="form-group">
			<h3>Subscription Package</h3>
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							0 - 50 Employees <span class="red">*</span>
							</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div class="radio">
									<label>
										<input type="radio" name="stripe_pkg" id="pkg_one_monthly" value="pkg_one_monthly" checked>
										$150/month
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="stripe_pkg" id="pkg_one_yearly" value="pkg_one_yearly">
										$1200/year <span class="savings"> SAVE $600 A YEAR</span>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								51 - 200 Employees <span class="red">*</span>
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<div class="radio">
									<label>
										<input type="radio" name="stripe_pkg" id="pkg_two_monthly" value="pkg_two_monthly">
										$250/month
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="stripe_pkg" id="pkg_two_yearly" value="pkg_two_yearly">
										$2400/year <span class="savings"> SAVE $600 A YEAR</span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<h3>Enter Payment</h3>
				<span>Sign up and get a free 14 day trial!</span><br>
				<span>No setup fees!</span><br>
				<span>No hidden fees!</span><br>
				
				<label for="card number">Card Number</label><span class="red">*</span>
				<input type="text" class="form-control" name="card_number" placeholder="card number">
				
				<label for="cvc">CVC Number</label><span class="red">*</span>
				<input type="text" class="form-control" name="cvd" placeholder="cvc">
				
				<label for="card number">Expiration Date</label><span class="red">*</span>
				<input type="text" class="form-control" name="card_number" placeholder="card number">
				
			</div>
			
			<div class="checkbox">
				<span class="red">*</span>
				<label>
					<input type="checkbox" value="agree" name="agree"> I agree to the <a href="terms-of-use.php" target="_blank">terms of use.</a>
				</label>
			</div>
			
			<div class="g-recaptcha" data-sitekey="6LfOci0UAAAAAFnSJeWc58JBiMmPnQOfj7trgVv0"></div>
			
			<input type="submit" value="Create Account" class="btn btn-success">
		</form>
		
		<div class="copyright">
			<?php echo date('Y'); ?> &copy; <span class="logo-font">White July</span> | All Rights Reserved
		</div><!-- copyright -->
	</div><!-- reg-form-wrapper -->
</div><!-- login-content -->
<?php
include __DIR__ . "/../footer.php";
?>
