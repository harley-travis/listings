<?php
include('../header.php');
include('../left-col.php');
?>
<h2>Upload Your Logo</h2>

<form enctype="multipart/form-data" action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post" id="upload-logo">
	<input type="hidden" name="action" value="upload-logo">
	
	<div class="form-group">
		<label for="logo-file">Select Logo</label>
		<input type="file" name="logo-file" value="logo-file">
		<p class="help-block">Keep files under 1Gig</p>
	</div>
	
	<a href="<?php echo D_ROOT; ?>/view/profile/index.php?action=view-profile" class="btn btn-primary">Go Back</a>
	<input type="submit" value="Upload Logo" class="btn btn-success">

</form>


<?php include('../footer.php'); ?>