<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_user_model extends CI_Model
{

    public function __construct()
    {

    }

    public function get_admin_user_data($email)
    {
    	$query = $this->db->get_where('user',array('id'=>$email));
    	return $query->row();
    }

    public function get_nav_bar_apps()
    {
    	//$apps['analytics'] = array('icon'=>'fa fa-fw fa-bar-chart', 'name'=>'Analytics', 'controller_name'=>'Admin_analytics');
    	$apps['orders'] = array('icon'=>'fa fa-fw fa-shopping-cart', 'name'=>'Orders', 'controller_name'=>'Admin_orders');
    	$apps['inventory'] = array('icon'=>'fa fa-fw fa-cubes','name'=>'Inventory', 'controller_name'=>'Admin_inventory');
    	$apps['items'] = array('icon'=>'fa fa-fw fa-cube','name'=>'Items', 'controller_name'=>'Admin_items');
    	$apps['admin_users'] = array('icon'=>'fa fa-fw fa-users','name'=>'Admin users', 'controller_name'=>'Admin_users');
    	return $apps;
    }

}




