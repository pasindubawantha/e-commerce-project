<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model');
    }

    //Orders to be processed
    public function index()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Orders processing', 'description'=>'Orders to be processed','app_name'=>'Orders');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $data['data_tables'] = array('table_orders');
            $data['order_confirmed'] = $this->Order_model->get_orders_by_state('confirmed');
            $data['order_processing'] = $this->Order_model->get_orders_by_state('processing');

            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Orders/order_processing', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    //detail page to process order
    public function order_processing_detail($order_id)
    {
        if(isset($_POST['process_order']))
        {
            $data['shipping_cost'] = $_POST['shipping_cost'];

            $result = $this->Order_model->process_order($_POST['shipping_cost'], $order_id, $_SESSION['user']->id);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully processed order ";
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to process order";
                }
        }
        $data['page'] = array('header'=>'Orders detail', 'description'=>'Add shipping cost and process order to dispatch','app_name'=>'Orders');
        $data['user'] = $_SESSION['user'];
        $data['apps'] = $_SESSION['apps'];
        $data['tabs'] = $this->make_tabs();
        $data['order'] = $this->Order_model->get_order_details($order_id);
        $data['order_id'] = $order_id;

        $this->load->view('template/admin_header',$data);
        $this->load->view('Admin/Orders/order_processing_detail', $data);
        $this->load->view('template/admin_footer', $data);
    }

    //detail of dilvered orders
    public function order_detail($order_id)
    {
        $data['page'] = array('header'=>'Orders detail', 'description'=>'Past order details','app_name'=>'Orders');
        $data['user'] = $_SESSION['user'];
        $data['apps'] = $_SESSION['apps'];
        $data['tabs'] = $this->make_tabs();
        $data['order'] = $this->Order_model->get_order_details($order_id);
        $data['order_id'] = $order_id;

        $this->load->view('template/admin_header',$data);
        $this->load->view('Admin/Orders/order_detail', $data);
        $this->load->view('template/admin_footer', $data);
    }

    //Orders dispatched
    public function order_dispatched()
    {
        if(isset($_SESSION['user']))
        {
            if(isset($_POST['delivered']))
            {
                $result = $this->Order_model->mark_order_delivered($_POST['delivered'], 'delivered');
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully updated order state";
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to update order state";
                }
            }
            $data['page'] = array('header'=>'Orders dispatched', 'description'=>'Orders dispatched and to be confirmed as goods recived','app_name'=>'Orders');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $data['data_tables'] = array('table_orders');
            $data['order_dispatched'] = $this->Order_model->get_orders_by_state('dispatched');

            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Orders/order_dispatched', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    //Orders delivered
    public function order_dilivered()
    {
        if(isset($_SESSION['user']))
        {

            $data['page'] = array('header'=>'Orders delivered', 'description'=>'History of all orders dilvered','app_name'=>'Orders');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $data['data_tables'] = array('table_orders');
            $data['order_delivered'] = $this->Order_model->get_orders_by_state('delivered');

            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Orders/order_delivered', $data);
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
        //Processing orders
        $tab1 = array('name'=>'Order Processing','link'=>base_url().'/Admin_orders/', 'icon'=>'fa fa-inbox');
        //Dispatched orders
        $tab2 = array('name'=>'Order Dispatched','link'=>base_url().'/Admin_orders/order_dispatched', 'icon'=>'fa fa-truck');
        //Dilivered orders
        $tab3 = array('name'=>'Order Delivered','link'=>base_url().'/Admin_orders/order_dilivered', 'icon'=>'fa  fa-thumbs-up');

        return array($tab1, $tab2, $tab3);
    }
}
