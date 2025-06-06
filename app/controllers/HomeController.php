<?php
class HomeController {
    
    public function index() {
        $db = Database::getInstance();
        
        // Get featured products (last 5 days)
        $statement = $db->query("
            SELECT * FROM products 
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 5 DAY) 
            ORDER BY created_at DESC 
            LIMIT 8
        ");
        $featuredProducts = $statement->fetchAll();
        
        // Get regular products (for other sections if needed)
        $statement = $db->query("SELECT * FROM products LIMIT 5");
        $products = $statement->fetchAll();
        
        $data = [
            'title' => 'PAU-MARKET - Home',
            'featuredProducts' => $featuredProducts,
            'products' => $products
        ];
        
        $this->loadView('home/index', $data);
    }
    
    public function about() {
        // Load view
        $data = [
            'title' => 'PAU-MARKET - About Us'
        ];
        
        $this->loadView('home/about', $data);
    }

    public function productDetail($id) {
        $db = Database::getInstance();
        
        // Get product with category name by joining with categories table
        $statement = $db->prepare("
            SELECT p.*, c.name as category_name 
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.id = ?
        ");
        $statement->execute([$id]);
        $product = $statement->fetch();
        
        if (!$product) {
            $this->notFound();
            return;
        }
        
        // Get related products (e.g., same category, excluding current product)
        $relatedStatement = $db->prepare("
            SELECT * FROM products 
            WHERE category_id = ? AND id != ? 
            ORDER BY created_at DESC 
            LIMIT 4
        ");
        $relatedStatement->execute([$product['category_id'], $id]);
        $relatedProducts = $relatedStatement->fetchAll();

        $data = [
            'title' => 'PAU-MARKET - ' . $product['name'],
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ];
        
        $this->loadView('home/productDetail', $data);
    }
    // Public view (anonymous)
    public function productDisplay() {
        $db = Database::getInstance();
        $statement = $db->query("SELECT * FROM products");
        $products = $statement->fetchAll();
        
        $data = [
            'title' => 'PAU-MARKET - Products',
            'products' => $products
        ];
        
        $this->loadView('home/productDisplay', $data);
    }

    public function contact() {
        // Load view
        $data = [
            'title' => 'PAU-MARKET - Contact Us'
        ];
        
        $this->loadView('home/contact', $data);
    }
    // Helper method to load views
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