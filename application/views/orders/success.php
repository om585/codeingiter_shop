<?php // application/views/orders/success.php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="order-success-wrapper">
    <div class="container">
        <div class="order-success-container">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            
            <h1 class="success-title">Order Placed Successfully!</h1>
            
            <div class="success-message">
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>
                
                <p>Thank you for your purchase. Your order has been received and is being processed.</p>
                <p>You will receive an email confirmation shortly.</p>
            </div>
            
            <div class="success-actions">
                <a href="<?= base_url('orders/index') ?>" class="btn btn-primary">
                    <i class="fas fa-list"></i> View My Orders
                </a>
                <a href="<?= base_url('products') ?>" class="btn btn-secondary">
                    <i class="fas fa-shopping-cart"></i> Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>