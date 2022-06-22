<?php
include_once('connectSQL.php');
session_start();
$hoten=$_POST['hoten'];
$id_phone=$_POST['id_phone'];
$color=$_POST['color'];
$quantity=$_POST['quantity'];
if(!isset($_SESSION['cart_giua_ki'][$hoten][$id_phone][$color])){
    $_SESSION['cart_giua_ki'][$hoten][$id_phone][$color]=array('id_phone'=>$id_phone,'color'=>$color,'quantity'=> $quantity); 
}else{
    $_SESSION['cart_giua_ki'][$hoten][$id_phone][$color]=array('id_phone'=>$id_phone,'color'=>$color,'quantity'=> $quantity=$quantity+$_SESSION['cart_giua_ki'][$hoten][$id_phone][$color]['quantity']);   
}

header("location:gio_hang.php");
?>
