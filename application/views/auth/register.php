<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<div class="auth-container">
    <div class="auth-box">
        <h2><?= $title ?></h2>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <?php if($validation_errors): ?>
            <div class="alert alert-danger">
                <?= $validation_errors ?>
            </div>
        <?php endif; ?>
        
        <?= form_open('auth/register', ['class' => 'auth-form']) ?>
            <div class="form-group">
                <label for="fname">Full Name</label>
                <input type="text" 
                       class="form-control" 
                       id="fname" 
                       name="fname" 
                       value="<?= set_value('fname') ?>" 
                       placeholder="Enter your full name">
            </div>
            
            <div class="form-group">
                <label for="mobileno">Mobile Number</label>
                <input type="text" 
                       class="form-control" 
                       id="mobileno" 
                       name="mobileno" 
                       value="<?= set_value('mobileno') ?>" 
                       placeholder="Enter your mobile number">
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" 
                       class="form-control" 
                       id="email" 
                       name="email" 
                       value="<?= set_value('email') ?>" 
                       placeholder="Enter your email">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" 
                       class="form-control" 
                       id="password" 
                       name="password" 
                       placeholder="Enter password">
            </div>
            
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" 
                       class="form-control" 
                       id="cpassword" 
                       name="cpassword" 
                       placeholder="Confirm your password">
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" 
                          id="address" 
                          name="address" 
                          rows="3" 
                          placeholder="Enter your address"><?= set_value('address') ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Register Now</button>
            
            <p class="text-center mt-3">
                Already have an account? <a href="<?= base_url('auth/login') ?>">Login here</a>
            </p>
        <?= form_close() ?>
    </div>
</div>