<?php
$title = "Product Details: " . htmlspecialchars($product['name']);
$activePage = "products";
ob_start();
?>

<div class="container">
    <h1><?= $product['name'] ?></h1>
    
    <div class="row">
        <div class="col-md-6">
            <img src="/public/uploads/products/<?= $product['image'] ?>" class="img-fluid" alt="<?= $product['name'] ?>">
        </div>
        <div class="col-md-6">
            <p><strong>Price:</strong> $<?= number_format($product['price'], 2) ?> per <?= $product['unit'] ?></p>
            <p><strong>Available Quantity:</strong> <?= $product['quantity_available'] ?></p>
            <p><strong>Description:</strong></p>
            <p><?= nl2br($product['description']) ?></p>
            
            <div class="mt-4">
                <a href="<?= BASE_URL ?>products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <form action="<?= BASE_URL ?>products/delete/<?= $product['id'] ?>" method="POST" class="d-inline">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-sm btn-danger" 
                            onclick="return confirm('Are you sure you want to delete this product?')">
                            Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';
?>