<!DOCTYPE html>
<html>

<head>
	<title>Users</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Users</h1>
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


    // Execute SQL query and output results in a table
    $sql = "SELECT * FROM User";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo '<table>';
      echo '<tr><th>User ID</th><th>Profile Name</th><th>Email</th><th>Password</th><th>Phone Number</th><th>Bank Card Number</th><th>Transaction ID</th></tr>';
      while($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $row["User_ID"]. '</td><td>' . $row["Profile_Name"]. '</td><td>' . $row["email"] . '</td><td>' . $row["password"]. '</td><td>' . $row["phone"]. '</td><td>' . $row["BankCard_Number"] . '</td><td>' . $row["Trans_ID"] . '</td></tr>';
      }
      echo '</table>';
    } else {
      echo "0 results";
    }

    // Free result set
    mysqli_close($conn);

    ?>

	</div>
</body>

</html>

