<!DOCTYPE html>
<html>
<head>
	<title>Fruit Names</title>
</head>
<body>
	<form method="POST">
		<label for="fruit">Enter a fruit name:</label>
		<input type="text" id="fruit" name="fruit">
		<input type="submit" value="Submit">
	</form>

	<?php
	if(isset($_POST['fruit'])) {
		$fruit = $_POST['fruit'];

		// check if the fruit name is not empty
		if(!empty($fruit)) {
			// add the new fruit to the existing fruits array
			$fruits[] = $fruit;
		}

		// print the fruits array in a table
		if(!empty($fruits)) {
			echo "<table border='1'>";
			echo "<tr><th>Fruit Name</th></tr>";
			foreach ($fruits as $fruit) {
				echo "<tr><td>" . $fruit . "</td></tr>";
			}
			echo "</table>";
		}
	}
	?>
</body>
</html>
