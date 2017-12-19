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

    function authenticate($data) {
        $query = $this->db->get_where('customer',array('id' => $data['email']));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if (password_verify($data['password'], $row->password_hash)) {
                return 1;
            }
        }
        return 0;
    }

    public function get_item_list_with_image()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get_where('item', array('active'=>1), 8);
        $items = $query->result();
        $ret_ary = array();
        foreach ($items as $i)
        {
            $query = $this->db->get_where('item_image', array('item_id'=>$i->id));
            if ($query->num_rows() <= 0) {
                $image = 0;
            }
            else {
                $image = $query->row()->id;
            }
            $new_i = (array)$i;
            $new_i['image_id'] = $image;
            $new_i = (object)$new_i;
            array_push($ret_ary, $new_i);

        }
        return $ret_ary;
    }

    function get_item($id)
    {
        $query = $this->db->get_where('item', array('id'=>$id));
        return $query->row();
    }

    function get_item_image($id) {
        $query = $this->db->get_where('item_image', array('item_id'=>$id));
        if ($query->num_rows() <= 0) {
            return 0;
        }
        else {
            return $query->row()->id;
        }
    }

}