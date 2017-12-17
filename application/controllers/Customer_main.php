<?php

class Customer_main extends CI_Controller
{
    function index()
    {
        $this->_load();
        $this->load->view('Customer/home');
    }

    function registration()
    {
        if(isset($_POST['submit'])) {

        }
        else {
            $this->_load();
            $this->load->view('Customer/register');
        }
    }

    private function _load()
    {
        $this->load->view('Customer/head');
        $this->load->view('Customer/navbar');
    }
}