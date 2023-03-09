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


$sql = "SELECT Manu_Name, 
        (SELECT COUNT(DISTINCT Product_ID) 
        FROM Product 
        WHERE Manu_ID = Manufacturer.Manu_ID) AS Total_Products
        FROM Manufacturer;

        ";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manufacturer</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
		<h1>Manufacturer</h1>

		<table>
			<tr>
				<th>Manu_Name</th>
				<th>Total Products</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?php echo $row["Manu_Name"]; ?></td>
				<td><?php echo $row["Total_Products"]; ?></td>
			</tr>
			<?php } ?>
      <?php 
    // Free result set
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
		</table>
	</div>
</body>
</html>
