<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAU-MARKET - Farm Fresh Marketplace</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #4e8c3f; /* Earthy green */
            --secondary: #f8b400; /* Golden yellow */
            --dark: #2d3436; /* Dark slate */
            --light: #f9f9f9; /* Off-white */
            --accent: #e74c3c; /* Barn red */
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }
        
        /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo img {
            height: 50px;
        }
        
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        nav a {
            color: var(--dark);
            font-weight: 600;
            padding: 0.5rem 0;
            position: relative;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: var(--primary);
        }
        
        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s;
        }
        
        nav a:hover::after {
            width: 100%;
        }
        
        .login-btn {
            background-color: var(--primary);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .login-btn:hover {
            background-color: #3a6b2f;
            transform: translateY(-2px);
        }
        
        /* Hero Section */
        .hero {
            height: 80vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                        url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 2rem;
        }
        
        .hero h2 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            background-color: var(--secondary);
            color: var(--dark);
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Main Content */
        main {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 2rem;
        }
        
        section {
            margin-bottom: 4rem;
        }
        
        h2 {
            color: var(--primary);
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
        }
        
        h2::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background-color: var(--secondary);
            margin: 1rem auto 0;
        }
        
        /* Products Section */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .product-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
        }
        
        .product-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .product-content {
            padding: 1.5rem;
        }
        
        .product-card h4 {
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .product-card .price {
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        /* How It Works */
        .steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .step {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .step-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        .step h4 {
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
        }
        
        .footer-column h3 {
            color: var(--secondary);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column li {
            margin-bottom: 0.5rem;
        }
        
        .footer-column a {
            color: #ddd;
            transition: color 0.3s;
        }
        
        .footer-column a:hover {
            color: var(--secondary);
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-links a {
            color: white;
            font-size: 1.2rem;
        }
        
        .copyright {
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
            
            .steps {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?php echo BASE_URL; ?>assets/images/logo.png" class="logo-icon" alt="logo icon" style="width: 30%; height: auto;">
            <!--<span class="logo-text">PAU-MARKET</span>-->
        </div>
        
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>about">About</a></li>
                <li><a href="<?php echo BASE_URL; ?>products">Products</a></li>
                <li><a href="<?php echo BASE_URL; ?>contact">Contact</a></li>
            </ul>
        </nav>
        
        <a href="<?php echo BASE_URL; ?>auth/login" class="login-btn">Admin Login</a>
    </header>
    
    <section class="hero">
        <h2>Fresh From Our Farm to Your Table</h2>
        <p>Connecting local farmers with buyers for the freshest agricultural products at fair prices</p>
        <a href="<?php echo BASE_URL; ?>products" class="btn">Shop Fresh Produce</a>
    </section>
    
    <main>
        <section>
            <h2>About PAU-MARKET</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem;">
                PAU-MARKET is revolutionizing agricultural commerce by creating direct connections between producers and consumers. 
                Our digital marketplace promotes sustainable farming practices while ensuring fair prices for both farmers and buyers.
            </p>
        </section>
        
        <section class="products">
            <h2>Featured Products</h2>
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-img" style="background-image: url('https://images.unsplash.com/photo-1518977676601-b53f82aba655?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="product-content">
                        <h4>Organic Tomatoes</h4>
                        <p class="price">$2.99/kg</p>
                        <p>Fresh from local farms</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img" style="background-image: url('https://images.unsplash.com/photo-1547496502-affa22d38842?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="product-content">
                        <h4>Premium Rice</h4>
                        <p class="price">$1.49/kg</p>
                        <p>High-quality grains</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img" style="background-image: url('https://images.unsplash.com/photo-1587486913049-53fc88980cfc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="product-content">
                        <h4>Free-Range Eggs</h4>
                        <p class="price">$3.99/dozen</p>
                        <p>Farm fresh eggs</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img" style="background-image: url('https://images.unsplash.com/photo-1587049352851-8d4e89133924?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="product-content">
                        <h4>Organic Honey</h4>
                        <p class="price">$8.99/jar</p>
                        <p>Pure, natural honey</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section>
            <h2>How It Works</h2>
            <div class="steps">
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h4>1. Register</h4>
                    <p>Create your free account as a buyer or seller in minutes</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>2. Browse or List</h4>
                    <p>Find fresh products or list your agricultural goods</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>3. Transact</h4>
                    <p>Complete secure transactions through our platform</p>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>PAU-MARKET</h3>
                <p>Your premier agricultural marketplace connecting farmers directly with buyers.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL; ?>about">About Us</a></li>
                    <li><a href="<?php echo BASE_URL; ?>products">Products</a></li>
                    <li><a href="<?php echo BASE_URL; ?>contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> 123 Farm Road, Agricultural City</li>
                    <li><i class="fas fa-phone"></i> (123) 456-7890</li>
                    <li><i class="fas fa-envelope"></i> info@paumarket.com</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> PAU-MARKET. All rights reserved.</p>
        </div>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple animation for product cards
            const productCards = document.querySelectorAll('.product-card');
            
            productCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = `all 0.5s ease ${index * 0.1}s`;
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            });
        });
    </script>
</body>
</html>