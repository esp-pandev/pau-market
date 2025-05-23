<?php
// views/home/layout/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'PAU-MARKET') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css">-->
    <style>
        :root {
            --primary: #4e8c3f;
            --primary-dark: #3a6b2f;
            --secondary: #f8b400;
            --dark: #2d3436;
            --light: #f9f9f9;
            --gray: #e0e0e0;
            --text: #333;
            --text-light: #666;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--text);
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
        font-size: 2rem;
        font-weight: bold;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .logo img {
            height: 50px;
        }
        
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .navbar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: transparent;
        z-index: 100;
        }

        .nav-links {
        display: flex;
        gap: 2rem;
        }

        .nav-links a {
        color: white;
        text-decoration: none;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
        }

        .login-btn {
        background-color: var(--secondary);
        color: var(--dark);
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        nav a {
            color: var(--dark);
            font-weight: 600;
            padding: 0.5rem 0;
            position: relative;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: var(--primary);
        }
        
        nav a.active {
            color: var(--primary);
        }
        
        nav a.active::after,
        nav a:hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s;
        }
        
        .login-btn {
            background-color: var(--primary);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .login-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        /* Main Content */
        main {
            flex: 1;
            padding: 2rem 0;
        }
        
        @media (max-width: 768px) {
        .hero {
            height: 80vh;
        }
        
        .hero h1 {
            font-size: 2.5rem;
        }
        
        .hero h2 {
            font-size: 1.8rem;
        }
        
        .nav-links {
            display: none; 
        }
    }@media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            nav ul {
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="<?= BASE_URL ?>assets/images/logo.png" alt="PAU-MARKET Logo">
                <!--<span class="logo-text">PAU-MARKET</span>-->
            </div>
            
            <nav>
                <ul>
                    <li><a href="<?= BASE_URL ?>" <?= ($currentPage ?? '') === 'home' ? 'class="active"' : '' ?>>Home</a></li>
                    <li><a href="<?= BASE_URL ?>about" <?= ($currentPage ?? '') === 'about' ? 'class="active"' : '' ?>>About</a></li>
                    <li><a href="<?= BASE_URL ?>home/productDisplay" <?= ($currentPage ?? '') === 'products' ? 'class="active"' : '' ?>>Products</a></li>
                    <li><a href="<?= BASE_URL ?>contact" <?= ($currentPage ?? '') === 'contact' ? 'class="active"' : '' ?>>Contact</a></li>
                </ul>
            </nav>
            
            <a href="<?= BASE_URL ?>auth/login" class="login-btn">Admin Login</a>
        </div>
    </header>
    
    <main>