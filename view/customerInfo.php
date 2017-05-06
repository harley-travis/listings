<div class="container">
	<form action="../index.php" method="post" id="customerInfo-form">
	
		<input type="hidden" name="action" value="customerInfo-form">
				
		<h2>Customer Information</h2><hr>
				
		<div class="form-group">
			<label for="customerFirstName">First Name</label>
			<input type="text" name="customerFirstName" id="customerFirstName" placeholder="First Name" class="form-control">
		</div><!-- form-group -->

		<div class="form-group">
			<label for="customerLastName">Last Name</label>
			<input type="text" name="customerLastName" id="lastName" placeholder="Last Name" class="form-control">
		</div><!-- form-group -->
		
		<div class="form-group">
			<label for="customerEmail">Email</label>
			<input type="email" name="customerEmail" id="email" placeholder="Email" class="form-control">
		</div><!-- form-group -->
		
		<div class="form-group">
			<label for="customerPhone">Phone</label>
			<input type="text" name="customerPhone" id="phone" placeholder="Phone Number" class="form-control">
		</div><!-- form-group -->
		
		<button type="submit" class="btn btn-primary">Continue To Checkout</button>
		
	</form>
</div><!-- container -->