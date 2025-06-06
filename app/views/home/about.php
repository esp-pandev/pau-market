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
        
        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
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
        
        /* Hero Section - About Page Version */
        .hero-about {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://images.unsplash.com/photo-1606787366850-de6330128bfc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 60vh;
            min-height: 400px;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            padding-top: 80px;
        }
        
        /* About Page Specific Styles */
        .mission-vision {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
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
        }
        
        .team {
            background-color: var(--light);
        }
        
        .team-members {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .team-member {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .team-member img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .team-member-info {
            padding: 20px;
        }
        
        .team-member-info h4 {
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .team-member-info p {
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 15px;
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
            
            .hero-about h1 {
                font-size: 2.5rem;
            }
        }
    </style>
<body>

    <!-- Hero Section -->
    <section class="hero-about">
        <div class="container">
            <div class="hero-content">
                <h1>Our Story</h1>
                <p>Discover the people and values behind Green Valley Farmers Market</p>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="about">
        <div class="container">
            <div class="section-title">
                <h2>Who We Are</h2>
                <p>Connecting our community with fresh, local food since 2010</p>
            </div>
            
            <div class="about-content">
                <div class="about-text">
                    <p>Founded in 2010 by a group of local farmers, Green Valley Farmers Market began as a small weekly gathering in the town square. What started with just 5 vendors has grown into a thriving community marketplace with over 50 local producers.</p>
                    <p>Our mission has always been simple: to create a direct connection between local farmers and our community, ensuring fair prices for producers while providing the freshest, most nutritious food for our customers.</p>
                    <p>Today, we're proud to be more than just a market - we're a community hub where neighbors meet, children learn about food, and local businesses thrive.</p>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1606787366850-de6330128bfc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Farmers market scene">
                </div>
            </div>
            
            <div class="mission-vision">
                <div class="mission">
                    <h3>Our Mission</h3>
                    <p>To strengthen our local food system by connecting consumers directly with farmers and producers, fostering sustainable agriculture, and building a healthier community through access to fresh, nutritious food.</p>
                </div>
                <div class="vision">
                    <h3>Our Vision</h3>
                    <p>We envision a future where every family has access to affordable, locally-grown food, where farmers are valued and compensated fairly, and where our community thrives through meaningful connections around food.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <div class="section-title">
                <h2>Meet Our Team</h2>
                <p>The passionate people who make our market possible</p>
            </div>
            
            <div class="team-members">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Market Director">
                    <div class="team-member-info">
                        <h4>Sarah Johnson</h4>
                        <p>Market Director</p>
                        <p>With 15 years of experience in community development, Sarah leads our market with passion and vision.</p>
                    </div>
                </div>
                
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Farmers Coordinator">
                    <div class="team-member-info">
                        <h4>Michael Chen</h4>
                        <p>Farmers Coordinator</p>
                        <p>Michael works directly with our farmers to ensure a diverse selection of high-quality products.</p>
                    </div>
                </div>
                
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Community Outreach">
                    <div class="team-member-info">
                        <h4>Emma Rodriguez</h4>
                        <p>Community Outreach</p>
                        <p>Emma connects the market with local schools, nonprofits, and community organizations.</p>
                    </div>
                </div>
                
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Operations Manager">
                    <div class="team-member-info">
                        <h4>David Wilson</h4>
                        <p>Operations Manager</p>
                        <p>David ensures everything runs smoothly behind the scenes at our market.</p>
                    </div>
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
                    <h3><i class="fas fa-leaf" style="color: var(--primary); margin-right: 10px;"></i> Sustainability</h3>
                    <p>We support farming practices that protect our environment and ensure the long-term health of our land and community.</p>
                </div>
                <div class="mission">
                    <h3><i class="fas fa-handshake" style="color: var(--primary); margin-right: 10px;"></i> Fairness</h3>
                    <p>We believe in fair compensation for farmers and fair prices for consumers, with transparency at every step.</p>
                </div>
                <div class="mission">
                    <h3><i class="fas fa-heart" style="color: var(--primary); margin-right: 10px;"></i> Community</h3>
                    <p>We're more than a market - we're a gathering place that strengthens the bonds between neighbors.</p>
                </div>
                <div class="mission">
                    <h3><i class="fas fa-seedling" style="color: var(--primary); margin-right: 10px;"></i> Education</h3>
                    <p>We're committed to teaching our community about nutrition, cooking, and sustainable agriculture.</p>
                </div>
            </div>
        </div>
    </section>

    <?php require VIEWS . '/home/layout/footer.php'; ?>

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
    </script>
</body>
</html>