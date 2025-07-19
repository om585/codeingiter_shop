<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function register_user($data) {
        return $this->db->insert('users', $data);
    }
    
    public function check_email_exists($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->num_rows() > 0;
    }

    
    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password); // Note: In production, use password_hash() and password_verify()
        $query = $this->db->get('users');
        
        if($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }
    
    public function get_user_by_email($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row();
    }


    // public function get_user($product_id) {
    //     $query = $this->db->get_where('products', ['id' => $product_id]);
        
    //     // Debug line - remove after testing
    //     echo "<!-- Query: " . $this->db->last_query() . " -->";
        
    //     return $query->row();
    // }

    

    public function get_user($email) {
        return $this->db->where('email', $email)->get('users')->row_array();
    }

    public function update_user($email, $data) {
        return $this->db->where('email', $email)->update('users', $data);
    }

    public function get_profile_image($email) {
        $user = $this->get_user($email);
        return $user ? $user['profile_image'] : null;
    }






}