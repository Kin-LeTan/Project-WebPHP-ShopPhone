<?php
$VN_local = mysqli_connect("localhost", "root", "", "vietnamese_local") or die(mysql_error);
include_once('connectSQL.php');
if(isset($_POST['loai'])){
$loai=$_POST['loai'];
if($loai=="lo"){
$user=$_POST['user'];
$pass=$_POST['pass'];
$query=mysqli_query($conn,"SELECT * from `account` where user='".$user."' and pass='".$pass."'");
if(empty($row=mysqli_fetch_array($query))){
    setcookie('wrong_account','w');
    header("Location:dang_nhap.php");
}else{
    if(isset($_POST['remember'])){
        setcookie('hoten',"".$row['hoten']."",time() + 31536000);
    }else{
        setcookie('hoten',"".$row['hoten']."");
    }
    header("Location:Home.php");
}
}
if($loai=="re"){
    $hoten=$_POST['hoten'];
    $sdt=$_POST['sdt'];
    $city=$_POST['tinh_tp'];
    $quan=$_POST['quan'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $so=$_POST['sonha'];
    $duong=$_POST['duong'];
    $query=mysqli_query($conn,"SELECT * from `account` where user='".$user."'");
if($row=mysqli_fetch_array($query)){
    setcookie('wrong_account','w');
    header("Location:dang_ky.php");
}else{
    $query2=mysqli_query($conn,"SELECT MAX(`id`) FROM `customer_information`");
    $row2=mysqli_fetch_array($query2);
    if(empty($row2['MAX(`id`)'])){
        $stt=1;
    }else{
        $stt=$row2['MAX(`id`)']+1;
    }
    $query3=mysqli_query($VN_local,"SELECT * FROM `devvn_tinhthanhpho` where matp='".$city."'");
    $row3=mysqli_fetch_array($query3);
    $query4=mysqli_query($VN_local,"SELECT * FROM `devvn_quanhuyen` where maqh='".$quan."'");
    $row4=mysqli_fetch_array($query4);
    mysqli_query($conn,"INSERT INTO `customer_information`(`id`, `hoten`, `sdt`, `tp`, `quan`, `so_nha`, `duong`) VALUES ('$stt','$hoten','$sdt','".$row3['name']."','".$row4['name']."','$so','$duong')");
    mysqli_query($conn,"INSERT INTO `account`(`id`, `hoten`, `user`, `pass`) VALUES ('$stt','$hoten','$user','$pass')");
    if(isset($_POST['remember'])){
        setcookie('hoten',"".$hoten."",time() + 31536000);
    }else{
        setcookie('hoten',"".$hoten."");
    }
    header("Location:Home.php");
}
}
}
if(isset($_GET['loai'])){
if($_GET['loai']=="de"){
    setcookie('hoten',"",time() - 31536000);
    header("Location:dang_nhap.php");
}
}
?>