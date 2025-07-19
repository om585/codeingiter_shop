<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_products() {
        return $this->db->get('products')->result();
    }
    
   
    
    public function add_to_cart($user_id, $product_id, $quantity = 1) {
        // Check if item already exists in cart
        $existing_item = $this->db->get_where('cart', [
            'user_id' => $user_id,
            'product_id' => $product_id
        ])->row();
        
        if ($existing_item) {
            // Update quantity if item exists
            $new_quantity = $existing_item->quantity + $quantity;
            $this->db->where('id', $existing_item->id);
            $this->db->update('cart', ['quantity' => $new_quantity]);
            return 'updated';
        } else {
            // Insert new item
            $this->db->insert('cart', [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
            return 'added';
        }
    }
    
    public function add_product($data) {
        return $this->db->insert('products', $data);
    }
    
    public function get_products() {
        return $this->db->get('products')->result();
    }

    
    // Make sure your product_model.php has this method:
    
    public function get_product($product_id) {
        $query = $this->db->get_where('products', ['id' => $product_id]);
        
        // Debug line - remove after testing
        echo "<!-- Query: " . $this->db->last_query() . " -->";
        
        return $query->row();
    }

    // application/models/Product_model.php

    public function get_product_details($product_id) {
        $this->db->where('id', $product_id);
        $query = $this->db->get('products');
        
        return ($query->num_rows() > 0) ? $query->row_array() : null;
    }


}