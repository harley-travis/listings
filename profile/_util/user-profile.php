<?php 
// the header is created in the applicant_db file
// it holds all the variables used on this template
require_once __DIR__ . "/../../view/header.php";
//require('../header.php'); 
require_once __DIR__ . "/../../view/left-col.php";
require_once __DIR__ . "/../../model/applicant_db.php";

// get the query out of hte url string
$applicant_id = filter_input(INPUT_POST, 'applicant_id');

// get applicant information
$applicant = Applicants::get_applicant_by_applicant_id($applicant_id);

// sort out the stage
$stage_num = "";

if($applicant['stage'] == 0){
	$stage_num = "Schedule Phone Interview";
}else if($applicant['stage'] == 1){
	$stage_num = "Phone Interview Complete";
}else if($applicant['stage'] == 2){
	$stage_num = "1st Interview Complete";
}else if($applicant['stage'] == 3){
	$stage_num = "2nd Interview Complete";
}else if($applicant['stage'] == 4){
	$stage_num = "3rd Interview Complete";
}else if($applicant['stage'] == 6){
	$stage_num = "Hired";
}else{
	$stage_num = "<b>ERROR:</b> There was an error displaying the interview stage. Please contact White July if this persists.";
}
						

?>


<style>
	.applicant-header{
		padding-bottom: 50px;
	}
	.applicant-header-left {
		padding-left: 0;
	}
	.applicant-header-right {
		text-align: right;
		padding-top: 15px;
		padding-right: 0;
	}
	.applicant-block {
		background: #eee;
		padding: 20px;
		margin: 35px 0;
		overflow: auto;
	}
	.applicant-icon{
		font-size: 2rem;
		padding-left: 20px;
	}
	.left-tab-pad{
		padding-left: 20px;
	}
	.green-icon{
		color: green;
	}
	tr{
		line-height: 35px;
	}
</style>

<div class="applicant-header">
	<div class="col-md-6 col-xs-12 applicant-header-left">
		<h2><?php echo $applicant['applicant_firstName'] ." ". $applicant['applicant_lastName']; ?></h2>
	</div>
	<div class="col-md-6 col-xs-12 applicant-header-right">
		<a href="<?php echo $resume; ?>" class="btn btn-success" target="_blank">View Resume</a> 
	</div>
</div>

<div class="applicant-block">
	<h3>Applicant Information</h3>
	<div class="col-md-6 col-xs-12 applicant-info-left">
		<table>
			<tr>
				<td><b>Position:</td>
				<td class="left-tab-pad"><?php echo $applicant['job_title']; ?></td>
			</tr>
			<tr>
				<td><b>Date Applied:</b></td>
				<td class="left-tab-pad"><?php echo $applicant['date_applied']; ?></td>
			</tr>
			<tr>
				<td><b>Phone Number:</b></td>
				<td class="left-tab-pad"><?php echo $applicant['applicant_phone']; ?></td>
			</tr>
			<tr>
				<td><b>Email Address:</b></td>
				<td class="left-tab-pad"><a href="mailto:<?php echo $applicant['applicant_email']; ?>"><?php echo $applicant['applicant_email']; ?></a></td>
			</tr>
			<tr>
				<td><b>Ethnicity:</b></td>
				<td class="left-tab-pad"></td>
			</tr>
			<tr>
				<td><b>Veteran:</b></td>
				<td class="left-tab-pad"></td>
			</tr>
			<tr>
				<td><b>Disability:</b></td>
				<td class="left-tab-pad"></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6 col-xs-12 applicant-info-right">
		<?php 
			/*  assigning interview stages
				________________________________
				stage   \  status \
				--------------------------------
				pending \ 0       \
				phone   \ 1       \
				one     \ 2       \
				two     \ 3       \
				three   \ 4       \
				four    \ 5       \
				hired   \ 6       \
				--------------------------------
			*/
	
			if($applicant['stage'] == 0){ ?>
			
				<table>
					<tr>
						<td>Phone Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>1st Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>2nd Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>3rd Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
				</table>
			
	  <?php }else if($applicant['stage'] == 1){ ?>
	  			<table>
					<tr>
						<td>Phone Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>1st Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>2nd Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>3rd Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
				</table>
	  <?php }else if($applicant['stage'] == 2){ ?>
	  			<table>
					<tr>
						<td>Phone Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>1st Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>2nd Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>3rd Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
				</table>
	  <?php }else if($applicant['stage'] == 3){ ?>
				<table>
					<tr>
						<td>Phone Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>1st Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>2nd Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>3rd Interview:</td>
						<td><span class="glyphicon glyphicon-edit red applicant-icon" aria-hidden="true"></span></td>
					</tr>
				</table>
	  <?php }else if($applicant['stage'] == 4 || $applicant['stage'] == 6){ ?>
				<table>
					<tr>
						<td>Phone Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>1st Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>2nd Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
					<tr>
						<td>3rd Interview:</td>
						<td><span class="glyphicon glyphicon-check green-icon applicant-icon" aria-hidden="true"></span></td>
					</tr>
				</table>
	  <?php }else { ?>
				<span>There was an error displaying the user status</span>
	  <?php } ?>
			<form action="" method="post" id="next">
				<input type="hidden" name="action" value="next-step">
				<input type="hidden" name="action" value="<?php echo $applicant['applicant_id']; ?>">
				<input type="submit" class="btn btn-primary" value="Move To Next Step">
			</form>
	</div>
</div>

<div class="applicant-block applicant-notes">
	<h3>Grading Scale</h3>
	
</div>

<div class="applicant-block applicant-notes">
	<h3>Notes</h3>
	<form action="" method="post" id="phone_interview_notes">
		<input type="hidden" name="action" value="phone_interview_action">

		<div class="form-group">
			<label for="phone_interview">Phone Interview</label>
			<textarea name="phone_interview"></textarea>
		</div>
		<input type="submit" value="Add Note" class="btn btn-success">
	</form>
</div>

<script>
	CKEDITOR.replace( 'phone_interview' );
</script>
<?php include __DIR__ . "/../../view/footer.php"; ?>
