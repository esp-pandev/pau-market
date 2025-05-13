document.addEventListener('DOMContentLoaded', function() {
    // Toggle mobile menu (can be added later if needed)
    
    // Form validations
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // Check password match if changing password
            if (form.querySelector('[name="new_password"]')) {
                const newPassword = form.querySelector('[name="new_password"]').value;
                const confirmPassword = form.querySelector('[name="confirm_password"]').value;
                
                if (newPassword !== confirmPassword) {
                    e.preventDefault();
                    alert('New passwords do not match');
                }
            }
        });
    });
    
    // Initialize any other admin-specific JS here
});