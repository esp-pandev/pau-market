<?php
class AdminController {
    private $db;
    private $userModel;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->userModel = new User();
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

/**
     * Show edit form
     *
     * @param int $id User ID
     */
    public function edit($id) {
        // Only authenticated users
        $this->requireAuth();
        
        // Get users
        $user = $this->userModel->find($id);
        if (!$user) {
            // Redirect to users list
            header('Location: /admin/users');
            exit;
        }
        
        // Render view
        require VIEWS . DS . 'admin' . DS . 'edit.php';
    }

       /**
     * Show user details
     *
     * @param int $id User ID
     */
    public function show($id) {
        // Only authenticated users
        $this->requireAuth();
        
        // Get user
        $user = $this->userModel->find($id);
        if (!$user) {
            // Redirect to users list if not found
            header('Location: /admin');
            exit;
        }
        
        // Render view
        require VIEWS . DS . 'admin' . DS . 'show.php';
    }
    /**
     * Delete user
     */
    public function delete($id) {
        $this->requireAuth();

        try {
            // Prevent self-deletion
            if ($id == $_SESSION['user']['id']) {
                throw new Exception("You cannot delete your own account");
            }

            $userModel = new User();
            if (!$userModel->find($id)) {
                throw new Exception("User not found");
            }

            $user = $userModel->data();

            // Delete user
            if ($userModel->delete($id)) {
                // Delete profile image if exists
                if (!empty($user['profile_image']) && file_exists(ROOT . DS . $user['profile_image'])) {
                    unlink(ROOT . DS . $user['profile_image']);
                }
                
                $_SESSION['success'] = "User deleted successfully";
            } else {
                throw new Exception("Failed to delete user");
            }

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        header('Location: ' . BASE_URL . 'admin/users');
        exit;
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

/**
 * Ensure the current user is an admin
 */
protected function requireAdmin() {
    if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
        $_SESSION['error'] = "You do not have permission to access this page";
        header('Location: ' . BASE_URL . 'admin/dashboard');
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