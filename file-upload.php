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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pic = $_FILES['pic']['name'];
    $tmp_name = $_FILES['pic']['tmp_name'];

    // Check if all fields are filled
    if (empty($name) || empty($email) || empty($pic)) {
        echo "Please fill in all fields";
    } else {
        // Insert data into table
        $sql = "INSERT INTO student_info (name, email, pic) VALUES ('$name', '$email', '$pic')";
        if ($conn->query($sql) === TRUE) {
            // Upload image file
            move_uploaded_file($tmp_name, "C:/xampp/htdocs/web-engieering/images/".$pic);
            // Redirect to page to display all records
            header("Location: view.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>

<!-- HTML form for user input -->
<form action="" method="POST" enctype="multipart/form-data">
    <table>
     
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Picture:</td>
            <td><input type="file" name="pic"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
