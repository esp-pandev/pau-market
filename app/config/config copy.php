<?php
// Application configuration
define('BASE_URL', 'http://localhost/pau-market/');
define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pau_farm_market');
define('DB_CHARSET', 'utf8mb4');

// Create database connection
class Database {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        $this->connection = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
            DB_USER, 
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    }
    
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}