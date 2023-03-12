<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <style>
     
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        h1, h2, h3 {
            margin-top: 0;
        }
        ul {
            list-style: none;
            padding: 0;
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
        }

    </style>
</head>
<body>
    <h1>Shopping Cart</h1>
    <h2> <a href = "home.html">Back to home page.</a></h2>
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
            echo "<a class='cart-item-remove' href='remove_from_cart.php?id=" . $product_id . "'>Remove</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
    ?>

</body>
</html>
