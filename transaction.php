<!DOCTYPE html>
<html>

<head>
	<title>Transaction</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Transaction</h1>

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


        $sql = "SELECT * FROM Transaction";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row in a table
            echo '<table>';
            echo '<tr><th>Transaction ID</th><th>Address Country</th><th>Address State</th><th>Address ZIPcode</th><th>Address Street</th><th>Address APT</th><th>Courrier Code</th></tr>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td>' . $row["Trans_ID"] . '</td><td>' . $row["Address_Country"] . '</td><td>' . $row["Address_State"] . '</td><td>' . $row["Address_ZipCode"] . '</td><td>' . $row["Address_Street"] . '</td><td>' . $row["Address_APT"] . '</td><td>' . $row["Courrier_Code"] . '</td><td>' ;
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

