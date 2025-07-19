<?php
// application/views/cart/index.php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="cart-wrapper">
    <div class="container">
        <h1 class="cart-title"><?= $title ?></h1>
        
        <div class="cart-container">
            <?php if (empty($cart_items)): ?>
                <div class="empty-cart">
                    <i class="fas fa-shopping-cart empty-cart-icon"></i>
                    <p>Your cart is empty.</p>
                    <a href="<?= base_url('products') ?>" class="btn btn-primary">Continue Shopping</a>
                </div>
            <?php else: ?>
                <div class="cart-items">
                    <?php foreach ($cart_items as $item): ?>
                        <div class="cart-item">
                            <div class="item-details">
                                <div class="item-image">
                                    <img src="<?= base_url($item['image_path']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                </div>
                                <div class="item-info">
                                    <h3 class="item-name"><?= htmlspecialchars($item['name']) ?></h3>
                                    <p class="item-price">Rs<?= number_format($item['price'], 2) ?></p>
                                    <div class="item-quantity">
                                        <span>Quantity: <?= $item['quantity'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="item-actions">
                                <?= form_open('cart/remove') ?>
                                    <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                    <button type="submit" name="remove_from_cart" class="btn btn-danger" value="1">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                <?= form_close() ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="cart-summary">
                    <div class="summary-row total">
                        <span>Total:</span>
                        <span class="total-price">Rs<?= number_format($total, 2) ?></span>
                    </div>
                    
                    <?= form_open('cart/buy_all') ?>
                        <?php foreach ($cart_items as $item): ?>
                            <input type="hidden" name="products[]" value="<?= $item['product_id'] ?>">
                        <?php endforeach; ?>
                        <button type="submit" name="buy_all" class="btn btn-success btn-block">
                            <i class="fas fa-shopping-bag"></i> Proceed to Checkout
                        </button>
                    <?= form_close() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>