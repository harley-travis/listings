<header>
	<div class="container-fluid logo-header">
		<div class="col-md-2">
			<div class="white-logo">
				<h1><a href="<?php echo D_ROOT; ?>/index.php?action=dashboard">White July</a></h1>
			</div><!-- logo -->
		</div>
		<div class="col-md-10 col-xs-12 header-nav">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<span class="glyphicon glyphicon-user dashboard-icon" aria-hidden="true"></span> UserName 
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="#">Edit Profile</a></li>
					<li><a href="#">Settings</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo D_ROOT; ?>/model/logout.php">Logout</a></li>
				</ul>
			</div><!-- dropdown -->
		</div><!-- header-nav -->
	</div><!-- logo-header -->
	
</header>
<div class="container-fluid content-wrapper">
	<div class="row">
		<div class="col-md-2 col-xs-12 left-col">
			<nav class="dashboard-side-nav">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation" class="active"><a href="<?php echo D_ROOT; ?>/index.php?action=dashboard"><span class="glyphicon glyphicon-home dashboard-icon" aria-hidden="true"></span> Dashboard</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=reports"><span class="glyphicon glyphicon-stats dashboard-icon" aria-hidden="true"></span> Reports</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=orders"><span class="glyphicon glyphicon-shopping-cart dashboard-icon" aria-hidden="true"></span> Orders</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=job-status"><span class="glyphicon glyphicon-tasks dashboard-icon" aria-hidden="true"></span> Job Status</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=products"><span class="glyphicon glyphicon-tag dashboard-icon" aria-hidden="true"></span> Products</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=category"><span class="glyphicon glyphicon-th-list dashboard-icon" aria-hidden="true"></span> Categories</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=users"><span class="glyphicon glyphicon-user dashboard-icon" aria-hidden="true"></span> Users</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=store-locations"><span class="glyphicon glyphicon-globe dashboard-icon" aria-hidden="true"></span> Store Locations</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=feedback"><span class="glyphicon glyphicon-comment dashboard-icon" aria-hidden="true"></span> Feedback</a></li>
					<li role="presentation"><a href="<?php echo D_ROOT; ?>/index.php?action=server-status"><span class="glyphicon glyphicon-cloud dashboard-icon" aria-hidden="true"></span> Server Status</a></li>
				</ul>
			</nav>
		</div><!-- left-col -->
		<div class="col-md-10 col-xs-12 right-col">