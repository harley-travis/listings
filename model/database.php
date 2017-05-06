<?php
	// not real login information. this is for testing purposes
	// it is only effective on XAMMP. Nice try suckas
    $dsn = 'mysql:host=localhost;dbname=white_july';
    $username = 'root';
    $password = '';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        //include('../errors/database_error.php');
		echo "Error: There was an error establashing a connection to the database.";
        exit();
    }
?>
