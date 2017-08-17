<?php 
	
	require_once('listings_header.php');

	// create a dynamic page for each job in the db
	foreach($jobs as $job){
		
		$jobFile = fopen("j/".$job['job_title'].".php", "w") or die("Unable to open file!");
		
		// format the currency
		setlocale(LC_MONETARY, 'en_US.UTF-8');
		$money = $job['salary'];
		$curr_format = '';
		
		// date format
		$date_raw = $job['date'];
		$createDate = new DateTime($date_raw);
		$date = $createDate->format('Y-m-d');
		
		// work duration
		$duration = '';
		if($job['duration'] == 0){
			$duration = "<i>Full-Time</i>";
		}else if($job['duration'] == 1){
			$duration = "<i>Part-Time</i>";
		}else if($job['duration'] == 2){
			$duration = "<i>Temporary</i>";
		}else if($job['duration'] == 3){
			$duration = "<i>Seasonal</i>";
		}else if($job['duration'] == 4){
			$duration = "<i>Contractual</i>";
		}else{
			echo "There was an error displaying the duration for this job";
		}
		
		// display hourly or salary
		if($job['compensation'] == 0){
			$curr_format = "<b>Salary:</b> " . money_format('%.0n', $money) . "/hr";
		}else if($job['compensation'] == 1){
			$curr_format = "<b>Salary:</b> " . money_format('%.0n', $money) . "/yr";
		}else if($job['compensation'] == 2){
			$curr_format = "";
		}else{
			echo "There was an error displaying the compesation.";
		}
		
		
		// open the file
		//$posting_file = fopen($jobFile, "w") or die("Unable to open file!");

		// this code
		$posting_html = file_get_contents( __DIR__ . '/../../../profile/_util/job-posting.php' );

		//write then close this ish
		fwrite($jobFile, $posting_html);
		fclose($jobFile);


	}

?>
<html>
	<head>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	</head>
	<body>
		<table class="table table-hover">
			<tr>
				<th>Position</th>
				<th>Department</th>
				<th>Location</th>
				<th></th>
			</tr>
			<?php foreach ($jobs as $job) : ?>
			<tr>
				<td><a href="<?php echo JOB_URL; ?><?php echo $job['job_title']; ?>.php" target="_blank"><?php echo $job['job_title']; ?></a></td>
				<td><?php echo $job['dept']; ?></td>
				<td><?php echo $job['location']; ?></td>
				<td><a href="<?php echo JOB_URL; ?><?php echo $job['job_title']; ?>.php" class="btn btn-success" target="_blank">View Position</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
		<div class="copyright" style="text-align: right;padding:15px 15px 15px 0;font-weight: bold;">
			<span>Powered by <a href="http://whitejuly.com" target="_blank" style="color: black;">White July</a></span>
		</div>
	</body>
</html>