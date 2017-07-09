<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Applicants</h2>
	</div><!-- container -->
</div><!-- page-title -->

<table class="table table-striped table-hover">
	<tr>
		<th>Job Id</th>
		<th>Position</th>
		<th>Applicant</th>
		<th>Resume</th>
		<th></th>
		<th></th>
	</tr>
	<?php foreach ($applicants as $applicant) : ?>
	<tr>
		<td><?php echo $applicant['job_id']; ?></td>
		<td><?php echo $applicant['job_title']; ?></td>
		<td><?php echo $applicant['applicant_firstName'] . " " . $applicant['applicant_lastName']; ?></td>
		<td><a href="<?php echo "/profile/white-july/resumes/". $applicant['applicant_lastName']."_".$applicant['applicant_firstName']; ?>/resume.pdf" download>Resume</a></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php endforeach; ?>
</table>
