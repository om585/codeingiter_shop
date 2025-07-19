// application/controllers/Admin.php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        // Add authentication check here
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Admin Dashboard';
        $data['total_users'] = $this->admin_model->get_total_users();
        $data['total_orders'] = $this->admin_model->get_total_orders();
        $data['total_products'] = $this->admin_model->get_total_products();
        $data['latest_orders'] = $this->admin_model->get_latest_orders();
        $data['contact_messages'] = $this->admin_model->get_contact_messages();
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // public function dashboard() {
    //     // This will load the admin dashboard view
    //     $this->load->view('admin/dashboard');
    // }
}