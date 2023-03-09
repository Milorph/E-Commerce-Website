
<!DOCTYPE html>
<html>

<head>
	<title>Query Input</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<h1>QUERY INPUT</h1>
        <?php

    // Replace with your own database credentials
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

    // Get the SQL query from the user input
    $query = $_POST["query"];

    // Execute the query
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result === false) {
        echo "Error executing query: " . $conn->error;
    } else {
        if (mysqli_num_rows($result) > 0) {

            echo "<table>";
            echo "<tr>";
            while ($field = $result->fetch_field()) {
                echo "<th>" . $field->name . "</th>";
            }
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
        } else {
          echo "<td> Your query that was not a select statement is successful </td>";
        }
    }

// Close connection
$conn->close();

?>

	</div>
</body>

</html>


