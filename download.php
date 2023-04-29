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

// Check if search term was submitted
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Select records that match search term
    $sql = "SELECT * FROM student_info WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
} else {
    // Select all records from table
    $sql = "SELECT * FROM student_info";
}

$result = $conn->query($sql);

// Check if any records exist
if ($result->num_rows > 0) {
    // Display records in a table
    echo "<form method='get'>";
    echo "<input type='text' name='search' placeholder='Search by name or email'>";
    echo "<input type='submit' value='Search'>";
    echo "</form>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Picture</th><th>Update</th><th>Delete</th><th>Download</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td><img src='images/" . $row["pic"] . "' width='100'></td>";
        // Add update and delete buttons
        echo "<td><a href='update.php?id=" . $row["id"] . "'>Update</a></td>";
        echo "<td><a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
        // Add download button
        echo "<td><a href='download.php?filename=" . $row["pic"] . "'>Download</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close database connection
$conn->close();

// Function to download file
function downloadFile($filename)
{
    // Set headers
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$filename");

    // Read file
    readfile("images/" . $filename);
}

// Check if download button was clicked
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    downloadFile($filename);
}
