<?php
// views/home/index.php
$pageTitle = 'PAU-MARKET - Farm Fresh Marketplace';
$currentPage = 'home';
require VIEWS . '/home/layout/header.php';
?>
<section class="hero">
    <div class="hero-content">
        <h1>PAU-MARKET</h1>
        <h2>Fresh From Our Farm to Your Table</h2>
        <p>Connecting local farmers with buyers for the freshest agricultural products at fair prices</p>
        <a href="<?= BASE_URL ?>products" class="btn">Shop Fresh Produce</a>
    </div>
</section>

<main>
    <section>
        <h2>About PAU-MARKET</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem;">
            PAU-MARKET is revolutionizing agricultural commerce by creating direct connections between producers and consumers. 
            Our digital marketplace promotes sustainable farming practices while ensuring fair prices for both farmers and buyers.
        </p>
    </section>
    
    <section class="products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <?php if (!empty($featuredProducts)): ?>
                <?php foreach ($featuredProducts as $product): ?>
                    <div class="product-card">
                        <div class="product-img" style="background-image: url('<?= BASE_URL . ($product['image'] ?: 'assets/images/default-product.jpg') ?>');"></div>
                        <div class="product-content">
                            <h4><?= htmlspecialchars($product['name']) ?></h4>
                            <p class="price">$<?= number_format($product['price'], 2) ?>/<?= htmlspecialchars($product['unit']) ?></p>
                            <p><?= htmlspecialchars($product['description']) ?></p>
                            <a href="<?= BASE_URL ?>products/show/<?= $product['id'] ?>" class="btn" style="display: inline-block; padding: 0.5rem 1rem; margin-top: 0.5rem; font-size: 0.9rem;">View Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="grid-column: 1 / -1; text-align: center;">No featured products available at the moment.</p>
            <?php endif; ?>
        </div>
    </section>
    
    <section>
        <h2>How It Works</h2>
        <div class="steps">
            <div class="step">
                <div class="step-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h4>1. Register</h4>
                <p>Create your free account as a buyer or seller in minutes</p>
            </div>
            <div class="step">
                <div class="step-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h4>2. Browse or List</h4>
                <p>Find fresh products or list your agricultural goods</p>
            </div>
            <div class="step">
                <div class="step-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h4>3. Transact</h4>
                <p>Complete secure transactions through our platform</p>
            </div>
        </div>
    </section>
</main>

<style>
    /* Hero Section - Adjusted to fit screen width */
    .hero {
        width: 100%;
        height: 70vh; /* Adjusted height */
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                    url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        padding: 0 2rem;
        position: relative;
    }

    .hero-content {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
        padding-top: 80px; /* Space for navigation */
    }

    .hero h1 {
        font-size: 3.5rem;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .hero h2 {
        font-size: 2.2rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        font-weight: 400;
    }
    
    .hero p {
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto 2rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        line-height: 1.6;
    }
    
    .btn {
        display: inline-block;
        padding: 0.8rem 2.5rem;
        background-color: var(--secondary);
        color: var(--dark);
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        margin-top: 1rem;
    }
    
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    
    /* Main Content */
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
    
    /* Products Section */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }
    
    .product-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }
    
    .product-card:hover {
        transform: translateY(-10px);
    }
    
    .product-img {
        height: 200px;
        background-size: cover;
        background-position: center;
    }
    
    .product-content {
        padding: 1.5rem;
    }
    
    .product-card h4 {
        color: var(--dark);
        margin-bottom: 0.5rem;
    }
    
    .product-card .price {
        color: var(--accent);
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    /* How It Works */
    .steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .step {
        text-align: center;
        padding: 2rem;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .step-icon {
        font-size: 3rem;
        color: var(--primary);
        margin-bottom: 1rem;
    }
    
    .step h4 {
        margin-bottom: 1rem;
        color: var(--dark);
    }
    
    @media (max-width: 768px) {
        .hero h2 {
            font-size: 2rem;
        }
        
        .steps {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simple animation for product cards
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach((card, index) => {
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