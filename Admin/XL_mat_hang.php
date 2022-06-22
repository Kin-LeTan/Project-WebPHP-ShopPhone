<?php
include_once("connectSQL.php");
$type=$_GET['type'];
if($type=="create"){
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
    header("location:mat_hang.php?type=show");
}
if($type=="delete"){
$id_phone=$_GET["id_phone"];
mysqli_query($conn,"DELETE FROM `phone` WHERE id_phone='$id_phone'");
mysqli_query($conn,"DELETE FROM `img_color_detail` WHERE id_phone='$id_phone'");
mysqli_query($conn,"DELETE FROM `img_color` WHERE id_phone='$id_phone'");

$query_phone=mysqli_query($conn, "SELECT * FROM `phone`");
$i_phone=0;
while($row_phone=mysqli_fetch_array($query_phone)){
    $i_phone++;
    mysqli_query($conn, "UPDATE `phone` SET `id`='$i_phone' WHERE id='".$row_phone['id']."'");
}

$query_color=mysqli_query($conn, "SELECT * FROM `img_color`");
$i_color=0;
while($row_color=mysqli_fetch_array($query_color)){
    $i_color++;
    mysqli_query($conn, "UPDATE `img_color` SET `id`='$i_color' WHERE id='".$row_color['id']."'");
}

$query_color_detail=mysqli_query($conn, "SELECT * FROM `img_color_detail`");
$i_color_detail=0;
while($row_color_detail=mysqli_fetch_array($query_color_detail)){
    $i_color_detail++;
    mysqli_query($conn, "UPDATE `img_color_detail` SET `id`='$i_color_detail' WHERE id='".$row_color_detail['id']."'");
}
header("location:mat_hang.php?type=show");
}
if($type=="edit"){
    echo $_POST['id_edit']."<br>".$_POST['img_chinh']."<br>".$_POST['id_phone']."<br>".$_POST['hang']."<br>".$_POST['ten']."<br>".$_POST['gia']."<br>";
    $i1=1;
    $query_color=mysqli_query($conn,"SELECT * FROM `img_color` WHERE id_phone='$_POST[id_phone]'");
    while($row_color=mysqli_fetch_array($query_color)){
        $i2=1;
echo $row_color['ten_mau']."<br>";
$query_color_detail=mysqli_query($conn,"SELECT * FROM `img_color_detail` WHERE id_phone='$_POST[id_phone]' AND ten_mau='$   [ten_mau]'");
    while($row_color_detail=mysqli_fetch_array($query_color_detail)){
        if($_POST['img_mau_chi_tiet_'.$i1.'_'.$i2.''])
   $i2++;
    }
$i1++;
    }
    }
?>