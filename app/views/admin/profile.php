<?php 
$activePage = 'profile';
ob_start(); 
?>
<div class="profile-form">
    <h1>Admin Profile</h1>
    
    <form method="POST">
        <div class="form-row">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($admin['first_name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($admin['last_name']); ?>" required>
            </div>
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
        </div>
        
        <div class="form-group">
            <label>Address</label>
            <textarea name="address"><?php echo htmlspecialchars($admin['address']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($admin['phone']); ?>">
        </div>
        
        <h2>Change Password</h2>
        <div class="form-group">
            <label>Current Password</label>
            <input type="password" name="current_password">
        </div>
        
        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_password">
        </div>
        
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_password">
        </div>
        
        <button type="submit" class="btn">Update Profile</button>
    </form>
</div>
<?php 
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'admin' . DS . 'layout.php';
?>