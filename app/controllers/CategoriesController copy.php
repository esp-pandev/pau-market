<?php
require_once APP . DS . 'models' . DS . 'Category.php';

class CategoryController {
    private $categoryModel;
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->categoryModel = new Category();
        $this->checkSession();
    }

    private function checkSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Please login to access this page";
            header("Location: " . BASE_URL . "auth/login");
            exit();
        }
    }

    private function renderView($viewPath, $data = []) {
        extract($data);
        require APP . DS . 'views' . DS . $viewPath . '.php';
    }

    private function redirect($url) {
        header("Location: " . BASE_URL . $url);
        exit();
    }

    public function index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $categories = $this->categoryModel->getPaginated($page, $limit);
        $totalCategories = $this->categoryModel->countAll();
        $totalPages = ceil($totalCategories / $limit);

        $this->renderView('categories/index', [
            'categories' => $categories,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }

    public function create() {
        $this->renderView('categories/create');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'slug' => $this->generateSlug($_POST['name']),
                'description' => trim($_POST['description'])
            ];

            if ($this->categoryModel->create($data)) {
                $_SESSION['success'] = 'Category created successfully!';
                $this->redirect('categories');
            } else {
                $_SESSION['error'] = 'Failed to create category. Please try again.';
                $this->renderView('categories/create', ['category' => $data]);
            }
        } else {
            $this->redirect('categories/create');
        }
    }

    public function show($id) {
        $category = $this->categoryModel->getById($id);
        
        if ($category) {
            $this->renderView('categories/show', ['category' => $category]);
        } else {
            $_SESSION['error'] = 'Category not found';
            $this->redirect('categories');
        }
    }

    public function edit($id) {
        $category = $this->categoryModel->getById($id);
        
        if ($category) {
            $this->renderView('categories/edit', ['category' => $category]);
        } else {
            $_SESSION['error'] = 'Category not found';
            $this->redirect('categories');
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'slug' => $this->generateSlug($_POST['name']),
                'description' => trim($_POST['description'])
            ];

            if ($this->categoryModel->update($id, $data)) {
                $_SESSION['success'] = 'Category updated successfully!';
                $this->redirect('categories');
            } else {
                $_SESSION['error'] = 'Failed to update category. Please try again.';
                $this->redirect('categories/' . $id . '/edit');
            }
        } else {
            $this->redirect('categories');
        }
    }

    public function destroy($id) {
        if ($this->categoryModel->delete($id)) {
            $_SESSION['success'] = 'Category deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete category.';
        }
        $this->redirect('categories');
    }

    public function search() {
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $query = trim($_GET['query']);
            $categories = $this->categoryModel->search($query);
            
            $this->renderView('categories/search', [
                'categories' => $categories,
                'query' => $query
            ]);
        } else {
            $this->redirect('categories');
        }
    }

    private function generateSlug($string) {
        $slug = strtolower(trim($string));
        $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        return $slug;
    }
}
?>