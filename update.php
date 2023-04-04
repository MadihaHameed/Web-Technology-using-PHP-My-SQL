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

// Check if form has been submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pic = $_FILES['pic']['name'];
    $tmp_name = $_FILES['pic']['tmp_name'];

    // Check if all fields are filled
    if (empty($name) || empty($email)) {
        echo "Please fill in all fields";
    } else {
        // Update data in table
        $sql = "UPDATE student_info SET name='$name', email='$email'";
        if (!empty($pic)) {
            $sql .= ", pic='$pic'";
        }
        $sql .= " WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            if (!empty($pic)) {
                // Upload image file
                move_uploaded_file($tmp_name, "C:/xampp/htdocs/web-engieering/images/".$pic);
            }
            // Redirect to page to display updated record
            header("Location: view.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    // Display form to update record
    $id = $_GET['id'];
    $sql = "SELECT * FROM student_info WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $pic = $row['pic'];
    } else {
        echo "No record found";
        exit();
    }
?>
<!-- HTML form for user input -->
<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>ID:</td>
            <td><input type="text" name="id" value="<?php echo $id; ?>" readonly></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
        </tr>
        <tr>
            <td>Picture:</td>
            <td><input type="file" name="pic"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Update"></td>
        </tr>
    </table>
</form>
<?php
}
// Close database connection
$conn->close();
?>