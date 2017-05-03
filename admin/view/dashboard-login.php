<div class="container-fluid login-view">
	<div class="container login-wrapper">
		<div class="row">
			<h1 class="login-logo">White July</h1>
			<form action="." method="post" id="login">
				
				<!-- hidden action -->
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
		</div><!-- row -->
	</div><!-- login-wrapper -->
</div><!-- login-view -->