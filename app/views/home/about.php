<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - PAU-MARKET</title>
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
            height: 50vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                        url('https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 2rem;
            margin-bottom: 4rem;
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
        
        /* Main Content */
        main {
            max-width: 1200px;
            margin: 0 auto 4rem;
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
        
        /* Mission/Vision Cards */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            border-top: 4px solid var(--primary);
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card h3 {
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        /* Values Section */
        .values-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .value-item {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .value-item:hover {
            transform: translateY(-5px);
        }
        
        .value-item i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }
        
        .value-item h3 {
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .team-member {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .team-member:hover {
            transform: translateY(-5px);
        }
        
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1.5rem;
            border: 3px solid var(--primary);
        }
        
        .team-member h3 {
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .team-member p {
            color: var(--primary);
            font-weight: 600;
        }
        
        /* Achievements */
        .achievements {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .achievement-item {
            text-align: center;
            padding: 1.5rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .achievement-item h3 {
            color: var(--primary);
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
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
            
            .hero {
                height: 60vh;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="https://via.placeholder.com/50x50?text=PAU" alt="PAU-MARKET Logo">
            <span class="logo-text">PAU-MARKET</span>
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
        <h2>Our Farming Story</h2>
        <p>Connecting generations of agricultural expertise with modern marketplace technology</p>
    </section>
    
    <main>
        <section>
            <h2>Our Mission & Vision</h2>
            <div class="card-container">
                <div class="card">
                    <h3>Our Mission</h3>
                    <p>To empower agricultural producers by providing a transparent, efficient marketplace that eliminates middlemen and ensures fair prices for quality products.</p>
                </div>
                <div class="card">
                    <h3>Our Vision</h3>
                    <p>To become Africa's leading agricultural marketplace, transforming how food moves from farm to table while supporting sustainable farming practices.</p>
                </div>
            </div>
        </section>
        
        <section>
            <h2>Our Core Values</h2>
            <div class="values-list">
                <div class="value-item">
                    <i class="fas fa-handshake"></i>
                    <h3>Integrity</h3>
                    <p>We conduct business with honesty and transparency</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-leaf"></i>
                    <h3>Sustainability</h3>
                    <p>We promote eco-friendly agricultural practices</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-users"></i>
                    <h3>Community</h3>
                    <p>We build connections that benefit all stakeholders</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-lightbulb"></i>
                    <h3>Innovation</h3>
                    <p>We continuously improve our platform and services</p>
                </div>
            </div>
        </section>
        
        <section>
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Team Member">
                    <h3>John Doe</h3>
                    <p>Founder & CEO</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Team Member">
                    <h3>Jane Smith</h3>
                    <p>Chief Technology Officer</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Team Member">
                    <h3>Michael Johnson</h3>
                    <p>Head of Operations</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Team Member">
                    <h3>Sarah Williams</h3>
                    <p>Marketing Director</p>
                </div>
            </div>
        </section>
        
        <section>
            <h2>Our Achievements</h2>
            <div class="achievements">
                <div class="achievement-item">
                    <h3>500+</h3>
                    <p>Registered Farmers</p>
                </div>
                <div class="achievement-item">
                    <h3>1,200+</h3>
                    <p>Active Buyers</p>
                </div>
                <div class="achievement-item">
                    <h3>50+</h3>
                    <p>Product Categories</p>
                </div>
                <div class="achievement-item">
                    <h3>5</h3>
                    <p>States Covered</p>
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
            // Animation for value items
            const valueItems = document.querySelectorAll('.value-item');
            
            valueItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                item.style.transition = `all 0.5s ease ${index * 0.1}s`;
                
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 100);
            });
            
            // Animation for team members
            const teamMembers = document.querySelectorAll('.team-member');
            
            teamMembers.forEach((member, index) => {
                member.style.opacity = '0';
                member.style.transform = 'translateY(20px)';
                member.style.transition = `all 0.5s ease ${index * 0.1 + 0.3}s`;
                
                setTimeout(() => {
                    member.style.opacity = '1';
                    member.style.transform = 'translateY(0)';
                }, 100);
            });
        });
    </script>
</body>
</html>