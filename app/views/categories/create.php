<?php
$title = "Manage Categories";
$activePage = "categories"; 
ob_start();
?>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/create_categories.css">
    <script src="<?php echo BASE_URL; ?>assets/js/admin.js"></script>
</head>
<body>
    <div class="container">
    <h1 class="my-4">Create New Category</h1>
    
    <form action="<?= BASE_URL ?>categories/store" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required 
                   value="<?= isset($category['name']) ? htmlspecialchars($category['name']) : '' ?>">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= 
                isset($category['description']) ? htmlspecialchars($category['description']) : '' 
            ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?= BASE_URL ?>categories" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';
?>