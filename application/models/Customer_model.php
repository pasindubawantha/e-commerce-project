<?php

class Customer_model extends CI_Model
{
    function register_customer($data) {

        $this->db->trans_begin();
        $customer = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'company_name' => $data['company'],
            'id' => $data['email'],
            'phone' => $data['phone'],
            'password_hash' => $data['password']
        );
        $this->db->insert('customer',$customer);

        $address1 = $data['address1'] . ", " . $data['address2'] . ", " . $data['address3'];
        $customer_address_1 = array(
            'customer_id' => $data['email'],
            'address' => $address1,
            'default' => '1'
        );
        $this->db->insert('customer_address',$customer_address_1);

        if($data['address4'] != '') {
            $address2 = $data['address4'] . ", " . $data['address5'] . ", " . $data['address6'];
            $customer_address_2 = array(
                'customer_id' => $data['email'],
                'address' => $address2,
                'default' => '0'
            );
            $this->db->insert('customer_address',$customer_address_2);
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return 0;
        }
        else
        {
            $this->db->trans_commit();
            return 1;
        }
    }
}