<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Employees Hired</h2>
	</div><!-- container -->
</div><!-- page-title -->

<table class="table table-striped table-hover">
	<tr>
		<th>Position</th>
		<th>Applicant</th>
		<th>Phone Number</th>
		<th>Date Hired</th>

	</tr>
	<?php foreach ($applicants as $applicant) : ?>
	<tr>
		<td><?php echo $applicant['job_title']; ?></td>
		<td><?php echo $applicant['applicant_firstName'] . " " . $applicant['applicant_lastName']; ?></td>
		<td><?php echo $applicant['applicant_phone']; ?></td>
		<td>Include this data</td>
	</tr>
	<?php endforeach; ?>
</table>
