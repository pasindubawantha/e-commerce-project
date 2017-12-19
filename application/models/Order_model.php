<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Order_model extends CI_Model
{

    public function __construct()
    {
    }

    public function get_orders_by_state($state)
    {
        $query = 'SELECT o.id, a.address, o.paid, o.time FROM `order` as o JOIN customer_address as a on o.shipping_address = a.id WHERE o.`status` = "'.$state.'"';
        $query = $this->db->query($query);
        return $query->result();
    }

    public function mark_order_delivered($id, $state)
    {
        $query = 'UPDATE `order` SET status="'.$state.'", paid = 1 WHERE id = '.$id;
        $this->db->query($query);
        return $this->db->affected_rows();
    }

    public function get_order_details($id)
    {
        //get order details
        $query = $this->db->get_where('order', array('id'=>$id));
        $order['order'] = $query->row();

        //get order customer details
        $query = $this->db->get_where('customer', array('id'=>$order['order']->customer_id));
        $order['customer'] = $query->row();

        //get order shipping address
        $query = $this->db->get_where('customer_address', array('id'=>$order['order']->shipping_address));
        $order['address'] = $query->row();

        //get order item details and stock
        $query = "SELECT i.name, o.no_of_units, o.unit_price, o.tax_percentage, i.unit, s.no_of_units as stock, c.name as category FROM order_has_item as o JOIN item as i on i.id = o.item_id LEFT JOIN store_entry as s on i.id = s.item_id JOIN category as c on c.id = i.category_id  WHERE o.order_id = ".$id ;
        $query = $this->db->query($query);
        $order['items'] = $query->result();
        return $order;
    }

    public function process_order($shipping_cost, $order_id, $user_id)
    {
        $this->db->trans_begin();
        //update order status
        $query = 'UPDATE `order` SET shipping_cost = '.(float)$shipping_cost.' , status = "dispatched" WHERE id = '.$order_id;
        $this->db->query($query);

        //update stock
        $query = $this->db->get_where('order_has_item', array('order_id'=>$order_id));
        $items = $query->result();
        foreach ($items as $i)
        {
            $query = $this->db->get_where('store_entry', array('item_id'=>$i->item_id));
            $old_i_ammount = $query->row()->no_of_units;
            $new_i_ammount = $old_i_ammount - $i->no_of_units;

            //update stock
            $query = "UPDATE store_entry SET no_of_units = ".$new_i_ammount." WHERE item_id = ".$i->item_id;
            $this->db->query($query);

            //instert stock log
            $query = 'INSERT INTO store_log(item_id,order_id,user_id,no_of_units,`in`) VALUES ('.$i->item_id.', '.$order_id.', "'.$user_id.'", '.$i->no_of_units.', 0)';
            $this->db->query($query);
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




