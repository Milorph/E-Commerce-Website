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

$sql = "SELECT SUM(Trans_Total_Price) AS Total_Price FROM Transaction;";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transaction Total Price</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container">
		<h1>Transaction Total Price</h1>
		<?php while($row = mysqli_fetch_assoc($result)) { ?>
			<p>Total Price: $<?php echo number_format($row["Total_Price"], 2); ?></p>
		<?php } ?>
	</div>
	<?php
	// Close connection
	mysqli_free_result($result);
	mysqli_close($conn);
	?>
</body>
</html>


