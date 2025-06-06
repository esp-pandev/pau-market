<?php
// views/home/contact.php
$pageTitle = 'PAU-MARKET - Contact Us';
$currentPage = 'contact';
require VIEWS . '/home/layout/header.php';
?>

<!-- Hero Section -->
<section class="hero-contact">
    <div class="container">
        <div class="hero-content">
            <h1>Get In Touch With Us</h1>
            <p>We're here to help and answer any questions you might have</p>
        </div>
    </div>
</section>

<main>
    <div class="container">
        <div class="section-title">
            <h2>Contact Information</h2>
            <p>Reach out to us through any of these channels</p>
        </div>

        <div class="contact-container">
            <!-- Left Column - Contact Information -->
            <div class="contact-info">
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h3>Our Location</h3>
                        <p>Pacific Adventist University, NCD, 14 Mile, Sogeri Road, Port Moresby 112</p>
                    </div>
                </div>
                
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <h3>Phone Numbers</h3>
                        <p>Main Office: +675 7411 1300<br>
                        Customer Support: +675 7xxx xxxx</p>
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
                        <h3>Business Hours</h3><!--
                        <p>Monday - Thursday: 8:00 AM - 3:00 PM<br>
                        Friday - Saturday: Closed for Sabbath<br> -->
                        Sunday: 6:00 AM - 5:00 PM</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Contact Form -->
            <div class="contact-form">
                <h3>Send Us a Message</h3>
                <form action="<?= BASE_URL ?>contact/submit" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container">
            <div class="section-title">
                <h2>Find Us on Map</h2>
            </div>
            <div class="map-frame">
                <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d59862.72172280761!2d147.2342432989989!3d-9.405689011764517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x69023872fd28ee91%3A0xeddfb14a4e43430!2sPacific%20Adventist%20University%2C%20NCD%2C%20Port%20Moresby!3m2!1d-9.4056914!2d147.27544319999998!4m5!1s0x69023872fd28ee91%3A0xeddfb14a4e43430!2sNCD%2C%2014%20Mile%2C%20Sogeri%20Road%2C%20Port%20Moresby%20112!3m2!1d-9.4056914!2d147.27544319999998!5e1!3m2!1sen!2spg!4v1747783776463!5m2!1sen!2spg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                         
            </div>
        </div>
    </div>
</main>

<style>
    /* Hero Section - Contact Page */
    .hero-contact {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                    url('<?= BASE_URL ?>public/uploads/market/farmers-market-hero.jpg') no-repeat center center;
        background-size: cover;
        background-position: center;
        height: 50vh;
        min-height: 300px;
        display: flex;
        align-items: center;
        text-align: center;
        color: white;
        padding-top: 80px;
    }
    
    .hero-contact h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .hero-contact p {
        font-size: 1.2rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }
    
    /* Contact Container */
    .contact-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        margin: 40px 0;
    }
    
    /* Contact Info */
    .contact-info {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .contact-method {
        display: flex;
        align-items: flex-start;
        margin-bottom: 30px;
    }
    
    .contact-icon {
        margin-right: 20px;
        color: var(--primary);
        font-size: 1.5rem;
        min-width: 30px;
        text-align: center;
    }
    
    .contact-method h3 {
        color: var(--primary);
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    
    .contact-method p {
        color: var(--text);
        line-height: 1.6;
    }
    
    /* Contact Form */
    .contact-form {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .contact-form h3 {
        color: var(--primary);
        font-size: 1.5rem;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }
    
    .form-group input:focus,
    .form-group textarea:focus {
        border-color: var(--primary);
        outline: none;
    }
    
    .form-group textarea {
        resize: vertical;
    }
    
    /* Map Container */
    .map-container {
        margin-top: 60px;
    }
    
    .map-frame {
        height: 400px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .hero-contact h1 {
            font-size: 2.5rem;
        }
        
        .contact-container {
            grid-template-columns: 1fr;
        }
        
        .map-frame {
            height: 300px;
        }
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
</style>

<?php require VIEWS . '/home/layout/footer.php'; ?>