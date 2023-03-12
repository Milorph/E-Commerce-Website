<?php
session_start();

// get the product ID to remove from cart
$product_id = $_GET['id'];

// remove the product from cart
if(isset($_SESSION['cart'][$product_id])) {
    unset($_SESSION['cart'][$product_id]);
}

// redirect to cart page
header('Location: cart.php');
