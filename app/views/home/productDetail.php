<?php
$pageTitle = $title;
$currentPage = 'products';
require VIEWS . '/home/layout/header.php';
?>

<section class="product-detail-section">
    <div class="container">
        <div class="product-detail-container">
            <!-- Product Image -->
            <div class="product-image-container">
                <img src="<?= BASE_URL ?>public/uploads/products/<?= $product['image'] ?? 'default-product.jpg' ?>" 
                     alt="<?= htmlspecialchars($product['name']) ?>" 
                     class="product-main-image">
            </div>
            
            <!-- Product Info -->
            <div class="product-info-container">
                <h1><?= htmlspecialchars($product['name']) ?></h1>
                
                <div class="product-price">
                    K<?= number_format($product['price'], 2) ?> / <?= htmlspecialchars($product['unit']) ?>
                </div>
                
                <div class="product-stock">
                    <?php if ($product['quantity_available'] > 0): ?>
                        <span class="in-stock">In Stock (<?= $product['quantity_available'] ?> available)</span>
                    <?php else: ?>
                        <span class="out-of-stock">Currently Out of Stock</span>
                    <?php endif; ?>
                </div>
                
                <div class="product-description">
                    <h3>Product Description</h3>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                </div>
                
                <div class="product-actions">
                    <button class="add-to-cart-btn">Add to Cart</button>
                    <button class="wishlist-btn"><i class="far fa-heart"></i> Save</button>
                </div>
                
                <div class="product-meta">
                    <div class="meta-item">
                        <i class="fas fa-tags"></i>
                        <span>Category: 
                            <?php if (!empty($product['category_name'])): ?>
                                <?= htmlspecialchars($product['category_name']) ?>
                            <?php else: ?>
                                General
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Added: <?= date('M j, Y', strtotime($product['created_at'])) ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        <?php if (!empty($relatedProducts)): ?>
        <div class="related-products">
            <h2>You May Also Like</h2>
            <div class="related-products-grid">
                <?php foreach ($relatedProducts as $related): ?>
                <div class="related-product-card">
                    <a href="<?= BASE_URL ?>products/details/<?= $related['id'] ?>">
                        <img src="<?= BASE_URL ?>public/uploads/products/<?= $related['image'] ?? 'default-product.jpg' ?>" 
                             alt="<?= htmlspecialchars($related['name']) ?>">
                        <h3><?= htmlspecialchars($related['name']) ?></h3>
                        <div class="price">K<?= number_format($related['price'], 2) ?></div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
    /* Product Detail Styles */
    .product-detail-section {
        padding: 60px 0;
        
    }
    
    .product-detail-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 60px;
        margin-top: 40px;
    }
    
    .product-image-container {
        background: #f9f9f9;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }
    
    .product-main-image {
        max-width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: contain;
    }
    
    .product-info-container h1 {
        font-size: 2rem;
        margin-bottom: 15px;
        color: var(--dark);
    }
    
    .product-price {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--primary);
        margin-bottom: 15px;
    }
    
    .in-stock {
        color: #2ecc71;
        font-weight: 500;
    }
    
    .out-of-stock {
        color: #e74c3c;
        font-weight: 500;
    }
    
    .product-description {
        margin: 25px 0;
    }
    
    .product-description h3 {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    
    .product-actions {
        display: flex;
        gap: 15px;
        margin: 30px 0;
    }
    
    .add-to-cart-btn {
        background: var(--primary);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .add-to-cart-btn:hover {
        background: var(--secondary);
        transform: translateY(-2px);
    }
    
    .wishlist-btn {
        background: white;
        color: var(--dark);
        border: 1px solid #ddd;
        padding: 12px 25px;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .wishlist-btn:hover {
        background: #f9f9f9;
        border-color: var(--primary);
        color: var(--primary);
    }
    
    .product-meta {
        border-top: 1px solid #eee;
        padding-top: 20px;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        color: var(--text);
    }
    
    /* Related Products */
    .related-products {
        margin-top: 60px;
        border-top: 1px solid #eee;
        padding-top: 40px;
    }
    
    .related-products h2 {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .related-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 25px;
    }
    
    .related-product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }
    
    .related-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .related-product-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }
    
    .related-product-card h3 {
        font-size: 1rem;
        padding: 10px 15px;
        margin: 0;
    }
    
    .related-product-card .price {
        padding: 0 15px 15px;
        color: var(--primary);
        font-weight: bold;
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
    @media (max-width: 768px) {
        .product-detail-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<?php require VIEWS . '/home/layout/footer.php'; ?>