<?php 
//$lifetime = 60 * 60 * 24 * 24; // 2 weeks in seconds, idiot
//session_set_cookie_params($lifetime, '/'); // this junk does what it wants
session_start(); // start pls

// grab the config file. 
require_once(dirname(__FILE__)."../../config.php");

// redirect to a secure connection
require_once(SECURE_CONNECTION);

// grab the database info suckas. 
require_once(DATABASE);
require_once(DESIGNER_LOGIN);

?>
<!doctype html>
<html>
    <head>
        <title>The Designer</title>
        
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSS LIBRARIES -->
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/style.css">
           
        <!-- JS LIBRARIES -->   
		<script src="<?php echo ROOT; ?>/assets/js/jquery-1.12.4.min.js"></script>
		<script src="<?php echo ROOT; ?>/assets/js/angular-1.5.8.min.js"></script>
		<script src="<?php echo ROOT; ?>/assets/js/angularjs-1.4.7-angular-route.js"></script>
             
    </head>
    <body ng-app="whiteJuly"> 