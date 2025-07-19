
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'form_validation']);
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['user'] = $this->User_model->get_user($this->session->userdata('user_id'));
        $data['title'] = 'User Profile';
        
        $this->load->view('templates/header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }

    public function update() {
        $this->form_validation->set_rules('fname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('mobileno', 'Mobile Number', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('profile');
        }

        $update_data = [
            'fname' => $this->input->post('fname'),
            'mobileno' => $this->input->post('mobileno'),
            'address' => $this->input->post('address')
        ];

        // Handle profile image upload
        $upload_path = FCPATH . 'uploads/profile/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
        
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = 'profile_' . time();
        $config['overwrite'] = true;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('profile_image')) {
            $upload_data = $this->upload->data();
            $update_data['profile_image'] = $upload_data['file_name'];
        
            // ✅ Debug: Check if the file is uploaded
            echo "File uploaded successfully: " . $upload_path . $upload_data['file_name'];
        } else {
            // ❌ Debug: Print the upload error
            echo "Upload error: " . $this->upload->display_errors();
        }

        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            if ($this->upload->do_upload('profile_image')) {
                echo "File uploaded successfully.";
            } else {
                echo "Upload failed: " . $this->upload->display_errors();
            }
        } else {
            echo "No file uploaded or upload error.";
        }

        if ($_FILES['profile_image']['error'] == 0) {
            $target_file = $upload_path . 'profile_' . time() . '.jpg';
            
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                echo "File saved successfully: " . $target_file;
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            echo "Upload error.";
        }
        
        

        if ($this->User_model->update_user($this->session->userdata('user_id'), $update_data)) {
            $this->session->set_flashdata('success', 'Profile updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Error updating profile. Please try again.');
        }

        redirect('profile');
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}