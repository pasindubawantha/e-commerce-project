<?php

class Cart_model extends CI_Model
{
    function add_to_cart() {
        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $quantity = $_POST['product_quantity'];
        $image = $_POST['product_image'];
        $cost = (int)$quantity * (float)$price;

        $this->db->trans_begin();
        $user = $this->session->customer;
        $query = $this->db->get_where('carts', array('customer_id' => $user));
        if($query->num_rows() > 0) {
            $cart_id = $query->row()->cart_id;
        }
        else {
            $this->db->query("INSERT INTO carts(customer_id) VALUES('$user')");
            $query2 = $this->db->get_where('carts', array('customer_id' => $user));
            $cart_id = $query2->row()->cart_id;
        }
        $cart_items = array(
            'cart_id' => $cart_id,
            'item_name' => $name,
            'item_id' => $id,
            'item_image' => $image,
            'quantity' => $quantity,
            'price' => $price
        );
        $query3 = $this->db->get_where('cart_items', array('item_id' => $id));
        if ($query3->num_rows() > 0) {
            $this->db->query("UPDATE cart_items SET quantity=quantity+$quantity WHERE cart_id=$cart_id AND item_id=$id");
        }
        else {
            $this->db->insert('cart_items', $cart_items);
        }
        $this->db->query("UPDATE carts SET cart_total=cart_total+$cost WHERE cart_id=$cart_id");


        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return -1;
        }
        else
        {
            $this->db->trans_commit();
            return 0;
        }
    }

    function get_cart() {
        $user = $this->session->customer;
        $this->db->trans_begin();
        $query = $this->db->get_where('carts', array('customer_id' => $user));
        if($query->num_rows() > 0) {
            $cart_id = $query->row()->cart_id;
            $query2 = $this->db->get_where('cart_items', array('cart_id' => $cart_id));
            return $query2->result();
        }
        else {
            return null;
        }
    }

    function get_cart_total() {
        if(isset($this->session->customer)) {
            $user = $this->session->customer;
            $query = $this->db->get_where('carts', array('customer_id' => $user));
            if($query->num_rows() > 0) {
                $total = $query->row()->cart_total;
                return "$ ".$total;
            }
        }
        return "$ 0";

    }

    function remove_item() {
        $id = $this->input->post('item_id');
        $user = $this->session->customer;
        $query = $this->db->get_where('carts', array('customer_id', $user));
        $cart_id = $query->row()->cart_id;
        $this->db->where('cart_id', $cart_id);
        $this->db->where('item_id', $id);
        $this->db->delete('cart_items');
    }
}