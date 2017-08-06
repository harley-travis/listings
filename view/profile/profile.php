<style>
	.company-logo-wrapper{
		background-color: #fafafa;
		padding: 15px;
	}
	.company-logo-img{
		width: 100%;
		max-width: 300px;
	}
	li{
		list-style: none;
	}
	.btn-profile-wrapper{
		margin-top: 10px;
	}
	.logo-btn-thing{
		float: left;
		padding-right: 10px;
	}
	xmp {
		background: #fafafa;
		margin: 0;
		padding: 15px;
		text-align: left;
		color: #d05353;
	}
	.page-title-embed{
		margin-top: 50px;
	}
</style>
<div class="container-fluid page-title">
	<div class="col-md-4 col-xs-12 page-title-wrapper">
		<h2>Profile</h2>
	</div><!-- container -->
</div><!-- page-title -->

<div class="container-fluid">
<div class="col-md-6 col-xs-12 company-logo-wrapper">
	<img src="<?php echo D_ROOT; ?>/profile/white-july/logo.png" alt="" class="company-logo-img">
	<div class="btn-profile-wrapper">
		<form class="logo-btn-thing" action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post">
			<input type="hidden" name="action" value="delete-logo">
			<input type="submit" class="btn btn-danger" value="Delete Logo">
		</form>
		<a href="<?php echo D_ROOT; ?>/view/profile/logo.php" class="btn btn-primary">Upload Logo</a>
	</div>
</div>
<div class="col-md-6 col-xs-12">
	<ul>
	<li></li>

</ul>
	
</div>
</div>
<div class="container-fluid">
<div class="row page-title-embed">
	<div class="col-md-12 col-xs-12 page-title-wrapper">
		<h2>Embed Job Postings To Site</h2>
	</div><!-- container -->
</div><!-- page-title -->
<p>Copy this code and paste it on your website to display job listings.</p>
<p>This code is mobile responsive, and shouldn't need additional CSS changes.</p>
<p>You can view your job postings <a href="https://www.careers.whitejuly.com/profile/white-july/jobs/jobs-view.php" target="_blank">here</a></p>

<xmp><iframe src="https://www.careers.whitejuly.com/profile/white-july/jobs/jobs-view.php" height="100%" width="100%" allowfullscreen="" frameborder="0"></iframe></xmp>

</div>








