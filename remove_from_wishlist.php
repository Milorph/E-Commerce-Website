<?php
    session_start();

    if(isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        if (($key = array_search($product_id, $_SESSION["wishlist"])) !== false) {
            unset($_SESSION["wishlist"][$key]);
        }
    }

    header("Location: wishlist.php");
    exit();
?>
