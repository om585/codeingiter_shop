<div class="overlay" id="confirm-overlay">
    <div class="confirm-modal">
        <h2>Confirm Purchase</h2>
        
        <div class="product-summary">
            <img src="<?= base_url($product->image_path) ?>" alt="<?= $product->name ?>">
            <div class="product-details">
                <h3><?= $product->name ?></h3>
                <p class="price">Rs<?= number_format($product->price, 2) ?></p>
                <p class="description"><?= $product->description ?></p>
            </div>
        </div>
        
        <?= form_open('purchase/process') ?>
            <input type="hidden" name="product_id" value="<?= $product->id ?>">
            
        
<!--                 
                <input type="hiddin" name="customer_email" id="customer_email" value="<?= $this->session->userdata('user_email') ?? '' ?>"> -->
            
            
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
            </div>
            
            <div class="form-group">
                <label for="shipping_address">Shipping Address:</label>
                <textarea name="shipping_address" id="shipping_address" required><?= $this->session->userdata('user_address') ?? '' ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="">Select payment method</option>
                    <option value="cod">Cash on Delivery</option>
                    <option value="card">Credit/Debit Card</option>
                    <option value="upi">UPI</option>
                </select>
            </div>
            
            <div class="action-buttons">
                <a href="<?= base_url('products') ?>" class="cancel-btn">Cancel</a>
                <button type="submit" class="confirm-btn">Confirm Purchase</button>
            </div>
        <?= form_close() ?>
    </div>
</div>