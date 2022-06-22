<?php 
include_once('connectSQL.php');
$id_phone=$_POST['id_phone'];
$hoten=$_POST['hoten'];
$color=$_POST['color'];
$quantity=$_POST['quantity'];
$type_order=$_POST['type_order'];

$check_quatity_query=mysqli_query($conn,"SELECT * FROM `img_color` where id_phone='$id_phone' and ten_mau='$color'");
$check_quatity_row=mysqli_fetch_array($check_quatity_query);

if($check_quatity_row['so_luong'] >= $quantity){
$max_id_query1=mysqli_query($conn,"SELECT MAX(`id`) FROM `order`");
$max_id_row1=mysqli_fetch_array($max_id_query1);
if(empty($max_id_row1['MAX(`id`)'])){
    $stt1=1;
}else{
    $stt1=$max_id_row1['MAX(`id`)']+1;
}
mysqli_query($conn,"INSERT INTO `order`(`id`, `id_phone`, `hoten`, `ten_mau_sp`, `hinh_thuc_dat`, `so_luong_dat`, `time_dat`, `trang_thai`) VALUES
 ('$stt1','$id_phone','$hoten','$color','$type_order','$quantity','".date("Y-m-d")." ".date("H:i:s")."','no')");
mysqli_query($conn,"UPDATE `img_color` SET `so_luong`='".($check_quatity_row['so_luong'] - $quantity)."' WHERE id_phone='$id_phone' and ten_mau='$color'");

 $max_id_query2=mysqli_query($conn,"SELECT MAX(`id`) FROM `history_order`");
 $max_id_row2=mysqli_fetch_array($max_id_query2);
 if(empty($max_id_row2['MAX(`id`)'])){
     $stt2=1;
 }else{
     $stt2=$max_id_row2['MAX(`id`)']+1;
 }
mysqli_query($conn,"INSERT INTO `history_order`(`id`, `hoten`, `id_phone`, `ten_mau_sp`, `so_luong_dat`, `hinh_thuc_dat`, `time_dat`) VALUES 
('$stt2','$hoten','$id_phone','$color','$quantity','$type_order','".date("Y-m-d")." ".date("H:i:s")."')");

header("location:lich_su_dat_hang.php");
}else{
    setcookie('quantity_limit','Sản phẩm: '.$_POST['ten'].'.\nMàu '.$color.' hiện cập nhật còn: '.$check_quatity_row['so_luong'].'.\nSố lượng bạn chọn là:'.$quantity.'\nVui lòng bạn thử lại!',time() + 1);
    header("location:chi_tiet_san_pham.php?hang=".$_POST['hang']."&ten=".$_POST['ten']."");
}
?>