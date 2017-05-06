<?php 

function register($email, $password, $userFirstName, $userLastName){
	global $db;
	$password = sha1($email . $password);
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
function designer_login($email, $password){
	global $db;
	$password = sha1($email . $password);
	$query = 'SELECT user_id FROM users
			  WHERE user_email = :email AND user_password = :password';
	$statement = $db->prepare($query);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':password', $password);
	$statement->execute();
	$valid = ($statement->rowCount() == 1);
	$statement->closeCursor();
	return $valid;
	
}



?>