<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Item_model extends CI_Model
{

    public function __construct()
    {
    }

    public function get_admin_user_data($email)
    {
    	$query = $this->db->get_where('user',array('id'=>$email , 'active'=>1));
    	return $query->row();
    }

    public function get_all_items()
    {
        $query = "SELECT i.id, i.name, i.description, i.unit, i.price, c.name as category FROM item as i JOIN category as c on i.category_id = c.id WHERE i.active = 1";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function get_item($item_id)
    {
        $query = $this->db->get_where('item', array('id'=>(int)$item_id));
        return $query->row();
    }

    public function get_item_images($item_id)
    {
        $query = $this->db->get_where('item_image', array('item_id'=>(int)$item_id));
        return $query->result();
    }

    public function get_item_details($item_id)
    {
        $query = $this->db->get_where('item_detail', array('item_id'=>(int)$item_id));
        return $query->result();
    }

    public function get_item_downloads($item_id)
    {
        $query = $this->db->get_where('item_download', array('item_id'=>(int)$item_id));
        return $query->result();
    }

    public function insert_item($item)
    {
        $this->db->trans_begin();
        //insert to item table
        $query = 'INSERT INTO item(name,description,unit,price,category_id) VALUES ("'.$item['name'].'", "'.$item['description'].'", "'.$item['unit'].'", '.$item['price'].', '.$item['category_id'].')';
        $this->db->query($query);

        //get new item id
        $query = 'SELECT LAST_INSERT_ID() as result';
        $query = $this->db->query($query);
        $item_id = $query->row()->result;

        //insert item detail fields
        foreach ($item['details'] as $detail) {
            $query = 'INSERT INTO item_detail(field_name,field_value,item_id) VALUES ("'.$detail['field_name'].'", "'.$detail['field_value'].'", '.$item_id.')';
            $this->db->query($query);
        }

        //insert item images
        foreach ($item['images'] as $image) {
            $image_data = addslashes(file_get_contents($image['tmp_name']));
            $query = "INSERT INTO item_image(item_id,image) VALUES ('{$item_id}', '{$image_data}')";
            $this->db->query($query);
        }

        // //insert item downloads
        // foreach ($item['downloads'] as $download) {
        //     $file = fopen($_FILES[$download['file']]['tmp_name'], 'rb');
        //     $query = 'INSERT INTO item_image(field_name,download) VALUES ('.$item_id.', "'.$download['field_name'].'",'.$download['file'].')';
        //     $this->db->query($query);
        // }
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

    public function update_item($item)
    {

    }

    public function delete_item($item_id)
    {
        $query = "UPDATE item SET active = 0 WHERE item_id = ".$item_id;
        $this->db->query($query);

        if($this->db->affected_rows() == -1)
            return 0;
        return 1;
    }

    //category opperations
    public function get_all_categories()
    {
        $query = $this->db->get_where('category', array('active'=>1));
        return $query->result();
    }

    public function get_category($category_id)
    {
        $query = $this->db->get_where('category', array('id'=>$category_id));
        return $query->row();
    }

    public function insert_category($name)
    {
        $query = 'INSERT INTO category(name) VALUES ("'.$name.'")';
        $this->db->query($query);
        if($this->db->affected_rows() == -1)
            return 0;
        return 1;
    }

    public function delete_category($category_id)
    {
        $query = "DELETE FROM category WHERE id = ".$category_id;
        $this->db->query($query);
        if($this->db->affected_rows() == -1)
            return 0;
        return 1;
    }

    public function update_category($category_id, $name)
    {
        $query = 'UPDATE category SET name = "'.$name.'" WHERE id = '.$category_id;
        $this->db->query($query);
        if($this->db->affected_rows() == -1)
            return 0;
        return 1;
    }

    //item attribute opperations
    public function get_item_fields()
    {
        $query = $this->db->get('item_field');
        return $query->result();
    }

    public function insert_item_fields($name)
    {
        $query = 'INSERT INTO item_field(field_name) VALUES ("'.$name.'")';
        $this->db->query($query);
        if($this->db->affected_rows() == -1)
            return 0;
        return 1;
    }

    public function delete_item_field($item_field_id)
    {
        $query = 'DELETE FROM item_field WHERE id = '.$item_field_id;
        $this->db->query($query);
        if($this->db->affected_rows() == -1)
            return 0;
        return 1;
    }
}




