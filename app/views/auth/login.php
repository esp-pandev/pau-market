<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | PAU-MARKET</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/auth.css">
    <style>
        /* Background styling */
        body.auth-page {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://images.unsplash.com/photo-1606787366850-de6330128bfc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .auth-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            margin: 20px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h1 {
            color: #2e7d32;
            font-size: 2.2rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .auth-header h4 {
            color: #555;
            font-weight: 400;
            font-size: 1rem;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2e7d32;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #2e7d32;
            outline: none;
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #2e7d32;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #1b5e20;
        }

        .auth-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.9rem;
            color: #666;
            line-height: 1.5;
        }

        .auth-footer a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .alert.error {
            background-color: #ffebee;
            color: #c62828;
            border-left: 4px solid #c62828;
        }

        .alert.success {
            background-color: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #2e7d32;
        }

        @media (max-width: 576px) {
            .auth-container {
                padding: 30px 20px;
            }
            
            .auth-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-header">
            <h1>Login</h1>
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
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" required autofocus>
                <?php if (isset($errors['username'])): ?>
                    <div class="invalid-feedback">
                        <?php echo $errors['username']; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        
        <div class="auth-footer">
            Note: Access to Administration Panel is restricted to admin users only. <a href="<?php echo BASE_URL; ?> ">Back to Home</a>
        </div>
    </div>
</body>
</html>