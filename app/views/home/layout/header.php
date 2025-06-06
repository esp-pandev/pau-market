<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAU Farmers Market | Fresh Local Produce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Color Scheme */
        :root {
            --primary: #4a8f29; /* Fresh green */
            --secondary: #f5a623; /* Warm orange */
            --accent: #e74c3c; /* Tomato red */
            --light: #f8f9fa;
            --dark: #2c3e50;
            --text: #333;
            --background: #f9f7f0;
        }
        
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text);
            background-color: var(--background);
            padding-top: 80px; /* Space for fixed header */
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        img {
            max-width: 100%;
            height: auto;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: var(--primary);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        section {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .section-title p {
            max-width: 700px;
            margin: 0 auto;
            color: var(--text);
        }
        
        /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
            margin-right: 10px;
        }
        
        .logo h1 {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        /* Navigation Styles */
        #mainNav ul {
            display: flex;
            list-style: none;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        
        #mainNav li {
            margin-left: 25px;
            position: relative;
        }
        
        #mainNav li a {
            font-weight: 600;
            color: var(--dark);
            transition: all 0.3s;
            position: relative;
            padding: 5px 0;
        }
        
        #mainNav li a:hover {
            color: var(--primary);
        }
        
        /* Active Link Styling */
        #mainNav li a.active {
            color: var(--primary);
            font-weight: 700;
        }
        
        #mainNav li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            bottom: 0;
            left: 0;
            transition: width 0.3s;
        }
        
        #mainNav li a:hover::after,
        #mainNav li a.active::after {
            width: 100%;
        }
        
        /* Admin Login Button */
        .login-btn {
            background-color: var(--primary);
            color: white;
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .login-btn:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
        }
        
        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
            
            #mainNav ul {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: white;
                flex-direction: column;
                padding: 20px 0;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }
            
            #mainNav ul.show {
                display: flex;
            }
            
            #mainNav li {
                margin: 10px 0;
                padding: 0 20px;
                width: 100%;
            }
            
            .login-btn {
                margin: 10px 20px;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <h1>PAU Farmers Market</h1>
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            <nav id="mainNav">
                <ul id="navMenu">
                    <li><a href="<?= BASE_URL ?>" class="<?= ($currentPage ?? '') === 'home' ? 'active' : '' ?>">Home</a></li>
                    <li><a href="<?= BASE_URL ?>about" class="<?= ($currentPage ?? '') === 'about' ? 'active' : '' ?>">About</a></li>
                    <li><a href="<?= BASE_URL ?>home/productDisplay" class="<?= ($currentPage ?? '') === 'products' ? 'active' : '' ?>">Products</a></li>
                    <li><a href="<?= BASE_URL ?>contact" class="<?= ($currentPage ?? '') === 'contact' ? 'active' : '' ?>">Contact</a></li>
                    <li><a href="<?= BASE_URL ?>auth/login" class="login-btn <?= ($currentPage ?? '') === 'login' ? 'active' : '' ?>">Admin Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('navMenu').classList.toggle('show');
        });
    </script>
</body>
</html>