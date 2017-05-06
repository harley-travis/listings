<?php 
// log the user out of the session
session_start();
unset($_SESSION['username']); // remove this session variable
header("Location: ../index.php"); // redirct those suckers back to the home page


?>