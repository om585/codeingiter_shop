<?php // application/views/cart/checkout.php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="checkout-wrapper">
    <div class="container">
        <h1 class="checkout-title"><?= $title ?></h1>
        
        <div class="checkout-container">
            <div class="order-summary">
                <h2>Order Summary</h2>
                <div class="order-items">
                    <?php foreach ($cart_items as $item): ?>
                    <div class="order-item">
                        <div class="item-image">
                            <img src="<?= base_url($item['image_path']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                        </div>
                        <div class="item-details">
                            <h3 class="item-name"><?= htmlspecialchars($item['name']) ?></h3>
                            <p class="item-price">Rs<?= number_format($item['price'], 2) ?> × <?= $item['quantity'] ?></p>
                            <p class="item-total">Rs<?= number_format($item['price'] * $item['quantity'], 2) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="summary-total">
                    <span>Total Amount:</span>
                    <span class="total-price">Rs<?= number_format($total, 2) ?></span>
                </div>
            </div>
            
            <div class="checkout-form">
                <h2>Shipping & Payment Details</h2>
                <?= form_open('cart/buy_all', ['id' => 'checkout-form']) ?>
                    <div class="form-group">
                        <label for="shipping_address">Shipping Address</label>
                        <textarea name="shipping_address" id="shipping_address" class="form-control" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control" required>
                            <option value="">Select Payment Method</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                        </select>
                    </div>
                    
                    <?php foreach ($cart_items as $item): ?>
                        <input type="hidden" name="products[]" value="<?= $item['product_id'] ?>">
                    <?php endforeach; ?>
                    
                    <input type="hidden" name="confirm_order" value="1">
                    
                    <div class="form-actions">
                        <a href="<?= base_url('cart') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Cart
                        </a>
                        <button type="submit" class="btn btn-success" id="place-order-btn">
                            <i class="fas fa-shopping-bag"></i> Place Order
                        </button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<div id="order-confirmation" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to place this order?</p>
                <p class="total-confirmation">Total Amount: Rs<?= number_format($total, 2) ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="confirm-order-btn">Confirm Order</button>
            </div>
        </div>
    </div>
</div>