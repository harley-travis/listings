<h2>Reports</h2>


<form action="<?php echo D_ROOT; ?>/view/reports/index.php" method="post" class="form-inline">
	<select name="action" class="form-control">		
		<option value="">-- Select Report --</option>
		<option value="fill-job">Time To Fill Job</option>
		<option value="number-visits">Job Visits</option>
	</select>
	
	<input type="submit" value="Run Report" class="btn btn-primary">
</form>