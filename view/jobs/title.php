<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Jobs</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 btn-wrapper">
		<form class="form-inline">
				<div class="form-group">
					<label for="">Action:</label>
					<select class="form-control">
					  <option value="">- select -</option>
					  <option value="volvo">Edit</option>
					  <option value="volvo">Delete</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Filter By:</label>
					<select class="form-control">
					  <option value="">- select -</option>
					  <option value="volvo">Alphabetized</option>
					  <option value="saab">Job</option>
					  <option value="mercedes">Date Applied</option>
					</select>
				</div>
			</form> 

		<a href="<?php echo D_ROOT; ?>/view/jobs/add-job.php" class="btn btn-success">Add Job</a>
		<a href="<?php echo D_ROOT; ?>/view/jobs/index.php?action=archive-jobs" class="btn btn-info">Archived Jobs</a>
	</div>
</div><!-- page-title -->




			