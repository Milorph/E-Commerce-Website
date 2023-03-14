<?php
session_start();
$products = array(
    1 => array(
        'name' => 'iPhone 13 Pro Max',
        'price' => 1399.99
    ),
    2 => array(
        'name' => 'Thermaltake - Arctic i4790 Gaming Desktop',
        'price' => 4599.99
    ),
    3 => array(
        'name' => 'Oculus Quest 2',
        'price' => 399.99
    ),
    4 => array(
        'name' => 'Sony PlayStation 5',
        'price' => 499.99
    ),
    5 => array(
        'name' => 'Nintendo Switch OLED Model',
        'price' => 349.99
    ),
    6 => array(
        'name' => 'Sony WH-1000XM4',
        'price' => 249.99
    )
);

// Check if the product id is set
if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    echo "Product ID: " . $product_id;

    // Check if the product exists in the products array
    if(array_key_exists($product_id, $products)) {
        // Get the product details
        $product_name = $products[$product_id]['name'];
        $product_price = $products[$product_id]['price'];

        // Check if the cart is already set, if not create an empty array
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Check if the product is already in the cart, if so increase the quantity
        if(array_key_exists($product_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            // Add the product to the cart
            $_SESSION['cart'][$product_id] = array(
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => 1 
            );
        }
        
        var_dump($_SESSION['cart']);
    }
}

// Redirect to the cart page
header('Location: cart.php');
exit();
?>
