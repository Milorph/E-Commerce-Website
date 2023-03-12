<!DOCTYPE html>
<html>

<head>
	<title>Search</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1> Products we have to offer 💔</h1>
		<a href="home.html">Back to Home</a>


		<?php
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$servername = "cssql.seattleu.edu";
		$username = "bd_rwidjaja1";
		$password = "3300rwidjaja1-Bvkw";
		$dbname = "bd_rwidjaja1";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}


		// Prepare the statement to search for products
		$stmt = $conn->prepare("SELECT Product_ID, Product_Name, Product_Price, Product_Category, Product_Quantity, Avg_Star_Rate FROM Product");

		// Check if the statement was prepared successfully
		if (!$stmt) {
			die("Error: " . $conn->error);
		}


		// Execute the statement
		$stmt->execute();

		// Bind the result to variables
		$stmt->bind_result($product_id, $product_name, $price, $quantity ,$category, $star);

		// Fetch all the results and store them in an array
		$products = array();
		while ($stmt->fetch()) {
			$products[] = array(
				'product_id' => $product_id,
				'product_name' => $product_name,
				'price' => $price,
				'quantity' => $quantity,
				'category' => $category,
				'star' => $star
			);
		}

		// Close the statement
		$stmt->close();

		// Apply the filter to the products array if a filter was submitted
		if (isset($_POST['filter'])) {
			$filter = $_POST['filter'];
			switch ($filter) {
					case 'low_price':
					usort($products, function ($a, $b) {
						return $a['price'] - $b['price'];
					});
					break;
					case 'high_price':
					usort($products, function ($a, $b) {
						return $b['price'] - $a['price'];
					});
					break;
					case 'low_star':
						usort($products, function ($a, $b) {
							return $a['star'] - $b['star'];
						});
						break;
					case 'high_star':
						usort($products, function ($a, $b) {
							return $b['star'] - $a['star'];
						});
						break;
					default:
						// No filter selected
						break;
				}
			}
	
			// Display the search results
			if (!empty($products)) {
				echo "<table>";
				echo "<thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Category</th><th>Quantity</th><th>Rating</th></tr></thead>";
				echo "<tbody>";
				foreach ($products as $product) {
					echo "<tr>";
					echo "<td>" . $product['product_id'] . "</td>";
					echo "<td>" . $product['product_name'] . "</td>";
					echo "<td>$" . number_format($product['price'], 2) . "</td>";
					echo "<td>" . $product['quantity'] . "</td>";
					echo "<td>" . $product['category'] . "</td>";
					echo "<td>" . $product['star'] . "⭐</td>";
					echo "<td><a href='add_to_wishlist.php?product_id=" . $product["product_id"] . "' class='wishlist-btn'>❤️</a></td>";
					echo "</tr>";
				}
				
				echo "</tbody>";
				echo "</table>";
			} else {
				echo "<p>No results found for <strong>$search_string</strong></p>";
			}
	
			// Close the database connection
			$conn->close();
			?>
	
			<form action="all_products.php" method="post">
				<br />
				<label for="filter">Sort by:</label>
				<select id="filter" name="filter">
					<option value="">None</option>
					<option value="low_price">Price: Low to High</option>
					<option value="high_price">Price: High to Low</option>
					<option value="low_star">Rating: Low to High</option>
					<option value="high_star">Rating: High to Low</option>
				</select>
				<button type="submit">Apply</button>
			</form>
	
		</div>
</body>

</html>
