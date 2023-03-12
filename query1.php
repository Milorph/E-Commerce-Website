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

$sql = "SELECT Product.Product_ID, Product.Product_Name, Product.Product_Price, Manufacturer.Manu_Name
    FROM Product
    INNER JOIN Manufacturer ON Product.Manu_ID = Manufacturer.Manu_ID;";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Product List</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Product List</h1>
		<a href="home.html">Back to Home</a>
		<table>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th class="text-right">Product Price</th>
				<th>Manufacturer Name</th>
			</tr>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?php echo $row["Product_ID"]; ?></td>
					<td><?php echo $row["Product_Name"]; ?></td>
					<td class="text-right">$<?php echo number_format($row["Product_Price"], 2); ?></td>
					<td class="text-right"><?php echo $row["Manu_Name"]; ?></td>
				</tr>
			<?php } ?>
		</
	</div>
	</table>

	<?php
	// Close connection
	mysqli_close($conn);
	?>
	</body>
</html>
