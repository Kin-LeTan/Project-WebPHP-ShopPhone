<?php
session_start();
$loai=$_GET['loai'];
$hoten=$_GET['hoten'];

if($loai=="simple"){
$id_phone=$_GET['id_phone'];
$color=$_GET['color'];
unset($_SESSION['cart_giua_ki'][$hoten][$id_phone][$color]);
header("location:gio_hang.php");
exit();
}

if($loai=="all"){
    unset($_SESSION['cart_giua_ki'][$hoten]);
    header("location:gio_hang.php");
exit();
}
?>