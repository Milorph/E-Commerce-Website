<?php
// Connect to database
$servername = "cssql.seattleu.edu";
$username = "bd_rwidjaja1";
$password = "3300rwidjaja1-Bvkw";
$dbname = "bd_rwidjaja1";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email is already in use
$sql = "SELECT * FROM User WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo '<script>alert("Email is already in use!");</script>';
	echo '<script>window.location.href = "signup.html";</script>';
} else {
	// Insert new user into database
	$sql = "INSERT INTO User (email, password) VALUES ('$email', '$password')";

	if (mysqli_query($conn, $sql)) {
		echo "Signup successful!";

		// Start new session
		session_start();
		$_SESSION['email'] = $email;
		header('Location: auth.php');
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		echo "<a href='signup.html'>Go back to sign up</a>";
	}
}

mysqli_close($conn);
?>

