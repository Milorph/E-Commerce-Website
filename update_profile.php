<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			color: #333;
			padding: 20px;
		}
		h1 {
			font-size: 36px;
			text-align: center;
			margin-bottom: 20px;
		}
		form {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,.1);
			padding: 20px;
			max-width: 500px;
			margin: 0 auto;
		}
		label {
			display: block;
			font-size: 18px;
			margin-bottom: 10px;
		}
		input[type=text], input[type=email], input[type=password], input[type=tel] {
			border-radius: 5px;
			border: none;
			background-color: #f7f7f7;
			padding: 10px;
			width: 95%;
			margin-bottom: 20px;
			font-size: 16px;
			color: #555;
		}
		input[type=submit] {
			background-color: #4CAF50;
			border: none;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px;
			border-radius: 5px;
			transition: background-color 0.2s ease;
		}
		input[type=submit]:hover{
			background-color: #3e8e41;
		}
		button {
			background-color: #4CAF50;
			border: none;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px;
			border-radius: 5px;
			transition: background-color 0.2s ease;
		}
		button:hover{
			background-color: #3e8e41;
		}
		.error {
			color: #f00;
			font-size: 16px;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<h1>Update Profile</h1>
	<form method="post">
		<label for="name">Name:</label>
		<input type="text" name="name" required>

		<label for="email">Email:</label>
		<input type="email" name="email" required>

		<label for="password">Password:</label>
		<input type="password" name="password" required>

		<label for="phone">Phone Number:</label>
		<input type="tel" name="phone" required>

		<label for="bank">Bank Number:</label>
		<input type="text" name="bank" required>

		<input type="submit" name="update" value="Update">
		<button onclick="window.location.href='auth.php'">Back</button>
		<?php
		session_start();
		require_once 'config.php';

		if (!isset($_SESSION['email'])) {
			header('Location: login.html');
			exit();
		}

		if (isset($_POST['update'])) {
			$servername = "cssql.seattleu.edu";
			$username = "bd_rwidjaja1";
			$password = "3300rwidjaja1-Bvkw";
			$dbname = "bd_rwidjaja1";
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$phone = $_POST['phone'];
			$bank = $_POST['bank'];

			$sql = "UPDATE User SET Profile_name = '$name', email = '$email', password = '$password', phone = '$phone', bankCard_Number = '$bank' WHERE email = '{$_SESSION['email']}'";
			if ($conn->query($sql) === TRUE) {
				$_SESSION['email'] = $email; 
				header('Location: auth.php');
				exit();
			} else {
				echo "Error updating profile: " . $conn->error;
			}
		}
		?>
		</form>
	</body>
</html> 

