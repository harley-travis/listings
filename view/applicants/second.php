
<div class="container-fluid page-title">
	<div class="col-md-6 col-xs-12 page-title-wrapper">
		<h2>Applicants: 2nd Interview</h2>
	</div><!-- container -->
	<div class="col-md-6 col-xs-12 btn-wrapper">
		<form action="<?php echo D_ROOT; ?>/view/applicants/index.php" method="post" class="form-inline">
				<div class="form-group">
					<select name="action" class="form-control">
					  <option value="">- Select View -</option>
					  <option value="archive-applicants">Archived Applicants</option>
					  <option value="stage-phone">Phone Interviews</option>
					  <option value="stage-one">1st Interviews</option>
					  <option value="stage-two">2nd Inteviews</option>
					  <option value="stage-three">3rd Interviews</option>
					</select>
				</div>
				<input type="submit" class="btn btn-primary" value="Apply">
			</form>
		
			<form action="<?php echo D_ROOT; ?>/view/applicants/index.php" method="post" class="form-inline">
				<div class="form-group">
					<label for="">Action:</label>
					<select name="action" class="form-control">
					  <option value="">- Select Action -</option>
					  <option value="notQualified">Not Qualified</option>
					  <option value="phone">Phone Interview Complete</option>
					  <option value="one">1st Interview Complete</option>
					  <option value="two">2nd Interview Complete</option>
					  <option value="three">3rd Interview Complete</option>
					  <option value="hired">Mark as Hired</option>
					</select>
				</div>
				<input type="submit" class="btn btn-success" value="Apply">
	</div>
</div><!-- page-title -->

<table class="table table-striped table-hover">
	<tr>
		<th>Action</th>
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
		<td><input type="checkbox" name="applicant_action[]" value="<?php echo $applicant['applicant_id']; ?>"></td>
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
	</form> 
</table>
