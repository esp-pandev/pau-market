<?php
$title = "Create New Category";
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
    <div class="categories-management">
        <div class="header">
            <h1>Create New Category</h1>
            <a href="<?= BASE_URL ?>categories" class="btn btn-secondary">Back to List</a>
        </div>

        <?php if ($successMessage): ?>
            <div class="alert success"><?= htmlspecialchars($successMessage) ?></div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
            <div class="alert error"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>

        <?php if (isset($errors['general'])): ?>
            <div class="alert error"><?= htmlspecialchars($errors['general']) ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <form action="<?= BASE_URL ?>categories/store" method="POST" class="category-form">
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" required
                               value="<?= isset($data['name']) ? htmlspecialchars($data['name']) : '' ?>">
                        <?php if (isset($errors['name'])): ?>
                            <small class="text-danger"><?= htmlspecialchars($errors['name']) ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"><?= 
                            isset($data['description']) ? htmlspecialchars($data['description']) : '' 
                        ?></textarea>
                        <?php if (isset($errors['description'])): ?>
                            <small class="text-danger"><?= htmlspecialchars($errors['description']) ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Create Category</button>
                        <a href="<?= BASE_URL ?>categories" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';
?>
<?php
 if ($successMessage): ?>
    <div class="alert success">
        <?= htmlspecialchars($successMessage) ?>
        <button class="alert-close">&times;</button>
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
<?php endif; ?>