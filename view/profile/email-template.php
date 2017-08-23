<?php
include('../header.php');
include('../left-col.php');
?>

<style>
	.email-wrapper{
		padding-bottom: 50px;
	}
</style>

<h2>Email Templates</h2>
<p>Edit the email templates that are automatically sent out to your candidates.</p>
<p>Each email will include the date, user name, and company logo.</p>
<hr>

<h3>Rejection Letter</h3>
<div class="form-wrapper email-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post" id="edit-rejection">
	
		<input type="hidden" name="action" value="edit-rejection">

		<div class="form-group">
			<textarea name="edit-rejection-template"><?php echo htmlspecialchars($rejection);?></textarea>
		</div>
		
		<div class="pg-btns">
			<a href="<?php echo D_ROOT; ?>/view/jobs/index.php?action=view-jobs" class="btn btn-primary">Go Back</a>
			<input type="submit" value="Edit Email Template" class="btn btn-success">
		</div><!-- pg-btns -->
	</form>
</div><!-- form-wrapper -->

<h3>Interview Schedule</h3>
<div class="form-wrapper email-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post" id="edit-interview">
	
		<input type="hidden" name="action" value="edit-interview">

		<div class="form-group">
			<textarea name="edit-interview-template"><?php echo htmlspecialchars($interview);?></textarea>
		</div>
		
		<div class="pg-btns">
			<a href="<?php echo D_ROOT; ?>/view/jobs/index.php?action=view-jobs" class="btn btn-primary">Go Back</a>
			<input type="submit" value="Edit Email Template" class="btn btn-success">
		</div><!-- pg-btns -->
	</form>
</div><!-- form-wrapper -->


<h3>Offer Letter</h3>
<div class="form-wrapper email-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post" id="edit-offer">
	
		<input type="hidden" name="action" value="edit-offer">

		<div class="form-group">
			<textarea name="edit-offer-template"><?php echo htmlspecialchars($offer);?></textarea>
		</div>
		
		<div class="pg-btns">
			<a href="<?php echo D_ROOT; ?>/view/jobs/index.php?action=view-jobs" class="btn btn-primary">Go Back</a>
			<input type="submit" value="Edit Email Template" class="btn btn-success">
		</div><!-- pg-btns -->
	</form>
</div><!-- form-wrapper -->


<script>
	CKEDITOR.replace( 'edit-rejection-template' );
	CKEDITOR.replace( 'edit-interview-template' );
	CKEDITOR.replace( 'edit-offer-template' );
</script>

<?php include('../footer.php'); ?>