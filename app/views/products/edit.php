<?php
$title = "Edit Product";
$activePage = "products"; 
ob_start();
?>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/create_products.css">
    <script src="<?php echo BASE_URL; ?>assets/js/admin.js"></script>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Edit Product: <?= htmlspecialchars($product['name']) ?></h1>
            
            <!-- Error Messages -->
            <div class="alert alert-danger" style="display: none;" id="error-container">
                <ul class="mb-0" id="error-list">
                    <!-- Errors will be inserted here dynamically -->
                </ul>
            </div>
            
            <!-- Success Message 
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success_message'] ?>
                    <?php unset($_SESSION['success_message']); ?>
                </div>
            <?php endif; ?>-->
            
            <form action="<?= BASE_URL ?>products/update/<?= $product['id'] ?>" id="product-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                
                <div class="row">
                    <div class="form-group">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name'] ?? '') ?>" required>
                        <div class="invalid-feedback">Please provide a product name.</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select a Category</option>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= htmlspecialchars($category['id']) ?>" 
                                        <?= (isset($product['category_id']) && $category['id'] == $product['category_id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($category['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No categories available</option>
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">Please select a category.</div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                    <div class="invalid-feedback">Please provide a description.</div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">K</span>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= htmlspecialchars($product['price'] ?? '') ?>" required>
                        </div>
                        <div class="invalid-feedback">Please enter a valid price.</div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="quantity_available" class="form-label">Quantity Available</label>
                        <input type="number" class="form-control" id="quantity_available" name="quantity_available" value="<?= htmlspecialchars($product['quantity_available'] ?? 0) ?>" required>
                        <div class="invalid-feedback">Please enter a valid quantity.</div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <select class="form-control" id="unit" name="unit">
                            <option value="kg" <?= (isset($product['unit']) && $product['unit'] == 'kg') ? 'selected' : '' ?>>kg</option>
                            <option value="g" <?= (isset($product['unit']) && $product['unit'] == 'g') ? 'selected' : '' ?>>g</option>
                            <option value="dozen" <?= (isset($product['unit']) && $product['unit'] == 'dozen') ? 'selected' : '' ?>>dozen</option>
                            <option value="lb" <?= (isset($product['unit']) && $product['unit'] == 'lb') ? 'selected' : '' ?>>lb</option>
                            <option value="oz" <?= (isset($product['unit']) && $product['unit'] == 'oz') ? 'selected' : '' ?>>oz</option>
                            <option value="piece" <?= (isset($product['unit']) && $product['unit'] == 'piece') ? 'selected' : '' ?>>piece</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <?php if (!empty($product['image'])): ?>
                        <div class="mb-2">
                            <img src="<?= BASE_URL . $product['image'] ?>" 
                                alt="Current product image" 
                                style="max-width: 200px; max-height: 200px;" 
                                class="img-thumbnail">
                            <div class="form-text">Current image</div>
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <div class="form-text">Max size: 2MB. Allowed types: JPG, PNG, GIF.</div>
                    <div class="invalid-feedback">Please upload a valid image.</div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="<?= BASE_URL ?>products" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('product-form').addEventListener('submit', function(event) {
    let isValid = true;
    const form = event.target;
    
    // Reset validation
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    document.getElementById('error-container').style.display = 'none';
    document.getElementById('error-list').innerHTML = '';
    
    // Validate required fields
    const requiredFields = ['name', 'category_id', 'description', 'price', 'quantity_available'];
    const errors = [];
    
    requiredFields.forEach(field => {
        const input = form.querySelector(`[name="${field}"]`);
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            errors.push(`Please fill in the ${input.labels[0].textContent.toLowerCase()} field.`);
            isValid = false;
        }
    });
    
    // Validate price
    const priceInput = form.querySelector('[name="price"]');
    if (priceInput.value && (isNaN(priceInput.value) || parseFloat(priceInput.value) <= 0)) {
        priceInput.classList.add('is-invalid');
        errors.push('Please enter a valid price (greater than 0).');
        isValid = false;
    }
    
    // Validate quantity
    const quantityInput = form.querySelector('[name="quantity_available"]');
    if (quantityInput.value && (isNaN(quantityInput.value) || parseInt(quantityInput.value) < 0)) {
        quantityInput.classList.add('is-invalid');
        errors.push('Please enter a valid quantity (0 or more).');
        isValid = false;
    }
    
    // Validate image if provided
    const imageInput = form.querySelector('[name="image"]');
    if (imageInput.files.length > 0) {
        const file = imageInput.files[0];
        const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        const maxSize = 2 * 1024 * 1024; // 2MB
        
        if (!validTypes.includes(file.type)) {
            imageInput.classList.add('is-invalid');
            errors.push('Only JPG, PNG, and GIF images are allowed.');
            isValid = false;
        }
        
        if (file.size > maxSize) {
            imageInput.classList.add('is-invalid');
            errors.push('Image size must be less than 2MB.');
            isValid = false;
        }
    }
    
    if (!isValid) {
        event.preventDefault();
        const errorContainer = document.getElementById('error-container');
        const errorList = document.getElementById('error-list');
        
        errors.forEach(error => {
            const li = document.createElement('li');
            li.textContent = error;
            errorList.appendChild(li);
        });
        
        errorContainer.style.display = 'block';
        
        // Scroll to error messages
        errorContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
});
</script>

</body>
</html>
<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';
?>