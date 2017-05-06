<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Give Us Feedback!</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		<a href="<?php echo D_ROOT; ?>/view/feedback/add-feedback.php" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Add Feedback</a>
	</div>	
</div><!-- page-title -->

<div class="row">
	<?php foreach ($subjects as $subject) : ?>
	<div class="subject-line">
		<div class="col-md-10 col-sm-6 col-xs-12">
			<form action="<?php echo D_ROOT; ?>/view/feedback/index.php" method="post">
				<input type="hidden" name="action" value="edit-feedback-id">
				<input type="hidden" name="feedbackID" value="<?php echo $subject['feedbackID']; ?>">
				<input type="submit" class="feedback-title-btn" value="<?php echo $subject['feedback_subject']; ?>">
				<!-- SEND THE ID TO INDEX.PHP -->
			</form>
			added by: <?php echo $subject['feedback_firstName']. ' ' . $subject['feedback_lastName']; ?>
		</div>
		<div class="col-md-2 col-sm-6 col-xs-12">
			<?php// echo $subject['feedback_status']; ?>
		</div>
	</div>
	<?php endforeach; ?>
</div>