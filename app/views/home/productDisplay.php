<?php
// views/products/productDisplay.php
$pageTitle = 'Product Catalog - PAU-MARKET';
$currentPage = 'products';
require VIEWS . '/home/layout/header.php';
?>

<!-- Hero Section -->
<section class="hero-products">
    <div class="container">
        <div class="hero-content">
            <h1>Farm Fresh Products</h1>
            <p>Direct from our local producers to your table</p>
        </div>
    </div>
</section>

<main class="product-catalog-container">
    <div class="container">
        <div class="section-title">
            <h2>Our Product Catalog</h2>
            <p>Browse our selection of fresh, locally-sourced products</p>
        </div>

        <?php if (empty($products)): ?>
            <div class="empty-state">
                <i class="fas fa-seedling"></i>
                <h3>No Products Available</h3>
                <p>Check back soon for our latest harvest</p>
            </div>
        <?php else: ?>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                
                
                    <div class="product-card">
                    <div class="product-image-container">
                        <img src="<?= BASE_URL ?>public/uploads/products/<?= $product['image'] ?? 'assets/images/default-product.jpg' ?>" 
                            alt="<?= htmlspecialchars($product['name']) ?>" 
                            class="product-image">
                        <div class="product-badge"><?= htmlspecialchars($product['unit']) ?></div>
                    </div>
                    
                    
                    
                    <div class="product-details">
                        <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                        
                        <div class="product-meta">
                            <div class="price-availability">
                                <span class="price">K<?= number_format($product['price'], 2) ?></span>
                                <span class="availability"><?= htmlspecialchars($product['quantity_available']) ?> in stock</span>
                            </div>
                            <a href="<?= BASE_URL ?>products/details/<?= $product['id'] ?>" class="view-btn">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<style>
    /* Hero Section - Products Page */
    .hero-products {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                    url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
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
    
    .hero-products h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .hero-products p {
        font-size: 1.2rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }
    
    /* Product Catalog Styles */
    .product-catalog-container {
        padding: 80px 0;
        background-color: var(--background);
    }
    
    /* Product Grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }
    
    /* Product Card */
    .product-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    
    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    /* Product Image */
    .product-image-container {
        position: relative;
        height: 200px;
        overflow: hidden;
    }
    
    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-image {
        transform: scale(1.05);
    }
    
    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: var(--primary);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    /* Product Details */
    .product-details {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .product-title {
        font-size: 1.25rem;
        margin-bottom: 0.75rem;
        color: var(--dark);
    }
    
    .product-description {
        color: var(--text);
        font-size: 0.95rem;
        margin-bottom: 1rem;
        flex-grow: 1;
    }
    
    /* Price and Availability */
    .product-meta {
        margin-top: auto;
    }
    
    .price-availability {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .price {
        font-weight: bold;
        color: var(--primary);
        font-size: 1.25rem;
    }
    
    .availability {
        font-size: 0.85rem;
        color: var(--text);
        background: var(--light);
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
    }
    
    /* View Button */
    .view-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: var(--primary);
        color: white;
        padding: 0.6rem 1rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s;
        width: 100%;
    }
    
    .view-btn:hover {
        background-color: var(--secondary);
        transform: translateY(-2px);
    }
    
    .view-btn i {
        margin-right: 0.5rem;
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 10px;
        margin: 2rem 0;
        grid-column: 1 / -1;
    }
    
    .empty-state i {
        font-size: 3rem;
        color: var(--primary);
        margin-bottom: 1rem;
    }
    
    .empty-state h3 {
        color: var(--dark);
        margin-bottom: 0.5rem;
    }
    
    .empty-state p {
        color: var(--text);
    }
    
    @media (max-width: 768px) {
        .hero-products h1 {
            font-size: 2.5rem;
        }
        
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
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