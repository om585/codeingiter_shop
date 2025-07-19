<div class="about-container">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>Our Story</h1>
            <p class="tagline">Creating exceptional shopping experiences since 2024-25</p>
        </div>
    </section>
    
    <!-- Mission Section -->
    <section class="about-mission">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Mission</h2>
                    <p>At Your Shopping Portal, we believe shopping should be easy, enjoyable, and accessible to everyone. We've built our platform with a commitment to quality products, competitive prices, and exceptional customer service.</p>
                    <p>Our team works tirelessly to curate the best products from around the world, ensuring you have access to trending items and timeless classics alike.</p>
                </div>
                <div class="col-md-6">
                    <div class="mission-stats">
                        <div class="stat-box">
                            <span class="stat-number">10K+</span>
                            <span class="stat-label">Products</span>
                        </div>
                        <div class="stat-box">
                            <span class="stat-number">50K+</span>
                            <span class="stat-label">Happy Customers</span>
                        </div>
                        <div class="stat-box">
                            <span class="stat-number">99%</span>
                            <span class="stat-label">Satisfaction Rate</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Values Section -->
    <section class="about-values">
        <div class="container">
            <h2 class="text-center">Our Core Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Customer First</h3>
                    <p>Every decision we make starts with you, our customer.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>Quality</h3>
                    <p>We never compromise on the quality of our products.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Sustainability</h3>
                    <p>We're committed to ethical sourcing and eco-friendly practices.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We constantly evolve to bring you the best shopping experience.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Team Section -->
    <!-- <section class="about-team">
        <div class="container">
            <h2 class="text-center">Meet Our Team</h2>
            <div class="team-grid">
                <?php foreach($team_members as $member): ?>
                <div class="team-card">
                    <div class="team-image">
                        <img src="<?= base_url($member['image']) ?>" alt="<?= $member['name'] ?>">
                    </div>
                    <h3><?= $member['name'] ?></h3>
                    <p class="team-position"><?= $member['position'] ?></p>
                    <p class="team-bio"><?= $member['bio'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section> -->
    
    <!-- Testimonials Section -->
    <section class="about-testimonials">
        <div class="container">
            <h2 class="text-center">What Our Customers Say</h2>
            <div class="testimonial-carousel">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"Shopping here has been a delight. The products are high-quality and delivery is always on time!"</p>
                    </div>
                    <div class="testimonial-author">
                        <p>- Sarah J., Loyal Customer</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"Their customer service is exceptional. When I had an issue with my order, they resolved it immediately."</p>
                    </div>
                    <div class="testimonial-author">
                        <p>- Michael T., Verified Buyer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="about-cta">
        <div class="container">
            <h2>Ready to experience the difference?</h2>
            <p>Join thousands of satisfied customers and discover why we're the preferred shopping destination.</p>
<br><br><br>
            <a href="<?= base_url('products') ?>" class="btn-primary">Start Shopping</a>
        </div>
    </section>
</div>