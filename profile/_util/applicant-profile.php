<?php 
// the header is created in the applicant_db file
// it holds all the variables used on this template
require('header.php'); 
require_once __DIR__ . "/../../../../view/header.php";
require_once __DIR__ . "/../../../../view/left-col.php";
?>








<?php echo $firstName; ?> 
<?php echo $lastName; ?> 
<?php echo $email; ?> 
<?php echo $phone; ?> 
<?php echo $job_name; ?> 
<a href="<?php echo $resume; ?>" target="_blank">Resume</a> 
<a href="<?php echo $resume; ?>" download>Download Resume</a> 


<?php echo $date_applied; ?>
<?php echo $stage_num; ?>

