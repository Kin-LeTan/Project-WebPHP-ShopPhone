<?php 
include_once("connectSQL.php");
$query_maxid_phone=mysqli_query($conn,"SELECT MAX(id) FROM `phone`");
$row_maxid_phone=mysqli_fetch_array($query_maxid_phone);

$query_maxid_img_color=mysqli_query($conn,"SELECT MAX(id) FROM `img_color`");
$row_maxid_img_color=mysqli_fetch_array($query_maxid_img_color);
$i_maxid_img_color=$row_maxid_img_color['MAX(id)'];

$query_maxid_img_color_detail=mysqli_query($conn,"SELECT MAX(id) FROM `img_color_detail`");
$row_maxid_img_color_detail=mysqli_fetch_array($query_maxid_img_color_detail);
$i_maxid_img_color_detail=$row_maxid_img_color_detail['MAX(id)'];

mysqli_query($conn,"INSERT INTO `phone`(`id`, `id_phone`, `hang`, `ten`, `img_chinh`, `gia`, `evaluate`) VALUES ('".($row_maxid_phone['MAX(id)']+1)."','".$_POST['id_phone']."','".$_POST['hang']."','".$_POST['ten']."','".$_POST['img_chinh']."','".$_POST['gia']."','".$_POST['editor1']."')");

$i1=1;
while(isset($_POST['ten_mau_'.$i1.''])){
    $i_maxid_img_color++;
    mysqli_query($conn,"INSERT INTO `img_color`(`id`, `id_phone`, `ten_mau`, `img_mau`, `so_luong`) VALUES ('$i_maxid_img_color','".$_POST['id_phone']."','".$_POST['ten_mau_'.$i1.'']."','".$_POST['img_mau_'.$i1.'']."','".$_POST['so_luong_'.$i1.'']."')");
    $i2=1;
    while(isset($_POST['img_mau_chi_tiet_'.$i1.'_'.$i2.''])){
        $i_maxid_img_color_detail++;
        mysqli_query($conn,"INSERT INTO `img_color_detail`(`id`, `id_phone`, `ten_mau`, `stt_mau_chi_tiet`, `img_mau_chi_tiet`) VALUES ('$i_maxid_img_color_detail','".$_POST['id_phone']."','".$_POST['ten_mau_'.$i1.'']."','$i2','".$_POST['img_mau_chi_tiet_'.$i1.'_'.$i2.'']."')");
        $i2++;
    }
    $i1++;
}
header("location:Admin.php?loai=qlsp");
?>