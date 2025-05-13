<?php
require_once 'app/config/config.php';

// Admin user details
$adminData = [
    'username' => 'admin',
    'email' => 'admin@pau-market.com',
    'password' => 'admin123', // Change this to your desired password
    'first_name' => 'Admin',
    'last_name' => 'User',
    'address' => 'PAU Market Headquarters',
    'phone' => '1234567890'
];

try {
    $db = Database::getInstance();
    
    // Hash the password
    $hashedPassword = password_hash($adminData['password'], PASSWORD_DEFAULT);
    
    // Insert admin user
    $stmt = $db->prepare("INSERT INTO users (username, email, password, first_name, last_name, address, phone) 
                         VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->execute([
        $adminData['username'],
        $adminData['email'],
        $hashedPassword,
        $adminData['first_name'],
        $adminData['last_name'],
        $adminData['address'],
        $adminData['phone']
    ]);
    
    echo "Admin user created successfully!<br>";
    echo "Username: " . $adminData['username'] . "<br>";
    echo "Password: " . $adminData['password'] . "<br>";
    echo "<strong>Important:</strong> Delete this file after creating the admin user!";
    
} catch (PDOException $e) {
    echo "Error creating admin user: " . $e->getMessage();
}