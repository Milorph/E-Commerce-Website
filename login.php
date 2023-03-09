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
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email and password match
$sql = "SELECT * FROM User WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "Login successful!";

	// Start new session
	session_start();
	$_SESSION['email'] = $email;
	header('Location: auth.php');
	exit();
} else {
	echo '<script>alert("Incorrect email or password!");</script>';
	echo '<script>window.location.href = "login.html";</script>';

}


mysqli_close($conn);
?>
