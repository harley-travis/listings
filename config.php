<?php 
ob_start();

date_default_timezone_set('America/Phoenix');

//define the url paths
define("D_ROOT", "");

// paths to db
define("SECURE_CONNECTION", 	 dirname(__FILE__)."/model/secure_conn.php");
define("DATABASE",          	 dirname(__FILE__)."/model/database.php");
define("DESIGNER_LOGIN",    	 dirname(__FILE__)."/model/designer_login.php");
define("DASHBOARD_FUNCTIONS",    dirname(__FILE__)."/model/dashboard_functions.php");
define("LEFT_COL",    			 dirname(__FILE__)."/view/left-col.php");
define("FULL_PATH",    			 "/home/trahar20/careers.whitejuly.com");
define("URL_PATH",    			 "careers.whitejuly.com");
define("URL",    				 "https://careers.whitejuly.com");

// define ftp connection
$ftp_server 	= "sundance.dreamhost.com";
$ftp_username 	= 'trahar20';
$ftp_userpass	= 'Spiderman1!';

?>