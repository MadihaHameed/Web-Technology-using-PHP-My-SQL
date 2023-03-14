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
  // Output data for the row in a table
  echo "<table>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>Name:</td><td>" . $row["name"] . "</td></tr>";
    echo "<tr><td>Email:</td><td>" . $row["email"] . "</td></tr>";
    echo "<tr><td>Phone:</td><td>" . $row["phone"] . "</td></tr>";
    echo "<tr><td></td><td><a href='update_student.php?id=" . $row["id"] . "'>Update</a> <a href='delete_student.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
  }
  echo "</table>";
} else {
  echo "No student found with ID " . $id;
}

// Close the database connection
mysqli_close($conn);
?>
