<?php
// views/home/sitemap.php
$pageTitle = 'PAU-MARKET - Website Sitemap';
$currentPage = 'sitemap';
require VIEWS . '/home/layout/header.php';
?>

<style>
    /* Sitemap Specific Styles */
    .sitemap-container {
        padding: 60px 0;
        background-color: #f9f9f9;
    }
    
    .sitemap-title {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .sitemap-title h1 {
        color: #4a8f29;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
    
    .sitemap-title p {
        color: #666;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .sitemap {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }
    
    .sitemap-tree {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .sitemap-node {
        background-color: white;
        border: 2px solid #4a8f29;
        border-radius: 8px;
        padding: 15px 25px;
        margin: 10px;
        width: 200px;
        text-align: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .sitemap-node:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        background-color: #f0f7ec;
    }
    
    .sitemap-node.main {
        background-color: #4a8f29;
        color: white;
        font-weight: bold;
        width: 220px;
    }
    
    .sitemap-node a {
        color: inherit;
        text-decoration: none;
        display: block;
    }
    
    .sitemap-branch {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }
    
    .sitemap-branch::before {
        content: '';
        position: absolute;
        top: -20px;
        width: 2px;
        height: 20px;
        background-color: #4a8f29;
    }
    
    .sitemap-subnodes {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        position: relative;
        padding-top: 20px;
    }
    
    .sitemap-subnodes::before {
        content: '';
        position: absolute;
        top: 0;
        width: 80%;
        height: 2px;
        background-color: #4a8f29;
    }
    
    .sitemap-subnodes .sitemap-node {
        margin: 10px 5px;
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
        .sitemap-subnodes {
            flex-direction: column;
        }
        
        .sitemap-node {
            width: 180px;
        }
    }
</style>

<div class="sitemap-container">
    <div class="container">
        <div class="sitemap-title">
            <h1>Website Sitemap</h1>
            <p>Visual representation of PAU-MARKET's website structure and navigation</p>
        </div>
        
        <div class="sitemap">
            <div class="sitemap-tree">
                <!-- Home -->
                <div class="sitemap-node main">
                    <a href="<?= BASE_URL ?>">Home</a>
                </div>
                
                <div class="sitemap-branch">
                    <div class="sitemap-subnodes">
                        <!-- Main Pages -->
                        <div class="sitemap-node">
                            <a href="<?= BASE_URL ?>about">About Us</a>
                        </div>
                        
                        <div class="sitemap-node">
                            <a href="<?= BASE_URL ?>home/productDisplay">Products</a>
                        </div>
                        
                        <div class="sitemap-node">
                            <a href="<?= BASE_URL ?>contact">Contact</a>
                        </div>
                        
                        <div class="sitemap-node">
                            <a href="<?= BASE_URL ?>auth/login">Admin Login</a>
                        </div>
                    </div>
                    
                    <!-- Products Subpages -->
                    <div class="sitemap-branch">
                        <div class="sitemap-node" style="margin-top: 30px;">
                            <a href="<?= BASE_URL ?>home/productDisplay">All Products</a>
                        </div>
                        
                        <div class="sitemap-subnodes">
                            <div class="sitemap-node">
                                <a href="<?= BASE_URL ?>products/category/vegetables">Vegetables</a>
                            </div>
                            <div class="sitemap-node">
                                <a href="<?= BASE_URL ?>products/category/fruits">Fruits</a>
                            </div>
                            <div class="sitemap-node">
                                <a href="<?= BASE_URL ?>products/category/dairy">Dairy</a>
                            </div>
                            <div class="sitemap-node">
                                <a href="<?= BASE_URL ?>products/category/bakery">Bakery</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Admin Subpages -->
                    <div class="sitemap-branch">
                        <div class="sitemap-node" style="margin-top: 30px;">
                            <a href="<?= BASE_URL ?>admin">Admin Dashboard</a>
                        </div>
                        
                        <div class="sitemap-subnodes">
                            <div class="sitemap-node">
                                <a href="<?= BASE_URL ?>admin/products">Manage Products</a>
                            </div>
                            <div class="sitemap-node">
                                <a href="<?= BASE_URL ?>admin/categories">Manage Categories</a>
                            </div>
                            <div class="sitemap-node">
                                <a href="<?= BASE_URL ?>admin/orders">Manage Orders</a>
                            </div>
                            <div class="sitemap-node">
                                <a href="<?= BASE_URL ?>admin/users">Manage Users</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require VIEWS . '/home/layout/footer.php'; ?>