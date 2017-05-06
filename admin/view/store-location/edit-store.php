<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Edit A Store</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->


<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/store-location/index.php" method="post" id="edit-store">
	
		<input type="hidden" name="action" value="edit-store">
		
		<input type="hidden" name="store_id" value="<?php echo $store['storeID']; ?>">
				
		<div class="form-group">
			<label for="storeNumber">Store Number</label>
			<input type="text" class="form-control" name="store_number" value="<?php echo $store['store_number']; ?>">
		</div>
		<div class="form-group">
			<label for="districtNumber">District Number</label>
			<input type="text" class="form-control" name="district_number" value="<?php echo $store['district_number']; ?>">
		</div>
		<div class="form-group">
			<label for="storeAddressOne">Store Address One</label>
			<input type="text" class="form-control" name="store_address_one" value="<?php echo $store['store_address_one']; ?>">
		</div>
		<div class="form-group">
			<label for="storeAddressTwo">Store Address Two</label>
			<input type="text" class="form-control" name="store_address_two" value="<?php echo $store['store_address_two']; ?>">
		</div>
		<div class="form-group">
			<label for="storeCity">Store City</label>
			<input type="text" class="form-control" name="store_city" value="<?php echo $store['store_city']; ?>">
		</div>
		<div class="form-group">
			<label for="storeAddressOne">Store State</label>
			<input type="text" class="form-control" name="store_state" value="<?php echo $store['store_state']; ?>">
		</div>
		<div class="form-group">
			<label for="storeZip">Store Zip</label>
			<input type="text" class="form-control" name="store_zip" value="<?php echo $store['store_zip']; ?>">
		</div>
		<div class="form-group">
			<label for="storePhone">Store Phone</label>
			<input type="text" class="form-control" name="store_phone" value="<?php echo $store['store_phone']; ?>">
		</div>

		
		<a href="<?php echo D_ROOT; ?>/view/store-location/index.php?action=view-store" class="btn btn-primary">Go Back</a>
		<input type="submit" value="Save Changes" class="btn btn-success">
	</form>
</div><!-- form-wrapper -->
