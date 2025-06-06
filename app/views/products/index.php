<?php
$title = "Manage Products";
$activePage = "products"; 
ob_start();
?>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/products.css">
    <script src="<?php echo BASE_URL; ?>assets/js/admin.js"></script>
    <style>
        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }
        .no-image {
            width: 80px;
            height: 80px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Manage Products</h1>
    
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    
    <a href="<?php echo BASE_URL; ?>products/create" class="btn btn-primary mb-3">Create New Product</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <!-- <th>Image</th>-->
                    <th>Name</th>
                    <th>Price (K)</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr><!--
                    <td>
    <?php if (!empty($product['image'])): ?>
        <?php
        // Windows path fix - replace backslashes if any
        $imagePath = str_replace('\\', '/', $product['image']);
        $imageUrl = BASE_URL . ltrim($imagePath, '/');
        $physicalPath = 'C:/wamp64/www/pau-market/public/' . ltrim($imagePath, '/');
        ?>
        
        <?php if (file_exists($physicalPath)): ?>
            <img src="<?= $imageUrl ?>" 
                 alt="<?= htmlspecialchars($product['name']) ?>" 
                 class="product-img">
        <?php else: ?>
            <div class="no-image" title="File missing: <?= htmlspecialchars($physicalPath) ?>">
                <span>File missing</span>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="no-image">
            <span>No image</span>
        </div>
    <?php endif; ?>
</td>-->
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= number_format($product['price'], 2) ?></td>
                    <td><?= htmlspecialchars($product['quantity_available']) ?></td>
                    <td><?= htmlspecialchars($product['unit']) ?></td>
                    <td><?= isset($categoryMap[$product['category_id']]) ? htmlspecialchars($categoryMap[$product['category_id']]) : 'Uncategorized' ?></td>
                    <td><?= htmlspecialchars(substr($product['description'], 0, 30)) ?>...</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="<?= BASE_URL ?>products/show/<?= $product['id'] ?>" class="btn btn-sm btn-info">View</a>
                            <a href="<?= BASE_URL ?>products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?= BASE_URL ?>products/delete/<?= $product['id'] ?>" method="POST" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';