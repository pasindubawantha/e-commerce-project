<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_items extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    }

    //Item list
    public function index()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Items list', 'description'=>'All items on display','app_name'=>'Items');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $data['items'] = $this->Item_model->get_all_items();
            $data['data_tables'] = array('table_items');

            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Items/item_list', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    public function item_new()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'New item', 'description'=>'Add new item','app_name'=>'Items');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $data['categories'] = $this->Item_model->get_all_categories();
            $data['attributes'] = $this->Item_model->get_item_fields();

            if(isset($_POST['new_item']))
            {
                $item['name'] = $_POST['item_name'];
                $item['description'] = $_POST['item_description'];
                $item['unit'] = $_POST['item_unit'];
                $item['price'] = $_POST['price'];
                $item['category_id'] = $_POST['category'];
                $details = array();
                foreach ($data['attributes'] as $a) {
                    if($_POST['attribute_'.$a->id] != "")
                    {
                        array_push($details, array('field_name'=>$a->field_name, 'field_value'=>$_POST['attribute_'.$a->id]));
                    }
                }
                $images = array();
                foreach ($_FILES as $file) {
                    if($file['name'] != "")
                    {
                        array_push($images, $file);
                    }
                }
                $item['images'] = $images;
                $item['details'] = $details;

                $result = $this->Item_model->insert_item($item);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully added item";
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to add item";
                }
            }

            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Items/item_new', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    public function item_edit($item_id)
    {
        if(isset($_SESSION['user']))
        {
            //delete image
            if(isset($_POST['delete_image']))
            {
                $result = $this->Item_model->delete_image($_POST['delete_image']);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully deleted image";
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to delete image";
                }
            }

            //delete item
            if(isset($_POST['delete_item']))
            {
                $result = $this->Item_model->delete_item($item_id);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully deleted item";
                    redirect(base_url().'/Admin_items','refresh');
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to delete item";
                }
            }

            //update item
            if(isset($_POST['update_item']))
            {
                $item['id'] = $item_id;
                $item['name'] = $_POST['item_name'];
                $item['description'] = $_POST['item_description'];
                $item['unit'] = $_POST['item_unit'];
                $item['price'] = $_POST['price'];
                $item['category_id'] = $_POST['category'];
                $details = array();
                $attributes = $this->Item_model->get_item_fields();
                foreach ($attributes as $a) {
                    if($_POST['attribute_'.$a->id] != "")
                    {
                        array_push($details, array('field_name'=>$a->field_name, 'field_value'=>$_POST['attribute_'.$a->id]));
                    }
                }
                $images = array();
                foreach ($_FILES as $file) {
                    if($file['name'] != "")
                    {
                        array_push($images, $file);
                    }
                }
                $item['images'] = $images;
                $item['details'] = $details;

                $result = $this->Item_model->update_item($item);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully updated item";
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to update item";
                }
            }


            $data['item'] = $this->Item_model->get_item($item_id);
            $item_attributes_array = $this->Item_model->get_item_details($item_id);
            $item_attributes = array();
            foreach ($item_attributes_array as $a) {
                $item_attributes[$a->field_name] = $a->field_value;
            }
            $data['item_attributes'] = $item_attributes;
            $data['item_images'] = $this->Item_model->get_item_images($item_id);
            $data['categories'] = $this->Item_model->get_all_categories();
            $data['attributes'] = $this->Item_model->get_item_fields();
            $data['page'] = array('header'=>'Edit item', 'description'=>$data['item']->name,'app_name'=>'Items');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $data['text_areas'] = array('item_description');
            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Items/item_edit', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    //Edit or delete category
    public function categories_edit($category_id)
    {
        if(isset($_SESSION['user']))
        {
            //delete attribute
            if(isset($_POST['delete_category']))
            {
                $result = $this->Item_model->delete_category($_POST['category_id']);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully deleted category";
                    redirect(base_url().'/Admin_items/categories','refresh');
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to delete category";
                }
            }

            //update attribute
            if(isset($_POST['update_category']))
            {
                if($_POST['category_name'] != "")
                {
                    $result = $this->Item_model->update_category($_POST['category_id'], $_POST['category_name']);
                    if($result)
                    {
                        $data['success'] = true;
                        $data['message'] = "Successfully updated category";
                    }
                    else
                    {
                        $data['fail'] = true;
                        $data['message'] = "Failed to update category";
                    }

                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to update category";
                }
            }

            $data['category'] = $this->Item_model->get_category($category_id);
            $data['page'] = array('header'=>'Edit Category ', 'description'=>$data['category']->name,'app_name'=>'Items');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();
            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Items/category_edit', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    //List all category page
    public function categories()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Categories', 'description'=>'All item categories','app_name'=>'Items');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();

            //new category
            if(isset($_POST['new_category']))
            {
                $result = $this->Item_model->insert_category($_POST['category_name']);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully created category - ".$_POST['category_name'];
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to create category - ".$_POST['category_name'];
                }
            }

            $data['categories'] = $this->Item_model->get_all_categories();
            $data['data_tables'] = array('table_categories');
            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Items/category_list', $data);
            $this->load->view('template/admin_footer', $data);
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    //Item attributes page
    public function item_attributes()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Items attributes', 'description'=>'All attributes in items','app_name'=>'Items');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['tabs'] = $this->make_tabs();

            //delete attribute
            if(isset($_POST['attribute_delete']))
            {
                $result = $this->Item_model->delete_item_field($_POST['field_id']);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully deleted attribute";
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to delete attribute";
                }
            }

            //new attribute
            if(isset($_POST['new_attribute']))
            {
                $result = $this->Item_model->insert_item_fields($_POST['field_name']);
                if($result)
                {
                    $data['success'] = true;
                    $data['message'] = "Successfully created attribute - ".$_POST['field_name'];
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Failed to create attribute - ".$_POST['field_name'];
                }
            }

            //get all attributes
            $data['attributes'] = $this->Item_model->get_item_fields();
            $data['data_tables'] = array('table_attributes');
            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Items/item_attributes', $data);
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
        //Item list
        $tab1_1 = array('name'=>'Item list','link'=>base_url().'/Admin_items/', 'icon'=>'fa fa-reorder');
        $tab1_2 = array('name'=>'New item','link'=>base_url().'/Admin_items/item_new', 'icon'=>'fa fa-plus');
        $tab1_3 = array('name'=>'Item attributes','link'=>base_url().'/Admin_items/item_attributes', 'icon'=>'fa fa-info');
        $tab1 = array('name'=>'Items', 'icon'=>'fa fa-fw fa-cube','next_level'=>array($tab1_1,$tab1_2, $tab1_3));

        //Categories
        $tab2 = array('name'=>'Categories','link'=>base_url().'/Admin_items/categories', 'icon'=>'fa fa-tag');


        return array($tab1, $tab2);
    }
}
