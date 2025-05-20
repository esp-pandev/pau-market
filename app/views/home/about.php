<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - PAU-MARKET</title>
    <style>
        /* Global Styles - Consistent with Home Page */
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --dark-color: #2e3a4d;
            --light-color: #f8f9fc;
            --text-color: #5a5c69;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-color);
            color: var(--text-color);
            line-height: 1.6;
        }
        
        a {
            text-decoration: none;
            color: var(--primary-color);
        }
        
        /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        header h1 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            text-align: center;
        }
        
        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 2rem;
            flex-wrap: wrap;
        }
        
        nav a {
            color: var(--text-color);
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        nav a:hover {
            color: var(--primary-color);
            background-color: rgba(78, 115, 223, 0.1);
        }
        
        /* Main Content Styles */
        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        section {
            margin-bottom: 3rem;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }
        
        h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 2rem;
            text-align: center;
        }
        
        h3 {
            color: var(--dark-color);
            margin: 1.5rem 0 1rem;
            font-size: 1.5rem;
        }
        
        p {
            margin-bottom: 1rem;
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
            padding: 1.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-top: 4px solid var(--primary-color);
        }
        
        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .team-member {
            text-align: center;
        }
        
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
            border: 3px solid var(--primary-color);
        }
        
        /* Values List */
        .values-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .value-item {
            background-color: rgba(78, 115, 223, 0.1);
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
        }
        
        .value-item i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            display: block;
        }
        
        /* Footer Styles */
        footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            nav ul {
                gap: 1rem;
            }
            
            .card-container, .team-grid, .values-list {
                grid-template-columns: 1fr;
            }
            
            section {
                padding: 1.5rem;
            }
        }
    </style>
    <!-- Font Awesome for icons (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <h1>About PAU-MARKET</h1>
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
        <!-- Hero Section -->
        <section class="hero">
            <h2>Our Story</h2>
            <p>PAU-MARKET was founded in 2023 with a vision to revolutionize agricultural commerce by connecting farmers directly with consumers and businesses through our innovative digital platform.</p>
        </section>
        
        <!-- Mission and Vision -->
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
        
        <!-- Values Section -->
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
        
        <!-- Team Section -->
        <section>
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member">
                    <h3>John Doe</h3>
                    <p>Founder & CEO</p>
                </div>
                <div class="team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member">
                    <h3>Jane Smith</h3>
                    <p>Chief Technology Officer</p>
                </div>
                <div class="team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member">
                    <h3>Michael Johnson</h3>
                    <p>Head of Operations</p>
                </div>
                <div class="team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member">
                    <h3>Sarah Williams</h3>
                    <p>Marketing Director</p>
                </div>
            </div>
        </section>
        
        <!-- Achievements -->
        <section>
            <h2>Our Achievements</h2>
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; text-align: center; margin-top: 2rem;">
                <div>
                    <h3 style="color: var(--primary-color); font-size: 2rem;">500+</h3>
                    <p>Registered Farmers</p>
                </div>
                <div>
                    <h3 style="color: var(--primary-color); font-size: 2rem;">1,200+</h3>
                    <p>Active Buyers</p>
                </div>
                <div>
                    <h3 style="color: var(--primary-color); font-size: 2rem;">50+</h3>
                    <p>Product Categories</p>
                </div>
                <div>
                    <h3 style="color: var(--primary-color); font-size: 2rem;">5</h3>
                    <p>States Covered</p>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> PAU-MARKET. All rights reserved.</p>
        <p style="margin-top: 1rem;">Contact: info@paumarket.com | Phone: (123) 456-7890</p>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple animation for values when they come into view
            const valueItems = document.querySelectorAll('.value-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            valueItems.forEach(item => {
                item.style.opacity = 0;
                item.style.transform = 'translateY(20px)';
                item.style.transition = 'all 0.5s ease';
                observer.observe(item);
            });
        });
    </script>
</body>
</html>