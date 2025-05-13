<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'header.php'; ?>

<div class="container">
    <h1 class="my-4">Edit Category</h1>
    
    <form action="<?= BASE_URL ?>categories/<?= $category['id'] ?>/update" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required 
                   value="<?= htmlspecialchars($category['name']) ?>">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= 
                htmlspecialchars($category['description']) 
            ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= BASE_URL ?>categories/<?= $category['id'] ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'footer.php'; ?>