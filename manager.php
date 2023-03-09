<!DOCTYPE html>
<html>

<head>
	<title>Manager</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Manager</h1>

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

      $sql = "SELECT * FROM Manager";
      $result = mysqli_query($conn, $sql);


      if (mysqli_num_rows($result) > 0) {
          // output data of each row
        echo "<table><tr><th>Manu_Manager_ID</th><th>Manu_Manager_FirstName</th><th>Manu_Manager_LastName</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>".$row["Manu_Manager_ID"]."</td><td>".$row["Manu_Manager_FirstName"]."</td><td>".$row["Manu_Manager_LastName"]."</td></tr>";
        }
        echo "</table>";
      } else {
          echo "0 results";
      }

      // Free result set
      mysqli_free_result($result);

      mysqli_close($conn);

      echo "</body></html>";
    ?>

	</div>
</body>

</html>




