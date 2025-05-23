<?php
// views/home/index.php
$pageTitle = 'PAU-MARKET - Contact Us';
$currentPage = 'contact';
require VIEWS . '/home/layout/header.php';
?>

<section class="hero">
    <h2>Get In Touch With Us</h2>
    <p>We're here to help and answer any questions you might have</p>
</section>

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
                    <h3>Business Hours</h3>
                    <p>Monday - Thursday: 8:00 AM - 3:00 PM<br>
                    Friday - Saturday: Closed for Sabbath<br>
                    Sunday: 7:00 AM - 3:00 PM</p>
                </div>
            </div>
        </div>
        
        <!-- Right Column - Map -->
        <div class="map-container">
            <h2>Find Us on Map</h2>
            <div class="map-frame">
                <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d59862.72172280761!2d147.2342432989989!3d-9.405689011764517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x69023872fd28ee91%3A0xeddfb14a4e43430!2sPacific%20Adventist%20University%2C%20NCD%2C%20Port%20Moresby!3m2!1d-9.4056914!2d147.27544319999998!4m5!1s0x69023872fd28ee91%3A0xeddfb14a4e43430!2sNCD%2C%2014%20Mile%2C%20Sogeri%20Road%2C%20Port%20Moresby%20112!3m2!1d-9.4056914!2d147.27544319999998!5e1!3m2!1sen!2spg!4v1747783776463!5m2!1sen!2spg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                         
            </div>
        </div>
    </div>
</main>

<style>
    /* Hero Section - Consistent with other pages */
    .hero {
        width: 100%;
        min-height: 50vh;
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                    url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        padding: 0 2rem;
        margin: 0;
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
    
    /* Main Content - Consistent with other pages */
    main {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
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
    
    h3 {
        color: var(--dark);
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    
    /* Contact Container */
    .contact-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 3rem;
        margin-top: 2rem;
    }
    
    /* Contact Info */
    .contact-info, .map-container {
        background-color: white;
        border-radius: 8px;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .contact-method {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
    }
    
    .contact-icon {
        margin-right: 1.5rem;
        color: var(--primary);
        font-size: 1.5rem;
        margin-top: 0.2rem;
    }
    
    /* Map Container */
    .map-frame {
        height: 400px;
        border-radius: 8px;
        overflow: hidden;
        margin-top: 1rem;
    }
    
    iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .hero h2 {
            font-size: 2rem;
        }
        
        .contact-container {
            grid-template-columns: 1fr;
        }
        
        .map-frame {
            height: 300px;
        }
    }
</style>

<?php require VIEWS . '/home/layout/footer.php'; ?>