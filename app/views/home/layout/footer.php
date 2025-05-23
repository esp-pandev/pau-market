<?php
// views/home/layout/footer.php
?>
    </main>
    
    <footer>
        <div class="footer-container">
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
                    <li><a href="<?= BASE_URL ?>">Home</a></li>
                    <li><a href="<?= BASE_URL ?>about">About Us</a></li>
                    <li><a href="<?= BASE_URL ?>home/productDisplay">Products</a></li>
                    <li><a href="<?= BASE_URL ?>contact">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Contact Us</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Pacific Adventist University, NCD, 14 Mile, Sogeri Road, Port Moresby 112</li>
                    <li><i class="fas fa-phone"></i> +675 7411 1300</li>
                    <li><i class="fas fa-envelope"></i> info@paumarket.com</li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; <?= date('Y') ?> PAU-MARKET. All rights reserved.</p>
        </div>
    </footer>
    
    <style>
        /* Footer Styles */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 3rem 0;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
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
            margin-bottom: 0.8rem;
        }
        
        .footer-column a {
            color: #ddd;
            text-decoration: none;
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
            text-align: center;
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</body>
</html>