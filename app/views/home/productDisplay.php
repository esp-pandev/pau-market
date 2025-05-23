<?php
// views/products/productDisplay.php
$pageTitle = 'Product Catalog - PAU-MARKET';
$currentPage = 'products';
require VIEWS . '/home/layout/header.php';
?>

<div class="product-catalog-container">
    <div class="catalog-header">
        <h1>Our Farm Fresh Products</h1>
        <p class="subtitle">Direct from local producers to your table</p>
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
                    <img src="<?= BASE_URL . ($product['image'] ?? 'assets/images/default-product.jpg') ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>" 
                         class="product-image">
                    <div class="product-badge"><?= htmlspecialchars($product['unit']) ?></div>
                </div>
                <div class="product-details">
                    <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                    
                    <div class="product-meta">
                        <div class="price-availability">
                            <span class="price">$<?= number_format($product['price'], 2) ?></span>
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

<style>
    /* Product Catalog Styles */
    .product-catalog-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    
    .catalog-header {
        text-align: center;
        margin-bottom: 3rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--gray);
    }
    
    .catalog-header h1 {
        color: var(--primary);
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .catalog-header .subtitle {
        color: var(--text-light);
        font-size: 1.1rem;
    }
    
    /* Product Grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
    }
    
    /* Product Card */
    .product-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
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
        background: rgba(78, 140, 63, 0.9);
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
        color: var(--text);
    }
    
    .product-description {
        color: var(--text-light);
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
        color: var(--text-light);
        background: #f5f5f5;
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
        transition: background-color 0.3s;
        width: 100%;
    }
    
    .view-btn:hover {
        background-color: var(--primary-dark);
    }
    
    .view-btn i {
        margin-right: 0.5rem;
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: #f9f9f9;
        border-radius: 10px;
        margin: 2rem 0;
    }
    
    .empty-state i {
        font-size: 3rem;
        color: #ccc;
        margin-bottom: 1rem;
    }
    
    .empty-state h3 {
        color: #555;
        margin-bottom: 0.5rem;
    }
    
    .empty-state p {
        color: #888;
    }
    
    @media (max-width: 768px) {
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        }
        
        .catalog-header h1 {
            font-size: 2rem;
        }
    }
</style>

<?php require VIEWS . '/home/layout/footer.php'; ?>