

<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inventory_model extends CI_Model
{

    public function __construct()
    {
    }

    public function get_all_stocks()
    {
        $query = "SELECT i.id, i.name, i.unit, i.price, c.name as category, s.no_of_units FROM `item` as i LEFT JOIN store_entry as s on i.id = s.item_id JOIN category as c on c.id = i.category_id WHERE (i.active = 1 OR (s.no_of_units > 0))" ;
        $query = $this->db->query($query);
        return $query->result();
    }

    public function stock_in($item_id, $ammount, $user_id)
    {
    	$this->db->trans_begin();
    	//change store entry
    	$query = $this->db->get_where('store_entry', array('item_id'=>(int)$item_id));
    	if($query->num_rows())
    	{
    		$new_ammount = $ammount + $query->row()->no_of_units;
    		$query = "UPDATE store_entry SET no_of_units = ".$new_ammount." WHERE item_id = ".$item_id;
    		$this->db->query($query);
    	}
    	else
    	{
    		$query = 'INSERT INTO store_entry(item_id, no_of_units) VALUES ('.$item_id.', '.$ammount.')';
    		$this->db->query($query);
    	}


    	//adding store log
    	$query = 'INSERT INTO store_log(item_id,user_id,no_of_units,`in`) VALUES ('.$item_id.', "'.$user_id.'", '.$ammount.', 1)';
    	$this->db->query($query);

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

    public function stock_out($item_id, $ammount, $user_id)
    {
    	$this->db->trans_begin();
    	//change store entry
    	$query = $this->db->get_where('store_entry', array('item_id'=>(int)$item_id));
    	if($query->num_rows())
    	{
    		$new_ammount = $query->row()->no_of_units - $ammount;
    		if($new_ammount < 0)
    			return 0;
    		$query = "UPDATE store_entry SET no_of_units = ".$new_ammount." WHERE item_id = ".$item_id;
    		$this->db->query($query);
    	}
    	else
    	{
    		return 0;
    	}


    	//adding store log
    	$query = 'INSERT INTO store_log(item_id,user_id,no_of_units,`in`) VALUES ('.$item_id.', "'.$user_id.'", '.$ammount.', 0)';
    	$this->db->query($query);

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

    public function get_all_stock_logs()
    {
        $query = "SELECT i.id, i.name, i.unit, i.price, c.name as category, l.no_of_units, u.name as user, l.time, l.in FROM `item` as i LEFT JOIN store_log as l on i.id = l.item_id JOIN category as c on c.id = i.category_id JOIN user as u on l.user_id = u.id" ;
        $query = $this->db->query($query);
        return $query->result();
    }

}




