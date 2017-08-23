<?php 
	// put the signed in user into a variable
	require_once  __DIR__ . "/../model/database.php";
	require_once  __DIR__ . "/../model/users.php";
	require_once  __DIR__ . "/../model/login-dashboard.php";

?>
<header>
	<div class="container-fluid logo-header">
		<div class="col-md-4 col-sm-6 col-xs-9">
			<div class="white-logo">
				<h1><a href="<?php echo D_ROOT; ?>/index.php?action=dashboard">White July</a></h1>
			</div><!-- logo -->
		</div>
		<div class="col-md-8 col-sx-6 col-xs-3 header-nav">
			<div class="header-nav-wrapper">
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<span class="glyphicon glyphicon-user dashboard-icon" aria-hidden="true"></span> <?php echo $_SESSION['username']; ?> 
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a href="<?php echo D_ROOT; ?>/index.php?action=profile"><span class="glyphicon glyphicon-user dashboard-icon" aria-hidden="true"></span> Profile</a></li>
						
						<li><a href="<?php echo D_ROOT; ?>/index.php?action=users"><span class="glyphicon glyphicon-globe dashboard-icon" aria-hidden="true"></span> Users</a></li>
						
						<li><a href="<?php echo D_ROOT; ?>/view/profile/bio.php"><span class="glyphicon glyphicon-align-left dashboard-icon" aria-hidden="true"></span> Company Bio</a></li>
						
						<li><a href="<?php echo D_ROOT; ?>/view/profile/index.php?action=view-emails"><span class="glyphicon glyphicon-envelope dashboard-icon" aria-hidden="true"></span> Email Template</a></li>

						<li><a href="<?php echo D_ROOT; ?>/view/profile/index.php?action=billing"><span class="glyphicon glyphicon-shopping-cart dashboard-icon" aria-hidden="true"></span> Billing</a></li>
<!--
						
						<li><a href="<?php echo D_ROOT; ?>/view/profile/bio.php"><span class="glyphicon glyphicon-globe dashboard-icon" aria-hidden="true"></span> Feedback</a></li>
-->
						
						
						<li role="separator" class="divider"></li>
						
						<li><a href="<?php echo D_ROOT; ?>/model/logout.php"><span class="glyphicon glyphicon-log-out dashboard-icon" aria-hidden="true"></span> Logout</a></li>
					</ul>
				</div><!-- dropdown -->
			</div><!-- header-nav-wrapper -->
		</div><!-- header-nav -->
	</div><!-- logo-header -->
	
</header>
<div class="container-fluid content-wrapper">
	<div class="row">
		<div class="col-md-2 col-xs-12 left-col">
			<nav class="dashboard-side-nav">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=dashboard"><span class="glyphicon glyphicon-home dashboard-icon" aria-hidden="true"></span> Dashboard</a></li>
					
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=applicants"><span class="glyphicon glyphicon-user dashboard-icon" aria-hidden="true"></span> Applicants</a></li>
					
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=jobs"><span class="glyphicon glyphicon-briefcase dashboard-icon" aria-hidden="true"></span> Jobs</a></li>
					
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/view/applicants/index.php?action=view-hired"><span class="glyphicon glyphicon-thumbs-up dashboard-icon" aria-hidden="true"></span> Hired Employees</a></li>
					
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=reports"><span class="glyphicon glyphicon-stats dashboard-icon" aria-hidden="true"></span> Reports</a></li>
					
					
				</ul>
			</nav>
			<div class="ver-number">
				<span>ver. 2.0.1</span>
			</div>
		</div><!-- left-col -->
		<div class="col-md-10 col-xs-12 right-col">