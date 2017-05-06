<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Store Locations</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		<a href="<?php echo D_ROOT; ?>/view/store-location/add-store.php" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Add Store Location</a>
	</div>	
</div><!-- page-title -->

<div class="row">
	<?php foreach ($stores as $store) : ?>
	<div class="store-location">
		<h3><?php echo $store['store_city'].', '.$store['store_state']; ?></h3>
		<form action="<?php echo D_ROOT; ?>/view/store-location/index.php" method="post">
			<input type="hidden" name="action" value="edit-store-id">
			<input type="hidden" name="storeID" value="<?php echo $store['storeID']; ?>">
			<input type="submit" class="btn btn-primary" value="Edit Store">
			<!-- SEND THE ID TO INDEX.PHP -->
		</form>
		<?php echo 'Store Number: '.$store['store_number']. '<br>District Number: '.$store['district_number'].'<br> Phone Number: '.
			$store['store_phone']; ?>
	</div><!-- store-locations -->
	<?php endforeach; ?>
</div>