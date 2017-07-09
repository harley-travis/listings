<style>
	.company-logo-img{
		width: 100%;
		max-width: 300px;
	}
</style>
<img src="<?php echo D_ROOT; ?>/profile/white-july/logo.png" alt="" class="company-logo-img">
<h2>USER Profile</h2>

<ul>
	<li><a href="<?php echo D_ROOT; ?>/view/profile/logo.php">Upload Logo</a></li>
	<li>
		<form action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post">
			<input type="hidden" name="action" value="delete-logo">
			<input type="submit" value="Delete Logo">
		</form>
	</li>
	<li><a href="<?php echo D_ROOT; ?>/view/profile/bio.php">Company Bio</a></li>
	<li><a href="<?php echo D_ROOT; ?>/view/profile/embed.php">Embed Job Posts To External Site</a></li>

</ul>