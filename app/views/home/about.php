<?php
// views/home/index.php
$pageTitle = 'PAU-MARKET - Farm Fresh Marketplace';
$currentPage = 'about';
require VIEWS . '/home/layout/header.php';
?>

<style>
    /* Color Scheme */
    :root {
        --primary: #4a8f29; /* Fresh green */
        --secondary: #f5a623; /* Warm orange */
        --accent: #e74c3c; /* Tomato red */
        --light: #f8f9fa;
        --dark: #2c3e50;
        --text: #333;
        --background: #f9f7f0;
    }
    
    /* Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: var(--text);
        background-color: var(--background);
    }
    
    a {
        text-decoration: none;
        color: inherit;
    }
    
    img {
        max-width: 100%;
        height: auto;
    }
    
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .btn {
        display: inline-block;
        padding: 12px 30px;
        background-color: var(--primary);
        color: white;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        border: none;
        cursor: pointer;
    }
    
    .btn:hover {
        background-color: var(--secondary);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    section {
        padding: 80px 0;
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }
    
    .section-title h2 {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 15px;
    }
    
    .section-title p {
        max-width: 700px;
        margin: 0 auto;
        color: var(--text);
    }
    
    .section-title::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background-color: var(--secondary);
        margin: 20px auto 0;
    }

    /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
            margin-right: 10px;
        }
        
        .logo h1 {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 30px;
        }
        
        nav ul li a {
            font-weight: 600;
            color: var(--dark);
            transition: color 0.3s;
            position: relative;
        }
        
        nav ul li a:hover {
            color: var(--primary);
        }
        
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            bottom: -5px;
            left: 0;
            transition: width 0.3s;
        }
        
        nav ul li a:hover::after {
            width: 100%;
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
        }
    
    /* Hero Section - About Page */
    .hero-about {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                url('<?= BASE_URL ?>public/uploads/market/farmers-market-hero.jpg') no-repeat center center;
        background-size: cover;
        height: 60vh;
        min-height: 400px;
        display: flex;
        align-items: center;
        text-align: center;
        color: white;
        padding-top: 80px;
    }
    
    .hero-about h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .hero-about p {
        font-size: 1.2rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }
    
    /* About Content */
    .about-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
    }
    
    .about-text {
        padding-right: 30px;
    }
    
    .about-text p {
        margin-bottom: 20px;
        line-height: 1.8;
    }
    
    .about-image {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .about-image img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.5s ease;
    }
    
    .about-image:hover img {
        transform: scale(1.05);
    }
    
    /* Mission & Vision */
    .mission-vision {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 60px;
    }
    
    .mission, .vision {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .mission h3, .vision h3 {
        color: var(--primary);
        margin-bottom: 20px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
    }
    
    /* Values Section */
    .values {
        background-color: var(--light);
    }
    
    .values .mission-vision {
        margin-top: 40px;
    }
    
    .values h3 {
        display: flex;
        align-items: center;
    }
    
    .values i {
        margin-right: 15px;
        font-size: 1.2rem;
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
            grid-template-columns: 1fr;
        }
        
        .about-text {
            padding-right: 0;
            order: 1;
        }
    }
    
    @media (max-width: 768px) {
        .hero-about h1 {
            font-size: 2.5rem;
        }
        
        .section-title h2 {
            font-size: 2rem;
        }
    }
</style>

<body>
    <!-- Hero Section -->
    <section class="hero-about">
        <div class="container">
            <div class="hero-content">
                <h1>Our Story</h1>
                <p>Discover the people and values behind PAU Farmers Market</p>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="about">
        <div class="container">
            <div class="section-title">
                <h2>Who We Are</h2>
                <p>Connecting our community with fresh, local food</p>
            </div>
            
            <div class="about-content">
                <div class="about-text">
                    <p>PAU Farmers Market is proudly hosted by Pacific Adventist University, bringing fresh, farm-to-table produce directly to our community. As an integral part of the university's agricultural program, we showcase the finest seasonal harvests grown right on our campus.</p>
                    <p>Our market offers fresh-picked fruits and vegetables from our university farms, all grown using sustainable practices. Come experience the taste of truly fresh produce while supporting agricultural education!</p>
                    <p>Open every Sunday from 6:00 AM to 5:00 PM, we provide a direct connection between our student farmers and the local community.</p>
                </div>
                <div class="about-image">
                    <img src="<?= BASE_URL ?>public/uploads/market/farm-market-scaled.jpg" alt="PAU Farmers Market">
                </div>
            </div>
            
            <div class="mission-vision">
                <div class="mission">
                    <h3>Our Mission</h3>
                    <p>To strengthen our local food system by connecting consumers directly with our university farms, fostering sustainable agriculture, and building a healthier community through access to fresh, nutritious food.</p>
                </div>
                <div class="vision">
                    <h3>Our Vision</h3>
                    <p>We envision a future where our community has access to affordable, locally-grown food, where student farmers gain valuable experience, and where sustainable farming practices are showcased and celebrated.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <div class="section-title">
                <h2>Our Values</h2>
                <p>The principles that guide everything we do</p>
            </div>
            
            <div class="mission-vision">
                <div class="mission">
                    <h3><i class="fas fa-leaf"></i> Sustainability</h3>
                    <p>We practice and promote farming methods that protect our environment and ensure the long-term health of our land.</p>
                </div>
                <div class="mission">
                    <h3><i class="fas fa-graduation-cap"></i> Education</h3>
                    <p>We're committed to teaching our community about nutrition and providing hands-on learning for our students.</p>
                </div>
                <div class="mission">
                    <h3><i class="fas fa-handshake"></i> Community</h3>
                    <p>We're more than a market - we're a gathering place that strengthens connections between campus and community.</p>
                </div>
                <div class="mission">
                    <h3><i class="fas fa-heart"></i> Quality</h3>
                    <p>We take pride in offering only the freshest, highest quality produce from our university farms.</p>
                </div>
            </div>
        </div>
    </section>

    <?php require VIEWS . '/home/layout/footer.php'; ?>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        
        if (mobileMenuBtn && mainNav) {
            mobileMenuBtn.addEventListener('click', function() {
                mainNav.classList.toggle('active');
                this.innerHTML = mainNav.classList.contains('active') ? 
                    '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
            });
        }
    </script>
</body>
</html>