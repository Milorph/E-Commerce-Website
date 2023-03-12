<?php
// Start the session
session_start();

// Get the product ID from the URL parameter
$product_id = $_GET["product_id"];

// Check if the wishlist session variable has been set
if(!isset($_SESSION["wishlist"])) {
	// If not, create it as an empty array
	$_SESSION["wishlist"] = array();
}

// Add the product ID to the wishlist session variable if it isn't already in the array
if(!in_array($product_id, $_SESSION["wishlist"])) {
	array_push($_SESSION["wishlist"], $product_id);
}

// Redirect back to the product page
header("Location: wishlist.php?id=".$product_id);
exit();
?>
