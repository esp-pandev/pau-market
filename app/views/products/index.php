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
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price (K)</th>
                    <th>Unit</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <img src="/public/uploads/products/<?= $product['image'] ?>" 
                             alt="<?= $product['name'] ?>" 
                             style="width: 80px; height: 80px; object-fit: cover;">
                    </td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= number_format($product['price'], 2) ?></td>
                    <td><?= htmlspecialchars($product['unit']) ?></td>
                    <td><?= htmlspecialchars(substr($product['description'], 0, 100)) ?>...</td>
                    <td>
                        <a href="/products/<?= $product['id'] ?>" class="btn btn-sm btn-info">View</a>
                        <a href="/products/<?= $product['id'] ?>/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/products/<?= $product['id'] ?>/delete" method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                Delete
                            </button>
                        </form>
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
?>