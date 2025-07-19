<div class="order-history-container">
    <div class="profile-card">
        <div class="profile-header">
            <h1>Your Orders</h1>
            <div class="profile-stats">
                <div class="stat">
                    <span class="stat-value"><?php echo count($orders); ?></span>
                    <span class="stat-label">Total Orders</span>
                </div>
            </div>
        </div>

        <div class="user-details">
            <div class="detail-group">
                <i class="fas fa-user"></i>
                <div class="detail-content">
                    <label>Name</label>
                    <span><?php echo htmlspecialchars($user['fname']); ?></span>
                </div>
            </div>

            <div class="detail-group">
                <i class="fas fa-envelope"></i>
                <div class="detail-content">
                    <label>Email</label>
                    <span><?php echo htmlspecialchars($user['email']); ?></span>
                </div>
            </div>

            <div class="detail-group">
                <i class="fas fa-phone"></i>
                <div class="detail-content">
                    <label>Mobile</label>
                    <span><?php echo htmlspecialchars($user['mobileno']); ?></span>
                </div>
            </div>

            <div class="detail-group">
                <i class="fas fa-map-marker-alt"></i>
                <div class="detail-content">
                    <label>Address</label>
                    <span><?php echo htmlspecialchars($user['address']); ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="orders-card">
        <div class="table-responsive">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td>
                                    <span class="order-id">#<?php echo htmlspecialchars($order['id']); ?></span>
                                </td>
                                <td>
                                    <div class="product-info">
                                        <span class="product-name"><?php echo htmlspecialchars($order['product_name']); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <span class="price">Rs<?php echo number_format($order['price'], 2); ?></span>
                                </td>
                                <td>
                                    <span class="order-date">
                                        <?php echo date('M d, Y', strtotime($order['created_at'])); ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge completed">Completed</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="no-orders">
                                <div class="empty-state">
                                    <i class="fas fa-shopping-bag"></i>
                                    <p>No orders found</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="actions">
            <a href="<?php echo base_url('products'); ?>" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Continue Shopping
            </a>
        </div>
    </div>
</div>