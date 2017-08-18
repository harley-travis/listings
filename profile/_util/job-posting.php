<?php 
	require_once __DIR__ . '/../listings_header.php';
	require_once __DIR__ . '/../../../_util/job-posting-header.php';
?>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> 
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
		<style>
			.post{
				padding-left:120px;
			}
			.post-right {
				background-color: #fafafa;
				padding: 35px 15px 0 15px;
				height: 100%;
				position: fixed;
				right: 0;
			}
			.logo{
				width: 100%;
				max-width: 250px;
			}
			ul{
				padding: 0;
				margin: 0;
				margin-left: 35px;
			}
			li.sidebar-list{
				list-style: none;
				padding-top: 15px;
			}
			.post-left {
				padding-left: 50px;
				padding-top: 35px;
			}
			.btn-wide {
				width: 100%;
				margin-top: 50px;
				max-width: 250px;
			}
			.powered{
				padding-top: 15px;
			}
			.footer{
				padding-top: 35px;
				padding-bottom: 35px;
				font-size: 1.1rem;
			}
		</style>
	</head>
	<body>

		<div class='col-md-8 col-sm-6 col-xs-12 post-left'>
		<div class='logo'>
			<img src='<?php echo LOGO_URL; ?>' class='logo' alt=''>
		</div>
			<h1><?php echo $job['job_title']; ?></h1>
			<hr>
			<h3>Description:</h3>
			".$job['description']."
			<hr>
			<h3>Qualifications:</h3>
			".$job['qualifications']."
			<hr>
			<h3>Additional Information:</h3>
			".$job['add_info']."

			<div class='footer'>
				<span><?php echo date('Y'); ?> &copy; WhiteJuly.com | All Rights Reserved.</span>
			</div>
		</div>

		<div class='col-md-4 col-sm-6 col-xs-12 post-right'>
			<h4>".$job['job_title']."</h4> ".$duration."
			<hr>
			<ul>
				<li class='sidebar-list'><b>Location:</b> " . $job['location'] . "</li>
				<li class='sidebar-list'><b>Department:</b> " . $job['dept'] . "</li>
				<li class='sidebar-list'>".$curr_format."</li>
				<li class='sidebar-list'><b>Job Posted:</b> ".$date."</li>
			</ul>
			<button type='button' class='btn btn-success btn-wide' data-toggle='modal' data-target='#application_form'>
			  Apply Today
			</button>
			<div class='powered'>
				<b>Powered by <a href='http://whitejuly.com' target='_blank'>White July</a></b>
			</div>
		</div>

		<!-- Modal -->
		<div class='modal fade' id='application_form' tabindex='-1' role='dialog' aria-labelledby='application_formLabel'>
		  <div class='modal-dialog' role='document'>
			<div class='modal-content'>
			  <div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title' id='application_formLabel'>".$job['job_title']."</h4>
			  </div>
			  <div class='modal-body'>

				<form enctype='multipart/form-data' action='../../../_util/index.php' id='add-applicant' method='post'>

					<input type='hidden' name='action' value='add-applicant'>
					<input type='hidden' name='job_id' value='".$job['job_id']."'>
					<input type='hidden' name='company_name' value='".$company."'>
					<input type='hidden' name='company_id' value='".$job['company_id']."'>

					<div class='form-group'>
					  <label for='applicant_firstName'>First Name</label>
					  <input type='text' class='form-control' name='applicant_firstName' placeholder='First Name'>
					 </div>

					 <div class='form-group'>
					  <label for='applicant_lastName'>Last Name</label>
					  <input type='text' class='form-control' name='applicant_lastName' placeholder='First Name'>
					 </div>

					 <div class='form-group'>
					  <label for='applicant_phone'>Phone Number</label>
					  <input type='text' class='form-control' name='applicant_phone' placeholder='Phone Number'>
					 </div>

					 <div class='form-group'>
					  <label for='applicant_email'>Email Address</label>
					  <input type='text' class='form-control' name='applicant_email' placeholder='Email'>
					 </div>

					 <div class='form-group'>
					  <label for='resume'>Upload Resume</label>
					  <input type='file' name='resume' value='resume'>
					  <p class='help-block'>Files no larger than 1gig allowed.</p>
					 </div> 						

			  </div>
			  <div class='modal-footer'>
				<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				<input type='submit' class='btn btn-success' value='Apply'>
			  </div>

			  </form>

			</div>
		  </div>
		</div>

		<!-- js -->
		<script src='https://code.jquery.com/jquery-1.9.1.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>

	</body>
</html>