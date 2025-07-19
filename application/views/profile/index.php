<head>
    <style>
        /* Modern Profile Page CSS */
:root {
    --primary-color: #4a6bff;
    --primary-light: #eef2ff;
    --primary-dark: #3a53cc;
    --secondary-color: #ff6b6b;
    --text-color: #333333;
    --text-muted: #6c757d;
    --border-color: #e6e9ef;
    --card-bg: #ffffff;
    --body-bg: #f5f7fa;
    --success-color: #28a745;
    --danger-color: #dc3545;
    --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 8px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 20px rgba(0,0,0,0.1);
    --transition: all 0.3s ease;
    --border-radius: 12px;
  }
  
  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, system-ui, sans-serif;
    background-color: var(--body-bg);
    color: var(--text-color);
    line-height: 1.6;
  }
  
  /* Profile Container */
  .profile-container {
    max-width: 1000px;
    margin: 50px auto;
    padding: 0 20px;
  }
  
  /* Profile Card */
  .profile-card {
    background-color: var(--card-bg);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    transition: var(--transition);
  }
  
  .profile-card:hover {
    transform: translateY(-5px);
  }
  
  /* Profile Header */
  .profile-header {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 50px 30px 60px;
    text-align: center;
    position: relative;
    border-bottom: 1px solid rgba(255,255,255,0.1);
  }
  
  .profile-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 40px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='1' d='M0,288L48,272C96,256,192,224,288,213.3C384,203,480,213,576,229.3C672,245,768,267,864,261.3C960,256,1056,224,1152,213.3C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
    background-size: cover;
    transform: scale(1.1);
  }
  
  /* Profile Image Container */
  .profile-image-container {
    position: relative;
    width: 160px;
    height: 160px;
    margin: 0 auto 25px;
    z-index: 1;
  }
  
  .profile-img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.3);
    object-fit: cover;
    transition: var(--transition);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
  }
  
  .change-photo-btn {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background-color: rgba(0,0,0,0.7);
    color: white;
    padding: 10px 15px;
    border-radius: 50px;
    font-size: 0.85rem;
    cursor: pointer;
    opacity: 0;
    transform: translateY(10px);
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 8px;
  }
  
  .profile-image-container:hover .change-photo-btn {
    opacity: 1;
    transform: translateY(0);
  }
  
  .profile-header h1 {
    font-size: 32px;
    margin-bottom: 5px;
    font-weight: 700;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  
  .member-status {
    display: inline-block;
    padding: 8px 16px;
    background-color: rgba(255,255,255,0.15);
    border-radius: 50px;
    font-size: 14px;
    font-weight: 500;
    margin-top: 10px;
    backdrop-filter: blur(5px);
  }
  
  /* Profile Body */
  .profile-body {
    padding: 40px;
    position: relative;
    z-index: 1;
  }
  
  /* Alerts */
  .alert {
    padding: 16px 20px;
    margin-bottom: 30px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    box-shadow: var(--shadow-sm);
    animation: slideIn 0.4s ease-out;
    position: relative;
    overflow: hidden;
  }
  
  .alert::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
  }
  
  .alert-success {
    background-color: #e6f6ed;
    color: #0c6e47;
  }
  
  .alert-success::before {
    background-color: var(--success-color);
  }
  
  .alert-danger {
    background-color: #fbeaec;
    color: #a61c30;
  }
  
  .alert-danger::before {
    background-color: var(--danger-color);
  }
  
  /* Profile Info Section */
  .profile-info {
    margin-bottom: 50px;
    background-color: var(--primary-light);
    padding: 30px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
  }
  
  .profile-info h2 {
    font-size: 22px;
    margin-bottom: 25px;
    font-weight: 600;
    color: var(--primary-dark);
    position: relative;
    padding-bottom: 12px;
  }
  
  .profile-info h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--primary-color);
    border-radius: 3px;
  }
  
  .profile-info .info-group {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }
  
  .info-label {
    font-weight: 600;
    color: var(--text-muted);
    margin-bottom: 8px;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  
  .info-label:before {
    content: '';
    display: inline-block;
    width: 8px;
    height: 8px;
    background-color: var(--primary-color);
    border-radius: 50%;
  }
  
  .info-value {
    font-size: 16px;
    background-color: white;
    padding: 15px;
    border-radius: 8px;
    border-left: 3px solid var(--primary-color);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    word-break: break-word;
  }
  
  .info-value:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
  }
  
  /* Edit Profile Section */
  .edit-profile-section {
    background-color: white;
    padding: 35px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
  }
  
  .edit-profile-section h2 {
    font-size: 22px;
    margin-bottom: 30px;
    font-weight: 600;
    color: var(--text-color);
    position: relative;
    padding-bottom: 12px;
  }
  
  .edit-profile-section h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--primary-color);
    border-radius: 3px;
  }
  
  /* Form Styling */
  .edit-profile-form {
    max-width: 800px;
  }
  
  .form-group {
    margin-bottom: 25px;
  }
  
  .form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    font-size: 0.95rem;
  }
  
  .form-control {
    width: 100%;
    padding: 14px 16px;
    border: 1px solid var(--border-color);
    border-radius: 10px;
    font-size: 16px;
    transition: var(--transition);
    background-color: #f9fafb;
  }
  
  .form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(74, 107, 255, 0.1);
    background-color: white;
  }
  
  .form-control-file {
    border: 2px dashed var(--border-color);
    padding: 20px;
    text-align: center;
    cursor: pointer;
    border-radius: 10px;
    transition: var(--transition);
  }
  
  .form-control-file:hover {
    border-color: var(--primary-color);
    background-color: rgba(74, 107, 255, 0.05);
  }
  
  textarea.form-control {
    min-height: 100px;
    resize: vertical;
  }
  
  /* Buttons */
  .form-actions {
    margin-top: 40px;
    display: flex;
    gap: 15px;
  }
  
  .btn {
    padding: 14px 24px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }
  
  .btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    box-shadow: 0 4px 12px rgba(74, 107, 255, 0.2);
  }
  
  .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(74, 107, 255, 0.3);
  }
  
  .btn-danger {
    background: linear-gradient(135deg, var(--secondary-color), #ff4d4d);
    color: white;
    box-shadow: 0 4px 12px rgba(255, 107, 107, 0.2);
  }
  
  .btn-danger:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(255, 107, 107, 0.3);
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    .profile-container {
      margin: 20px auto;
    }
    
    .profile-header {
      padding: 40px 20px 60px;
    }
    
    .profile-body {
      padding: 25px 20px;
    }
    
    .profile-info,
    .edit-profile-section {
      padding: 25px 20px;
    }
    
    .form-actions {
      flex-direction: column;
    }
    
    .btn {
      width: 100%;
    }
  }
  
  @media (max-width: 480px) {
    .profile-image-container {
      width: 120px;
      height: 120px;
    }
    
    .profile-header h1 {
      font-size: 24px;
    }
    
    .form-control {
      padding: 12px;
    }
    
    .btn {
      padding: 12px 20px;
    }
  }
  
  /* Animations */
  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  /* Additional Enhancements */
  .profile-img:hover {
    transform: scale(1.05);
    border-color: rgba(255, 255, 255, 0.6);
  }
  
  .readonly-field {
    background-color: #f4f6f8;
    cursor: not-allowed;
  }
  
  input[readonly].form-control {
    background-color: #f4f6f8;
    border-color: #e6e9ef;
    opacity: 0.8;
  }
  
  /* Subtle loading animation for form submission */
  @keyframes btnLoading {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }
  
  .btn.loading {
    background-size: 200% 200%;
    animation: btnLoading 2s ease infinite;
    pointer-events: none;
  }
  

    </style>
