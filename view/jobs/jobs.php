<table class="table table-striped table-hover">
	<tr>
		<th>Job ID</th>
		<th>Position</th>
		<th>Department</th>
		<th>Location</th>
		<th></th>
		<th></th>
	</tr>
	<?php foreach ($jobs as $job) : ?>
	<tr>
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
				<input type="hidden" name="action" value="delete-job">
				<input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
				<input type="submit" class="btn btn-danger" value="Delete Job">
			</form>
		</td>
	</tr>
	<?php endforeach; ?>
</table>


