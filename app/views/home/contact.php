<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - PAU-MARKET</title>
    <style>
        /* Global Styles - Consistent with Other Pages */
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
        
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
        
        .contact-info {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }
        
        .map-container {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }
        
        h3 {
            color: var(--dark-color);
            margin: 1.5rem 0 1rem;
            font-size: 1.5rem;
        }
        
        /* Contact Info Styles */
        .contact-method {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }
        
        .contact-icon {
            margin-right: 1rem;
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-top: 0.2rem;
        }
        
        .map-frame {
            flex-grow: 1;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 1rem;
        }
        
        iframe {
            width: 100%;
            height: 100%;
            border: none;
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
            .contact-container {
                grid-template-columns: 1fr;
            }
            
            nav ul {
                gap: 1rem;
            }
            
            .map-container {
                height: 300px;
            }
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <h1>Contact PAU-MARKET</h1>
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
        <div class="contact-container">
            <!-- Left Column - Contact Information -->
            <div class="contact-info">
                <h2>Our Contact Details</h2>
                
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h3>Our Location</h3>
                        <p>123 Agricultural Plaza<br>Farmers City, FC 10001</p>
                    </div>
                </div>
                
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <h3>Phone Numbers</h3>
                        <p>Main Office: (123) 456-7890<br>
                        Customer Support: (123) 456-7891</p>
                    </div>
                </div>
                
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h3>Email Addresses</h3>
                        <p>General Inquiries: info@paumarket.com<br>
                        Technical Support: support@paumarket.com</p>
                    </div>
                </div>
                
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <h3>Business Hours</h3>
                        <p>Monday - Friday: 8:00 AM - 6:00 PM<br>
                        Saturday: 9:00 AM - 2:00 PM<br>
                        Sunday: Closed</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Map -->
            <div class="map-container">
                <h2>Find Us on Map</h2>
                <div class="map-frame">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d59862.72172280761!2d147.2342432989989!3d-9.405689011764517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x69023872fd28ee91%3A0xeddfb14a4e43430!2sPacific%20Adventist%20University%2C%20NCD%2C%20Port%20Moresby!3m2!1d-9.4056914!2d147.27544319999998!4m5!1s0x69023872fd28ee91%3A0xeddfb14a4e43430!2sNCD%2C%2014%20Mile%2C%20Sogeri%20Road%2C%20Port%20Moresby%20112!3m2!1d-9.4056914!2d147.27544319999998!5e1!3m2!1sen!2spg!4v1747783776463!5m2!1sen!2spg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> PAU-MARKET. All rights reserved.</p>
        <p style="margin-top: 1rem;">Contact: info@paumarket.com | Phone: (123) 456-7890</p>
    </footer>
</body>
</html>