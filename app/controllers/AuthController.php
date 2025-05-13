<?php
//equire_once __DIR__ . '/../models/User.php';
//require_once __DIR__ . '/../config/config.php';
require_once APP . DS . 'config' . DS . 'config.php';
require_once APP . DS . 'models' . DS . 'User.php';
class AuthController {
    private $db;
    private $userModel;
    
    public function __construct() {
        $this->db = Database::getInstance();
        $this->userModel = new User();
    }
    
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Validate input
                $required = ['username', 'email', 'password', 'confirm_password', 'first_name', 'last_name'];
                foreach ($required as $field) {
                    if (empty(trim($_POST[$field]))) {
                        throw new Exception("All fields marked with * are required");
                    }
                }
                
                if ($_POST['password'] !== $_POST['confirm_password']) {
                    throw new Exception("Passwords do not match");
                }
                
                if (strlen($_POST['password']) < 8) {
                    throw new Exception("Password must be at least 8 characters");
                }
                
                // Prepare user data
                $userData = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => $_POST['password'],
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'address' => !empty($_POST['address']) ? trim($_POST['address']) : null,
                    'phone' => !empty($_POST['phone']) ? trim($_POST['phone']) : null,
                    'profile_image' => null
                ];
                
                // Handle file upload
                if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
                    $userData['profile_image'] = User::uploadProfileImage($_FILES['profile_image']);
                }
                
                // Create user
                if ($this->userModel->create($userData)) {
                    $_SESSION['success'] = "Registration successful! You can now login";
                    header('Location: ' . BASE_URL . 'auth/login');
                    exit;
                }
                
                throw new Exception("Registration failed. Please try again.");
                
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                $_SESSION['form_data'] = $_POST;
                header('Location: ' . BASE_URL . 'auth/register');
                exit;
            }
        }
        
        // Load view
        $this->loadView('auth/register', [
            'title' => 'User Registration',
            'formData' => $_SESSION['form_data'] ?? []
        ]);
        
        unset($_SESSION['form_data']);
    }
    
    // Admin login
    public function login() {
    // Ensure session is started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (empty($username) || empty($password)) {
                throw new Exception("Username and password are required");
            }

            // Debug: Log login attempt
            error_log("Login attempt for: " . $username);

            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if (!$user) {
                throw new Exception("Invalid credentials");
            }

            if (!password_verify($password, $user['password'])) {
                throw new Exception("Invalid credentials");
            }

            // Set session data
            $_SESSION['user'] = $user;
            $_SESSION['last_activity'] = time();
            
            // Debug: Check session before redirect
            error_log("Session after login: " . print_r($_SESSION, true));

            // Verify the dashboard URL
            $dashboardUrl = BASE_URL . 'admin/dashboard';
            error_log("Redirecting to: " . $dashboardUrl);
            
            // Ensure no output before header
            if (headers_sent()) {
                throw new Exception("Headers already sent, cannot redirect");
            }
            
            header("Location: " . $dashboardUrl);
            exit();

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            error_log("Login error: " . $e->getMessage());
            header("Location: " . BASE_URL . "auth/login");
            exit();
        }
    }

    // Show login page with messages
    $error = $_SESSION['error'] ?? null;
    $success = $_SESSION['success'] ?? null;
    
    // Clear messages after displaying
    unset($_SESSION['error']);
    unset($_SESSION['success']);
    
    $this->loadView('auth/login', [
        'title' => 'Login',
        'error' => $error,
        'success' => $success
    ]);
}
    
    // Admin logout
    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'auth/login');
        exit;
    }
    
    // Admin profile update
    public function profile() {
        if (!isset($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate input
            $required = ['first_name', 'last_name', 'email'];
            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $_SESSION['error'] = "Please fill all required fields";
                    header('Location: ' . BASE_URL . 'auth/profile');
                    exit;
                }
            }
            
            // Handle password change if provided
            $passwordUpdate = '';
            $params = [
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['email'],
                $_POST['address'] ?? '',
                $_POST['phone'] ?? '',
                $_SESSION['admin']['id']
            ];
            
            if (!empty($_POST['new_password'])) {
                if (empty($_POST['current_password']) || 
                    !password_verify($_POST['current_password'], $_SESSION['admin']['password'])) {
                    $_SESSION['error'] = "Current password is incorrect";
                    header('Location: ' . BASE_URL . 'auth/profile');
                    exit;
                }
                
                $passwordUpdate = ', password = ?';
                $hashedPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                array_unshift($params, $hashedPassword);
            }
            
            // Update profile
            $stmt = $this->db->prepare("UPDATE users SET 
                first_name = ?, last_name = ?, email = ?, 
                address = ?, phone = ? $passwordUpdate 
                WHERE id = ?");
            
            if ($stmt->execute($params)) {
                // Update session data
                $_SESSION['admin']['first_name'] = $_POST['first_name'];
                $_SESSION['admin']['last_name'] = $_POST['last_name'];
                $_SESSION['admin']['email'] = $_POST['email'];
                $_SESSION['admin']['address'] = $_POST['address'] ?? '';
                $_SESSION['admin']['phone'] = $_POST['phone'] ?? '';
                
                if (!empty($_POST['new_password'])) {
                    $_SESSION['admin']['password'] = $hashedPassword;
                }
                
                $_SESSION['success'] = "Profile updated successfully";
                header('Location: ' . BASE_URL . 'auth/profile');
                exit;
            } else {
                $_SESSION['error'] = "Failed to update profile";
            }
        }
        
        $this->loadView('auth/profile', [
            'title' => 'Admin Profile',
            'admin' => $_SESSION['admin']
        ]);
    }
    
    private function loadView($view, $data = []) {
        extract($data);
        require_once APP . DS . 'views' . DS . $view . '.php';
    }
}