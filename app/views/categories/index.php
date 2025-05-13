<?php
$title = "Manage Categories";
$activePage = "categories"; 
ob_start();
?>
<div class="container">
    <h1 class="my-4">Manage Categories</h1>
    
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    
    <div class="mb-3">
        <a href="<?= BASE_URL ?>categories/create" class="btn btn-primary">Create New</a>
        <form class="d-inline float-right" action="<?= BASE_URL ?>categories/search" method="GET">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search categories...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= htmlspecialchars($category['name']) ?></td>
                <td><?= htmlspecialchars($category['slug']) ?></td>
                <td>
                    <a href="<?= BASE_URL ?>categories/<?= $category['id'] ?>" class="btn btn-sm btn-info">View</a>
                    <a href="<?= BASE_URL ?>categories/<?= $category['id'] ?>/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?= BASE_URL ?>categories/<?= $category['id'] ?>/delete" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';
?>
