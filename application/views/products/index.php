<!-- application/views/templates/header.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - ShopPortal</title>
   
   
</head>

<!-- application/views/products/index.php -->
<main>
    <h1 class="page-title"><?= $title ?></h1>
    
    <?php if($this->session->flashdata('message')): ?>
        <div class="message" id="flash-message">
            <?= $this->session->flashdata('message') ?>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('flash-message').style.display = 'none';
            }, 4000);
        </script>
    <?php endif; ?>
    
    <div class="product-container">
        <?php if(!empty($products)): ?>
            <?php foreach($products as $product): ?>
                <div class="product-card">
                    <img src="<?= base_url($product->image_path) ?>" alt="<?= $product->name ?>">
                    <h2><?= $product->name ?></h2>
                    <p class="price">Rs<?= number_format($product->price, 2) ?></p>
                    <p><?= $product->description ?></p>
                    <div class="button-container">
                        <?= form_open('products/add_to_cart') ?>
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        <?= form_close() ?>
                        <a href="<?= site_url('purchase/confirm/'.$product->id) ?>" class="buy-now">Buy Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <?php foreach($products as $product): ?>
                <div class="product-card">
                    <img src="<?= base_url($product->image_path) ?>" alt="<?= $product->name ?>">
                    <h2><?= $product->name ?></h2>
                    <p class="price">Rs<?= number_format($product->price, 2) ?></p>
                    <p><?= $product->description ?></p>
                    <div class="button-container">
                        <?= form_open('products/add_to_cart') ?>
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        <?= form_close() ?>
                        <a href="<?= site_url('purchase/confirm/'.$product->id) ?>" class="buy-now">Buy Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php foreach($products as $product): ?>
                <div class="product-card">
                    <img src="<?= base_url($product->image_path) ?>" alt="<?= $product->name ?>">
                    <h2><?= $product->name ?></h2>
                    <p class="price">Rs<?= number_format($product->price, 2) ?></p>
                    <p><?= $product->description ?></p>
                    <div class="button-container">
                        <?= form_open('products/add_to_cart') ?>
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        <?= form_close() ?>
                        <a href="<?= site_url('purchase/confirm/'.$product->id) ?>" class="buy-now">Buy Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php foreach($products as $product): ?>
                <div class="product-card">
                    <img src="<?= base_url($product->image_path) ?>" alt="<?= $product->name ?>">
                    <h2><?= $product->name ?></h2>
                    <p class="price">Rs<?= number_format($product->price, 2) ?></p>
                    <p><?= $product->description ?></p>
                    <div class="button-container">
                        <?= form_open('products/add_to_cart') ?>
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        <?= form_close() ?>
                        <a href="<?= site_url('purchase/confirm/'.$product->id) ?>" class="buy-now">Buy Now</a>
                    </div>
                </div>
            <?php endforeach; ?> -->
        <?php else: ?>
            <p class="no-products">No products available.</p>
        <?php endif; ?>
    </div>
</main>

<!-- application/views/templates/footer.php -->
   
</body>
</html>