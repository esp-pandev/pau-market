<?php
// Start session
session_start();

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define base path
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('APP', ROOT . DS . 'app');

// Verify config file exists
if (!file_exists(APP . DS . 'config' . DS . 'config.php')) {
    die('Configuration file missing!');
}

// Load configuration
require_once APP . DS . 'config' . DS . 'config.php';

// Get database connection
$db = Database::getInstance();

// Simple autoloader
spl_autoload_register(function($className) {
    $file = APP . DS . 'controllers' . DS . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Default route
$url = isset($_GET['url']) ? $_GET['url'] : DEFAULT_CONTROLLER . '/' . DEFAULT_ACTION;
$urlParts = explode('/', rtrim($url, '/'));

// Handle categories routes
if ($urlParts[0] === 'categories') {
    $controllerName = 'CategoriesController';
    $actionName = isset($urlParts[1]) ? $urlParts[1] : 'index';
    
    // Handle routes with IDs (like edit/1, delete/1)
    if (isset($urlParts[2]) && is_numeric($urlParts[2])) {
        $id = (int)$urlParts[2];
        $actionName = $urlParts[1]; // edit or delete
        
        require_once APP . DS . 'controllers' . DS . $controllerName . '.php';
        $controller = new $controllerName($db);
        
        if (method_exists($controller, $actionName)) {
            $controller->$actionName($id);
            exit;
        }
    }
    
    // Standard categories routes (create, store, etc.)
    require_once APP . DS . 'controllers' . DS . $controllerName . '.php';
    
    if (!method_exists($controllerName, $actionName)) {
        $actionName = 'index'; // Fallback to index
    }
    
    $controller = new $controllerName($db);
    $controller->$actionName();
    exit;
}

// Standard routing for other controllers
$controllerName = ucfirst($urlParts[0]) . 'Controller';
$actionName = isset($urlParts[1]) ? $urlParts[1] : DEFAULT_ACTION;

// Verify controller exists
if (!file_exists(APP . DS . 'controllers' . DS . $controllerName . '.php')) {
    header('Location: ' . BASE_URL . 'home/notfound');
    exit;
}

require_once APP . DS . 'controllers' . DS . $controllerName . '.php';

// Verify method exists
if (!method_exists($controllerName, $actionName)) {
    header('Location: ' . BASE_URL . 'home/notfound');
    exit;
}

// Execute
$controller = new $controllerName($db);
$controller->$actionName();