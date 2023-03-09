<!DOCTYPE html>
<html>

<head>
	<title>Manufacturer Info</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>Manufacturer Info</h1>

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

        // Get the search string from the HTML form
        $search_string = $_POST['Product_Name'];

        // Prepare the statement
        $stmt = $conn->prepare("SELECT Product_ID, Product_Name, Product_Price, Product_Category, Product_Quantity, Avg_Star_Rate FROM Product WHERE Product_Name LIKE CONCAT('%', ?, '%')");

        // Check if the statement was prepared successfully
        if (!$stmt) {
            die("Error: " . $conn->error);
        }

        // Bind the search string to the statement
        $stmt->bind_param("s", $search_string);

        // Execute the statement
        $stmt->execute();


        // Bind the result to variables
        $stmt->bind_result($product_id, $product_name, $price, $quantity ,$category, $star);


        echo "<table>";
        echo "<tr><th>ID</th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Category<th>Star Rate</th></tr>";
        while ($stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $product_id . "</td>";
            echo "<td>" . $product_name . "</td>";
            echo "<td>" . $price . "</td>";
            echo "<td>" . $category . "</td>";
            echo "<td>" . $quantity . "</td>";
            echo "<td>" . $star . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Free result set
        $stmt->close();
        $conn->close();
    ?>

	</div>
</body>

</html>



