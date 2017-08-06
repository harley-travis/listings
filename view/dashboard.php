<?php 
include('header.php'); 
include('left-col.php'); 
?>
<style>
	.dashboard-wrapper{
		text-align: right;
		padding-right: 20px;
	}
</style>


<div class="col-md-6 col-xs-12">
	<h2>Recent Job Postings</h2>
	<hr>
	<table class="table table-striped table-hover">
		<tr>
			<th>Position</th>
			<th>Dept</th>
			<th>Location</th>
		</tr>
		<?php foreach ($jobs as $job) : ?>
		<tr>
			<td><?php echo $job['job_title']; ?></td>
			<td><?php echo $job['dept']; ?></td>
			<td><?php echo $job['location']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="col-md-6 col-xs-12">
	<h2>Recent Applicants</h2>
	<hr>
	<table class="table table-striped table-hover">
		<tr>
			<th>Applicant</th>
			<th>Position</th>
			<th>Resume</th>
		</tr>
		<?php foreach ($applicants as $applicant) : ?>
		<tr>
			<td><?php echo $applicant['applicant_firstName']." ".$applicant['applicant_lastName']; ?></td>
			<td><?php echo $applicant['job_title']; ?></td>
			<td><a href="<?php echo "/profile/white-july/resumes/". $applicant['applicant_lastName']."_".$applicant['applicant_firstName']; ?>/resume.pdf" download>View Resume</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<?php include('footer.php'); ?>