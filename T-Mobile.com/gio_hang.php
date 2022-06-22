<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
<title>GIỎ HÀNG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}
body {
  margin: 0;
}
.header { 
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}
/*css cho cột và hàng cho sản phẩm*/
.cart {
  width: 100%;
  padding: 8px;
  border:1px solid black;border-radius:10px;
  margin:10px 0px;
}
.column_1{width:10%}
.column_2{width:30%}
.column_3{width:34%}
.column_4{width:20%}
.column_5{width:6%}
.row:after {
  content: "";
  display: table;
  clear: both;
}
/*thực hiện responsive khi sang thiết bị*/
@media screen and (max-width:600px) {
.cart .column_2{width:58%;order:1}
.cart .column_1{width:30%;order:2}
.cart .column_5{width:12%;order:3}
.cart .column_3{width:70%;order:4}
.cart .column_4{width:30%;order:5}
}
/* css cho sản phẩm(product)*/
.b{border: 1px solid blue}
.g{border: 1px solid green}
.r{border: 1px solid red}
.y{border: 1px solid yellow}
</style>
</head>
<body>
<?php include_once('header.php');
 ?>
<div class="container" style="margin-top:30px">
  <div class="product_company"><h3>Thông tin giỏ hàng của bạn</h3></div>
  <hr>
  <?php
  include_once('connectSQL.php');
$hoten=$set_hoten;
$total_all=0;
if(isset($_SESSION['cart_giua_ki'][$hoten])){ ?>
<div><a href="xuly_xoa_gio.php?loai=all&hoten=<?php echo $hoten ?>">
<button style="border-radius:6px;background:#16f7c6"><b style="color:black">&#9851;Xóa tất cả giỏ hàng</b style="color:black"></button>
</a></div>
<?php
    $i=1;
foreach($_SESSION['cart_giua_ki'][$hoten] as $id_phone=>$value){
  foreach($_SESSION['cart_giua_ki'][$hoten][$id_phone] as $cart){
    $query=mysqli_query($conn,"Select * from phone where id_phone='".$cart['id_phone']."'");
$row=mysqli_fetch_array($query);

$query_img=mysqli_query($conn,"Select * from img_color where id_phone='".$cart['id_phone']."'");
$row_img=mysqli_fetch_array($query_img);

$total=$row['gia'] * $cart['quantity'];
$total_all+=$total; ?>

<div class="cart">
  <div class="row" style="margin:0">
    <div class="column_1">
<img style="width:100%;" class="" src="<?php echo $row['img_chinh']?>">
</div>
    <div class="column_2">
      <span style="color:green">Sản phẩm thứ <?php echo $i?></span><br>
    <a href="chi_tiet_san_pham.php?loai=simple&hang=<?php echo $row['hang']?>&ten=<?php echo $row['ten']?>"><h5><?php echo $row['ten']?></h5></a>
    <h6 style="color:red"><?php echo number_format($row['gia'], 0, ',', '.')?>đ</h6>
</div>
    <div class="column_3">
    <h5>Màu điện thoại bạn chọn:</h5>
<div style="float:left;width:100px"><b>&#10146;Màu: </b><b style="color:red"><?php echo $cart['color']?></b></div>
<?php $query_img_color=mysqli_query($conn,"SELECT * FROM `img_color` WHERE id_phone='".$cart['id_phone']."' and ten_mau='".$cart['color']."'");
$row_img_color=mysqli_fetch_array($query_img_color); ?>
<img style="width:80px;" class="" src="<?php echo $row_img_color['img_mau']?>">
    </div>
    <div class="column_4">
<b>Số lượng: </b><span style="color:red"><?php echo $cart['quantity']?></span><br>
<b>Tổng giá: </b><span style="color:red"><?php echo number_format($total, 0, ',', '.')?>đ</span><br>
    </div>
    <div class="column_5">
    <a href="xuly_xoa_gio.php?loai=simple&hoten=<?php echo $hoten ?>&id_phone=<?php echo $cart['id_phone']?>&color=<?php echo $cart['color'] ?>">
    <button style="border-radius:6px;background:#16f7c6;font-weight:bold">&#10006;</button>
  </a>
    </div>
</div>
</div>

<?php 
$i++;
}
}?>
    <div style="float:right;font-size:20px"><b>Tổng giá tất cả giỏ hàng: </b><span style="color:red"><?php echo number_format($total_all, 0, ',', '.')?>đ</span><br>
<button style="float:right;border-radius:10px;font-weight:bold;background-image: linear-gradient(to bottom right, #00FFA1, #00FFFF);"><h5>Đặt hàng tất cả</h5></button>
</div>
<br><br><br>
<?php 
}else{ ?>
<div style="width:100%;display:flex;padding:50px 0px">
<div style="margin:auto;text-align:center">
<h4>Hiện chưa có sản phẩm trong giỏ hàng.</h4>
<a href="home.php"><button>Quay lại T-MOBILE</button></a>
</div>
</div>
<hr>

<?php
}
?>
<div>
    
</div>
</div>
<br>
<?php include_once("footer.html") ?>
</body>
</html>
