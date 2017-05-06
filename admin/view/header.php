<?php 
//$lifetime = 60 * 60 * 24 * 24; // 2 weeks in seconds, idiot
//session_set_cookie_params($lifetime, '/'); // this junk does what it wants
session_start(); // start pls

// grab the config file. 
require_once(dirname(__FILE__)."../../config.php");

// redirect to a secure connection
require_once(SECURE_CONNECTION);

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Dashboard | White July</title>
        
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        
        <!-- CSS LIBRARIES -->
        <link rel="stylesheet" type="text/css" href="<?php echo D_ROOT; ?>/assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?php echo D_ROOT; ?>/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo D_ROOT; ?>/assets/css/style.css">
           
        <!-- JS LIBRARIES -->   
		<script src="<?php echo D_ROOT; ?>/assets/js/jquery-1.12.4.min.js"></script>
             
        <script>
			
			$(".nav a").on("click", function(){
			   $(".nav").find(".active").removeClass("active");
			   $(this).parent().addClass("active");
			});
			
		</script>
    </head>
    <body> 