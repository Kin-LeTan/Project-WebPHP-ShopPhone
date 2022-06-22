<?php
include_once('connectSQL.php');
mysqli_query($conn,"UPDATE `order` SET `trang_thai`='".$_GET['status']."' WHERE id='".$_GET['id']."'");
?>