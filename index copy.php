<?php
// Start session
session_start();

// Error reporting
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
define('PAGES', VIEWS . DS . 'home'); // Add constant for pages directory

// Verify and load configuration
$configFile = CONFIG . DS . 'config.php';
if (!file_exists($configFile)) {
    die('Configuration file missing!');
}
require_once $configFile;

// Get database connection
$db = Database::getInstance();

// Enhanced autoloader
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
    
    // Check if HomeController exists and has notFound method
    $homeControllerPath = CONTROLLERS . DS . 'HomeController.php';
    if (file_exists($homeControllerPath)) {
        require_once $homeControllerPath;
        if (method_exists('HomeController', 'notFound')) {
            $homeController = new HomeController(Database::getInstance());
            $homeController->notFound();
            exit;
        }
    }
    
    // Fallback to simple 404 message
    die('404 - Page Not Found');
}

// Sanitize and parse URL
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : DEFAULT_CONTROLLER . '/' . DEFAULT_ACTION;
$urlParts = explode('/', filter_var($url, FILTER_SANITIZE_URL));

// NEW: Handle direct page requests (like about)
if (count($urlParts) === 1 && $urlParts[0] === 'about') {
    $pageFile = PAGES . DS . 'about.php';
    if (file_exists($pageFile)) {
        require_once $pageFile;
        exit;
    } else {
        handleNotFound();
    }
}
/*
if (count($urlParts) === 1 && $urlParts[0] === 'productDisplay') {
    $pageFile = PAGES . DS . 'productDisplay.php';
    if (file_exists($pageFile)) {
        require_once $pageFile;
        exit;
    } else {
        handleNotFound();
    }
}*/
if (count($urlParts) === 1 && $urlParts[0] === 'contact') {
    $pageFile = PAGES . DS . 'contact.php';
    if (file_exists($pageFile)) {
        require_once $pageFile;
        exit;
    } else {
        handleNotFound();
    }
}

// Handle /categories/{id} pattern
if (count($urlParts) === 2 && $urlParts[0] === 'categories' && is_numeric($urlParts[1])) {
    $controllerName = 'CategoriesController';
    $actionName = 'show';
    $params = [$urlParts[1]];
    
    $controllerFile = CONTROLLERS . DS . $controllerName . '.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        if (method_exists($controllerName, $actionName)) {
            $controller = new $controllerName($db);
            call_user_func_array([$controller, $actionName], $params);
            exit;
        }
    }
}

// Original route handling
$controllerName = ucfirst($urlParts[0]) . 'Controller';
$actionName = isset($urlParts[1]) ? $urlParts[1] : DEFAULT_ACTION;

// Handle parameters
$params = array_slice($urlParts, 2);

// Verify controller exists
$controllerFile = CONTROLLERS . DS . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    handleNotFound();
}

require_once $controllerFile;

// Verify method exists
if (!method_exists($controllerName, $actionName)) {
    handleNotFound();
}

// Instantiate and execute
try {
    $controller = new $controllerName($db);
    call_user_func_array([$controller, $actionName], $params);
} catch (Exception $e) {
    error_log("Controller error: " . $e->getMessage());
    handleNotFound();
}