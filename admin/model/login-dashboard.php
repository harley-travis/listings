<?php 


class LoginDatabase{

	// register user at the login screen
	public static function register($email, $password, $userFirstName, $userLastName){
		$db = Database::getDB();
		$password = sha1($email . $password); // encrypt the password and email
		$query = 'INSERT INTO users (user_email, user_password, user_firstName, user_lastName)
				  VALUES (:email, :password, :user_firstName, :user_lastName)';
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', $password);
		$statement->bindValue(':user_firstName', $userFirstName);
		$statement->bindValue(':user_lastName', $userLastName);
		$statement->execute();
		$statement->closeCursor();
	}

	// log the user in for the designer access
	public static function dashboard_login($email, $password){
		$db = Database::getDB();
		$password = sha1($email . $password);
		$timestamp = date("Y-m-d H:i:s A"); // put the date n' time into a var

		$query = 'SELECT user_id FROM users
				  WHERE user_email = :email AND user_password = :password; 
				  UPDATE users 
				  SET last_logged_on = :timestamp 
				  WHERE user_email = :email AND user_password = :password';
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', $password);
		$statement->bindValue(':timestamp', $timestamp);
		$statement->execute();
		$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
		return $valid;

	}

	// view the users
	public static function get_users(){
		$db = Database::getDB();
		$query = 'SELECT * FROM users';
		$statement = $db->prepare($query);
		$statement->execute();
		$users = $statement->fetchAll();
		$statement->closeCursor();

		return $users;    
	}

	// locate the user by ID
	public static function get_user_by_id($user_id){
		$db = Database::getDB();
		$query = 'SELECT * FROM users
				  WHERE user_id = :user_id';
		$statement = $db->prepare($query);
		$statement->bindValue(":user_id", $user_id);
		$statement->execute();
		$user = $statement->fetch();
		$statement->closeCursor();
		return $user;
	}

	// edit the user
	public static function edit_user($user_id, $userFirstName, $userLastName, $email, $password) {
		$db = Database::getDB();
		$query = 'UPDATE users
				  SET user_id         = :user_id,
					  user_firstName  = :userFirstName,
					  user_lastName   = :userLastName,
					  user_email      = :email,
					  user_password   = :password
				  WHERE user_id       = :user_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':user_id', $user_id);
		$statement->bindValue(':userFirstName', $userFirstName);
		$statement->bindValue(':userLastName', $userLastName);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', $password);
		$statement->execute();
		$statement->closeCursor();
	} 

	// delete the user from the db
	public static function delete_user($user_id){
		$db = Database::getDB();
		$query = 'DELETE FROM users
				  WHERE user_id = :user_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':user_id', $user_id);
		$statement->execute();
		$statement->closeCursor();
	}

	//add a user
	public static function add_user($newUser){
		$db = Database::getDB();
		
		$userFirstName = $newUser->getUserFirstName();
		$userLastName = $newUser->getUserLastName();
		$email = $newUser->getUserEmail();
		$password = $newUser->getUserPassword();
		
		$dateCreated = date("Y-m-d"); // put the date into a var
		
		$query = 'INSERT INTO users
					(user_firstName, user_lastName, user_email, user_password, date_user_created)
					VALUES
					(:userFirstName, :userLastName, :email, :password, :date_user_created)';

		$statement = $db->prepare($query);
		$statement->bindValue(':userFirstName', $userFirstName);
		$statement->bindValue(':userLastName', $userLastName);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', $password);
		$statement->bindValue(':date_user_created', $dateCreated);
		$statement->execute();
		$statement->closeCursor();
	}
	
}


?>