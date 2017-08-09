<?php 


class LoginDatabase{

	// register user at the login screen
	public static function register($email, $password, $userFirstName, $userLastName, $company){
		$db = Database::getDB();
		$password = sha1($email . $password); // encrypt the password and email
		
		$query = 'INSERT INTO users (user_email, user_password, user_firstName, user_lastName, user_type)
				  VALUES (:email, :password, :user_firstName, :user_lastName, 1);
				  
				  INSERT INTO company (company_name)
				  VALUES (:company_name);
				  
				  UPDATE users
				  INNER JOIN company
				  SET users.company_id = company.company_id
				  WHERE company.company_name = :company_name
				  AND users.user_email = :email;
				  
				  UPDATE company
				  INNER JOIN users
				  SET company.user_id = users.user_id
				  WHERE company.company_id = users.company_id';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', $password);
		$statement->bindValue(':user_firstName', $userFirstName);
		$statement->bindValue(':user_lastName', $userLastName);
		$statement->bindValue(':company_name', $company);
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
	public static function get_users($company_id){
		$db = Database::getDB();
		
		$query = 'SELECT * FROM users 
                  INNER JOIN company 
                  ON users.company_id = company.company_id 
                  WHERE users.company_id = :company_id
				  ORDER BY user_type';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':company_id', $company_id);
		$statement->execute();
		$users = $statement->fetchAll();
		$statement->closeCursor();
		
		return $users;    
	}
	
	// locate the username by email 
	public static function get_username($email){
		$db = Database::getDB();
		
		$query = 'SELECT user_firstName 
			      FROM users 
				  WHERE user_email = :email';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->execute();
		$user = $statement->fetch();
		$username = $user[0];
		$statement->closeCursor();	
		
		return $username;
	}
	
	// locate the user_id by their email 
	public static function get_user_by_id($email){
		$db = Database::getDB();
		
		$query = 'SELECT user_id 
			      FROM users 
				  WHERE user_email = :email';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->execute();
		$user = $statement->fetch();
		$user_id = $user[0];
		$statement->closeCursor();
		
		return $user_id;
	}
	
	// locate the user by ID TO EDIT THEIR USER data
	public static function get_user_edit_id($user_id){
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
	
	// locate the company id based on the user_id
	public static function get_company_by_user_id($user_id){
		$db = Database::getDB();
		
		$query = 'SELECT company_id 
			      FROM users 
				  WHERE user_id = :user_id';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':user_id', $user_id);
		$statement->execute();
		$company = $statement->fetch();
		$company_id = $company[0];
		$statement->closeCursor();
		
		return $company_id;
	}
	
	// locate the company id based on the user_id
	public static function get_company_by_name($company_id){
		$db = Database::getDB();
		
		$query = 'SELECT company_name 
				  FROM company 
				  WHERE company_id = :company_id';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':company_id', $company_id);
		$statement->execute();
		$company = $statement->fetch();
		$companyName = $company[0];
		$statement->closeCursor();
		
		return $companyName;
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
	public static function add_user($userFirstName, $userLastName, $email, $password, $role, $company_id){
		$db = Database::getDB();

		$password = sha1($email . $password); // encrypt the password and email
		$dateCreated = date("Y-m-d"); // put the date into a var
		
		$query = 'INSERT INTO users
					(user_firstName, user_lastName, user_email, user_password, user_type, date_user_created, company_id)
					VALUES
					(:userFirstName, :userLastName, :email, :password, :role, :date_user_created, :company_id)';

		$statement = $db->prepare($query);
		$statement->bindValue(':userFirstName', $userFirstName);
		$statement->bindValue(':userLastName', $userLastName);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', $password);
		$statement->bindValue(':role', $role);
		$statement->bindValue(':company_id', $company_id);
		$statement->bindValue(':date_user_created', $dateCreated);
		$statement->execute();
		$statement->closeCursor();
	}
	
	public static function add_bio($bio){
		$db = Database::getDB();
		
		$query = 'INSERT INTO company
					(bio)
					VALUES
					(:bio)';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':bio', $bio);
		$statement->execute();
		$statement->closeCursor();
		
	}
	
	public static function edit_bio($bio){
		$db = Database::getDB();
		
		$query = 'UPDATE company
				  SET bio            = :bio';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':bio', $bio);
		$statement->execute();
		$statement->closeCursor();
		
	}
	
}


?>