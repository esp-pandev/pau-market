<?php
$title = "Edit User Profile";
$activePage = "profile";

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get flash messages and clear them
$successMessage = $_SESSION['flash_success'] ?? null;
$errorMessage = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

// Get form data and errors from session if they exist
$formData = $_SESSION['form_data'] ?? $user ?? [];
$errors = $_SESSION['form_errors'] ?? [];
unset($_SESSION['form_data'], $_SESSION['form_errors']);

ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | PAU-MARKET</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/user_create.css">
    <style>
        .profile-image-preview {
            margin: 10px 0;
        }
        .profile-image-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
            border: 2px solid #ddd;
        }
        .remove-image {
            display: block;
            margin-top: 5px;
            color: #dc3545;
            cursor: pointer;
        }
    </style>
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-header">
            <h1>PAU-MARKET</h1>
            <h2>Edit Your Profile</h2>
        </div>
        
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>
        
        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>
        
        <form class="auth-form" method="POST" action="<?php echo BASE_URL; ?>auth/update_profile" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" name="first_name" 
                           value="<?php echo htmlspecialchars($formData['first_name'] ?? ''); ?>" 
                           required>
                    <?php if (isset($errors['first_name'])): ?>
                        <small class="text-danger"><?php echo htmlspecialchars($errors['first_name']); ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" id="last_name" name="last_name" 
                           value="<?php echo htmlspecialchars($formData['last_name'] ?? ''); ?>" 
                           required>
                    <?php if (isset($errors['last_name'])): ?>
                        <small class="text-danger"><?php echo htmlspecialchars($errors['last_name']); ?></small>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="username">Username *</label>
                    <input type="text" id="username" name="username" 
                        value="<?php echo htmlspecialchars($formData['username'] ?? ''); ?>" 
                        required>
                    <small class="form-hint">Letters, numbers, and underscores only</small>
                    <?php if (isset($errors['username'])): ?>
                        <small class="text-danger"><?php echo htmlspecialchars($errors['username']); ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" 
                        value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>" 
                        required>
                    <?php if (isset($errors['email'])): ?>
                        <small class="text-danger"><?php echo htmlspecialchars($errors['email']); ?></small>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="current_password">Current Password (required for changes)</label>
                    <input type="password" id="current_password" name="current_password">
                    <?php if (isset($errors['current_password'])): ?>
                        <small class="text-danger"><?php echo htmlspecialchars($errors['current_password']); ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password (leave blank to keep current)</label>
                    <input type="password" id="new_password" name="new_password">
                    <small class="form-hint">Minimum 8 characters</small>
                    <?php if (isset($errors['new_password'])): ?>
                        <small class="text-danger"><?php echo htmlspecialchars($errors['new_password']); ?></small>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="form-row">    
                <div class="form-group">
                    <label for="profile_image">Profile Image</label>
                    
                    <?php if (!empty($formData['profile_image'])): ?>
                        <div class="profile-image-preview">
                            <img src="<?php echo BASE_URL . htmlspecialchars($formData['profile_image']); ?>" 
                                 alt="Current profile image">
                            <label class="remove-image">
                                <input type="checkbox" name="remove_profile_image" value="1"> Remove current image
                            </label>
                        </div>
                    <?php endif; ?>
                    
                    <input type="file" id="profile_image" name="profile_image" accept="image/*">
                    <small class="form-hint">JPG, PNG, or GIF (max 2MB)</small>
                    <?php if (isset($errors['profile_image'])): ?>
                        <small class="text-danger"><?php echo htmlspecialchars($errors['profile_image']); ?></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" 
                        value="<?php echo htmlspecialchars($formData['phone'] ?? ''); ?>">
                    <?php if (isset($errors['phone'])): ?>
                        <small class="text-danger"><?php echo htmlspecialchars($errors['phone']); ?></small>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3"><?php echo htmlspecialchars($formData['address'] ?? ''); ?></textarea>
                <?php if (isset($errors['address'])): ?>
                    <small class="text-danger"><?php echo htmlspecialchars($errors['address']); ?></small>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Profile</button>
            <a href="<?php echo BASE_URL; ?>user/profile" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    
    <script>
        // Preview image before upload
        document.getElementById('profile_image').addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const preview = document.querySelector('.profile-image-preview');
                if (!preview) {
                    const div = document.createElement('div');
                    div.className = 'profile-image-preview';
                    div.innerHTML = '<img src="" alt="New profile image">';
                    this.parentNode.insertBefore(div, this.nextSibling);
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.querySelector('.profile-image-preview img');
                    img.src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.display = 'none';
            });
        }, 5000);
    </script>
</body>
</html>
<?php
$content = ob_get_clean();
include APP . DS . 'views' . DS . 'layouts' . DS . 'admin.php';