<?php
$title = "Manage Categories";
$activePage = "categories"; 
ob_start();
?>
<style>
    /* Main Container */
    .categories-container {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-top: 20px;
    }

    /* Header */
    .categories-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 15px;
    }

    .categories-header h1 {
        color: #2c3e50;
        font-weight: 600;
        margin: 0;
    }

    /* Alert Messages */
    .alert {
        border-radius: 5px;
        padding: 12px 15px;
        margin-bottom: 20px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    /* Action Bar */
    .action-bar {
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .search-form {
        width: 300px;
    }

    /* Table Styling */
    .categories-table {
        width: 100%;
        border-collapse: collapse;
    }

    .categories-table thead {
        background-color: #2e7d32;
        color: white;
    }

    .categories-table th {
        padding: 12px 15px;
        text-align: left;
    }

    .categories-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #dee2e6;
    }

    .categories-table tr:hover {
        background-color: #f1f1f1;
    }

    /* Button Styling */
    .btn {
        padding: 4px 8px;
        border-radius: 3px;
        font-size: 12px;
        text-decoration: none;
        margin-right: 3px;
        transition: all 0.2s ease;
        display: inline-block;
    }
     /* Action Buttons Container */
    .action-buttons {
        white-space: nowrap;
    }

    .btn-primary {
        background-color: #2e7d32;
        color: white;
        border: 1px solid #2e7d32;
    }

    /* Form in Action Buttons */
    .action-buttons form {
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    .btn-primary:hover {
        background-color: #1e5a21;
        border-color: #1e5a21;
    }

    .btn-info {
        background-color: #17a2b8;
        color: white;
        border: 1px solid #17a2b8;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        border: 1px solid #ffc107;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: 1px solid #dc3545;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }

    /* Form Elements */
    .form-control {
        border-radius: 4px;
        border: 1px solid #ced4da;
        padding: 8px 12px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #2e7d32;
        box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.25);
    }

    .input-group-append .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .action-bar {
            flex-direction: column;
        }
        
        .search-form {
            width: 100%;
            margin-top: 15px;
        }
        
        .categories-table {
            display: block;
            overflow-x: auto;
        }
    }
</style>

<div class="container categories-container">
    <div class="categories-header">
        <h1>Manage Categories</h1>
    </div>
    
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    
    <div class="action-bar">
        <a href="<?= BASE_URL ?>categories/create" class="btn btn-primary">Create New Category</a>
        <form class="search-form" action="<?= BASE_URL ?>categories/search" method="GET">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search categories...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    
    <table class="categories-table">
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
                    <div class="action-buttons">
                        <a href="<?= BASE_URL ?>categories/<?= $category['id'] ?>" class="btn btn-sm btn-info">View</a>
                        <a href="<?= BASE_URL ?>categories/<?= $category['id'] ?>/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?= BASE_URL ?>categories/<?= $category['id'] ?>/delete" method="POST" class="d-inline">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
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