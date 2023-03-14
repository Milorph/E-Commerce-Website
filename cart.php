<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <style>
     
     body {
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}
.page-title {
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    margin-top: 10px;
    text-align: center;
}

.back-home {
    position: fixed;
    top: 0;
    left: 10px;
    margin-top: 10px;
    text-align: left;
}



h1, h2,h4, h3 {
    margin-top: 0;
    text-align: center;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

li {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 5px rgba(0,0,0,0.2);
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%; 
}


.cart-item-details {
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-right: 20px;
}

.cart-item-name {
    font-weight: bold;
    margin-bottom: 5px;
}

.cart-item-price {
    font-style: italic;
    margin-bottom: 5px;
}

.cart-item-quantity {
    font-size: 0.8em;
    color: #777;
}

.cart-item-remove {
    color: red;
    text-decoration: none;
}


    </style>
</head>
<body>
    <h1 class="page-title">Shopping Cart</h1>
    <h4 class="back-home"><a href="home.html">Continue Shopping</a></h4>
    <?php
    session_start();
    // Check if cart is empty
    if(empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty.</p>";
    } else {
        // Display cart items
        echo "<h2>Your Cart</h2>";
        echo "<ul>";
        foreach($_SESSION['cart'] as $product_id => $item) {
            echo "<li>";
            echo "<div class='cart-item-details'>";
            echo "<span class='cart-item-name'>" . $item['name'] . "</span>";
            echo "<span class='cart-item-price'>$" . $item['price'] . "</span>";
            echo "<span class='cart-item-quantity'>Quantity: " . $item['quantity'] . "</span>";
            echo "</div>";
            echo "<a class='cart-item-remove' href='remove_from_cart.php?id=" . $product_id . "'>❌</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
    ?>

</body>
</html>