</head>
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-image-container">
                <?php 
                $profile_image = !empty($user['profile_image']) ? base_url('./uploads/profile/' . $user['profile_image']) : base_url('application/uploads/profile/profile.jpg');
                ?>
                <img src="<?php echo $profile_image; ?>" alt="Profile Picture" class="profile-img">
                <label for="profile_image" class="change-photo-btn">
                    <i class="fas fa-camera"></i>
                    Change Photo
                </label>
            </div>
            <h1><?php echo html_escape($user['fname']); ?></h1>
            <p class="member-status">Shopping Portal Member</p>
        </div>
        
        <div class="profile-body">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <div class="profile-info">
                <h2>Current Information</h2>
                <div class="info-group">
                    <p class="info-label">Full Name</p>
                    <p class="info-value"><?php echo html_escape($user['fname']); ?></p>
                </div>
                <div class="info-group">
                    <p class="info-label">Email</p>
                    <p class="info-value"><?php echo html_escape($user['email']); ?></p>
                </div>
                <div class="info-group">
                    <p class="info-label">Mobile No.</p>
                    <p class="info-value"><?php echo html_escape($user['mobileno']); ?></p>
                </div>
                <div class="info-group">
                    <p class="info-label">Address</p>
                    <p class="info-value"><?php echo html_escape($user['address']); ?></p>
                </div>
            </div>

            <div class="edit-profile-section">
                <h2>Edit Profile</h2>
                <?php echo form_open_multipart('profile/update', ['class' => 'edit-profile-form']); ?>
                    <div class="form-group">
                        <label for="profile_image">Profile Image:</label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="fname">Full Name:</label>
                        <input type="text" id="fname" name="fname" value="<?php echo html_escape($user['fname']); ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" value="<?php echo html_escape($user['email']); ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="mobileno">Mobile No.:</label>
                        <input type="text" id="mobileno" name="mobileno" value="<?php echo html_escape($user['mobileno']); ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea id="address" name="address" rows="3" class="form-control" required><?php echo html_escape($user['address']); ?></textarea>
                    </div>

                   


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Profile</button>

                        <?php 
    // Store the session user_id and role in variables
    $user_id = $this->session->userdata('user_id');
    $role = $this->session->userdata('role');
    
    if ($user_id !== null && $role === 'admin') { 
?>
        <!-- Admin-only button -->
        <a href="<?= site_url('admin/index'); ?>" class="btn btn-primary" id="admin-dashboard-btn">
            <i class="fas fa-tachometer-alt"></i> Admin Dashboard
        </a>
<?php 
    } else { 
?>
        <!-- Admin dashboard button is hidden if not logged in or not an admin -->
        <a href="javascript:void(0);" class="btn btn-primary" id="admin-dashboard-btn" style="display: none;">
            <i class="fas fa-tachometer-alt"></i> Admin Dashboard
        </a>
<?php 
    }
?>



                        <a href="<?php echo site_url('profile/logout'); ?>" class="btn btn-danger">Logout</a>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
            </div>
</div>

<!-- In your view file (e.g., form_view.php) -->
<script src="<?php echo base_url('assets/js/form-helpers.js'); ?>"></script>

<script>
    // JavaScript function to toggle admin dashboard button visibility based on session
    window.addEventListener('DOMContentLoaded', function() {
        const adminButton = document.getElementById('admin-dashboard-btn');
        
        // Check if the session is set and the role is 'admin'
        const isLoggedInAndAdmin = <?php echo ($user_id !== null && $role === 'admin') ? 'true' : 'false'; ?>;
        
        if (isLoggedInAndAdmin) {
            adminButton.style.display = 'inline-block'; // Show admin dashboard button for admin
        } else {
            adminButton.style.display = 'none'; // Hide button if not admin or not logged in
        }
    });
</script>
