<?php
include_once("connectSQL.php");
mysqli_query($conn,"UPDATE `order` SET `trang_thai`='yes' WHERE id='".$_GET['id']."'");
header("location:Admin.php?loai=dsdh");
?>