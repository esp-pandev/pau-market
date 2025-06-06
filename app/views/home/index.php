
<?php
// views/home/index.php
$pageTitle = 'PAU-MARKET - Farm Fresh Marketplace';
$currentPage = 'home';
require VIEWS . '/home/layout/header.php';
?>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Fresh From Our Farm to Your Table</h1>
                <p>Discover the freshest local produce, artisan goods, and community spirit at PAU Farmers Market. Supporting local farmers.</p>
                <!--<div class="hero-btns">
                    <a href="#" class="btn">Shop Now</a>
                    <a href="#" class="btn btn-outline">Meet Our Farmers</a>
                </div>-->
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h3>Our Story</h3>
                    <p>PAU Farmers Market is proudly hosted by Pacific Adventist University, bringing fresh, farm-to-table produce directly to our community. As an integral part of the university's agricultural program, we showcase the finest seasonal harvests grown right on our campus.</p>
                    <p>Open every Sunday from 6:00 AM to 5:00 PM, our market offers fresh-picked fruits and vegetables from our university farms, all grown using sustainable practices. Come experience the taste of truly fresh produce while supporting agricultural education!</p>
                    <a href="<?= BASE_URL ?>about" class="btn" style="margin-top: 20px;">Learn More</a>
                </div>
                <div class="about-image">
                    <img src="<?= BASE_URL ?>public/uploads/market/farmers-market.webp" alt="Pacific Adventist University campus farms">
                </div>
            </div>
        </div>
    </section>

        <!-- Featured Products -->
    <section class="products">
        <div class="container">
            <div class="section-title">
                <h2>This Week's Harvest</h2>
                <p>Fresh from our local farms - available now at the market</p>
            </div>
            
            <?php if (empty($products)): ?>
                <div class="empty-state">
                    <i class="fas fa-seedling"></i>
                    <h3>No Featured Products Available</h3>
                    <p>Check back soon for our latest harvest</p>
                </div>
            <?php else: ?>
                <div class="product-grid">
                    <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image" 
                            style="background-image: url('<?= BASE_URL . 'public/uploads/products/' . ($product['image'] ?? 'assets/images/default-product.jpg') ?>')">
                        </div>
                        <div class="product-info">
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <div class="product-price">K<?= number_format($product['price'], 2) ?>/<?= htmlspecialchars($product['unit']) ?></div>
                            <p><?= htmlspecialchars($product['description']) ?></p>
                            <a href="<?= BASE_URL ?>home/productDetail/<?= $product['id'] ?>" class="btn" style="margin-top: 15px; display: inline-block; padding: 8px 20px; font-size: 0.8rem;">
                                View Details
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="view-more-container" style="text-align: center; margin-top: 40px;">
                    <a href="<?= BASE_URL ?>home/productDisplay" class="btn btn-outline" style="padding: 12px 30px; font-size: 0.9rem;">
                        View All Products
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>


    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="section-title">
                <h2>Stay Connected</h2>
                <p>Sign up for our weekly newsletter to receive updates on seasonal produce, special events, and vendor highlights.</p>
            </div>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>

    <?php require VIEWS . '/home/layout/footer.php'; ?>
    <style>
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('<?= BASE_URL ?>public/uploads/market/farmers-market.jpg') no-repeat center center;
            background-size: cover;
            background-position: center;
            height: 100vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            padding-top: 80px;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        /* About Section */
        .about {
            background-color: white;
        }
        
        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .about-text {
            flex: 1;
        }
        
        .about-text h3 {
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .about-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Product Grid Styles */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }
    
    .product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
    }
    
    .product-image {
        height: 200px;
        background-size: cover;
        background-position: center;
    }
    
    .product-info {
        padding: 20px;
    }
    
    .product-info h3 {
        margin: 0 0 10px 0;
        color: #333;
        font-size: 1.1rem;
    }
    
    .product-price {
        font-weight: bold;
        color: #4a8f29;
        margin-bottom: 10px;
        font-size: 1rem;
    }
    
    .product-info p {
        color: #666;
        font-size: 0.9rem;
        margin: 0 0 15px 0;
        line-height: 1.4;
    }
    
    .btn {
        background-color: #4a8f29;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }
    
    .btn:hover {
        background-color: #4a8f29;
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        background: white;
        border-radius: 8px;
        margin: 20px 0;
    }
    
    .empty-state i {
        font-size: 2.5rem;
        color: #4a8f29;
        margin-bottom: 15px;
    }
    
    .empty-state h3 {
        color: #333;
        margin-bottom: 10px;
    }
    
    .empty-state p {
        color: #666;
    }
        
        /* Newsletter */
        .newsletter {
            background-color: var(--primary);
            color: white;
            text-align: center;
        }
        
        .newsletter h2 {
            color: white;
        }
        
        .newsletter-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
        }
        
        .newsletter-form input {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
        }
        
        .newsletter-form button {
            border-radius: 0 50px 50px 0;
            padding: 15px 25px;
            background-color: var(--secondary);
            color: var(--dark);
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .newsletter-form button:hover {
            background-color: #e69500;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 60px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: var(--secondary);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a:hover {
            color: var(--secondary);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: background-color 0.3s;
        }
        
        .social-links a:hover {
            background-color: var(--secondary);
            color: var(--dark);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .about-content {
                flex-direction: column;
            }
            
            .about-image {
                order: -1;
            }
        }
        
        @media (max-width: 768px) {
            .header-container {
                padding: 15px 0;
            }
            
            nav {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background-color: white;
                transition: left 0.3s;
                padding: 30px;
            }
            
            nav.active {
                left: 0;
            }
            
            nav ul {
                flex-direction: column;
            }
            
            nav ul li {
                margin: 15px 0;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-btns {
                flex-direction: column;
                align-items: center;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-form input {
                border-radius: 50px;
                margin-bottom: 10px;
            }
            
            .newsletter-form button {
                border-radius: 50px;
            }
        }
    </style>
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        
        mobileMenuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            this.innerHTML = mainNav.classList.contains('active') ? 
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                if(this.getAttribute('href') === '#') return;
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Animation on scroll
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;
            
            // Add parallax effect to hero
            if(document.querySelector('.hero')) {
                document.querySelector('.hero').style.backgroundPositionY = scrollPosition * 0.5 + 'px';
            }
        });
    </script>
</body>
</html>