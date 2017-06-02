<table class="table table-striped table-hover">
	<tr>
		<th>Action</th>
		<th>Job ID</th>
		<th>Position</th>
		<th>Date Posted</th>
		<th>URL</th>
	</tr>
	<?php foreach ($jobs as $job) : ?>
	<tr>
		<td><input type="checkbox" name="job-check"></td>
		<td><?php echo $job['job_id']; ?></td>
		<td><?php echo $job['job_title']; ?></td>
		<td><?php echo $job['job_post_date']; ?></td>
		<td>build this</td>
	</tr>
	<?php endforeach; ?>
</table>


