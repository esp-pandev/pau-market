<?php
// Start session
session_start();

// Error reporting (development only)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define base path constants
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('APP', ROOT . DS . 'app');
define('CONTROLLERS', APP . DS . 'controllers');
define('MODELS', APP . DS . 'models');
define('VIEWS', APP . DS . 'views');
define('CONFIG', APP . DS . 'config');

// Load configuration
require_once CONFIG . DS . 'config.php';

// Database connection
try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Autoloader for controllers and models
spl_autoload_register(function($className) {
    $paths = [
        CONTROLLERS . DS . $className . '.php',
        MODELS . DS . $className . '.php'
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

/**
 * Handle 404 errors
 */
function handleNotFound() {
    header("HTTP/1.0 404 Not Found");
    if (class_exists('HomeController') && method_exists('HomeController', 'notFound')) {
        $controller = new HomeController(Database::getInstance());
        $controller->notFound();
    } else {
        die('404 - Page Not Found');
    }
    exit;
}

// Sanitize and parse URL
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';
$urlParts = explode('/', filter_var($url, FILTER_SANITIZE_URL));

// Handle product display catalog
if (count($urlParts) === 2 && $urlParts[0] === 'home' && $urlParts[1] === 'productDisplay') {
    $controllerName = 'HomeController';
    $actionName = 'productDisplay';
    
    $controllerFile = CONTROLLERS . DS . $controllerName . '.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        if (method_exists($controllerName, $actionName)) {
            $controller = new $controllerName($db);
            $controller->$actionName();
            exit;
        }
    }
}
// Handle product detail pages
elseif (count($urlParts) === 3 && $urlParts[0] === 'products' && $urlParts[1] === 'details') {
    $controllerName = 'HomeController';
    $actionName = 'productDetail';
    $productId = $urlParts[2]; // Get the product ID from URL
    
    $controllerFile = CONTROLLERS . DS . $controllerName . '.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        if (method_exists($controllerName, $actionName)) {
            $controller = new $controllerName($db);
            $controller->$actionName($productId);
            exit;
        }
    }
}
// Route configuration
$routes = [
    '' => ['controller' => 'Home', 'action' => 'index'],
    'products/productDisplay' => ['controller' => 'Products', 'action' => 'productDisplay'],
    'products' => ['controller' => 'Products', 'action' => 'index'],
    'about' => ['controller' => 'Home', 'action' => 'about'],
    'contact' => ['controller' => 'Home', 'action' => 'contact'],
    'categories/(\d+)' => ['controller' => 'Categories', 'action' => 'show']
];

// Match routes
$matched = false;
foreach ($routes as $pattern => $route) {
    $regex = '#^' . preg_replace('/\\\:([^\/]+)/', '(?P<$1>[^/]+)', preg_quote($pattern)) . '$#';
    
    if (preg_match($regex, $url, $matches)) {
        $controllerName = ucfirst($route['controller']) . 'Controller';
        $actionName = $route['action'];
        $params = array_slice($matches, 1);
        
        if (file_exists(CONTROLLERS . DS . $controllerName . '.php')) {
            require_once CONTROLLERS . DS . $controllerName . '.php';
            
            if (method_exists($controllerName, $actionName)) {
                $controller = new $controllerName($db);
                call_user_func_array([$controller, $actionName], $params);
                $matched = true;
                break;
            }
        }
    }
}

// Fallback to traditional routing if no route matched
if (!$matched) {
    $controllerName = ucfirst($urlParts[0] ?? 'home') . 'Controller';
    $actionName = $urlParts[1] ?? 'index';
    $params = array_slice($urlParts, 2);

    $controllerFile = CONTROLLERS . DS . $controllerName . '.php';
    
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        
        if (method_exists($controllerName, $actionName)) {
            $controller = new $controllerName($db);
            call_user_func_array([$controller, $actionName], $params);
            $matched = true;
        }
    }
}

// No route matched - 404
if (!$matched) {
    handleNotFound();
}