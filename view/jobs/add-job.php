<?php
include('../header.php');
include('../left-col.php');
?>

<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Add New Job</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 page-header-btn">
		
	</div>	
</div><!-- page-title -->

<div class="form-wrapper">
	<form action="<?php echo D_ROOT; ?>/view/jobs/index.php" method="post" id="add-job">
	
		<input type="hidden" name="action" value="add-job">

				<div class="form-group">
					<label for="jobTitle">Job Title</label><span class="red-txt">*</span>
					<input type="text" class="form-control" name="jobTitle" placeholder="Job Title">
				</div>
				
				<div class="form-group">
					<label for="description">Description</label><span class="red-txt">*</span>
					<textarea class="form-control" rows="3" name="description" placeholder="Enter job description"></textarea>
				</div>
				
				<div class="form-group">
					<label for="requiements">Requirements</label><span class="red-txt">*</span>
					<textarea class="form-control" rows="3" name="requirements" placeholder="Enter job requirements"></textarea>
				</div>
				
				<div class="form-group">
					<label for="qualifications">Qualifications</label><span class="red-txt">*</span>
					<textarea class="form-control" rows="3" name="qulifications" placeholder="Enter job qualifications"></textarea>
				</div>
				
				<div class="form-group">
					<label for="additionalInfo">Additional Information</label>
					<textarea class="form-control" rows="3" name="additionalInformation" placeholder="Enter additional information"></textarea>
				</div>
				
				<div class="form-group">
					<label for="benefits">Benefits</label>
					<textarea class="form-control" rows="3" name="benefits" placeholder="Enter job benefits"></textarea>
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
			<input type="submit" value="Add Job" class="btn btn-success">
		</div><!-- pg-btns -->
	</form>
</div><!-- form-wrapper -->
<?php include('../footer.php'); ?>