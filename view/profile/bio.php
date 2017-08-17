<?php
include('../header.php');
include('../left-col.php');
?>
<h2>Add A Company Bio</h2>


<form action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post" id="company-bio">
	<input type="hidden" name="action" value="company-bio">
	
	<div class="form-group">
		<label for="">Enter Bio</label>
		<textarea name="bio"></textarea>
	</div>
	
	<a href="<?php echo D_ROOT; ?>/view/profile/index.php?action=view-profile" class="btn btn-primary">View Profile</a>
	<input type="submit" value="Add" class="btn btn-success">

</form>

<script>
	CKEDITOR.replace( 'bio' );
</script>
<?php include('../footer.php'); ?>