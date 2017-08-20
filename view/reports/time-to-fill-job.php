<h2>Time Took To Fulfill Position</h2>
<table class="table table-striped table-hover">
	<tr>
		<th>Job ID</th>
		<th>Position</th>
		<th>Date Posted</th>
		<th>Date Filled</th>
		<th>Time To Fill</th>
	</tr>
	<?php foreach ($numbers as $number) : 
			
			$date_formated = '';
		
			$posted_date = $number['date']; 			// put the date in a variable
			$date_one = date_create($posted_date); 		// create a readable date
			$date_filled = $number['date_filled']; 		// put the date in a variable
			$date_two = date_create($date_filled); 		// create a readable date
			$diff = date_diff($date_one, $date_two); 	// calculate the difference 
			$date_formated = $diff->format("%a days"); 	// format the date

			
	
	?>
	<tr>
		<td>00<?php echo $number['job_id']; ?></td>
		<td><?php echo $number['job_title']; ?></td>
		<td><?php echo $posted_date; ?></td>
		<td><?php echo $date_filled; ?></td>
		
		<td><?php 
			
			if($date_filled == '0000-00-00 00:00:00'){
					$date_formated = 'N/A';
					echo $date_formated;
				}else{
					echo $date_formated;
				} 
			
			?></td>
	</tr>
	<?php endforeach; ?>
</table>



<div class="back-btn">
	<a href="<?php echo D_ROOT; ?>/view/reports/index.php?action=view-reports" class="btn btn-primary">Run Another Report</a>
</div>

