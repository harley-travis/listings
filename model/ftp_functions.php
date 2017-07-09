<?php 

	class FTP_functions{
		
		// make new dir for new company
		public static function createDir(){
			$ftp = FTP::getFTP();
			$dir = "images";

			// try to create directory $dir
			if(ftp_mkdir($ftp_conn, $dir)){
				
			  echo "Successfully created $dir";
				
			}else{
				
			  echo "Error while creating $dir";
				
			}

			// close connection
			ftp_close($ftp_conn);
		}
		
		// upload logo
		public static function uploadLogo(){
			
			$file_result = "";
	
			// if there is an error uploading the file, display a message
			if($_FILES["logo-file"]["error"] > 0){
				
				$file_result .= "No file uploaded, or invalid file";
				$file_result .= "Error code: " .$_FILES["logo-file"]["error"] . "<br>";
				
			}else{
				
				$file_result .=
					"Upload: " . $_FILES["logo-file"]["name"] . "<br>" .
					"Type: " . $_FILES["logo-file"]["type"] . "<br>" .
					"Size: " . $_FILES["logo-file"]["size"] . "<br>" .
					"Temp File: " . $_FILES["logo-file"]["tmp_name"] . "<br>";
				
				// move the file to the specific folders
				move_uploaded_file($_FILES["logo-file"]["tmp_name"], "/careers.whitejuly.com/view/profile/company_name/white-july/logo/" . $_FILES["logo-file"]["name"]);
				
				$file_result .= "File uploaded successfully!";
				
			}
			
		}
		
		// upload new logo
		public static function deleteLogo(){
			
		}

		// add job	
		public static function createJobFile(){
			$ftp = FTP::getFTP();
			
			$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
			$txt = "John Doe\n";
			fwrite($myfile, $txt);
			$txt = "Jane Doe\n";
			fwrite($myfile, $txt);
			fclose($myfile);
			
			
			// put it into a specific dir
			error_reporting(E_ALL);

			$pagename = 'my_page1';

			$newFileName = './pages/'.$pagename.".php";
			$newFileContent = '<?php echo "something..."; ?>';

			if (file_put_contents($newFileName, $newFileContent) !== false) {
				echo "File created (" . basename($newFileName) . ")";
			} else {
				echo "Cannot create file (" . basename($newFileName) . ")";
			}
			
			
			
			
			
		}
		
		// edit job page 
		public static function editJobFile(){
			//$ftp = FTP::getFTP();
			
			$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
			$txt = "Mickey Mouse\n";
			fwrite($myfile, $txt);
			$txt = "Minnie Mouse\n";
			fwrite($myfile, $txt);
			fclose($myfile);
		}
		
	}

?>