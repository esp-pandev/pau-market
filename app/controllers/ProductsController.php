<?php
class ProductsController {
    private $productModel;
    private $categoryModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->productModel = new Product($db);
        $this->categoryModel = new Category($db);
    }

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
    
    }
    // List all products
    public function index() {
        // Only authenticated users
        $this->ensureAuthenticated();

        $products = $this->productModel->getAllProducts();
        // Get all categories from Category model
        $categories = $this->categoryModel->getAll();
        
        // Create a category map for quick lookup
        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category['id']] = $category['name'];
        }
        require VIEWS . DS . 'products' . DS . 'index.php';
    }

    // Show single product
    public function show($id) {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            require VIEWS . DS . 'products' . DS . 'show.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            include 'views/errors/404.php';
        }
    }

    // Show create form
    public function create() {
        try {
            // Get categories for dropdown
            $categories = $this->categoryModel->getAll();
            
            // Set active page for navigation highlighting
            $activePage = 'products';
            
            // Check if categories exist
            if (empty($categories)) {
                throw new Exception("No categories found. Please create categories first.");
            }
            
            // Include the view
            require VIEWS . DS . 'products' . DS . 'create.php';
            
        } catch (Exception $e) {
            // Log error and show message
            error_log($e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header('Location: /admin');
            exit();
        }
}

    // Store new product
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'slug' => $this->generateSlug($_POST['name']),
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'quantity_available' => $_POST['quantity_available'] ?? 0,
                'unit' => $_POST['unit'] ?? 'kg',
                'image' => $this->handleImageUpload($_FILES['image'], null) // Pass null for product_id when creating
            ];

            // Validate data
            $errors = $this->validateProductData($data);
            if (empty($errors)) {
                if ($this->productModel->createProduct($data)) {
                    $_SESSION['message'] = 'Product created successfully';
                    header('Location: ' . BASE_URL . 'products');
                    exit();
                } else {
                    $errors[] = 'Failed to create product';
                }
            }

            // If errors, show form again with errors
            $categories = $this->categoryModel->getAll();
            include 'views/products/create.php';
        }
    }

/**
 * Show edit form
 *
 * @param int $id Product ID
 */
public function edit($id) {
    // Only authenticated users
    $this->ensureAuthenticated();
    
    // Get product
    $product = $this->productModel->getProductById($id);
    if (!$product) {
        // Redirect to products list
        header('Location: ' . BASE_URL . 'products');
        exit;
    }
    
    // Get all categories for the dropdown
    $categories = $this->categoryModel->getAll(); // Make sure you have this method
    
    // Render view with both product and categories
    $product = $product;
    $categories = $categories;
    require VIEWS . DS . 'products' . DS . 'edit.php';
}

    // Update product
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->ensureAuthenticated();

            // Get existing product data first
            $existingProduct = $this->productModel->getProductById($id);
            
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'slug' => $this->generateSlug($_POST['name']),
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'quantity_available' => $_POST['quantity_available'] ?? 0,
                'unit' => $_POST['unit'] ?? 'kg',
                'image' => $existingProduct['image_path'] // Keep existing image by default
            ];

            // Handle image upload if a new file was provided
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $newImage = $this->handleImageUpload($_FILES['image'], $id);
                if ($newImage) {
                    // Delete old image if it exists
                    if (!empty($existingProduct['image_path'])) {
                        $oldImagePath = $_SERVER['DOCUMENT_ROOT'] . $existingProduct['image_path'];
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                    $data['image'] = $newImage;
                }
            }

            // Handle image removal if checkbox is checked
            if (isset($_POST['remove_image']) && $_POST['remove_image'] === 'on') {
                if (!empty($existingProduct['image_path'])) {
                    $oldImagePath = $_SERVER['DOCUMENT_ROOT'] . $existingProduct['image_path'];
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $data['image'] = null;
            }

            // Validate data
            $errors = $this->validateProductData($data, $id);
            if (empty($errors)) {
                if ($this->productModel->updateProduct($id, $data)) {
                    $_SESSION['success_message'] = 'Product updated successfully';
                    header('Location: ' . BASE_URL . 'products');
                    exit();
                } else {
                    $errors[] = 'Failed to update product';
                }
            }

            // If errors, show form again with errors
            $product = $this->productModel->getProductById($id);
            $categories = $this->categoryModel->getAll();
            
            // Pass variables to the view
            $product = $product;
            $categories = $categories;
            $errors = $errors;
            require VIEWS . DS . 'products' . DS . 'edit.php';
        }
    }

    // Delete product
    public function delete($id) {
        // Only authenticated users
        $this->ensureAuthenticated();
        
        // Delete category
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->productModel->delete($id);
        }
        // Redirect to categories list
        header('Location: ' . BASE_URL . 'products');
        exit;
    }


    // Helper method to generate slug
    private function generateSlug($name) {
        $slug = strtolower(trim($name));
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        $slug = preg_replace('/-+/', "-", $slug);
        
        // Ensure slug is unique
        $originalSlug = $slug;
        $counter = 1;
        while ($this->productModel->slugExists($slug)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }

    // Helper method to validate product data
    private function validateProductData($data, $exclude_id = null) {
        $errors = [];
        
        if (empty($data['name'])) {
            $errors['name'] = 'Name is required';
        }
        
        if (empty($data['category_id'])) {
            $errors['category_id'] = 'Category is required';
        }
        
        if (empty($data['description'])) {
            $errors['description'] = 'Description is required';
        }
        
        if (!is_numeric($data['price']) || $data['price'] <= 0) {
            $errors['price'] = 'Valid price is required';
        }
        
        if (!is_numeric($data['quantity_available']) || $data['quantity_available'] < 0) {
            $errors['quantity_available'] = 'Valid quantity is required';
        }
        
        if ($this->productModel->slugExists($data['slug'], $exclude_id)) {
            $errors['slug'] = 'Slug already exists';
        }
        
        return $errors;
    }

    // Helper method to handle image upload
    protected function handleImageUpload($file, $product_id = null) {
        // If no file was uploaded or there was an error, return null
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        // Check if the uploads directory exists, create it if not
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/pau-market/public/uploads/products/';
        
        // Create directory if it doesn't exist (with proper permissions)
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Validate file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            return null;
        }

        // Generate unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'product_' . uniqid() . '.' . $extension;
        $destination = $uploadDir . $filename;

        // Move the uploaded file
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // Return the relative path for database storage
            return 'uploads/products/' . $filename;
        }

        return null;
    }
}
?>