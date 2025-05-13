<?php
require_once MODELS . DS . 'Category.php';
require_once __DIR__ . DS . '..' . DS . 'helpers' . DS . 'auth.php';

class CategoriesController {
    private $categoryModel;
    
    public function __construct($db) {
        $this->categoryModel = new Category($db);
    }
    
    // List all categories
    public function index() {
        ensureAuthenticated(); // Only authenticated users
        
        $categories = $this->categoryModel->getAll();
        require VIEWS . DS . 'categories' . DS . 'index.php';
    }
    
    // Show create form
    public function create() {
        ensureAuthenticated(); // Only authenticated users
        
        require VIEWS . DS . 'categories' . DS . 'create.php';
    }
    
    // Store new category
    public function store() {
        ensureAuthenticated(); // Only authenticated users
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                if ($this->categoryModel->create($data)) {
                    header('Location: /categories');
                    exit;
                } else {
                    $errors['general'] = 'Failed to create category';
                }
            }
            
            include __DIR__ . '/../views/categories/create.php';
        } else {
            header('Location: ' . BASE_URL . 'categories/create');
            exit;
        }
    }
    
    // Show edit form
    public function edit($id) {
        ensureAuthenticated(); // Only authenticated users
        
        $category = $this->categoryModel->getById($id);
        if (!$category) {
            header('Location: /categories');
            exit;
        }
        
        include __DIR__ . '/../views/categories/edit.php';
    }
    
    // Update category
    public function update($id) {
        ensureAuthenticated(); // Only authenticated users
        
        $category = $this->categoryModel->getById($id);
        if (!$category) {
            header('Location: /categories');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            
            if ($this->categoryModel->slugExists($data['slug'], $id)) {
                $errors['slug'] = 'Slug already exists';
            }
            
            if (empty($errors)) {
                if ($this->categoryModel->update($id, $data)) {
                    header('Location: /categories');
                    exit;
                } else {
                    $errors['general'] = 'Failed to update category';
                }
            }
            
            include __DIR__ . '/../views/categories/edit.php';
        } else {
            header('Location: /categories/edit/' . $id);
            exit;
        }
    }
    
    // Delete category
    public function delete($id) {
        ensureAuthenticated(); // Only authenticated users
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->categoryModel->delete($id);
        }
        header('Location: /categories');
        exit;
    }
    
    // Helper function to generate slug
    private function generateSlug($string) {
        $slug = strtolower(trim($string));
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        return $slug;
    }
}
?>