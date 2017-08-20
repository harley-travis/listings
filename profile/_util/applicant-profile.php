<?php 
// the header is created in the applicant_db file
// it holds all the variables used on this template
require_once __DIR__ . "/../../../../view/header.php";
require('header.php'); 
require_once __DIR__ . "/../../../../view/left-col.php";
require_once __DIR__ . "/../../../../model/applicant_db.php";

// send the data to update the profile page
Applicants::update_applicant_profile($ftp_server, $ftp_username, $ftp_userpass, $applicant_id, $company_name, $job_id, $firstName, $lastName, $job_name, $date_applied, $phone, $email);

?>

<script>
	$(document).ready(function(){
		window.setTimeout(function(){
			<?php header("Refresh:0; url=https://www.careers.whitejuly.com/index.php?action=profile"); ?>
		}, 20000);
	});
</script>

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
		<h2><?php echo $firstName." ".$lastName; ?></h2>
	</div>
	<div class="col-md-6 col-xs-12 applicant-header-right">
		<a href="<?php echo $resume; ?>" class="btn btn-success" target="_blank">View Resume</a> 
		<a href="<?php echo $resume; ?>" class="btn btn-primary" download>Download Resume</a>
	</div>
</div>

<div class="applicant-block">
	<h3>Applicant Information</h3>
	<div class="col-md-6 col-xs-12 applicant-info-left">
		<table>
			<tr>
				<td><b>Position:</td>
				<td class="left-tab-pad"><?php echo $job_name; ?></td>
			</tr>
			<tr>
				<td><b>Date Applied:</b></td>
				<td class="left-tab-pad"><?php echo $date_applied; ?></td>
			</tr>
			<tr>
				<td><b>Phone Number:</b></td>
				<td class="left-tab-pad"><?php echo $phone; ?></td>
			</tr>
			<tr>
				<td><b>Email Address:</b></td>
				<td class="left-tab-pad"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
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
	
			if($stage == '0' || $newstage == '0'){ ?>
			
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
			
	  <?php }else if($stage == '1' || $newstage == '1'){ ?>
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
	  <?php }else if($stage == '2' || $newstage == '2'){ ?>
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
	  <?php }else if($stage == '3' || $newstage == '3'){ ?>
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
	  <?php }else if($stage == '4' || $stage_num == '6'  || $newstage == '4'  || $newstage == '6'){ ?>
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
			
	</div>
</div>

<div class="applicant-block applicant-notes">
	<h3>Notes</h3>
</div>


<?php include __DIR__ . "/../../../../view/footer.php"; ?>
