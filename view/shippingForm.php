
<div class="container checkout-wrapper">

	<form action="." method="post" id="shipping-form">
		<h2>Shipping Information</h2><hr>
		
		<input type="hidden" name="action" value="shipping-form">

		<div class="checkbox">
			<label>
				<input type="checkbox"> Same as billing
			</label>
		</div>
		
		<div class="form-group">
			<label for="shipToName">Ship To</label>
			<input type="text" name="shipToName" id="shipTo" placeholder="Full Name" class="form-control">
		</div><!-- form-group -->
		
		<div class="form-group">
			<label for="shipAddressOne">Address One</label>
			<input type="text" name="shipAddressOne" id="addressOne" placeholder="Address One" class="form-control">
		</div><!-- form-group -->
		
		<div class="form-group">
			<label for="shipAddressTwo">Address TWo</label>
			<input type="text" name="shipAddressTwo" id="addressTwo" placeholder="Address Two" class="form-control">
		</div><!-- form-group -->
		
		<div class="form-group">
			<label for="shipState">State</label>
			<input type="text" name="shipState" id="state" placeholder="State" class="form-control">
		</div><!-- form-group -->
		
		<div class="form-group">
			<label for="shipZip">Zip Code</label>
			<input type="text" name="shipZip" id="zip" placeholder="Zip Code" class="form-control">
		</div><!-- form-group -->
		
		<button type="submit" class="btn btn-primary">Submit Your Order</button>
		
	</form>

	

</div><!-- checkout-wrapper -->



