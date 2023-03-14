<!DOCTYPE html>
<html>
<head>
	<title>Wishlist</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<style>
	p{
			text-align: center;
	}

	</style>
	<div class="header">
		<h1 class="title">Wishlist</h1>
        <a href="home.html" ><p>Back to Home</p></a>
	</div>
	<?php
	// Start the session
	session_start();

	// Check if the wishlist session variable has been set
	if(isset($_SESSION["wishlist"]) && count($_SESSION["wishlist"]) > 0) {
		// Connect to MySQL database
		$servername = "cssql.seattleu.edu";
		$username = "bd_rwidjaja1";
		$password = "3300rwidjaja1-Bvkw";
		$dbname = "bd_rwidjaja1";
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Loop through each product ID in the wishlist and retrieve its details from the database
		echo "<table class='container'>";
		echo "<tr><th>Product Name</th><th>Product Category</th><th>Product Price</th></tr>";
		foreach ($_SESSION["wishlist"] as $product_id) {
            $sql = "SELECT * FROM Product WHERE Product_ID=" . $product_id;
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Product_Name"] . "</td>";
                    echo "<td>" . $row["Product_Category"] . "</td>";
                    echo "<td>" . $row["Product_Price"] . "</td>";
                    echo "<td><a href='remove_from_wishlist.php?product_id=" . $product_id . "' class='wishlist-btn'>❌</a></td>";
                    echo "</tr>";
                }
            }
        }
        
		echo "</table>";
	} else {
	    echo "<p>Your wishlist is empty.</p>";
	} 
	$conn->close();
	?>

</body>
</html>
