<?php 

// grab all stores
function get_bands(){
	global $db;
    $query = 'SELECT * FROM band';
    $statement = $db->prepare($query);
    $statement->execute();
    $bands = $statement->fetchAll();
    $statement->closeCursor();
    
    return $bands;    
}

// add band to database
function add_band($bandName, $bandPrice, $bandDesc){
	global $db;
    $query = 'INSERT INTO band
                (band_name, band_price, band_desc)
                VALUES
                (:band_name, :band_price, :band_desc)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':band_name', $bandName);
    $statement->bindValue(':band_price', $bandPrice);
    $statement->bindValue(':band_desc', $bandDesc);
    $statement->execute();
    $statement->closeCursor();
}

// delete the band from the db
function delete_band($band_id){
	global $db;
	$query = 'DELETE FROM band
			  WHERE band_id = :band_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':band_id', $band_id);
	$statement->execute();
	$statement->closeCursor();
}


// stringify to JSON
function bands_to_json(){
	
	global $db;
    $query = 'SELECT * FROM band';
    $statement = $db->prepare($query);
    $statement->execute();
    $bands = $statement->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC to remove the duplicate numeric columns in json file
    $statement->closeCursor();
	
	// open productData.json
	$jsonFile = fopen("../../../../data/band.json", "w") or die("Unable to open productData File! Try again, or contact White July");
	
	// format query to json
	$jsonText = json_encode($bands, JSON_PRETTY_PRINT);
	
	// write in the file and close
	fwrite($jsonFile, '{"band":');
	fwrite($jsonFile, $jsonText);
	fwrite($jsonFile, ',"size":["5", "6", "7", "8", "9", "10", "11", "12", "13"]}'); // ring sizes
	fclose($jsonFile);

}

function add_band_img(){
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	
}

// stringify to JSON
function stones_to_json(){
	
	global $db;
    $query = 'SELECT * FROM stone';
    $statement = $db->prepare($query);
    $statement->execute();
    $stones = $statement->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC to remove the duplicate numeric columns in json file
    $statement->closeCursor();
	
	// open productData.json
	$jsonFile = fopen("model/data/stone.json", "w") or die("Unable to open stone ProductData File! Try again, or contact White July");
	
	// format query to json
	$jsonText = json_encode($stones, JSON_PRETTY_PRINT);
	
	// write in the file and close
	fwrite($jsonFile, '{"stone":');
	fwrite($jsonFile, $jsonText);
	fwrite($jsonFile, "}");
	fclose($jsonFile);


}

?>