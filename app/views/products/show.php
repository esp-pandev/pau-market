<?php include 'partials/header.php'; ?>

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
                <a href="/products/<?= $product['id'] ?>/edit" class="btn btn-warning">Edit</a>
                <form action="/products/<?= $product['id'] ?>/delete" method="POST" class="d-inline">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>