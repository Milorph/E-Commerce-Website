<!DOCTYPE html>
<html>

<head>
	<title>Manufacturer Info</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Manufacturer Info</h1>
    <a href="home.html">Back to Home</a>
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

    $sql = "SELECT * FROM Manufacturer";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row in a table format
      echo "<table><tr><th>Manu ID</th><th>Manu Name</th><th>Manu Type</th><th>Manu Manager ID</th></tr>";
     
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["Manu_ID"]. "</td><td>" . $row["Manu_Name"]. "</td><td>" . $row["Manu_Type"] . "</td><td>" . $row["Manu_Manager_ID"] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    // Free result set
    mysqli_close($conn);
    echo "</body></html>";
    ?>

	</div>
</body>

</html>

