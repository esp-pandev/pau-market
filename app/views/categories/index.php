<?php
$title = "Manage Caegories";
$activePage = "categories"; 
ob_start();
?>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/categories.css">
    <script src="<?php echo BASE_URL; ?>assets/js/admin.js"></script>
</head>
<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Display flash message if exists
if (isset($_SESSION['flash_message'])) {
    echo '<div class="alert ' . $_SESSION['flash_message']['type'] . '">' 
         . htmlspecialchars($_SESSION['flash_message']['text']) 
         . '</div>';
    // Remove the message so it doesn't show again
    unset($_SESSION['flash_message']);
}
?>
<body>
    <div class="users-management">
    <div class="header">
        <h1>Manage Categories</h1>
        <a href="<?php echo BASE_URL; ?>categories/create" class="btn btn-primary">Create New</a>
    </div>

    <?php if (isset($success)): ?>
        <div class="alert success"><?php echo $success; ?></div>
    <?php endif; ?>
    
    <?php if (isset($error)): ?>
        <div class="alert error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= htmlspecialchars($category['name']) ?></td>
                                    <td><?= htmlspecialchars($category['slug']) ?></td>
                                    <td><?= htmlspecialchars($category['description']) ?></td>
                                    <td>
                                        <div class="actions">
                                            <a href="<?= BASE_URL ?>categories/show/<?= $category['id'] ?>" class="btn btn-sm btn-info">View</a>
                                            <a href="<?= BASE_URL ?>categories/edit/<?= $category['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="<?= BASE_URL ?>categories/delete/<?= $category['id'] ?>" method="POST" class="d-inline">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
</body>
</html>

<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';
?>
