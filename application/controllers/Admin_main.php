<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //desktop page
    public function index()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Apps', 'description'=>'apps accessible for you','app_name'=>'');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $this->load->view('template/admin_header',$data);
            $this->load->view('Admin/Main/Desktop', $data);
            $this->load->view('template/admin_footer');
        }
        else
        {
            redirect('/Admin_main/login', 'refresh');
        }
    }

    public function login()
    {
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $this->load->model('Admin_user_model');

            $user  = $this->Admin_user_model->get_admin_user_data($_POST['email']);
            $user_apps = $this->Admin_user_model->get_nav_bar_apps();

            if($user !== NULL)
            {
                if(hash('sha256', $_POST['password'])==$user->password_hash)
                {
                	$_SESSION['user'] = $user;
                	$_SESSION['apps'] = $user_apps;
                	redirect('/Admin_main', 'refresh');
                }
            }
            $data['error'] = true;
        }
        if(isset($_POST['clicked'])) $data['error'] = true;
        else $data['error'] = false;
        echo "user name: user1@user , password: password";
        $this->load->view('Admin/Main/login',$data);
    }

    public function logout()
    {
        session_destroy();
        redirect('/Admin_main/login', 'refresh');
    }
}
