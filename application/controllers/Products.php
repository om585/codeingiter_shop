<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');

    }
    
    public function index() {
        $data['products'] = $this->product_model->get_all_products();
        $data['title'] = 'Our Products';
        
        $this->load->view('templates/header', $data);
        $this->load->view('products/index', $data);
        $this->load->view('templates/footer');
    }

    public function cart_view() {
        $this->load->view('templates/footer');
    }
    
    public function add_to_cart() {

        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user = $this->User_model->get_user_by_email($this->session->userdata('user_id'));
        if ($this->input->post()) {
            $user_id = $user->id;
            $product_id = $this->input->post('product_id');
            $quantity = $this->input->post('quantity', TRUE) ?? 1;
            
            $result = $this->product_model->add_to_cart($user_id, $product_id, $quantity);
            
            if ($result === 'updated') {
                $this->session->set_flashdata('message', 'Product quantity updated in cart!');
            } else {
                $this->session->set_flashdata('message', 'Product added to cart successfully!');
            }
        }
        
        redirect('products');
    }
}