<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Edit A Band</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->
<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/products/band/index.php" method="post" id="edit-band">
	
		<input type="hidden" name="action" value="edit-band">
		
		<input type="hidden" name="band_id" value="<?php echo $band['band_id']; ?>">
		
		<div class="form-group">
			<label for="band_name">Band Name</label>
			<input type="text" class="form-control" name="band_name" value="<?php echo $band['band_name']; ?>">
		</div>
		<div class="form-group">
			<label for="band_price">Band Price</label>
			<input type="text" class="form-control" name="band_price" value="<?php echo $band['band_price']; ?>">
		</div>
		<div class="form-group">
			<label for="band_desc">Band Description</label>
			<input type="text" class="form-control" name="band_desc" value="<?php echo $band['band_desc']; ?>">
		</div>
		<div class="form-group">
			<label for="band_category">Band Category</label>
			<input type="text" class="form-control" name="band_category" value="<?php echo $band['band_category']; ?>">
		</div>

		<a href="<?php echo D_ROOT; ?>/view/products/band/index.php?action=view-bands" class="btn btn-primary">Go Back</a>
		<input type="submit" value="Save Changes" class="btn btn-success">
	</form>
</div><!-- form-wrapper -->
