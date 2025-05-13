<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | PAU-MARKET</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="admin-dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1>PAU-MARKET</h1>
            <h2>Admin Dashboard</h2>
        </div>
        
        <ul class="sidebar-menu">
            <li><a href="<?php echo BASE_URL; ?>admin/dashboard" class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a></li>
            <li><a href="<?php echo BASE_URL; ?>admin/products" class="<?php echo $activePage === 'products' ? 'active' : ''; ?>">
                <i class="fas fa-box-open"></i> Products
            </a></li>
            <li><a href="<?php echo BASE_URL; ?>categories" class="<?php echo $activePage === 'categories' ? 'active' : ''; ?>">
                <i class="fas fa-tags"></i> Categories
            </a></li>
            <li><a href="<?php echo BASE_URL; ?>admin/users" class="<?php echo $activePage === 'users' ? 'active' : ''; ?>">
                <i class="fas fa-user"></i> Users
            </a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <header class="top-nav">
            <div class="user-info">
                <span>Welcome, <?php echo $_SESSION['user']['username']; ?></span>
                <div class="profile-dropdown">
                    <img src="<?php echo BASE_URL; ?>assets/images/default-profile.png" alt="Profile" class="profile-img">
                    <div class="dropdown-content">
                        <a href="<?php echo BASE_URL; ?>admin/profile"><i class="fas fa-user"></i> Profile</a>
                        <a href="<?php echo BASE_URL; ?>auth/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Content Area -->
        <main>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            
            <?php echo $content; ?>
        </main>
    </div>
    
    <script src="<?php echo BASE_URL; ?>assets/js/admin.js"></script>
</body>
</html>