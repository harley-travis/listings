
<h2>Number of Visits</h2>
<table class="table table-striped table-hover">
	<tr>
		<th>Job ID</th>
		<th>Position</th>
		<th>Number of Views</th>
	</tr>
	<?php foreach ($numbers as $number) : ?>
	<tr>
		<td><?php echo $number['job_id']; ?></td>
		<td><?php echo $number['job_title']; ?></td>
		<td><?php echo $number['counter']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>


<div class="back-btn">
	<a href="<?php echo D_ROOT; ?>/view/reports/index.php?action=view-reports" class="btn btn-primary">Run Another Report</a>
</div>
