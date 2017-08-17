<?php 
	include('header.php'); 
	include('left-col.php'); 

	require_once  __DIR__ . "/../model/login-dashboard.php";
	$num_applicants = LoginDatabase::get_number_applicants($_SESSION['company_id']);
	$num_jobs = LoginDatabase::get_number_jobs($_SESSION['company_id']);


?>
<style>
	.dashboard-wrapper{
		text-align: right;
		padding-right: 20px;
	}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 col-xs-12 data-bubble-wrapper">
			<div class="data-bubble green">
				<span class="bubble-number">
					<?php echo $num_applicants; ?>
				</span>
			</div>
			<div class="data-bubble-tite">
				<h4>Current Applicants</h4>
			</div>
		</div>
		<div class="col-md-3 col-xs-12 data-bubble-wrapper">
			<div class="data-bubble blue">
				<span class="bubble-number">
					<?php echo $num_jobs; ?>
				</span>
			</div>
			<div class="data-bubble-tite">
				<h4>Active Job Postings</h4>
			</div>
		</div>
		<div class="col-md-6 col-xs-12 wj-info-box">
			<div class="wj-ib-wrapper">
				<h3>News From White July</h3>
				<p>Good afternoon stranger, we have a lot of thinks cooking in the lab right now. We just wanted to keep you updated on some recent additions and changes that we have for you.</p>
				<ul>
					<li>Included new UI</li>
					<li>Updated flow of new applicants</li>
					<li>Fixed minor bugs</li>
					<li>Created applicants profile page</li>
					<li>Responsive job listings page</li>
				</ul>
			</div>
		</div>
	</div>
</div>


<div class="dashboard-applicants-wrapper">
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