<?php
// start the session
session_start();

// initialize the fruits array in the session if it doesn't exist
if(!isset($_SESSION['fruits'])) {
    $_SESSION['fruits'] = array();
}

// check if the user has submitted a fruit name
if(isset($_POST['fruit'])) {
    // get the fruit name from the form
    $fruit = $_POST['fruit'];

    // add the fruit to the fruits array in the session
    if(!empty($fruit)) {
        // get the index of the last fruit in the array
        $index = count($_SESSION['fruits']);

        // add the fruit with its index to the fruits array in the session
        $_SESSION['fruits'][$index] = $fruit;
    }
}

// display the fruits table
if(!empty($_SESSION['fruits'])) {
    echo "<table border='1'>";
    echo "<tr><th>Index</th><th>Fruit Name</th></tr>";
    foreach($_SESSION['fruits'] as $index => $fruit) {
        echo "<tr><td>" . $index . "</td><td>" . $fruit . "</td></tr>";
    }
    echo "</table>";
}
?>

<form method="POST">
    <label for="fruit">Enter a fruit name:</label>
    <input type="text" id="fruit" name="fruit">
    <input type="submit" value="Submit">
</form>
