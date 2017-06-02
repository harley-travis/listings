<?php
	// real db connection. DO NOT PUSH ON GITHUB
    $dsn = 'mysql:host=db.whitejuly.com;dbname=whitejuly_store';
    $username = 'whitejuly_admin';
    $password = 'Spiderman1!';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "Error: There was an error establashing a connection to the database.";
        exit();
    }
?>