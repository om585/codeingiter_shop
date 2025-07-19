<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }
    
    public function register() {
        $data['title'] = 'Create a New Account';
        $data['validation_errors'] = '';
        
        if ($this->input->post()) {
            // Set validation rules
            $this->form_validation->set_rules('fname', 'Full Name', 'required|regex_match[/^[a-zA-Z ]*$/]',
                array('regex_match' => 'Digits are not allowed in name')
            );
            $this->form_validation->set_rules('mobileno', 'Mobile No', 'required|regex_match[/^[6-9][0-9]{9}$/]',
                array('regex_match' => 'Please enter a valid mobile number')
            );
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|callback_password_check');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            
            if ($this->form_validation->run() === TRUE) {
                $user_data = array(
                    'fname' => $this->input->post('fname'),
                    'mobileno' => $this->input->post('mobileno'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'), 
                    'address' => $this->input->post('address')
                );
                
                if ($this->user_model->register_user($user_data)) {
                    $this->session->set_flashdata('success', 'Registration successful! Please login.');
                    redirect('auth/login');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
                }
            } else {
                $data['validation_errors'] = validation_errors();
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('auth/register', $data);
        $this->load->view('templates/footer');
    }
    
    public function password_check($password) {
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/', $password)) {
            $this->form_validation->set_message('password_check', 
                'Password must contain at least one uppercase letter, lowercase letter, number, and special character');
            return FALSE;
        }
        return TRUE;
    }


    
    
    public function login() {
        // Check if user is already logged in
        if($this->session->userdata('user_id')) {
            redirect('products');
        }
        
        $data['title'] = 'Login';
        $data['error'] = '';
        
        if($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if($this->form_validation->run() === TRUE) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                
                $user = $this->user_model->login($email, $password);
                
                if($user) {
                    // Set session data
                    $user_data = array(
                        'user_id' => $user->email,
                        'role'=>$user->role,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($user_data);
                    
                    // Redirect to products page
                    if($user->role=='admin')
                    {
                        redirect('admin');
                    }
                    else
                    {
                    redirect('products');
                    }
                } else {
                    $data['error'] = 'Invalid email or password';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/footer');
    }
    
    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('logged_in');
        redirect('auth/login');
    }




    

}