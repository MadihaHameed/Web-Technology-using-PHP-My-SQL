<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete record from table
    $sql = "DELETE FROM student_info WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to page to display all records
        header("Location: view.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
