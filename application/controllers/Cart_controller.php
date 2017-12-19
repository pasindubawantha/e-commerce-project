<?php

class Cart_controller extends CI_Controller
{
    function add_item_to_cart() {
        $this->load->model('Cart_model');
        $result = $this->Cart_model->add_to_cart();
        echo $result;
    }

    function get_cart_total() {
        $this->load->model('Cart_model');
        $result = $this->Cart_model->get_cart_total();
        echo $result;
    }

    function cart_remove() {
        $this->load->model('Cart_model');
        $result = $this->Cart_model->remove_item();
    }


}