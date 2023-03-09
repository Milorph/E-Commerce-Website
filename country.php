<!DOCTYPE html>
<html>

<head>
	<title>Manufacturing Countries</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Manufacturing Countries</h1>

		<?php
		// Set up database connection variables
		$servername = "cssql.seattleu.edu";
		$username = "bd_rwidjaja1";
		$password = "3300rwidjaja1-Bvkw";
		$dbname = "bd_rwidjaja1";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Set up the SQL query
		$sql = "SELECT * FROM Country";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			echo "<table>";
			echo "<tr><th>Manu CountryCode</th><th>Manu Country</th></tr>";
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row["Manu_CountryCode"] . "</td><td>" . $row["Manu_Country"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p>No results found</p>";
		}

		// Free result set
		mysqli_free_result($result);

		// Close the database connection
		mysqli_close($conn);
		?>
	</div>
</body>

</html>

