<?php

	class FTP{
		
		
		private function __construct(){}
		
		public static function getFTP() {
			
			$ftp_server 	= "sundance.dreamhost.com";
			$ftp_username = 'trahar20';
			$ftp_userpass = 'Spiderman1!';

			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
			
		}
		
		public static function createNewDir($companyName){
			
			// connect to FTP
			$ftp_server 	= "sundance.dreamhost.com";
			$ftp_username = 'trahar20';
			$ftp_userpass = 'Spiderman1!';
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
			
			// set filepath for new dir loction
			$path = "/home/trahar20/careers.whitejuly.com/view/profile/company_name/" ;
			
			// make dir for company name
			mkdir($path."$companyName", 0777);

			// close connection
			ftp_close($ftp_conn);
		}
	}

?>

