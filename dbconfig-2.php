<?php  
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "222011642";  
$dbPassword = "WantWore091";  
$dbName     = "mhs_222011642";  

// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  

// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}
?>