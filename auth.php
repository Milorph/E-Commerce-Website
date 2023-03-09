<?php
session_start();

if (!isset($_SESSION['email'])) {
	header('Location: login.html');
	exit();
}

if (isset($_POST['logout'])) {
	session_destroy();
	header('Location: login.html');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Main Website</title>
</head>
<body>
	<?php if (isset($_SESSION['email'])) { ?>
		<div style="position: absolute; top: 0; right: 0;">
			<form method="post">
				<span><a href="update_profile.php"><?php echo $_SESSION['email']; ?></a></span>
				<input type="submit" name="logout" value="Logout">
			</form>
		</div>
		<?php include("index.php"); ?>
	<?php } ?>
</body>
</html>


