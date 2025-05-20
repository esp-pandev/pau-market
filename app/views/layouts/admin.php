<?php
// Initialize activePage with a default value if not set
$activePage = $activePage ?? 'dashboard'; // Default to 'dashboard' if not defined
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | PAU-MARKET</title>
    <!--<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">-->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!--plugins-->
   <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/plugins/simplebar/css/simplebar.css">
   <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
   <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/plugins/metismenu/css/metisMenu.min.css">
   <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/plugins/datatable/css/dataTables.bootstrap5.min.css">

	<!-- loader-->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/pace.min.css">
    <script src="<?php echo BASE_URL; ?>assets/libraries/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/bootstrap-extended.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/app.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/icons.css">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/dark-theme.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/semi-dark.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/header-colors.css">
</head>
<body>
	<div class="wrapper">
    <!-- Sidebar -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?php echo BASE_URL; ?>assets/images/logo.png" class="logo-icon" alt="logo icon" style="width: 100%; height: auto;">
				</div>
				<div>
					<h4 class="logo-text"></h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			
			<ul class="metismenu" id="menu">
				<li><a href="<?php echo BASE_URL; ?>admin/dashboard" class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
					<i class="fas fa-tachometer-alt"></i> Admin Dashboard
				</a></li>
				<li><a href="<?php echo BASE_URL; ?>products" class="<?php echo $activePage === 'products' ? 'active' : ''; ?>">
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
	<!-- Top Navigation -->
	<header>
		<div class="topbar d-flex align-items-center">
			<nav class="navbar navbar-expand gap-3">
				<div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
				<div class="user-box dropdown px-3">
					<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<span>Welcome, <?php echo $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'] ?? 'Guest'; ?></span>
						<div class="profile-dropdown">
							<img src="<?php echo BASE_URL; ?>assets/images/default-profile.png" alt="Profile" class="profile-img">
							<div class="dropdown-content">
								<a href="<?php echo BASE_URL; ?>admin/profile"><i class="fas fa-user"></i> Profile</a>
								<a href="<?php echo BASE_URL; ?>auth/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
							</div>
						</div>
					</a>
				</div>
			</nav>
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

<!-- Bootstrap JS -->
	<script src="<?php echo BASE_URL; ?>assets/libraries/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?php echo BASE_URL; ?>assets/libraries/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/libraries/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/libraries/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/libraries/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/libraries/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>