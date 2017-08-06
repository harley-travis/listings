<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Archived Applicants</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 btn-wrapper">
			<form action="<?php echo D_ROOT; ?>/view/applicants/index.php" method="post" class="form-inline">
				<div class="form-group">
					<label for="">Action:</label>
					<select name="action" class="form-control">
					  <option value="">- Select Action -</option>
					  <option value="markActive">Mark Active</option>
					</select>
				</div>
				<input type="submit" class="btn btn-success" value="Apply">
		<a href="<?php echo D_ROOT; ?>/view/applicants/index.php?action=view-applicants" class="btn btn-info">View Applicants</a>
	</div>
</div><!-- page-title -->

<table class="table table-striped table-hover">
	<tr>
		<th>Action</th>
		<th>Job Id</th>
		<th>Position</th>
		<th>Applicant</th>
		<th>Resume</th>
		<th></th>
	</tr>
	<?php foreach ($applicants as $applicant) : ?>
	<tr>
		<td><input type="checkbox" name="applicant_action[]" value="<?php echo $applicant['applicant_id']; ?>"></td>
		<td>000<?php echo $applicant['job_id']; ?></td>
		<td><?php echo $applicant['job_title']; ?></td>
		<td><?php echo $applicant['applicant_firstName'] . " " . $applicant['applicant_lastName']; ?></td>
		<td><a href="<?php echo "../../profile/white-july/resumes/". $applicant['applicant_lastName']."_".$applicant['applicant_firstName']; ?>/resume.pdf" download>View Resume</a></td>
		<td></td>
	</tr>
	<?php endforeach; ?>
</table>
