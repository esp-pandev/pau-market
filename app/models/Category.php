<?php
require_once APP . DS . 'config' . DS . 'config.php';

class Category {
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

    public function slugExists($slug, $excludeId = null) {
    try {
        $sql = "SELECT COUNT(*) as count FROM categories WHERE slug = :slug";
        $params = [':slug' => $slug];
        
        if ($excludeId !== null) {
            $sql .= " AND id != :id";
            $params[':id'] = $excludeId;
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['count'] > 0;
    } catch (PDOException $e) {
        error_log("Error checking slug existence: " . $e->getMessage());
        return false;
    }
}
    public function create($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO categories (name, slug, description) VALUES (:name, :slug, :description)");
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':slug', $data['slug']);
            $stmt->bindParam(':description', $data['description']);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating category: " . $e->getMessage());
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching category: " . $e->getMessage());
            return false;
        }
    }

    public function getAll() {
        try {
            $stmt = $this->db->query("SELECT * FROM categories ORDER BY name ASC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching categories: " . $e->getMessage());
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $stmt = $this->db->prepare("UPDATE categories SET name = :name, slug = :slug, description = :description, updated_at = NOW() WHERE id = :id");
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':slug', $data['slug']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating category: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM categories WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting category: " . $e->getMessage());
            return false;
        }
    }

    public function getBySlug($slug) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE slug = :slug");
            $stmt->bindParam(':slug', $slug);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching category by slug: " . $e->getMessage());
            return false;
        }
    }

    public function countAll() {
        try {
            $stmt = $this->db->query("SELECT COUNT(*) as total FROM categories");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            error_log("Error counting categories: " . $e->getMessage());
            return false;
        }
    }

    public function search($keyword) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE name LIKE :keyword OR description LIKE :keyword ORDER BY name ASC");
            $keyword = "%$keyword%";
            $stmt->bindParam(':keyword', $keyword);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error searching categories: " . $e->getMessage());
            return false;
        }
    }

    public function getPaginated($page = 1, $limit = 10) {
        try {
            $offset = ($page - 1) * $limit;
            $stmt = $this->db->prepare("SELECT * FROM categories ORDER BY name ASC LIMIT :limit OFFSET :offset");
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching paginated categories: " . $e->getMessage());
            return false;
        }
    }
}
?>