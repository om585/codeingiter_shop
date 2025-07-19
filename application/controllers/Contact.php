<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('contact_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('contact/contact_form');
        $this->load->view('templates/footer');
    }
    
    public function submit() {
        // Form validation rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');
        
        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message')
            );
            
            if ($this->contact_model->save_message($data)) {
                $this->session->set_flashdata('success', 'Your message has been sent successfully!');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            }
            
            redirect('contact');
        }
    }
}