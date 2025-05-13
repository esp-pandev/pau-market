<?php 
$activePage = 'dashboard';
ob_start(); 
?>
<div class="dashboard">
    <h1>Dashboard Overview</h1>
    
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Users</h3>
            <p><?php echo $usersCount; ?></p>
            <a href="<?php echo BASE_URL; ?>admin/users" class="stat-link">View Users</a>
        </div>
        <div class="stat-card">
            <h3>Total Products</h3>
            <!--<p><?php echo $productsCount; ?></p> -->
            <a href="<?php echo BASE_URL; ?>admin/products" class="stat-link">View Products</a>
        </div>
        <div class="stat-card">
            <h3>Total Categories</h3>
            <!--<p><?php echo $categoriesCount; ?></p>-->
            <a href="<?php echo BASE_URL; ?>admin/categories" class="stat-link">View Categories</a>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'admin' . DS . 'layout.php';
?>