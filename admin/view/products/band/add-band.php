<?php
include('../../header.php');
include('../../left-col.php');
?>
<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Add New Band</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->

<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/products/band/index.php" method="post" id="add-new-band">
	
		<input type="hidden" name="action" value="add-new-band">
		
		<div class="form-group">
			<label for="bandName">Band Name</label>
			<input type="text" class="form-control" name="bandName" placeholder="Band Name">
		</div>
		
		<div class="form-group">
			<label for="bandDesc">Description</label>
			<input type="text" class="form-control" name="bandDesc" placeholder="Description">
		</div>
		
		<div class="form-group">
			<label for="bandPrice">Price</label>
			<input type="text" class="form-control" name="bandPrice" placeholder="Price">
		</div>
		
		<div class="form-group">
			<label for="bandCategory">Category</label>
			<input type="text" class="form-control" name="bandCategory" placeholder="Category">
		</div>
		
		<div class="form-group">
			<label for="band-img-one">First Band Image</label>
			<input type="file" id="band-img-one">
			<p class="help-block">Upload image here for the band. Max size is 15mb per image.</p>
		</div>
		
		<div class="form-group">
			<label for="band-img-two">Second Band Image</label>
			<input type="file" id="band-img-two">
			<p class="help-block">Upload image here for the band. Max size is 15mb per image.</p>
		</div>
		
		<div class="form-group">
			<label for="band-img-three">Third Band Image</label>
			<input type="file" id="band-img-three">
			<p class="help-block">Upload image here for the band. Max size is 15mb per image.</p>
		</div>
		
		<div class="form-group">
			<label for="band-img-four">Fourth Band Image</label>
			<input type="file" id="band-img-four">
			<p class="help-block">Upload image here for the band. Max size is 15mb per image.</p>
		</div>

		<a href="<?php echo D_ROOT; ?>/view/products/band/index.php?action=view-bands" class="btn btn-primary">Go Back</a>
		<input type="submit" value="Add New Band" class="btn btn-success">
	</form>
</div><!-- form-wrapper -->


<?php include('../../footer.php'); ?>