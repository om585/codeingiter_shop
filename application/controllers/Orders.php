<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->library('session');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
    public function index() {
        $user_email = $this->session->userdata('user_id');
        
        $data['user'] = $this->order_model->get_user_details($user_email);
        $data['orders'] = $this->order_model->get_user_orders($user_email);
        
        $data['title'] = 'Your Orders';
        
        $this->load->view('templates/header', $data);
        $this->load->view('orders/order_history', $data);
        $this->load->view('templates/footer');
    }
    public function success() {
        $user_email = $this->session->userdata('user_id');
        $data['user'] = $this->order_model->get_user_details($user_email);
        $data['orders'] = $this->order_model->get_user_orders($user_email);
        
        $data['title'] = 'Your Orders';
        // logic for success page
        $this->load->view('templates/header', $data);
        $this->load->view('orders/success');
        $this->load->view('templates/footer');
    }
}