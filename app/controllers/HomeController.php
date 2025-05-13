<?php
class HomeController {
    public function index() {
        // Get database connection
        $db = Database::getInstance();
        
        // You can fetch data here if needed
        // $statement = $db->query("SELECT * FROM products LIMIT 5");
        // $products = $statement->fetchAll();
        
        // Load view
        $data = [
            'title' => 'PAU-MARKET - Home',
            // 'products' => $products
        ];
        
        $this->loadView('home/index', $data);
    }
    
    private function loadView($view, $data = []) {
        extract($data);
        require_once APP . DS . 'views' . DS . $view . '.php';
    }

    public function notFound() {
        // Load 404 view
        if (file_exists(VIEWS . DS . 'errors' . DS . '404.php')) {
            require VIEWS . DS . 'errors' . DS . '404.php';
        } else {
            echo '404 - Page Not Found';
        }
        exit;
    }
}