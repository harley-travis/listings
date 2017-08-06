<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Employees Hired</h2>
	</div><!-- container -->
</div><!-- page-title -->

<table class="table table-striped table-hover">
	<tr>
		<th>Job Id</th>
		<th>Interview Stage</th>
		<th>Position</th>
		<th>Applicant</th>
		<th>Phone Number</th>
		<th>Resume</th>
		<th></th>
	</tr>
	<?php foreach ($applicants as $applicant) : ?>
	<tr>
		<td>000<?php echo $applicant['job_id']; ?></td>
		<td>
			<?php 
				
				$stage = $applicant['stage']; 
				if($stage == 0){
					echo "Schedule Phone Interview";
				}else if($stage == 1){
					echo "Phone Interview Complete";
				}else if($stage == 2){
					echo "1st Interview Complete";
				}else if($stage == 3){
					echo "2nd Interview Complete";
				}else if($stage == 4){
					echo "3rd Interview Complete";
				}else if($stage == 5){
					echo "4th Interview Complete";
				}else if($stage == 6){
					echo "Hired!";
				}else{
					echo "there was an error collecting the interview stage. Please try again.";
				}
			
			?>
		</td>
		<td><?php echo $applicant['job_title']; ?></td>
		<td><?php echo $applicant['applicant_firstName'] . " " . $applicant['applicant_lastName']; ?></td>
		<td><?php echo $applicant['applicant_phone']; ?></td>
		<td><a href="<?php echo "../../profile/white-july/resumes/". $applicant['applicant_lastName']."_".$applicant['applicant_firstName']; ?>/resume.pdf" download>View Resume</a></td>
		<td></td>
	</tr>
	<?php endforeach; ?>
</table>
