<!DOCTYPE html>
<html>

<head>
	<title>Product</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Product</h1>
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

        $sql = "SELECT * FROM Product";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>Product ID</th><th>Product Name</th><th>Product Price</th><th>Product Category</th><th>Product Quantity</th><th>Manu_ID</th><th>Avg Star Rate</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["Product_ID"]. "</td><td>" . $row["Product_Name"]. "</td><td>" . $row["Product_Price"] . "</td><td>" . $row["Product_Category"]. "</td><td>" . $row["Product_Quantity"]. "</td><td>" . $row["Manu_ID"] . "</td><td>" . $row["Avg_Star_Rate"] ."</td></tr>";
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

