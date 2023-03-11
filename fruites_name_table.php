<!DOCTYPE html>
<html>
<head>
	<title>Fruit Names</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Index</th>
			<th>Fruit Name</th>
		</tr>
		<?php
		$fruits = array("Apple", "Banana", "Orange", "Mango", "Pineapple");
		//$fruits = ["Apple", "Banana", "Orange", "Mango", "Pineapple"]; you can also write array with this method.
		// loop through the array and print each fruit name in a table row with an index number
		foreach ($fruits as $index => $fruit) {
			echo "<tr><td>" . ($index+1) . "</td><td>" . $fruit . "</td></tr>";
		}
		?>
	</table>
</body>
</html>
