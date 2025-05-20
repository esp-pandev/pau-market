<?php 
$activePage = 'dashboard';
ob_start(); 
?>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/fontawesome.min.css">
    <script src="<?php echo BASE_URL; ?>assets/js/fontawesome.min.js"></script>
</head>
<body>
    <div class="wrapper">
    <h1>Dashboard Overview</h1>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Users</p>
                                    <h4 class="my-1 text-info"><?php echo $usersCount; ?></h4>
                                    <a href="<?php echo BASE_URL; ?>admin/users" class="stat-link">View Users</a>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='fas fa-user'></i>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Products</p>
                                    <h4 class="my-1 text-info"><?php echo $productsCount; ?></h4>
                                    <a href="<?php echo BASE_URL; ?>products" class="stat-link">View Products</a>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='fas fa-box-open' ></i>
							   </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Categories</p>
                                    <h4 class="my-1 text-info"><?php echo $categoriesCount; ?></h4>
                                    <a href="<?php echo BASE_URL; ?>categories" class="stat-link">View Categories</a>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='fas fa-tags'></i>
							   </div>
                            </div>
                        </div>
                    </div>
                </div>
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