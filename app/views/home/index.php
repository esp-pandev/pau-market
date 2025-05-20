<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAU-MARKET - Your Agricultural Marketplace</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/home.css">
</head>
<body>
    <header>
        <h1>Welcome to PAU-MARKET</h1>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>about">About Us</a></li>
                <li><a href="<?php echo BASE_URL; ?>products">Products</a></li>
                <li><a href="<?php echo BASE_URL; ?>contact">Contact Us</a></li>
                <li><a href="<?php echo BASE_URL; ?>auth/login">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero">
            <h2>Your Premier Agricultural Marketplace</h2>
            <p>Connecting farmers with buyers for quality agricultural products at competitive prices</p>
            <a href="<?php echo BASE_URL; ?>products" class="btn">Browse Products</a>
        </section>
        
        <section>
            <h2>About PAU-MARKET</h2>
            <p>PAU-MARKET is an innovative online platform designed to revolutionize agricultural commerce by connecting producers directly with consumers and businesses. Our mission is to create a transparent, efficient marketplace that benefits all stakeholders in the agricultural value chain.</p>
            <p>With a focus on quality, reliability, and fair pricing, we're building a community that supports sustainable agriculture and local economies.</p>
        </section>
        
        <!-- Featured Products Section -->
        <section class="products">
            <h3>Featured Products</h3>
            <div class="product-grid">
                <div class="product-card">
                    <h4>Organic Tomatoes</h4>
                    <p>Price: $2.99/kg</p>
                    <p>Fresh from local farms</p>
                </div>
                <div class="product-card">
                    <h4>Premium Rice</h4>
                    <p>Price: $1.49/kg</p>
                    <p>High-quality grains</p>
                </div>
                <div class="product-card">
                    <h4>Free-Range Eggs</h4>
                    <p>Price: $3.99/dozen</p>
                    <p>Farm fresh eggs</p>
                </div>
                <div class="product-card">
                    <h4>Organic Honey</h4>
                    <p>Price: $8.99/jar</p>
                    <p>Pure, natural honey</p>
                </div>
            </div>
        </section>
        
        <!-- How It Works Section -->
        <section>
            <h3>How It Works</h3>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-top: 2rem;">
                <div>
                    <h4>1. Register</h4>
                    <p>Create your free account as a buyer or seller</p>
                </div>
                <div>
                    <h4>2. Browse or List</h4>
                    <p>Find products or list your own agricultural goods</p>
                </div>
                <div>
                    <h4>3. Transact</h4>
                    <p>Complete secure transactions through our platform</p>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> PAU-MARKET. All rights reserved.</p>
        <p style="margin-top: 1rem;">Contact: info@paumarket.com | Phone: (123) 456-7890</p>
    </footer>
    
    <script>
        // Simple JavaScript for interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add any interactive functionality here
            console.log('PAU-MARKET website loaded');
        });
    </script>
</body>
</html>