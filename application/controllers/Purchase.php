<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('order_model');
        $this->load->model('User_model');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('message', 'Please login to make a purchase');
            redirect('login');
        }
    }
    
    public function confirm($product_id) {
        // Debug line
        echo "<!-- Product ID received: " . $product_id . " -->";
        
        $data['title'] = 'Confirm Purchase';
        $data['product'] = $this->product_model->get_product($product_id);
        
        // Debug line
        echo "<!-- Product found: " . (isset($data['product']) ? 'Yes' : 'No') . " -->";
        
        if (!$data['product']) {
            $this->session->set_flashdata('message', 'Product not found. ID: ' . $product_id);
            redirect('products');
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('purchase/confirm', $data);
        $this->load->view('templates/footer');
    }
    
    public function process() {
        // Validate form data
        
        $product_id = $this->input->post('product_id');
        $product = $this->product_model->get_product($product_id);
        $this->form_validation->set_rules('product_id', 'Product', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('shipping_address', 'Shipping Address', 'required');
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            redirect('products');
            return;
        }
        
        $product_id = $this->input->post('product_id');
        $product = $this->product_model->get_product($product_id);
        $user = $this->User_model->get_user_by_email($this->session->userdata('user_id'));
        // print_r($user);
        // die;
        // $data['user'] = $this->User_model->get_user($this->session->userdata('user_id'));
        // pri
        if (!$product) {
            $this->session->set_flashdata('message', 'Product not found');
            redirect('products');
            return;
        }
        
        // Create order data
        $order_data = [
            'user_id' => $user->id ,
            'customer_email'=> $this->session->userdata('user_id'),
            'product_id' => $product_id,
            'product_name'=> $product->name,
            'quantity' => $this->input->post('quantity'),
            'price' => $product->price,
            'total_amount' => $product->price * $this->input->post('quantity'),
            'shipping_address' => $this->input->post('shipping_address'),
            'payment_method' => $this->input->post('payment_method'),
            'order_status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];
      
        // Save order to database
        $order_id = $this->order_model->create_order($order_data);
        
        if ($order_id) {
            $this->session->set_flashdata('success', 'Your order has been placed successfully! Order #' . $order_id);
            redirect('purchase/success/' . $order_id);
        } else {
            $this->session->set_flashdata('message', 'Failed to process your order. Please try again.');
            redirect('products');
        }
    }
    
    public function success($order_id) {
        $data['title'] = 'Order Confirmation';
        $user = $this->User_model->get_user_by_email($this->session->userdata('user_id'));

        $data['order'] = $this->order_model->get_order($order_id);
        
        if (!$data['order'] || $data['order']->user_id != $user->id ) {
            $this->session->set_flashdata('message', 'Order not found');
            redirect('products');
        }
        
        $data['product'] = $this->product_model->get_product($data['order']->product_id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('purchase/success', $data);
        $this->load->view('templates/footer');
    }
}