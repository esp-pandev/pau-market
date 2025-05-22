<?php
$title = "Category Details: " . htmlspecialchars($category['name']);
$activePage = "categories";
ob_start();
?>

<div class="category-details">
    <h1><?= htmlspecialchars($category['name']) ?></h1>
    
    <div class="card">
        <div class="card-body">
            <dl>
                <dt>Slug</dt>
                <dd><?= htmlspecialchars($category['slug']) ?></dd>
                
                <dt>Description</dt>
                <dd><?= !empty($category['description']) ? htmlspecialchars($category['description']) : 'No description' ?></dd>
            </dl>
            
            <div class="actions">
                <a href="<?= BASE_URL ?>categories" class="btn btn-secondary">Back to List</a>
                <a href="<?= BASE_URL ?>categories/edit/<?= $category['id'] ?>" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';
?>