<?php
$title = "Edit Category";
$activePage = "categories"; 

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get flash messages and clear them
$successMessage = $_SESSION['flash_success'] ?? null;
$errorMessage = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

// Get form data and errors from session if they exist
$data = $_SESSION['form_data'] ?? [];
$errors = $_SESSION['form_errors'] ?? [];
unset($_SESSION['form_data'], $_SESSION['form_errors']);

ob_start();
?>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/categories.css">
    <script src="<?php echo BASE_URL; ?>assets/js/admin.js"></script>
</head>
<body>
    <div class="edit-category-container">
        <h1 class="page-title">Edit Category: <?= htmlspecialchars($category['name']) ?></h1>
        <a href="<?= BASE_URL ?>categories" class="back-link">← Back to List</a>

        <?php if ($successMessage): ?>
            <div class="alert success">
                <?= htmlspecialchars($successMessage) ?>
                <button class="alert-close">&times;</button>
            </div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
            <div class="alert error">
                <?= htmlspecialchars($errorMessage) ?>
                <button class="alert-close">&times;</button>
            </div>
        <?php endif; ?>

        <?php if (isset($errors['general'])): ?>
            <div class="alert error"><?= htmlspecialchars($errors['general']) ?></div>
        <?php endif; ?>

        <div class="edit-form-wrapper">
            <form action="<?= BASE_URL ?>categories/update/<?= $category['id'] ?>" method="POST" class="edit-category-form">
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input type="text" name="name" id="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" 
                           value="<?= isset($data['name']) ? htmlspecialchars($data['name']) : htmlspecialchars($category['name']) ?>" required>
                    <?php if (isset($errors['name'])): ?>
                        <small class="text-danger"><?= htmlspecialchars($errors['name']) ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" 
                           value="<?= htmlspecialchars($category['slug']) ?>" readonly>
                    <?php if (isset($errors['slug'])): ?>
                        <small class="text-danger"><?= htmlspecialchars($errors['slug']) ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4"><?= 
                        isset($data['description']) ? htmlspecialchars($data['description']) : htmlspecialchars($category['description']) 
                    ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <small class="text-danger"><?= htmlspecialchars($errors['description']) ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                    <button type="button" onclick="window.location.href='<?= BASE_URL ?>categories'" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add click handler for close button
        document.querySelector('.alert-close')?.addEventListener('click', function() {
            this.parentElement.style.display = 'none';
        });
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) alert.style.display = 'none';
        }, 5000);
    </script>
</body>
</html>
<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';