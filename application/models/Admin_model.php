// application/models/Admin_model.php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function get_total_users() {
        return $this->db->count_all('users');
    }

    public function get_total_orders() {
        return $this->db->count_all('orders');
    }

    public function get_total_products() {
        return $this->db->count_all('products');
    }

    public function get_latest_orders($limit = 5) {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('orders')->result();
    }

    public function get_contact_messages() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('contacts')->result();
    }
}
