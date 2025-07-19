<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Modal Popup Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 0;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            animation: modalFadeIn 0.3s;
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes modalFadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .close-modal {
            color: #aaa;
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s;
        }

        .close-modal:hover {
            color: #333;
        }

        /* Product Form Styles */
        .product-container {
            padding: 20px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .form-header h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #777;
            font-size: 14px;
        }

        .product-form {
            padding: 0 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #4A89DC;
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 137, 220, 0.1);
        }

        .is-invalid {
            border-color: #e74c3c !important;
        }

        .invalid-feedback {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .alert-danger {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }

        .price-input-wrapper {
            position: relative;
        }

        .currency-symbol {
            position: absolute;
            left: 12px;
            top: 12px;
            color: #555;
        }

        input[name="price"] {
            padding-left: 25px;
        }

        .custom-file-upload {
            border: 2px dashed #ddd;
            border-radius: 4px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .custom-file-upload:hover {
            border-color: #4A89DC;
            background-color: rgba(74, 137, 220, 0.03);
        }

        .file-input {
            display: none;
        }

        .file-label {
            display: block;
            cursor: pointer;
        }

        .file-label i {
            font-size: 24px;
            color: #4A89DC;
            margin-bottom: 8px;
        }

        .file-label span {
            display: block;
            color: #555;
        }

        .file-name {
            margin-top: 10px;
            font-size: 13px;
            color: #777;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: inline-flex;
            align-items: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background-color: #4A89DC;
            color: white;
        }

        .btn-primary:hover {
            background-color: #3b7ddb;
            box-shadow: 0 4px 10px rgba(74, 137, 220, 0.2);
        }

        .btn-secondary {
            background-color: #f5f5f5;
            color: #444;
        }

        .btn-secondary:hover {
            background-color: #e9e9e9;
        }

        /* Status styles */
        .status {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .status.pending {
            background-color: #FFF3CD;
            color: #856404;
        }

        .status.shipped {
            background-color: #CCE5FF;
            color: #004085;
        }

        .status.delivered {
            background-color: #D4EDDA;
            color: #155724;
        }

        .status.cancelled {
            background-color: #F8D7DA;
            color: #721C24;
        }
    </style>
</head>
<body>
    <br><br><br>
    <div class="admin-container">
        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h3>Total Users</h3>
                <p><?= $total_users ?></p>
            </div>
            <div class="stat-card">
                <i class="fas fa-shopping-cart"></i>
                <h3>Total Orders</h3>
                <p><?= $total_orders ?></p>
            </div>
            <div class="stat-card">
                <i class="fas fa-box"></i>
                <h3>Total Products</h3>
                <p><?= $total_products ?></p>
            </div>
        </div>

        <div class="action-buttons">
            <button id="openProductModal" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Product
            </button>
        </div>

        <div class="content-section">
            <div class="latest-orders">
                <h2>Latest Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($latest_orders as $order): ?>
                        <tr>
                            <td>#<?= $order->id ?></td>
                            <td><?= $order->customer_email ?></td>
                            <td>Rs<?= number_format($order->total_amount, 2) ?></td>
                            <td><?= date('M d, Y', strtotime($order->created_at)) ?></td>
                            <td><span class="status <?= strtolower($order->order_status) ?>"><?= $order->order_status ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="contact-messages">
                <h2>Contact Messages</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contact_messages as $message): ?>
                        <tr>
                            <td><?= $message->name ?></td>
                            <td><?= $message->email ?></td>
                            <td><?= $message->subject ?></td>
                            <td><?= substr($message->message, 0, 50) ?>...</td>
                            <td><?= date('M d, Y', strtotime($message->created_at)) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Product Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="product-container">
                <div class="product-form-wrapper">
                    <div class="form-header">
                        <h1>Add New Product</h1>
                        <p>Fill in the details below to add a new product</p>
                    </div>
                    
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php echo form_open_multipart('product/add', ['class' => 'product-form']); ?>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text"
                                    class="form-control <?php echo form_error('product_name') ? 'is-invalid' : ''; ?>"
                                    id="product_name"
                                    name="product_name"
                                    value="<?php echo set_value('product_name'); ?>">
                            <?php echo form_error('product_name', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Price</label>
                            <div class="price-input-wrapper">
                                <span class="currency-symbol">Rs</span>
                                <input type="number"
                                        class="form-control <?php echo form_error('price') ? 'is-invalid' : ''; ?>"
                                        id="price"
                                        name="price"
                                        step="0.01"
                                        min="0"
                                        value="<?php echo set_value('price'); ?>">
                            </div>
                            <?php echo form_error('price', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control <?php echo form_error('description') ? 'is-invalid' : ''; ?>"
                                        id="description"
                                        name="description"
                                        rows="4"><?php echo set_value('description'); ?></textarea>
                            <?php echo form_error('description', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <div class="custom-file-upload">
                                <input type="file"
                                        id="product_image"
                                        name="product_image"
                                        accept="image/*"
                                        class="file-input">
                                <label for="product_image" class="file-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Choose a file</span>
                                </label>
                                <div class="file-name">No file chosen</div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Product
                            </button>
                            <button type="button" class="btn btn-secondary close-form">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        const modal = document.getElementById("productModal");
        const openBtn = document.getElementById("openProductModal");
        const closeBtn = document.querySelector(".close-modal");
        const cancelBtn = document.querySelector(".close-form");
        
        openBtn.addEventListener("click", function() {
            modal.style.display = "block";
            document.body.style.overflow = "hidden"; // Prevent scrolling behind modal
        });
        
        function closeModal() {
            modal.style.display = "none";
            document.body.style.overflow = "auto"; // Restore scrolling
        }
        
        closeBtn.addEventListener("click", closeModal);
        cancelBtn.addEventListener("click", closeModal);
        
        // Close modal when clicking outside of it
        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                closeModal();
            }
        });
        
        // File upload preview
        const fileInput = document.getElementById("product_image");
        const fileName = document.querySelector(".file-name");
        
        fileInput.addEventListener("change", function() {
            if (this.files && this.files[0]) {
                fileName.textContent = this.files[0].name;
            } else {
                fileName.textContent = "No file chosen";
            }
        });
    </script>
</body>
</html>