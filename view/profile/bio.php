<?php
include('../header.php');
include('../left-col.php');
?>
<h2>Company Bio</h2>


<form action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post" id="company-bio">
	<input type="hidden" name="action" value="company-bio">
	
	<div class="form-group">
		<label for="">Enter Bio</label>
		<textarea name="company-bop" class="form-control" rows="3" placeholder="Insert company bio"></textarea>
	</div>
	
	<a href="<?php echo D_ROOT; ?>/view/profile/index.php?action=view-profile" class="btn btn-primary">Go Back</a>
	<input type="submit" value="Add" class="btn btn-success">

</form>


<?php include('../footer.php'); ?>