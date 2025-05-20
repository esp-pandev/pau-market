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
        require VIEWS . DS . 'products' . DS . 'index.php';
    }

    // Show single product
    public function show($id) {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'views/products/show.php';
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
                'image' => $this->handleImageUpload()
            ];

            // Validate data
            $errors = $this->validateProductData($data);
            if (empty($errors)) {
                if ($this->productModel->createProduct($data)) {
                    $_SESSION['message'] = 'Product created successfully';
                    header('Location: /products');
                    exit();
                } else {
                    $errors[] = 'Failed to create product';
                }
            }

            // If errors, show form again with errors
            include 'views/products/create.php';
        }
    }

    // Show edit form
    public function edit($id) {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'views/products/edit.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            include 'views/errors/404.php';
        }
    }

    // Update product
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'slug' => $this->generateSlug($_POST['name']),
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'quantity_available' => $_POST['quantity_available'] ?? 0,
                'unit' => $_POST['unit'] ?? 'kg',
                'image' => $this->handleImageUpload($_FILES['image'], $id)
            ];

            // Validate data
            $errors = $this->validateProductData($data, $id);
            if (empty($errors)) {
                if ($this->productModel->updateProduct($id, $data)) {
                    $_SESSION['message'] = 'Product updated successfully';
                    header('Location: /products/' . $id);
                    exit();
                } else {
                    $errors[] = 'Failed to update product';
                }
            }

            // If errors, show form again with errors
            $product = $this->productModel->getProductById($id);
            include 'views/products/edit.php';
        }
    }

    // Delete product
    public function destroy($id) {
        if ($this->productModel->deleteProduct($id)) {
            $_SESSION['message'] = 'Product deleted successfully';
        } else {
            $_SESSION['error'] = 'Failed to delete product';
        }
        header('Location: /products');
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
    private function handleImageUpload($file = null, $product_id = null) {
        // Default image if none uploaded
        $defaultImage = 'default-product.jpg';
        
        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public/uploads/products/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $maxSize = 2 * 1024 * 1024; // 2MB
            
            // Validate file type and size
            if (in_array($file['type'], $allowedTypes) && $file['size'] <= $maxSize) {
                // Generate unique filename
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid('product_') . '.' . $extension;
                
                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
                    // Delete old image if exists and not default
                    if ($product_id) {
                        $product = $this->productModel->getProductById($product_id);
                        if ($product['image'] && $product['image'] !== $defaultImage) {
                            @unlink($uploadDir . $product['image']);
                        }
                    }
                    return $filename;
                }
            }
        }
        
        // Return existing image if no new upload
        if ($product_id) {
            $product = $this->productModel->getProductById($product_id);
            return $product['image'] ?? $defaultImage;
        }
        
        return $defaultImage;
    }
}
?>