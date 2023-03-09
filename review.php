<!DOCTYPE html>
<html>

<head>
	<title>Review</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Reviews</h1>

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


        // Query database
        $sql = "SELECT * FROM Review";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row as a table
            echo "<table><tr><th>Review ID</th><th>Stars Rate</th><th>Product ID</th><th>User ID</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["Review_ID"]. "</td><td>" . $row["Stars_Rate"]. "</td><td>" . $row["Product_ID"] . "</td><td>" . $row["User_ID"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        // Close connection
        mysqli_close($conn);

        ?>

	</div>
</body>

</html>

