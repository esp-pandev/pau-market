<?php
$title = "Manage Users";
$activePage = "users"; 
ob_start();
?>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/users.css">
    <script src="<?php echo BASE_URL; ?>assets/js/admin.js"></script>
</head>
<body>
    <div class="users-management">
    <div class="header">
        <h1>Manage Users</h1>
        <a href="<?php echo BASE_URL; ?>auth/register" class="btn btn-primary mr-5">Create New</a>
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>                                       
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td class="actions">
                                <a href="admin/users<?= $user['id'] ?>" class="btn btn-sm btn-info">View</a>
                                <a href="<?php echo BASE_URL; ?>admin/users/edit/<?php echo $user['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo BASE_URL; ?>admin/users/delete" method="POST" class="d-inline">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
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
