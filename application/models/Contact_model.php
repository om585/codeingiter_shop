<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function save_message($data) {
        return $this->db->insert('contacts', $data);
    }
    
    public function get_all_messages() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('contacts')->result();
    }
}