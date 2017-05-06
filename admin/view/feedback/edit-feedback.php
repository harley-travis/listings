<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Edit Feedback</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->
<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/feedback/index.php" method="post" id="edit-feedback">
	
		<input type="hidden" name="action" value="edit-feedback">
		
		<input type="hidden" name="feedback_id" value="<?php echo $feedback['feedbackID']; ?>">
				
		<div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" name="feedback_firstName" value="<?php echo $feedback['feedback_firstName']; ?>">
		</div>
		<div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" name="feedback_lastName" value="<?php echo $feedback['feedback_lastName']; ?>">
		</div>
		<div class="form-group">
			<label for="feedback_subject">Subject</label>
			<input type="text" class="form-control" name="feedback_subject" value="<?php echo $feedback['feedback_subject']; ?>">
		</div>
		<div class="form-group">
			<label for="feedback_text">Message</label>
			<textarea class="form-control" rows="5" value="<?php echo $feedback['feedback_text']; ?>" name="feedback_text"></textarea>
		</div>		
		
		<a href="<?php echo D_ROOT; ?>/view/feedback/index.php?action=view-feedback" class="btn btn-primary">Go Back</a>
		<input type="submit" value="Save Changes" class="btn btn-success">
	</form>
</div><!-- form-wrapper -->
