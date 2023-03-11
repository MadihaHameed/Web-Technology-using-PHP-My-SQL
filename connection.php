<?php
// database configuration
$db_host = 'localhost'; // database host
$db_name = 'students'; // database name
$db_user = 'root'; // database user
$db_pass = ''; // database password

// create a mysqli object to connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_pass,$db_name );

// check if connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully to the database!";
?>
