<?php
$q = $this->db->query($query);
$q = $q->row();
header("Content-type: image/jpg");
echo $q->image;;
?>
