<?php
session_start();

// Check if the game ID is sent via POST
if (isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the game to the cart
    $_SESSION['cart'][] = $game_id;

    // Redirect to the cart page
    header("Location: cart_page.html");
    exit();
} else {
    // If no game ID is provided, redirect back to the catalog or show an error
    header("Location: catalog_page.php");
    exit();
}
?>