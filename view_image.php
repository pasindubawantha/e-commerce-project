<?php
$q = $this->db->query("SELECT image from item_image where id = ".$_GET("id"));
$q = $q->row();
header("Content-type: image/jpg");
echo $q->image;;
       ?>
