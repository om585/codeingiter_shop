<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css'); ?>">


    <link rel="stylesheet" href="<?php echo base_url('assets/css/product.css'); ?>">


<link rel="stylesheet" href="<?php echo base_url('assets/css/success.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



 <link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>">
 
 

<link rel="stylesheet" href="<?php echo base_url('assets/css/orders.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/purconfirm.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/pursuccess.css'); ?>">
  
  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/cart.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/checkout.css') ?>">
   
</head>
<body>
    <header class="header">
        <div class="container4">
            <div class="header-content">
                <a href="<?= base_url() ?>" class="logo">ShopPortal</a>
                

                <nav class="nav-menu">
                    <a href="<?= base_url() ?>" class="nav-link">Home</a>
                    <a href="<?= base_url('about') ?>" class="nav-link">About Us</a>
                    <a href="<?= base_url('contact') ?>" class="nav-link">Contact Us</a>
                    <a href="<?= base_url('cart') ?>" class="nav-link">Cart</a>
                    <a href="<?= base_url('orders') ?>" class="nav-link">My Orders</a>
                    
                </nav>
               <nav class="nav-menu">
                <a href="<?= base_url('profile') ?>" class="profile-link">
                    <i class="profile-icon">👤</i>
                    Profile
                </a>
                <?php 
                    // Store the session user_id in a variable
                    $user_id = $this->session->userdata('user_id');
                    
                    if ($user_id !== null) { 
                    ?>
                        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger" id="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    <?php } else { ?>
                        <!-- Logout button is hidden when not logged in -->
                        <a href="javascript:void(0);" class="btn btn-danger" id="logout-btn" style="display: none;">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    <?php } ?>
</nav>

            </div>
        </div>
    </header>
    <script>
        // JavaScript function to toggle logout button visibility based on session
        window.addEventListener('DOMContentLoaded', function() {
            const logoutButton = document.getElementById('logout-btn');
            // Check if session is set (you can also add more logic if necessary)
            if (<?php echo $user_id !== null ? 'true' : 'false'; ?>) {
                logoutButton.style.display = 'inline-block'; // Show logout button
            } else {
                logoutButton.style.display = 'none'; // Hide logout button
            }
        });
    </script>


    <!-- <script>
        function toggleMenu() {
            const navMenu = document.querySelector('.nav-menu');
            navMenu.classList.toggle('active');
        }
    </script> -->
</body>
</html>