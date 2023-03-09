<!DOCTYPE html>
<html>

<head>
	<title>Location</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Location</h1>

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

    // Run SQL query and display results
    $sql = "SELECT * FROM Location";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr><th>Manu ID</th><th>Manu Country Code</th><th>Manu State</th><th>Manu ZIPcode</th><th>Manu Street</th></tr>";
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["Manu_ID"]. "</td><td>" . $row["Manu_CountryCode"]. "</td><td>" . $row["Manu_State"] . "</td><td>" . $row["Manu_ZIPcode"]. "</td><td>" . $row["Manu_Street"] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }

    // Free result set
    mysqli_close($conn);
    ?>

	</div>
</body>

</html>


