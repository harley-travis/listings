<?php 

class ProductDB{
	
	// get products by category
	public static function getProductsByCategory($categoty_id){
		$db = Database::getDB();
		$category = CategoryDB::getCategory($categoty_id);
		$query = 'SELECT * FROM products
				  WHERE products.categoryID = :category_id
				  ORDER BY productID';
		$statement = $db->prepare($query);
		$statement->bindValue(":category_id", $categoty_id);
		$statement->execute();
		$rows = $statement->fetchAll();
		$statement->closeCursor();
		
		foreach ($rows as $row){
			$product = new Product($category,
								   $row['productCode'],
								   $row['productName'],
								   $row['listPrice']);
			$product->setID($row['productID']);
			$products[] = $product;
		}
		return $products;
	}
	
	// grab all bands
	public static function get_bands(){
		$db = Database::getDB();
		$query = 'SELECT * FROM band';
		$statement = $db->prepare($query);
		$statement->execute();
		$rows = $statement->fetchAll();
		$statement->closeCursor();
		
		// each row needs to be the db column name
		// first new obj is singular
		// array is pluar
		// return pluar which is array
		foreach ($rows as $row) {
            
			$band = new Band(  $row['band_name'],
							   $row['band_price'],
							   $row['band_desc'],
							   $row['band_category']);
            $band->setBandId($row['band_id']);
            $bands[] = $band;
        }

		return $bands;    
	}

	// add band to database
	public static function add_band($band){
		$db = Database::getDB();
		
		// put the band class functions into variables
		$bandName = $band->getBandName();
		$bandPrice = $band->getBandPrice();
		$bandDesc = $band->getBandDesc();
		$bandCategory = $band->getBandCategory();
		
		
		$query = 'INSERT INTO band
					(band_name, band_price, band_desc, band_category)
					VALUES
					(:band_name, :band_price, :band_desc, :band_category)';

		$statement = $db->prepare($query);
		$statement->bindValue(':band_name', $bandName);
		$statement->bindValue(':band_price', $bandPrice);
		$statement->bindValue(':band_desc', $bandDesc);
		$statement->bindValue(':band_category', $bandCategory);
		$statement->execute();
		$statement->closeCursor();
	}

	// delete the band from the db
	public static function delete_band($band_id){
		$db = Database::getDB();
		$query = 'DELETE FROM band
				  WHERE band_id = :band_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':band_id', $band_id);
		$statement->execute();
		$statement->closeCursor();
	}
	
	// locate product by ID
	public static function get_band_by_id($band_id){
		$db = Database::getDB();
		$query = 'SELECT * FROM band
				  WHERE band_id = :band_id';
		$statement = $db->prepare($query);
		$statement->bindValue(":band_id", $band_id);
		$statement->execute();
		$band = $statement->fetch();
		$statement->closeCursor();
		return $band;
	}
	
	// edit the band information
	public static function edit_band($band_id, $band_name, $band_price, $band_desc, $band_category){
		$db = Database::getDB();
		$query = 'UPDATE band
				  SET band_id         = :band_id,
					  band_name       = :band_name,
					  band_price      = :band_price,
					  band_desc       = :band_desc,
					  band_category   = :band_category
				  WHERE band_id       = :band_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':band_id', $band_id);
		$statement->bindValue(':band_name', $band_name);
		$statement->bindValue(':band_price', $band_price);
		$statement->bindValue(':band_desc', $band_desc);
		$statement->bindValue(':band_category', $band_category);
		$statement->execute();
		$statement->closeCursor();
	}
	
	// stringify band data to JSON
	public static function bands_to_json(){
		$db = Database::getDB();
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
	
	// stringify stone data to JSON
	public static function stones_to_json(){
		$db = Database::getDB();
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
	
}

?>