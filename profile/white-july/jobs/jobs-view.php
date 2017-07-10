<?php 
	// get the database files
	require_once  __DIR__ . "/../../../model/database.php";
	require_once  __DIR__ . "/../../../model/jobs.php";

	// define the url for the jobs link
	define("JOB_URL", "https://careers.whitejuly.com/profile/white-july/jobs/");

	// call the jobs 
	$jobs = Jobs::get_all_jobs();

	// create a dynamic page for each job in the db
	foreach($jobs as $job){
		
		$jobFile = fopen("".$job['job_title'].".php", "w") or die("Unable to open file!");
		$txt = "
			<html>
				<head>
					<meta charset='utf-8'>
					<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> 
					<meta name='viewport' content='width=device-width, initial-scale=1.0'>
					<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
					<style>
						.post-right{
							background-color: #fafafa;
							padding: 0 15px 0 15px;
						}
						.logo{
							width: 100%;
							max-width: 250px;
						}
					</style>
				</head>
				<body>
					<div class='logo'>
						<img src='https://careers.whitejuly.com/profile/white-july/logo.png' class='logo' alt=''>
					</div>
					<div class='col-md-9 col-sm-6 col-xs-12 post-left'>
						<h1>".$job['job_title']."</h1>
						<hr>
						<h3>Description:</h3>
						<p>".$job['description']."</p>
						<hr>
						<h3>Additional Information:</h3>
						<p>".$job['add_info']."</p>
						<hr>
						<h3>Company Information</h3>
					</div>
					<div class='col-md-3 col-sm-6 col-xs-12 post-right'>
						<h4>Apply today!</h4>
						<button type='button' class='btn btn-success btn-lg' data-toggle='modal' data-target='#application_form'>
						  Apply Today
						</button>
						<ul>
							<li>Location: " . $job['location'] . "</li>
							<li>Department: " . $job['dept'] . "</li>
							<li>Salary: $" . $job['salary'] . "</li>
						</ul>
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
							
							<form enctype='multipart/form-data' action='index.php' id='add-applicant' method='post'>
							
								<input type='hidden' name='action' value='add-applicant'>
								<input type='hidden' name='job_id' value='".$job['job_id']."'>
							
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
								  <p class='help-block'>Files no larger than 1Gig allowed.</p>
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

					<footer class='container'>
						<span><?php echo date('Y'); ?> &copy; WhiteJuly.com | All Rights Reserved.</span>
					</footer>
					
					<!-- js -->
					<script src='https://code.jquery.com/jquery-1.9.1.min.js'></script>
					<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>
					
				</body>
			</html>
		";
		fwrite($jobFile, $txt);
		fclose($jobFile);

	}

?>
<html>
	<head>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	</head>
	<body>
		<table class="table table-striped table-hover">
			<tr>
				<th>Position</th>
				<th>Department</th>
				<th>Location</th>
				<th></th>
			</tr>
			<?php foreach ($jobs as $job) : ?>
			<tr>
				<td><a href="<?php echo JOB_URL; ?><?php echo $job['job_title']; ?>.php"><?php echo $job['job_title']; ?></a></td>
				<td><?php echo $job['dept']; ?></td>
				<td><?php echo $job['location']; ?></td>
				<td><a href="<?php echo JOB_URL; ?><?php echo $job['job_title']; ?>.php" class="btn btn-success">Apply</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>