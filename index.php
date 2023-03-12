<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Online Shopping</title>
	<style>
		
		/* Style the container */
		.container {
		max-width: 800px;
		margin: 0 auto;
		padding: 20px;
		background-color: #f8f8f8;
		border-radius: 5px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		/* Style the headings */
		h1, h2 {
		margin-top: 0;
		margin-bottom: 10px;
		font-family: 'Helvetica Neue', sans-serif;
		color: #333;
		}

		h1 {
		font-size: 36px;
		}

		h2 {
		font-size: 24px;
		}

		/* Style the links */
		a {
		text-decoration: none;
		color: #333;
		}

		a:hover {
		color: red;
		}

		/* Style the lists */
		ul, ol {
		margin-top: 0;
		margin-bottom: 10px;
		padding-left: 0;
		}

		li {
		margin-bottom: 5px;
		}

		/* Style the form */
		form {
		margin-top: 10px;
		margin-bottom: 20px;
		}

		label {
		display: block;
		margin-bottom: 5px;
		font-family: 'Helvetica Neue', sans-serif;
		font-size: 16px;
		color: #333;
		}

		input[type="text"], textarea {
		display: block;
		width: 100%;
		padding: 10px;
		margin-bottom: 10px;
		border: 1px solid #ccc;
		border-radius: 3px;
		font-family: 'Helvetica Neue', sans-serif;
		font-size: 16px;
		color: #333;
		}

		input[type="submit"], input[type="reset"] {
		display: inline-block;
		padding: 10px 20px;
		border: none;
		border-radius: 3px;
		font-family: 'Helvetica Neue', sans-serif;
		font-size: 16px;
		font-weight: bold;
		color: #fff;
		background-color: #333;
		cursor: pointer;
		}

		input[type="submit"]:hover, input[type="reset"]:hover {
		background-color: #000;
		}

		/* Style the table */
		table {
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 20px;
		}

		thead {
		background-color: #333;
		color: #fff;
		}

		th, td {
		padding: 10px;
		text-align: left;
		border: 1px solid #ccc;
		}

		th {
		font-weight: bold;
		}
		h2 {
		text-align: center;
		}
		p {
		text-align: center;
		}
		h3 {
		text-align: center;
		}
		ul {
		list-style-position: inside;
		text-align: center;
		}

		ul li {
		text-align: left;
		margin: 10px 0;
		}


		



	</style>
</head>
<body>
	
	<div class="container">
		<h1>E-Commerce Website</h1>
    <hr>
    <p><b>Team Members: Robert, Alex, Carmel, Jessie</b></p>
		<hr>
		<h2>Relations:</h2>
		<ul>

      <li><a href="manager.php" >Manager</a> </li>
      <li><a href="manufacturer.php">Manufacturer</a></li>
      <li><a href="country.php">Country</a></li>
      <li><a href="location.php">Location</a></li>
      <li><a href="product.php">Product</a></li>
      <li><a href="courrier.php">Courrier</a></li>
      <li><a href="user.php">User</a></li>
      <li><a href="transaction.php">Transaction</a></li>
      <li><a href="item_Detail.php">Item Detail</a></li>
      <li><a href="review.php">Review</a></li>
    </ul>

    <hr>

    <h2>Queries</h2>
    <ol>
      <ol><a href="query1.php"><h3>Query 1</h3></a> <p>This query joins two tables - Product and Manufacturer - on their common column Manu_ID. The result of the join is a table that includes the Product_ID, Product_Name, Product_Price and Manu_Name columns.</p></li>
      <ol><a href="query2.php"><h3>Query 2</h3></a> <p>This query calculates the total price of all transactions in the "Transaction" table and returns it as a single value in the result table.</p></li>
      <ol><a href="query3.php"><h3>Query 3</h3></a> <p>This SQL query retrieves the last 5 products added to the database, and then sorts them in ascending order based on their prices.</p></li>
      <ol><a href="query4.php"><h3>Query 4</h3></a> <p>This query retrieves the manufacturer IDs, names, and the total number of products they have produced, but only for manufacturers who have produced more than two products.</p></li>
      <ol><a href="query5.php"><h3>Query 5</h3></a> <p>This query would return all rows from the Review table and matching rows from the Product table. If there are products with no reviews, those rows would still be returned with NULL values in the columns from the Review table.</p></li>
    </ol>

    <hr>

    <h2>Ad-hoc Query</h2>
    <p>Enter any arbitrary SQL query below:</p>
    <form method="POST" action="inputQuery.php">
      <label for="query">SQL Query:</label><br>
      <textarea name="query" id="query" rows="5" cols="50"></textarea><br><br>
      <input type="submit" value="Submit">
      <input type="reset" value="Clear">
    </form>

      <hr>
      <h2>Search Products:</h2>
      <form method="POST" action = "search.php">
        <label for="product_name">Product Name:</label>
          <input type="text" name="Product_Name" id="product_name">
          <input type="submit" value="Search">
          <input type="reset" value="Clear">

      </form>
	  <style>
		table {
		border-collapse: collapse;
		width: 100%;
		}

		th, td {
		text-align: left;
		padding: 8px;
		}

		th {
		background-color: #ddd;
		}

		tr:nth-child(even) {
		background-color: #f2f2f2;
		}
	</style>
		<h2> Latest Products: </h2>

<form method="post" action="">
	<select name="sort">
		<option value="asc">Low to High</option>
		<option value="desc">High to Low</option>
	</select>
	<input type="submit" name="submit" value="Sort">
</form>

<?php
	// Connect to MySQL database
	$servername = "cssql.seattleu.edu";
	$username = "bd_rwidjaja1";
	$password = "3300rwidjaja1-Bvkw";
	$dbname = "bd_rwidjaja1";
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check if form has been submitted and sort by user-selected option
	if (isset($_POST['submit'])) {
		$sort = $_POST['sort'];
		$sql = "SELECT * FROM (
			SELECT * FROM Product ORDER BY Product_ID DESC LIMIT 5
		) AS subquery ORDER BY Product_Price $sort
		";
	} else {
		// Query database to retrieve latest 5 products by ID
		$sql = "SELECT * FROM Product ORDER BY Product_ID DESC LIMIT 5";
	}

	$result = $conn->query($sql);

	// Output retrieved data in an HTML table
	if ($result->num_rows > 0) {
		echo "<table>";
		echo "<tr><th>Product Name</th><th>Product Category</th><th>Product Price</th><th>Product Quantity</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["Product_Name"] . "</td>";
			echo "<td>" . $row["Product_Category"] . "</td>";
			echo "<td>" . $row["Product_Price"] . "</td>";
			echo "<td>" . $row["Product_Quantity"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "No products found.";
	}

	// Close database connection
	$conn->close();
?>

      </div>
	  
      
  </body>
</html>

