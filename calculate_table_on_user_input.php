<!DOCTYPE html>
<html>
<head>
	<title>Multiplication Table</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}
		label {
			margin-bottom: 10px;
		}
		input[type="text"] {
			padding: 5px;
			margin-bottom: 10px;
			width: 200px;
			font-size: 16px;
		}
		input[type="submit"] {
			padding: 10px;
			background-color: #4CAF50;
			border: none;
			color: white;
			font-size: 16px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		table {
			margin-top: 50px;
			border-collapse: collapse;
		}
		th, td {
			padding: 10px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<form method="POST">
		<label for="number">Enter a number:</label>
		<input type="text" id="number" name="number">
		<label for="end">Enter an ending point:</label>
		<input type="text" id="end" name="end">
		<input type="submit" value="Submit">
	</form>

	<?php
	// check if the user has submitted a number and an ending point
	if(isset($_POST['number']) && isset($_POST['end'])) {
		// get the number and ending point from the form
		$number = $_POST['number'];
		$end = $_POST['end'];

		// validate the input
		if(!empty($number) && is_numeric($number) && $number > 0 && !empty($end) && is_numeric($end) && $end > 0) {
			// generate the multiplication table
			echo "<table>";
			echo "<tr><th>Operation</th><th>Result</th></tr>";
			for($i = 1; $i <= $end; $i++) {
				$result = $number * $i;
				echo "<tr><td>" . $number . " X " . $i . " = " ."</td><td>" . $result . "</td></tr>";
			}
			echo "</table>";
		} else {
			// display an error message if the input is invalid
			echo "<p>Please enter valid positive numbers.</p>";
		}
	}
	?>
</body>
</html>
