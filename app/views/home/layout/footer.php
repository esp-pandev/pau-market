<!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>PAU Farmers Market</h3>
                    <p>Bringing fresh, local food to our community every Sunday from January through December.</p>
                    <div class="social-links" style="margin-top: 20px;">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="<?= BASE_URL ?>" <?= ($currentPage ?? '') === 'home' ? 'class="active"' : '' ?>>Home</a></li>
                        <li><a href="<?= BASE_URL ?>about" <?= ($currentPage ?? '') === 'about' ? 'class="active"' : '' ?>>About</a></li>
                        <li><a href="<?= BASE_URL ?>home/productDisplay" <?= ($currentPage ?? '') === 'products' ? 'class="active"' : '' ?>>Products</a></li>
                        <li><a href="<?= BASE_URL ?>contact" <?= ($currentPage ?? '') === 'contact' ? 'class="active"' : '' ?>>Contact</a></li>
                        </li><li><a href="https://www.pau.ac.pg" target="_blank" rel="noopener noreferrer">Visit PAU Website</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Market Info</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Pacific Adventist University, NCD, 14 Mile, Sogeri Road, Port Moresby 112</li>
                        <li><i class="fas fa-calendar-alt"></i> Sunday's, 8am-5pm</li>
                        <li><i class="fas fa-phone"></i> +675 7411 1300</li>
                        <li><i class="fas fa-envelope"></i> info@paumarket.com</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 PAU Farmers Market. All rights reserved.</p>
            </div>
        </div>
    </footer>