<?php

	// create a dynamic page for each job in the db
	foreach($jobs as $job){

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

	}


?>