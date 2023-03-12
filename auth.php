<!DOCTYPE html>
<html>
<head>
	<title>Main Website</title>
	<style>
		/* Fixed position for email and logout */
		.user {
			position: fixed;
			top: 0;
			left: 0;
			padding: 10px;
			background-color: #ddd;
			border-radius: 5px;
		}

		.logout {
			position: fixed;
			top: 0;
			right: 0;
			margin-top: 10px;
			margin-right: 20px;
			padding: 10px;
			background-color: #333;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		/* Style for the wishlist button */
		button.wishlist-button {
			position: fixed;
			top: 0;
			right: 0;
			margin-top: 10px;
			margin-right: 110px;
			padding: 10px;
			background-color: #333;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		button.home-button {
			position: fixed;
			top: 0;
			right: 0;
			margin-top: 10px;
			margin-right: 210px;
			padding: 10px;
			background-color: #333;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		button.wishlist-button:hover {
			background-color: #000;
		}
	</style>
</head>
<body>
	<?php 
		session_start();

		if (!isset($_SESSION['email'])) {
			header('Location: login.html');
			exit();
		}

		if (isset($_POST['logout'])) {
			session_destroy();
			header('Location: home.html');
			exit();
		}
	?>

	<?php if (isset($_SESSION['email'])) { ?>
		<div class="user">
			<span><a href="update_profile.php"><?php echo $_SESSION['email']; ?></a></span>
		</div>
		<form method="post">
			<button type="submit" name="logout" class="logout">Logout</button>
		</form>
		<form method="post">
			<button type="submit" formaction="wishlist.php" class="wishlist-button">Wishlist</button>
		</form>
		<form method="post">
			<button type="submit" formaction="home.html" class="home-button">Home</button>
		</form>
		<?php include("index.php"); ?>
	<?php } ?>
</body>
</html>
