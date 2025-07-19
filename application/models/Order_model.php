<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_user_details($email) {
        $this->db->select('id,fname, email, address, mobileno');
        $this->db->where('email', $email);
        return $this->db->get('users')->row_array();
    }
    
    public function get_user_orders($email) {
        $this->db->select('orders.id, orders.product_id, orders.product_name, products.price, orders.created_at');
        $this->db->from('orders');
        $this->db->join('products', 'orders.product_id = products.id');
        $this->db->where('orders.customer_email', $email);
        $this->db->order_by('orders.created_at', 'DESC');
        return $this->db->get()->result_array();
    }






    
    public function create_order($data) {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }
    
    public function get_order($order_id) {
        $query = $this->db->get_where('orders', ['id' => $order_id]);
        return $query->row();
    }
    

    
    public function update_order_status($order_id, $status) {
        $this->db->where('id', $order_id);
        $this->db->update('orders', ['order_status' => $status]);
        return $this->db->affected_rows() > 0;
    }

}