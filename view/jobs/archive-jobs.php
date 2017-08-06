<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Archived Jobs</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 btn-wrapper">
		<form class="form-inline">
				<div class="form-group">
					<label for="">Action:</label>
					<select class="form-control">
					  <option value="">- select -</option>
					  <option value="volvo">Marked Active</option>
					</select>
				</div>
		<a href="<?php echo D_ROOT; ?>/view/jobs/add-job.php" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add Job</a>
		<a href="<?php echo D_ROOT; ?>/view/jobs/index.php?action=view-jobs" class="btn btn-info"><span class="glyphicon glyphicon-okay-sign" aria-hidden="true"></span> View Jobs</a>
	</div>
</div><!-- page-title -->
<table class="table table-striped table-hover">
	<tr>
		<th>Action</th>
		<th>Job ID</th>
		<th>Position</th>
		<th>Department</th>
		<th>Location</th>
		<th></th>
		<th></th>
	</tr>
	<?php foreach ($jobs as $job) : ?>
	<tr>
		<td><input type="checkbox" name="" value=""></td>
		<td><?php echo $job['job_id']; ?></td>
		<td><?php echo $job['job_title']; ?></td>
		<td><?php echo $job['dept']; ?></td>
		<td><?php echo $job['location']; ?></td>
		<td>
			<form action="<?php echo D_ROOT; ?>/view/jobs/index.php" method="post">
				<input type="hidden" name="action" value="edit-job-id">
				<input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
				<input type="submit" class="btn btn-primary" value="Edit Job">
			</form>
		</td>
		<td>
			<form action="<?php echo D_ROOT; ?>/view/jobs/index.php" method="post">
				<input type="hidden" name="action" value="activate-job">
				<input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
				<input type="submit" class="btn btn-success" value="Activate">
			</form>
		</td>
	</tr>
	<?php endforeach; ?>
</table>


