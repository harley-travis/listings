<?php 

date_default_timezone_set('America/Phoenix');

//define the url paths
define("D_ROOT", "/phplearns/admin");
// commented one below is the real rootpath
//define("D_ROOT", "/admin");

// paths to db
define("SECURE_CONNECTION", 	 dirname(__FILE__)."/model/secure_conn.php");
define("DATABASE",          	 dirname(__FILE__)."/model/database.php");
define("DESIGNER_LOGIN",    	 dirname(__FILE__)."/model/designer_login.php");
define("DASHBOARD_FUNCTIONS",    dirname(__FILE__)."/model/dashboard_functions.php");
define("LEFT_COL",    			 dirname(__FILE__)."/view/left-col.php");


?>