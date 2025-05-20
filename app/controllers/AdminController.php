<?php
class AdminController {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->checkAuth();
    }
    
    private function checkAuth() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Please login to access this page";
            header("Location: " . BASE_URL . "auth/login");
            exit();
        }
    }
    
    public function dashboard() {
        // Debug: Verify session in dashboard
        error_log("Dashboard accessed by: " . ($_SESSION['user']['username'] ?? 'unknown'));
        
        // Get user count
        $usersCount = $this->getUsersCount();
        
        //Get Categories count
        $categoriesCount = $this->getCategoriesCount();
       
        // Get products count
        $productsCount = $this->getProductsCount();
        // Load dashboard view
        $this->loadView('admin/dashboard', [
            'title' => 'Dashboard',
            'user' => $_SESSION['user'],
            'usersCount' => $usersCount,
            'categoriesCount' => $categoriesCount,
            'productsCount' => $productsCount,     
            
            // You can add productsCount and categoriesCount here when available
        ]);
    }

    /**
     * Count all users in the database
     * @return int Number of users
     */
    private function getUsersCount() {
        try {
            $stmt = $this->db->query("SELECT COUNT(*) as count FROM users");
            $result = $stmt->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            error_log("Error counting users: " . $e->getMessage());
            return 0; // Return 0 if there's an error
        }
    }
    
    public function users() {
    // Ensure user is authenticated
    $this->requireAuth();

    try {
        // Get all users from database
        $stmt = $this->db->query("SELECT * FROM users ORDER BY created_at DESC");
        $users = $stmt->fetchAll();

        // Load view with user data
        $this->loadView('admin/users', [
            'title' => 'Manage Users',
            'users' => $users,
            'success' => $_SESSION['success'] ?? null,
            'error' => $_SESSION['error'] ?? null
        ]);
        
        // Clear flash messages
        unset($_SESSION['success'], $_SESSION['error']);

    } catch (PDOException $e) {
        $_SESSION['error'] = "Failed to fetch users: " . $e->getMessage();
        header('Location: ' . BASE_URL . 'admin/dashboard');
        exit;
    }
}

protected function requireAuth() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['user'])) {
        $_SESSION['error'] = "Please login to access this page";
        header('Location: ' . BASE_URL . 'auth/login');
        exit;
    }
}

    private function getCategoriesCount() {
        try {
            $stmt = $this->db->query("SELECT COUNT(*) as count FROM categories");
            $result = $stmt->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            error_log("Error counting categories: " . $e->getMessage());
            return 0; // Return 0 if there's an error
        }
    }

    private function getProductsCount() {
        try {
            $stmt = $this->db->query("SELECT COUNT(*) as count FROM products");
            $result = $stmt->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            error_log("Error counting categories: " . $e->getMessage());
            return 0; // Return 0 if there's an error
        }
    }

    private function loadView($view, $data = []) {
        extract($data);
        require_once APP . DS . 'views' . DS . $view . '.php';
    }
}