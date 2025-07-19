<?php
// application/controllers/Cart.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model('User_model');
        $this->load->model('order_model');
        $this->load->helper('url');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }
    
    public function index() {
        $user = $this->User_model->get_user_by_email($this->session->userdata('user_id'));
        $data['title'] = 'Your Shopping Cart';
        $data['cart_items'] = $this->cart_model->get_cart_items($user->id);
        
        // Calculate total
        $total = 0;
        foreach ($data['cart_items'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $data['total'] = $total;
        
        $this->load->view('templates/header', $data);
        $this->load->view('cart/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function remove() {
        $user = $this->User_model->get_user_by_email($this->session->userdata('user_id'));
        if ($this->input->post('remove_from_cart')) {
            
            $user_id = $user->id;
            $product_id = $this->input->post('product_id');
            
            $this->cart_model->remove_item($user_id, $product_id);
            redirect('cart');
        }
    }
    
    
        public function buy_all() {
            // Check if user is logged in
            if (!$this->session->userdata('user_id')) {
                $this->session->set_flashdata('error', 'Please login to continue shopping');
                redirect('auth/login');
            }

            $user = $this->User_model->get_user_by_email($this->session->userdata('user_id'));
            
            // Get cart items
            $cart_items = $this->cart_model->get_cart_items($user->id);
            
            if (empty($cart_items)) {
                $this->session->set_flashdata('error', 'Your cart is empty');
                redirect('cart');
            }
            
            // Process the order
            if ($this->input->post('confirm_order')) {
                // $user_id = $this->session->userdata('user_id');
                // $user_info = $this->user_model->get_user($user_id);
                $shipping_address = $this->input->post('shipping_address');
                $payment_method = $this->input->post('payment_method');
                $total_amount = 0;
                $user = $this->User_model->get_user_by_email($this->session->userdata('user_id'));
                // Calculate total amount
                foreach ($cart_items as $item) {
                    $total_amount += $item['price'] * $item['quantity'];
                }
                
                // Insert orders into database
                foreach ($cart_items as $item) {
                    $order_data = array(
                        'user_id' => $user->id,
                        'customer_email' => $this->session->userdata('user_id'),
                        'product_id' => $item['product_id'],
                        'product_name' => $item['name'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'total_amount' => $item['price'] * $item['quantity'],
                        'shipping_address' => $shipping_address,
                        'payment_method' => $payment_method,
                        'order_status' => 'pending',
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    
                    $this->order_model->create_order($order_data);
                }
                
                // Clear the cart after successful order
                // $this->cart_model->clear_cart($user_id);
                
                // Set success message
                $this->session->set_flashdata('success', 'Your order has been placed successfully!');
                redirect('orders/success');
            }
            
            // Load checkout view
            $data['title'] = 'Checkout';
            $data['cart_items'] = $cart_items;
            $data['total'] = 0;
            
            foreach ($cart_items as $item) {
                $data['total'] += $item['price'] * $item['quantity'];
            }
            
            $this->load->view('templates/header', $data);
            $this->load->view('cart/checkout', $data);
            $this->load->view('templates/footer');
        }
    
    public function checkout() {
        // Checkout page implementation
        $data['title'] = 'Checkout';
        $this->load->view('templates/header', $data);
        $this->load->view('cart/checkout', $data);
        $this->load->view('templates/footer');
    }
}