<?php
include('../header.php');
include('../left-col.php');
?>
<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Add Feedback</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->
<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/feedback/index.php" method="post" id="add-feedback">
	
		<input type="hidden" name="action" value="add-feedback">
		
		<div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" name="feedback_firstName" placeholder="First Name">
		</div>
		<div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" name="feedback_lastName" placeholder="Last Name">
		</div>
		<div class="form-group">
			<label for="feedback_subject">Subject</label>
			<input type="text" class="form-control" name="feedback_subject" placeholder="Subject">
		</div>
		<div class="form-group">
			<label for="feedback_text">Message</label>
			<textarea class="form-control" rows="5" placeholder="Enter Message" name="feedback_text"></textarea>
		</div>
		<a href="<?php echo D_ROOT; ?>/view/feedback/index.php?action=view-feedback" class="btn btn-primary">Go Back</a>
		<input type="submit" value="Add Feedback" class="btn btn-success">
	</form>
</div><!-- form-wrapper -->
<?php include('../footer.php'); ?>