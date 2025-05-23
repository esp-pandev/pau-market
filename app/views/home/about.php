<?php
// views/home/index.php
$pageTitle = 'PAU-MARKET - About Us';
$currentPage = 'about';
require VIEWS . '/home/layout/header.php';
?>

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
        <div class="values-grid">
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
            <div class="team-card">
                <div class="team-img" style="background-image: url('https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                <div class="team-content">
                    <h3>John Doe</h3>
                    <p>Founder & CEO</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-img" style="background-image: url('https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                <div class="team-content">
                    <h3>Jane Smith</h3>
                    <p>Chief Technology Officer</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-img" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                <div class="team-content">
                    <h3>Michael Johnson</h3>
                    <p>Head of Operations</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-img" style="background-image: url('https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                <div class="team-content">
                    <h3>Sarah Williams</h3>
                    <p>Marketing Director</p>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <h2>Our Achievements</h2>
        <div class="stats-grid">
            <div class="stat-card">
                <h3>500+</h3>
                <p>Registered Farmers</p>
            </div>
            <div class="stat-card">
                <h3>1,200+</h3>
                <p>Active Buyers</p>
            </div>
            <div class="stat-card">
                <h3>50+</h3>
                <p>Product Categories</p>
            </div>
            <div class="stat-card">
                <h3>5</h3>
                <p>States Covered</p>
            </div>
        </div>
    </section>
</main>

<style>
    /* Hero Section - Consistent with other pages */
    .hero {
        width: 100%;
        min-height: 50vh;
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                    url('https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
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
    
    h3 {
        color: var(--dark);
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    
    /* Mission/Vision Cards - Similar to product cards */
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
    
    /* Values Grid */
    .values-grid {
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
        transition: all 0.3s;
    }
    
    .value-item:hover {
        transform: translateY(-5px);
    }
    
    .value-item i {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 1.5rem;
    }
    
    /* Team Grid - Similar to product grid */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }
    
    .team-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
    }
    
    .team-img {
        height: 250px;
        background-size: cover;
        background-position: center;
    }
    
    .team-content {
        padding: 1.5rem;
        text-align: center;
    }
    
    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }
    
    .stat-card {
        background-color: white;
        border-radius: 8px;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    .stat-card h3 {
        color: var(--primary);
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .hero h2 {
            font-size: 2rem;
        }
        
        .card-container,
        .values-grid,
        .team-grid,
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simple animation for cards
        const cards = document.querySelectorAll('.card, .value-item, .team-card, .stat-card');
        
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = `all 0.5s ease ${index * 0.1}s`;
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        });
    });
</script>

<?php require VIEWS . '/home/layout/footer.php'; ?>