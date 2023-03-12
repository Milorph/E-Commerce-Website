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


$sql = "SELECT Product.Product_ID, Product.Product_Name, Review.Review_ID, Review.Stars_Rate
    FROM Review
    RIGHT OUTER JOIN Product ON Product.Product_ID = Review.Product_ID;";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Review</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
		<h1>Product and Review</h1>
		<a href="home.html">Back to Home</a>
		<table>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Review ID</th>
        <th>Avg Rating</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?php echo $row["Product_ID"]; ?></td>
				<td><?php echo $row["Product_Name"]; ?></td>
				<td><?php echo $row["Review_ID"]; ?></td>
        <td><?php echo $row["Stars_Rate"]; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>

<?php 
// Free result set
mysqli_free_result($result);
mysqli_close($conn);
?>