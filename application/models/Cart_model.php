<?php
// application/models/Cart_model.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_cart_items($user_id) {
        $this->db->select('ci.id, p.image_path, p.name, p.price, ci.quantity, p.id as product_id');
        $this->db->from('cart ci');
        $this->db->join('products p', 'ci.product_id = p.id');
        $this->db->where('ci.user_id', $user_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function remove_item($user_id, $product_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $this->db->delete('cart');
        return $this->db->affected_rows() > 0;
        
    }

    // public function clear_cart() {
    //     // code to clear the cart, for example:
    //     $this->db->empty_table('cart'); // Example of clearing cart items
    // }
    
    
    public function add_item($user_id, $product_id, $quantity = 1) {
        // Check if item already exists
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('cart');
        
        if ($query->num_rows() > 0) {
            // Update quantity
            $current_item = $query->row_array();
            $new_quantity = $current_item['quantity'] + $quantity;
            
            $this->db->where('id', $current_item['id']);
            $this->db->update('cart', ['quantity' => $new_quantity]);
        } else {
            // Insert new item
            $this->db->insert('cart', [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }
        
        return true;
    }
}