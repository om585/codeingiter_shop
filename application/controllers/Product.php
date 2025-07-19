<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('form_validation');
        // $this->load->library('upload');
        $this->load->helper(['form', 'url']);
    }
    
    public function add() {
        $data['title'] = 'Add New Product';
        
        if ($this->input->method() === 'post') {
            // Set validation rules
            $this->form_validation->set_rules('product_name', 'Product Name', 'required|trim');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');
            
            if ($this->form_validation->run() === TRUE) {
                // Handle file upload
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 5000;
                $config['file_name'] = time() . '_' . $_FILES['product_image']['name'];
                // print_r($_FILES); die;
                
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('product_image')) {
                    $upload_data = $this->upload->data();
                    
                    $product_data = [
                        'name' => $this->input->post('product_name'),
                        'price' => $this->input->post('price'),
                        'description' => $this->input->post('description'),
                        'image_path' => 'uploads/' . $upload_data['file_name']
                    ];
                    
                    if ($this->product_model->add_product($product_data)) {
                        $this->session->set_flashdata('success', 'Product added successfully!');
                    } else {
                        $this->session->set_flashdata('error', 'Failed to add product.');
                    }
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            redirect('admin');
            }
        }
        

    }
}