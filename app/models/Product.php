<?php
class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Get all products
    public function getAllProducts() {
        $query = "SELECT * FROM products";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get product by ID
    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get products by category
    public function getProductsByCategory($category_id) {
        $query = "SELECT * FROM products WHERE category_id = :category_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new product
    public function createProduct($data) {
        $query = "INSERT INTO products (category_id, name, slug, description, price, quantity_available, unit, image) 
                  VALUES (:category_id, :name, :slug, :description, :price, :quantity_available, :unit, :image)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':slug', $data['slug']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity_available', $data['quantity_available']);
        $stmt->bindParam(':unit', $data['unit']);
        $stmt->bindParam(':image', $data['image']);
        
        return $stmt->execute();
    }

    // Update a product
    public function updateProduct($id, $data) {
        $query = "UPDATE products SET 
                  category_id = :category_id,
                  name = :name,
                  slug = :slug,
                  description = :description,
                  price = :price,
                  quantity_available = :quantity_available,
                  unit = :unit,
                  image = :image
                  WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':slug', $data['slug']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity_available', $data['quantity_available']);
        $stmt->bindParam(':unit', $data['unit']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    // Delete a product
    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Check if slug exists
    public function slugExists($slug, $exclude_id = null) {
        $query = "SELECT id FROM products WHERE slug = :slug";
        if ($exclude_id) {
            $query .= " AND id != :exclude_id";
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':slug', $slug);
        if ($exclude_id) {
            $stmt->bindParam(':exclude_id', $exclude_id);
        }
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
?>