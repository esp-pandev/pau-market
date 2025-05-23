<?php
/**
 * Categories controller
 *
 * Handles CRUD operations for categories
 */
class CategoriesController {
    /**
     * Category model
     *
     * @var Category
     */
    private $categoryModel;

    /**
     * Database connection
     *
     * @var PDO
     */
    private $db;
    
    /**
     * Constructor
     *
     * @param PDO $db Database connection
     */
    public function __construct($db) {
        $this->db = $db;
        $this->categoryModel = new Category($db);
    }

        /**
     * Check if user is authenticated
     * Redirects to login page if not
     */
    public function ensureAuthenticated() {
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        // Store current URL for redirect back after login
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        
        // Redirect to login page
        header('Location: ' . BASE_URL . 'auth/login');
        exit;
    }
    
    // Additional role-based checks can be added here if needed
}
    
    /**
     * List all categories
     */
    public function index() {
        // Only authenticated users
        $this->ensureAuthenticated();
        
        // Get all categories
        $categories = $this->categoryModel->getAll();
        // Render view
        require VIEWS . DS . 'categories' . DS . 'index.php';
    }
    
    /**
     * Show create form
     */
    public function create() {
        // Only authenticated users
        $this->ensureAuthenticated();
        
        // Render view
        require VIEWS . DS . 'categories' . DS . 'create.php';
    }
    
        /**
     * Store new category
     *
     * Handles form submission, validates data, and creates new category
     * Redirects on success or shows form with errors on failure
     */
    public function store() {
    // Only authenticated users
    $this->ensureAuthenticated();
    
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Validate and store new category
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Gather and sanitize input data
        $data = [
            'name' => trim($_POST['name']),
            'slug' => $this->generateSlug(trim($_POST['name'])),
            'description' => trim($_POST['description'])
        ];
        
        // Validate
        $errors = [];
        if (empty($data['name'])) {
            $errors['name'] = 'Name is required';
        }
        
        if ($this->categoryModel->slugExists($data['slug'])) {
            $errors['slug'] = 'Slug already exists';
        }
        
        if (empty($errors)) {
            // Attempt to create category
            if ($this->categoryModel->create($data)) {
                // Set success message in session
                $_SESSION['flash_message'] = [
                    'type' => 'success',
                    'text' => 'Category added successfully!'
                ];
                // Redirect on success
                header('Location: ' . BASE_URL . 'categories');
                exit;
            } else {
                $errors['general'] = 'Failed to create category';
            }
        }
        
        // Store errors and form data in session for repopulation
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_data'] = $data;
        header('Location: ' . BASE_URL . 'categories/create');
        exit;
    } else {
        // Redirect to create form
        header('Location: ' . BASE_URL . 'categories/create');
        exit;
    }
}

    /**
     * Validate category data
     *
     * @param array $data Category data to validate
     * @return array Array of validation errors
     */
    private function validateCategoryData($data) {
        $errors = [];
        
        // Name validation
        if (empty($data['name'])) {
            $errors['name'] = 'Name is required';
        } elseif (strlen($data['name']) > 255) {
            $errors['name'] = 'Name cannot exceed 255 characters';
        }
        
        // Slug validation
        if ($this->categoryModel->slugExists($data['slug'])) {
            $errors['slug'] = 'This name would create a duplicate slug. Please choose a different name.';
        }
        
        // Description validation
        if (!empty($data['description']) && strlen($data['description']) > 2000) {
            $errors['description'] = 'Description cannot exceed 2000 characters';
        }
        
        return $errors;
    }

        /**
     * Show category details
     *
     * @param int $id Category ID
     */
    public function show($id) {
        // Only authenticated users
        $this->ensureAuthenticated();
        
        // Get category
        $category = $this->categoryModel->getById($id);
        if (!$category) {
            // Redirect to categories list if not found
            header('Location: /categories');
            exit;
        }
        
        // Render view
        require VIEWS . DS . 'categories' . DS . 'show.php';
    }
    
    /**
     * Show edit form
     *
     * @param int $id Category ID
     */
    public function edit($id) {
        // Only authenticated users
        $this->ensureAuthenticated();
        
        // Get category
        $category = $this->categoryModel->getById($id);
        if (!$category) {
            // Redirect to categories list
            header('Location: /categories');
            exit;
        }
        
        // Render view
        require VIEWS . DS . 'categories' . DS . 'edit.php';
    }
    
    /**
     * Update category
     *
     * @param int $id Category ID
     */
    public function update($id) {
        // Ensure user is authenticated
        $this->ensureAuthenticated();
        
        // Retrieve the category by ID
        $category = $this->categoryModel->getById($id);
        if (!$category) {
            // Redirect to categories list if category not found
            header('Location: ' . BASE_URL . 'categories');
            exit;
        }
        
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Gather and sanitize input data
            $data = [
                'name' => trim($_POST['name']),
                'slug' => $this->generateSlug(trim($_POST['name'])),
                'description' => trim($_POST['description']),
            ];
            
            // Initialize an array for validation errors
            $errors = [];
            
            // Validate name field
            if (empty($data['name'])) {
                $errors['name'] = 'Name is required';
            }
            
            // Check for slug uniqueness
            if ($this->categoryModel->slugExists($data['slug'], $id)) {
                $errors['slug'] = 'Slug already exists';
            }
            
            // If no validation errors, attempt to update category
            if (empty($errors)) {
                if ($this->categoryModel->update($id, $data)) {
                    // Redirect to categories list on success
                    header('Location: ' . BASE_URL . 'categories');
                    exit;
                } else {
                    // Set a general error message on failure
                    $errors['general'] = 'Failed to update category';
                }
            }
            
            // If there are errors, render the edit view with errors
            include __DIR__ . '/../views/categories/edit.php';
        } else {
            // Redirect to the edit form if request method is not POST
            header('Location: /categories/edit/' . $id);
            exit;
        }
    }
    
    /**
     * Delete category
     *
     * @param int $id Category ID
     */
    public function delete($id) {
        // Only authenticated users
        $this->ensureAuthenticated();
        
        // Delete category
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->categoryModel->delete($id);
        }
        // Redirect to categories list
        header('Location: ' . BASE_URL . 'categories');
        exit;
    }
    
    
    /**
     * Generate a URL-friendly slug from a given string.
     *
     * @param string $string The input string to generate a slug from.
     * @return string The generated slug.
     */
    private function generateSlug($string) {
        // Convert the string to lowercase and trim whitespace
        $slug = strtolower(trim($string));
        
        // Replace non-alphanumeric characters with a dash
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        
        // Replace multiple consecutive dashes with a single dash
        $slug = preg_replace('/-+/', '-', $slug);
        
        return $slug;
    }
}
?>
