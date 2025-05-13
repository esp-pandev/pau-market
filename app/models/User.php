<?php
class User {
    private $db;
    private $data = [];
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    // Create new user
    public function create($userData) {
        // Validate required fields
        $required = ['username', 'email', 'password', 'first_name', 'last_name'];
        foreach ($required as $field) {
            if (empty($userData[$field])) {
                throw new Exception("The $field field is required");
            }
        }
        
        // Check if username/email exists
        if ($this->find($userData['username'], 'username') || $this->find($userData['email'], 'email')) {
            throw new Exception("Username or email already exists");
        }
        
        // Hash password
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        
        // Prepare SQL
        $fields = implode(', ', array_keys($userData));
        $placeholders = ':' . implode(', :', array_keys($userData));
        
        $query = "INSERT INTO users ($fields) VALUES ($placeholders)";
        $stmt = $this->db->prepare($query);
        
        if ($stmt->execute($userData)) {
            return $this->find($userData['username'], 'username');
        }
        
        return false;
    }
    
    // Find user by field
    public function find($value, $field = 'id') {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE $field = ? LIMIT 1");
        $stmt->execute([$value]);
        
        if ($stmt->rowCount() > 0) {
            $this->data = $stmt->fetch();
            return true;
        }
        
        return false;
    }
    
    // Get user data
    public function data() {
        return $this->data;
    }
    
    // Handle file upload
    public static function uploadProfileImage($file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        
        // Validate image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($file['tmp_name']);
        
        if (!in_array($fileType, $allowedTypes)) {
            throw new Exception("Only JPG, PNG, and GIF images are allowed");
        }
        
        // Create upload directory if not exists
        $uploadDir = ROOT . DS . 'assets' . DS . 'images' . DS . 'profiles' . DS;
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Generate unique filename
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . $fileExt;
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return 'assets/images/profiles/' . $fileName;
        }
        
        return null;
    }
}