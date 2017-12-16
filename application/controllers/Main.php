<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //image render
    public function image($type, $id)
    {
        switch ($type)
        {
            case 'item':
                $query = "SELECT image from item_image where id = ".$id;
                break;
            case 'user':
                $query = "SELECT avatar as image from user where id = '".urldecode($id)."'";
                break;
            case 'customer':
                $query = "SELECT avatar as image from customer where id = '".urldecode($id)."'";
                break;
        }
        $this->load->view('view_image',array('query'=>$query));
    }
}
