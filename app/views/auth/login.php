<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | PAU-MARKET</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/auth.css">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-header">
            <h1 >Login</h1>
            <h4>Welcome back! Please enter your PAU Market Admin Panel login credentials to login.</h4>
        </div>
        <?php if (isset($error)): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($success)): ?>
            <div class="alert success">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo BASE_URL; ?>auth/login">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        
        <div class="auth-footer">
            Note: Access to Administration Panel is restricted to admin users only. <a href="<?php echo BASE_URL; ?>/">Back to Home</a>
        </div>
    </div>
</body>
</html>