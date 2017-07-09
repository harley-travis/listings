<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Edit Job</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->

<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/jobs/index.php" method="post" id="edit-job">
	
		<input type="hidden" name="action" value="edit-job">
		<input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">

			<div class="form-group">
				<label for="jobTitle">Job Title</label><span class="red-txt">*</span>
				<input type="text" class="form-control" name="jobTitle" value="<?php echo $job['job_title']; ?>">
			</div>

			<div class="form-group">
				<label for="description">Description</label><span class="red-txt">*</span>
				<textarea class="form-control" rows="3" name="description" placeholder="Enter job description"></textarea>
			</div>

			<div class="form-group">
				<label for="qualifications">Qualifications</label><span class="red-txt">*</span>
				<textarea class="form-control" rows="3" name="qualifications" placeholder="Enter job qualifications"></textarea>
			</div>

			<div class="form-group">
				<label for="add_info">Additional Information</label>
				<textarea class="form-control" rows="3" name="add_info" placeholder="Enter additional information"></textarea>
			</div>

			<div class="form-group">
				<label for="salary">Salary</label><span class="red-txt">*</span>
				<input type="text" class="form-control" name="salary" placeholder="Salary">
			</div>

			<div class="form-group">
				<label for="location">Location</label><span class="red-txt">*</span>
				<input type="text" class="form-control" name="location" placeholder="Location">
			</div>

			<div class="form-group">
				<label for="department">Department</label><span class="red-txt">*</span>
				<input type="text" class="form-control" name="department" placeholder="Department">
			</div>

			<div class="form-group">
				<label for="closeDate">Close Date</label><span class="red-txt">*</span>
				<input type="text" class="form-control" name="closeDate" id="datepicker">
			</div>
	
		<div class="pg-btns">
			<a href="<?php echo D_ROOT; ?>/view/jobs/index.php?action=view-jobs" class="btn btn-primary">Go Back</a>
			<input type="submit" value="Save Changes" class="btn btn-success">
		</div><!-- pg-btns -->
	</form>
</div><!-- form-wrapper -->
