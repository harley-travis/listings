<?php 


class Stores{

	// grab all stores
	public static function get_stores(){
		$db = Database::getDB();
		$query = 'SELECT * FROM stores';
		$statement = $db->prepare($query);
		$statement->execute();
		$stores = $statement->fetchAll();
		$statement->closeCursor();

		return $stores;    
	}

	// add the store
	public static function add_store($store_number, $district_number, $store_address_one, $store_address_two, $store_city, $store_state, $store_zip, $store_phone){
		$db = Database::getDB();
		$query = 'INSERT INTO stores
					(store_number, district_number, store_address_one, store_address_two, store_city, store_state, store_phone, store_zip)
					VALUES
					(:store_number, :district_number, :store_address_one, :store_address_two, :store_city, :store_state, :store_phone, :store_zip)';

		$statement = $db->prepare($query);
		$statement->bindValue(':store_number', $store_number);
		$statement->bindValue(':district_number', $district_number);
		$statement->bindValue(':store_address_one', $store_address_one);
		$statement->bindValue(':store_address_two', $store_address_two);
		$statement->bindValue(':store_city', $store_city);
		$statement->bindValue(':store_state', $store_state);
		$statement->bindValue(':store_phone', $store_phone);
		$statement->bindValue(':store_zip', $store_zip);
		$statement->execute();
		$statement->closeCursor();
	}

	// grab the store by id
	public static function get_store_by_id($store_id){
		$db = Database::getDB();
		$query = 'SELECT * FROM stores
				  WHERE storeID = :store_id';
		$statement = $db->prepare($query);
		$statement->bindValue(":store_id", $store_id);
		$statement->execute();
		$store = $statement->fetch();
		$statement->closeCursor();
		return $store;
	}

	// edit the store
	public static function edit_store($store_id, $store_number, $district_number, $store_address_one, $store_address_two, $store_city, $store_state, $store_zip, $store_phone) {
		$db = Database::getDB();
		$query = 'UPDATE stores
				  SET storeID             = :store_id,
					  store_number        = :store_number,
					  district_number     = :district_number,
					  store_address_one   = :store_address_one,
					  store_address_two   = :store_address_two,
					  store_city          = :store_city,
					  store_state         = :store_state,
					  store_phone         = :store_phone,
					  store_zip           = :store_zip
				  WHERE storeID           = :store_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':store_id', $store_id);
		$statement->bindValue(':store_number', $store_number);
		$statement->bindValue(':district_number', $district_number);
		$statement->bindValue(':store_address_one', $store_address_one);
		$statement->bindValue(':store_address_two', $store_address_two);
		$statement->bindValue(':store_city', $store_city);
		$statement->bindValue(':store_state', $store_state);
		$statement->bindValue(':store_phone', $store_phone);
		$statement->bindValue(':store_zip', $store_zip);
		$statement->execute();
		$statement->closeCursor();
	} 
}

?>