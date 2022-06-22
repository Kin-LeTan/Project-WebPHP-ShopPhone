<?php
include_once('connectSQL.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$hoten = $_POST['hoten'];
$id_phone = $_POST['id_phone'];
$star = $_POST['star'];
$cmt = $_POST['cmt'];
$max_id_query=mysqli_query($conn,"SELECT MAX(`id`) FROM `comment`");
$max_id_row=mysqli_fetch_array($max_id_query);
if(empty($max_id_row['MAX(`id`)'])){
    $stt=1;
}else{
    $stt=$max_id_row['MAX(`id`)']+1;
}
mysqli_query($conn,"INSERT INTO `comment`(`id`, `id_phone`, `hoten`, `star`, `cmt`, `like`, `time`) VALUES ('$stt','$id_phone','$hoten','$star','$cmt','0','".date("Y:m:d h:i:s")."')");
$query=mysqli_query($conn,"SELECT * FROM `phone` WHERE id_phone='$id_phone'");
$row=mysqli_fetch_array($query);
header("location:chi_tiet_san_pham.php?hang=".$row['hang']."&ten=".$row['ten']."");
?>