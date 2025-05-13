<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'header.php'; ?>

<div class="container">
    <h1 class="my-4"><?= htmlspecialchars($category['name']) ?></h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category Details</h5>
            <p class="card-text"><strong>Slug:</strong> <?= htmlspecialchars($category['slug']) ?></p>
            <p class="card-text"><strong>Description:</strong> <?= htmlspecialchars($category['description']) ?></p>
            
            <div class="mt-3">
                <a href="<?= BASE_URL ?>categories/<?= $category['id'] ?>/edit" class="btn btn-warning">Edit</a>
                <form action="<?= BASE_URL ?>categories/<?= $category['id'] ?>/delete" method="POST" class="d-inline">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="<?= BASE_URL ?>categories" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>

<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'footer.php'; ?>