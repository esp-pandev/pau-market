<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to PAU-MARKET</h1>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>">About Us</a></li>
                <li><a href="<?php echo BASE_URL; ?>">Products</a></li>
                <li><a href="<?php echo BASE_URL; ?>">Contact Us</a></li>
                <li><a href="<?php echo BASE_URL; ?>auth/login">Login</a></li><!--
                <li><a href="<?php echo BASE_URL; ?>auth/register">Register</a></li> -->
            </ul>
        </nav>
    </header>
    
    <main>
        <section>
            <h2>About PAU-MARKET</h2>
            <p>Your premier online marketplace for agricultural products.</p>
        </section>
        
        <!-- Example of how to display products if you implement them -->
        <?php if (isset($products) && !empty($products)): ?>
        <section class="products">
            <h3>Featured Products</h3>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <h4><?php echo htmlspecialchars($product['name']); ?></h4>
                    <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> PAU-MARKET. All rights reserved.</p>
    </footer>
    
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>