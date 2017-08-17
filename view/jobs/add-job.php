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
				<textarea name="description"></textarea>
			</div>

			<div class="form-group">
				<label for="qualifications">Qualifications</label><span class="red-txt">*</span>
				<textarea name="qualifications"></textarea>
			</div>

			<div class="form-group">
				<label for="add_info">Additional Information</label>
				<textarea name="add_info"></textarea>
			</div>

			<div class="form-group">
				<label for="compensation">Compensation</label><span class="red-txt">*</span><br>
				
				<div class="radio">
					<label>
						<input type="radio" name="compensation" value="0" id="hourly" checked> Hourly
					</label>
				</div>

				<div class="radio">
					<label>
						<input type="radio" name="compensation" value="1" id="salary"> Salary
					</label>
				</div>
				
			</div>
			
			<div class="form-group">
				<div class="input-group" id="salary-group">
					<div class="input-group-addon">$</div>
					<input type="text" class="form-control" name="salary-input" id="salary-amount" placeholder="Compensation amount"><!-- <div class="input-group-addon">/yr</div> -->
				</div>
			</div>
			
			<div class="form-group">
				<label for="duration">Position Duration</label><span class="red-txt">*</span>
				<select name="duration" class="form-control">
					<option value="">- Select Duration -</option>
					<option value="0">Full-Time</option>
					<option value="1">Part-Time</option>
					<option value="2">Temporary</option>
					<option value="3">Seasonal</option>
					<option value="4">By Contract</option>
				</select>
			</div>

			<div class="form-group">
				<label for="location">Location</label><span class="red-txt">*</span>
				<input type="text" class="form-control" name="location" placeholder="Location">
			</div>

			<div class="form-group">
				<label for="department">Department</label><span class="red-txt">*</span>
				<input type="text" class="form-control" name="department" placeholder="Department">
			</div>
	
		<div class="pg-btns">
			<a href="<?php echo D_ROOT; ?>/view/jobs/index.php?action=view-jobs" class="btn btn-primary">Go Back</a>
			<input type="submit" value="Add Job" class="btn btn-success">
		</div><!-- pg-btns -->
	</form>
</div><!-- form-wrapper -->

<script>
	
	// radio button view 
//	$(document).ready(function() {          
//		$('#salary-group').hide(); 
//		
//	   $('input[type="radio"]').click(function() {
//		   if($(this).attr('id') == 'salary') {
//				$('#salary-group').show();           
//				$('#hourly-group').hide();           
//		   }
//
//		   else if($(this).attr('id') == 'hourly') {
//				$('#salary-group').hide();   
//				$('#hourly-group').show();   
//		   }
//		   
//		   else{
//			   consol.log("there was an error display the compensation radios");
//		   }
//	   });
//	});

	
	CKEDITOR.replace( 'description' );
	CKEDITOR.replace( 'qualifications' );
	CKEDITOR.replace( 'add_info' );
</script>
<?php include('../footer.php'); ?>