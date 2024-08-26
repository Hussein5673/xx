<?php
session_start();

// Example: Assume $games is an array fetched from the database or defined here
$games = [
    1 => ['name' => 'Horizon', 'price' => 50, 'image' => 'cart images/image 6.png'],
    2 => ['name' => 'Game 2', 'price' => 75, 'image' => 'cart images/image 7.png'],
    // Add more games as needed
];

// Retrieve the cart items from the session
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Initialize total cost
$total_cost = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>Cart Page</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Righteous', sans-serif;
            background-image: url('cart images/unsplash_SIhcZYEwMB0.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            line-height: 1.6;
            position: relative;
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(34, 18, 107, 0.8);
            position: relative;
            z-index: 1;
        }

        .header .logo img {
            width: 50px;
            height: auto;
        }

        .header .profile {
            display: flex;
            align-items: center;
        }

        .header .profile img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Main Content Styles */
        .main-content {
            padding: 20px;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh; /* Adjust this to position the content vertically */
        }

        .cart-title {
            font-size: 4rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .product {
            background-color: rgba(34, 18, 107, 0.8);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .product h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .price {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .remove-btn {
            background-color: #0060D1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
        }

        .checkout {
            margin-top: 40px;
            text-align: center;
        }

        .total {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .checkout-btn {
            background-color: white;
            color: #0060D1;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Navigation Styles */
        .navigation {
            display: flex;
            justify-content: space-around;
            background-color: rgba(34, 18, 107, 0.8);
            padding: 20px;
            margin-top: 40px;
            position: relative;
            z-index: 1;
        }

        .nav-item {
            font-size: 1.2rem;
        }

        .nav-item a {
            color: white;
            text-decoration: none;
        }

        .nav-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="cart images/store-icon 1.png" alt="Store Logo">
        </div>
        <div class="profile">
            <img src="picturespfp/Customer.png" alt="Profile Picture">
        </div>
    </header>

    <main class="main-content">
        <h1 class="cart-title">Cart</h1>
        
        <section class="products">
            <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item_id): ?>
                    <?php if (isset($games[$item_id])): ?>
                        <?php $total_cost += $games[$item_id]['price']; ?>
                        <div class="product">
                            <img src="<?php echo $games[$item_id]['image']; ?>" alt="<?php echo htmlspecialchars($games[$item_id]['name']); ?>">
                            <h2><?php echo htmlspecialchars($games[$item_id]['name']); ?></h2>
                            <div class="price"><?php echo htmlspecialchars($games[$item_id]['price']); ?> credits</div>
                            <!-- Implement remove button functionality later -->
                            <button class="remove-btn">Remove</button>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </section>
        
        <section class="checkout">
            <?php if (!empty($cart_items)): ?>
                <div class="total">Total: <?php echo $total_cost; ?> credits</div>
                <form action="checkout.php" method="POST">
                    <input type="hidden" name="total_cost" value="<?php echo $total_cost; ?>">
                    <button type="submit" class="checkout-btn">CHECKOUT</button>
                </form>
            <?php else: ?>
                <p>No items to checkout.</p>
            <?php endif; ?>
        </section>
    </main>

    <nav class="navigation">
        <div class="nav-item"><a href="index.php">Home</a></div>
        <div class="nav-item"><a href="Catalog_page.php">Catalogue</a></div>
        <div class="nav-item"><a href="Sign_in_html.php">Signin</a></div>
        <div class="nav-item"><a href="SignUp.html">Signup</a></div>
        <div class="nav-item"><a href="friendspage.html">Friends</a></div>
        <div class="nav-item"><a href="subscription.html">Subscriptions</a></div>
    </nav>
</body>
</html>
