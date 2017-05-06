<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Bands</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		<a href="<?php echo D_ROOT; ?>/view/products/band/add-band.php" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Add New Band</a>
	</div>	
</div><!-- page-title -->

<table class="table table-striped table-hover">
	<tr>
		<th>Band Name</th>
		<th>Price</th>
		<th>Description</th>
		<th>Category</th>
		<th>Images</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($bands as $band) : ?>
	<tr>
		<td><?php echo $band->getBandName(); ?></td>
		<td><?php echo "$".$band->getBandPrice(); ?></td>
		<td><?php echo $band->getBandDesc(); ?></td>
		<td><?php echo $band->getBandCategory(); ?></td>
		<td><?php //echo $band['band_img']; ?></td>
		<td>
			
			<form action="<?php echo D_ROOT; ?>/view/products/band/index.php" method="post">
				<input type="hidden" name="action" value="edit-band-id">
				<input type="hidden" name="band_id" value="<?php echo $band->getBandID(); ?>">
				<input type="submit" class="btn btn-primary" value="Edit Band">
				<!-- SEND THE ID TO INDEX.PHP EDIT_CARD_FORM -->
			</form>
			
		</td>
		<td>
			
			<form action="<?php echo D_ROOT; ?>/view/products/band/index.php" method="post">
				<input type="hidden" name="action" value="delete-band">
				<input type="hidden" name="band_id" value="<?php echo $band->getBandID(); ?>">
				<input type="submit" class="btn btn-danger" value="Delete Band">
			</form>
			
		</td>
	</tr>
	<?php endforeach; ?>
</table>
