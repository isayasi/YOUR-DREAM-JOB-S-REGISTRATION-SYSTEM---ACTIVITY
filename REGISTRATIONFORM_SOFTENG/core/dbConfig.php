<?php  
$host = "localhost"; // Database host
$user = "root"; // Database username
$password = ""; // Database password
$dbname = "registration_form";  // Database name
$dsn = "mysql:host={$host};dbname={$dbname}"; // Data Source Name
$pdo = new PDO($dsn, $user, $password); // Create PDO instance
?>
