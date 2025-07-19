<head>

<script src="<?php echo base_url('assets/js/auth.js'); ?>"></script>
</head>

<div class="auth-container">
    <div class="auth-box">
        <h2><?= $title ?></h2>
        
        <?php if($error): ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <?= form_open('auth/login', ['class' => 'auth-form']) ?>
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-group">
                    <!-- <span class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </span> -->
                    <input type="email" 
                           class="form-control" 
                           id="email" 
                           name="email" 
                           value="<?= set_value('email') ?>" 
                           placeholder="Enter your email">
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <!-- <span class="input-icon">
                        <i class="fas fa-lock"></i>
                    </span> -->
                    <input type="password" 
                           class="form-control" 
                           id="password" 
                           name="password" 
                           placeholder="Enter your password">
                    <span class="password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>
            
            <div class="form-group remember-me">
                <label class="checkbox">
                    <p><input type="checkbox" name="remember"> 
                    <span>Remember me</span></p>
                </label>
                <!-- <a href="<?= base_url('auth/forgot_password') ?>" class="forgot-password">
                    Forgot Password?
                </a> -->
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
            
            <div class="auth-separator">
                <span>or</span>
            </div>
            
            <p class="text-center mt-3">
                Don't have an account? 
                <a href="<?= base_url('auth/register') ?>" class="register-link">
                    Register here
                </a>
            </p>
        <?= form_close() ?>
    </div>
</div>