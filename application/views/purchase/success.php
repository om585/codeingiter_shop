<div class="success-container">
    <div class="success-card">
        <div class="success-icon">
            <i class="fa fa-check-circle"></i>
        </div>
        
        <h2>Order Placed Successfully!</h2>
        <p class="order-number">Order #<?= $order->id ?></p>
        
        <div class="order-details">
            <div class="product-summary">
                <img src="<?= base_url($product->image_path) ?>" alt="<?= $product->name ?>">
                <div class="product-details">
                    <h3><?= $product->name ?></h3>
                    <p class="quantity">Quantity: <?= $order->quantity ?></p>
                    <p class="price">Price: Rs<?= number_format($product->price, 2) ?></p>
                    <p class="total">Total: Rs<?= number_format($order->total_amount, 2) ?></p>
                </div>
            </div>
            
            <div class="customer-info">
                <h4>Customer Information</h4>
                <p><strong>Email:</strong> <?= $order->customer_email ?></p>
            </div>
            
            <div class="shipping-info">
                <h4>Shipping Information</h4>
                <p><?= nl2br($order->shipping_address) ?></p>
            </div>
            
            <div class="payment-info">
                <h4>Payment Method</h4>
                <p><?= ucfirst($order->payment_method) ?></p>
            </div>
        </div>
        
        <p class="estimated-delivery">Estimated delivery: <?= date('d M Y', strtotime('+7 days')) ?></p>
        
        <div class="action-buttons">
            <a href="<?= base_url('products') ?>" class="continue-btn">Continue Shopping</a>
            <a href="<?= base_url('orders/index') ?>" class="view-order-btn">View Order Details</a>
        </div>
    </div>
</div>