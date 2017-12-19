<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_inventory extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inventory_model');
    }

    //Stock
    public function index()
    {
        if(isset($_SESSION['user']))
        {
            //stock out
            if(isset($_POST['out']))
            {
                $result = $this->Inventory_model->stock_out($_POST['item_id'], $_POST['ammount'],$_SESSION['user']->id);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully removed tock";
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to remove stock";
                }

            }

            //stock in
            if(isset($_POST['in']))
            {
                $result = $this->Inventory_model->stock_in($_POST['item_id'], $_POST['ammount'],$_SESSION['user']->id);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully added stock";
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to add stock";
                }
            }

            $data['page'] = array('header'=>'Inventory Stock', 'description'=>'Do stock opperations here ','app_name'=>'Inventory');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $data['stocks'] = $this->Inventory_model->get_all_stocks();
            $data['data_tables'] = array('table_stocks');

            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Inventory/stock', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    //Stock
    public function stock_log()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Inventory Stock Log', 'description'=>'All stock operation history','app_name'=>'Inventory');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $data['logs'] = $this->Inventory_model->get_all_stock_logs();
            $data['data_tables'] = array('table_stock_logs');

            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Inventory/stock_log', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    //private functions
    function make_tabs()
    {
        //Stock
        $tab1 = array('name'=>'Stock','link'=>base_url().'/Admin_inventory/', 'icon'=>'ffa a-cubes');
        //Stock log
        $tab2 = array('name'=>'Stock log','link'=>base_url().'/Admin_inventory/stock_log', 'icon'=>'fa fa-tasks');

        return array($tab1, $tab2);
    }
}
