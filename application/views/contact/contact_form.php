<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Your Shopping Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .contact-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .contact-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .contact-info {
            flex: 1;
            min-width: 300px;
            background: #2c3e50;
            padding: 40px;
            color: #fff;
        }

        .contact-form {
            flex: 2;
            min-width: 300px;
            padding: 40px;
        }

        .info-item {
            margin-bottom: 30px;
        }

        .info-item i {
            margin-right: 10px;
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #2c3e50;
            outline: none;
        }

        textarea.form-control {
            height: 150px;
            resize: vertical;
        }

        .btn-submit {
            background: #2c3e50;
            color: #fff;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #34495e;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .error-text {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .contact-wrapper {
                flex-direction: column;
            }
            
            .contact-info, .contact-form {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <div class="contact-wrapper">
            <div class="contact-info">
                <h2>Contact Information</h2>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>123 Shopping Street Saswad, City-Pune, Country-India</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <p>+91 784 567 0890</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <p>contact@yourshop.com</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
                </div>
            </div>
            
            <div class="contact-form">
                <h2>Send us a Message</h2>
                
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

                <?php echo form_open('contact/submit'); ?>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo set_value('name'); ?>">
                        <?php echo form_error('name', '<div class="error-text">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo set_value('email'); ?>">
                        <?php echo form_error('email', '<div class="error-text">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?php echo set_value('subject'); ?>">
                        <?php echo form_error('subject', '<div class="error-text">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="Your Message"><?php echo set_value('message'); ?></textarea>
                        <?php echo form_error('message', '<div class="error-text">', '</div>'); ?>
                    </div>

                    <button type="submit" class="btn-submit">Send Message</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
</html>