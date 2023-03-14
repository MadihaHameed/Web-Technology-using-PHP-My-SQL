<?php
// Create a new database connection
$servername = "localhost"; // the server name or IP address
$username = "username"; // the username for the database
$password = "password"; // the password for the database
$dbname = "database_name"; // the name of the database

$conn = mysqli_connect($servername, $username, $password, $dbname); // create a connection to the database

// Check connection
if (!$conn) { // if the connection fails
  die("Connection failed: " . mysqli_connect_error()); // display an error message and stop the script execution
}

// Check if the form has been submitted
if (isset($_POST['submit'])) { // if the submit button has been clicked
  // Get the student information from the form
  $name = $_POST['name']; // get the student name from the form
  $email = $_POST['email']; // get the student email from the form
  $phone = $_POST['phone']; // get the student phone from the form

  // Insert the student information into the database
  $sql = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')"; // construct an SQL statement to insert the student information into the students table

  if (mysqli_query($conn, $sql)) { // execute the SQL statement
    echo "Student added successfully"; // if the query is successful, display a success message
  } else {
    echo "Error adding student: " . mysqli_error($conn); // if an error occurs, display an error message
  }
}

// Close the database connection
mysqli_close($conn); // close the database connection
?>
