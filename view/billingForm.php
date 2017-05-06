
<div class="container">
	<h2>Billing Information</h2><hr>

		<form action="." method="post" id="billing-form">
		
			<input type="hidden" name="action" value="billing-form">
		
			<div class="form-group">
				<label for="customerNameCard">Name on Card</label>
				<input type="text" name="customerNameCard" id="customerNameCard" placeholder="Name on Card" class="form-control">
			</div><!-- form-group -->		

			<div class="form-group">
				<label for="customerSecurityCode">Security Code</label>
				<input type="text" name="customerSecurityCode" id="securityCode" placeholder="Security Code" class="form-control">
			</div><!-- form-group -->

			<div class="form-group">
				<label for="customerAddressOne">Address One</label>
				<input type="text" name="customerAddressOne" id="addressOne" placeholder="Address One" class="form-control">
			</div><!-- form-group -->

			<div class="form-group">
				<label for="customerAddressTwo">Address Two</label>
				<input type="text" name="customerAddressTwo" id="addressTwo" placeholder="Address Two" class="form-control">
			</div><!-- form-group -->

			<div class="form-group">
				<label for="customerState">State</label>
				<input type="text" name="customerState" id="state" placeholder="State" class="form-control">
			</div><!-- form-group -->

			<div class="form-group">
				<label for="customerZip">Zip Code</label>
				<input type="text" name="customerZip" id="zip" placeholder="Zip Code" class="form-control">
			</div><!-- form-group -->

			<div class="checkbox">
				<label>
					<input type="checkbox"> I agree to the terms and conditions
				</label>
			</div>
			
			<button type="submit" class="btn btn-primary">Continue To Checkout</button>

	</form>
</div><!-- container -->