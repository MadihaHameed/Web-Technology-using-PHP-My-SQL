<?php
// Create a new database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the ID from the URL
$id = $_GET["id"];

// Retrieve the data from the database based on ID
$sql = "SELECT * FROM students WHERE id = $id"; // select all columns from the students table where ID matches
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  // Output data for the row
  $row = mysqli_fetch_assoc($result);
  echo "Name: " . $row["name"] . ", Email: " . $row["email"] . ", Phone: " . $row["phone"];
} else {
  echo "No student found with ID " . $id;
}

// Close the database connection
mysqli_close($conn);
?>
