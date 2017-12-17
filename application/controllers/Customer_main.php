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
            $this->load->library('form_validation');
            $first_name = trim($this->input->post('customer_first_name'));
            $last_name = trim($this->input->post('customer_last_name'));
            $company = trim($this->input->post('customer_company'));
            $address1 = trim($this->input->post('customer_address_1'));
            $address2 = trim($this->input->post('customer_address_2'));
            $address3 = trim($this->input->post('customer_address_3'));
            $address2_1 = trim($this->input->post('customer_address_2_1'));
            $address2_2 = trim($this->input->post('customer_address_2_2'));
            $address2_3 = trim($this->input->post('customer_address_2_3'));
            $email = trim($this->input->post('customer_email'));
            $phone = trim($this->input->post('customer_phone'));
            $password = trim($this->input->post('account_password'));
            $hash_password = password_hash($password, PASSWORD_BCRYPT);

//            if(password_verify($password,$hash_password)){
//                echo "true";
//            }
//            else {
//                echo "false";
//            }

            $this->form_validation->set_rules('customer_first_name', 'First Name', 'required');
            $this->form_validation->set_rules('customer_last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('customer_address_1', 'Address Number', 'required');
            $this->form_validation->set_rules('customer_address_2', 'Street Address', 'required');
            $this->form_validation->set_rules('customer_address_3', 'City', 'required');
            $this->form_validation->set_rules('customer_email', 'Email', 'trim|required|valid_email|is_unique[customer.id]');
            $this->form_validation->set_rules('account_password', 'Password', 'required');
            $this->form_validation->set_rules('account_password_conf', 'Password Confirmation', 'trim|required|matches[account_password]');

            if ($this->form_validation->run() == FALSE)
            {
                $this->_load();
                $this->load->view('Customer/register');
            }
            else
            {
                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'company' => $company,
                    'address1' => $address1,
                    'address2' => $address2,
                    'address3' => $address3,
                    'address4' => $address2_1,
                    'address5' => $address2_2,
                    'address6' => $address2_3,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => $hash_password
                );

                $this->load->model('Customer_model');
                $result = $this->Customer_model->register_customer($data);
                if($result == 1) {
                    $this->session->set_flashdata('message','You have successfully registered!');
                }
                else {
                    $this->session->set_flashdata('message', 'There was a problem during registration. Please contact us to resolve this issue');
                }
                header('location: '.site_url('Customer_main/index'));
            }


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