
       <!DOCTYPE html>
<?php include_once('connectSQL.php'); ?>
<html lang="en">
<head>
<title>Sản phẩm | <?php echo $_GET['ten'] ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    .column_1 {
      float: left;
      width: 60%;
    }
    .column_2 {
      float: left;
      width: 40%;   
    }
    .column_3 {
      float: left;
      width: 50%;   
    }
    .column_4 {
      float: left;
      width: 50%;   
    }
    .column_5{
      float: left;
      padding:10px;
      width:55%;
    }
    .column_6{
      float: left;
      padding:10px;
      width:45%;
    }
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    /*Thực hiện các thông tin sản phẩm*/
    .all_slide{position:relative;padding:10px}
    .button_move_slide{height:100%;width:8%;z-index:2;position:absolute;display:flex;cursor:pointer;text-align:center}
    .arrow_icon{width:100%;margin:auto;font-size:60px;opacity:0.5;}
    .arrow_icon:hover{opacity:1;color:red}
    .button_change_slide{width:12%;border-radius:10px;padding:4px 0px}
    .slide-bar{width:100%;margin:auto;display:none}
    .slide{width:100%;display:none}
    .active{display:block}
    .device_configuration_table{width:100%;float: left;}
    .device_configuration_table tr:nth-child(even) {background-color: #f1f1f1;}
    .device_configuration_table td{padding:3px 0px 3px 10px}
    .device_configuration_table .ingredient{width:40%}
    .device_configuration_table .detail{width:60%}
    .buy{width:100%;float: right;}
    .price{color:red;margin-left:10px;font-size:23px;font-weight:bold;}
    .buy .order_type{text-align:center}
    .order_type button{width:40%;margin:0px 10px;padding:5px 0px;border-radius:10px;font-weight: bold;}
    .b{border: 1px solid blue}
    .g{border: 1px solid green}
    .r{border: 1px solid red}
    .y{border: 1px solid yellow}
    .p{border:5px solid purple}
    .show{display:block}
    .hide{display:none}
    .modal_self{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(68, 68, 68, 0.438);z-index:3}
    .modal_self .modal_body{position:relative;background:white;height:100%;width:900px;margin:0 auto;display:flex;overflow:auto;}
    .title_buy .modal_img_color button{width:30%;height:auto;border-radius:15px;padding:5px 2px;border:0.5px solid black;}
    .title_buy .modal_img_color img{width:100%}
.modal_type_buy input[type="submit"]{width:90%;margin:5px 0px;;padding:5px 0px;border-radius:10px;font-weight: bold;}
    /*thực hiện responsive khi sang thiết bị khác*/
    @media screen and (max-width:600px) {
    .column_1 {width: 100%}
    .button_change_slide{width:17%;}
    .column_2{width: 100%;display:flex;flex-wrap:wrap;}
    .slide{position:relative;width:100%;}
    .column_2 #b{order:1;margin-bottom:20px}
    .column_2 #a{order:2;border-top:0.5px solid gray}
    .modal_self .modal_body{width:100%}
    .column_3{width:100%}
    .column_4{width:100%}
    .column_5{width:100%}
    .column_6{width:100%}
    .title_cart{width:100%}
    }
    </style>
</head>
<body>
    
  <?php include_once('header.php')?>
  <?php
  $hang=$_GET['hang'];$ten=$_GET['ten'];
  $query_phone=mysqli_query($conn,"SELECT * from phone WHERE `hang`='".$hang."' AND `ten`='".$ten."'");
  if($row_phone = mysqli_fetch_array($query_phone)){
      ?>
  <script>
function buy(){
  document.getElementById("modal_buy_cart").style.display = "block";
  document.getElementById("title_buy").style.display = "block";
}
function cart(){
  document.getElementById("modal_buy_cart").style.display = "block";
  document.getElementById("title_cart").style.display = "block";
}
function close_modal(){
  document.getElementById("modal_buy_cart").style.display = "none";
  document.getElementById("title_buy").style.display = "none";
  document.getElementById("title_cart").style.display = "none";
}
  </script>
  <div id="modal_buy_cart" class="modal_self" style="display: none">
   <div class="modal_body">
     <button style="position:absolute;width:50px;right:0" onclick="close_modal()">X</button>
<div id="title_buy" class="title_buy row" style="margin:auto;width:70%;border-top:1px solid black;border-bottom:1px solid black;display:none">
<div class="column_3">
<div>
  <span style="font-weight: bold;font-size:20px;width:100%"><?php echo $row_phone['ten'] ?></span><br>
  <span class="price">Giá: <?php echo number_format($row_phone['gia'], 0, ',', '.') ?>đ</span>
</div><hr>
<div class="modal_img_color">
  <h6> Màu sản phẩm:</h6>
  <?php $query_img_color=mysqli_query($conn,"SELECT * from img_color WHERE id_phone='".$row_phone['id_phone']."'");
$i_color=1;
while($row_img_color=mysqli_fetch_array($query_img_color)){?>
  <button id="buy_color_<?php echo $i_color ?>" style="border:<?php if($i_color==1){ echo "2px solid red";}else{ echo "1px solid gray";} ?>" onclick="buy_change=<?php echo $i_color ?>;buy_color()">
  <img src="<?php echo $row_img_color['img_mau'] ?>">
  <b id="input_color_buy_<?php echo $i_color ?>" style="font-size:12px"><?php echo $row_img_color['ten_mau']?></b>(<?php echo $row_img_color['so_luong']?>)
</button>
  <?php $i_color++; }
  mysqli_free_result($query_img_color);
   ?> 
  <script>
    function buy_color(){
      <?php $query_img_color=mysqli_query($conn,"SELECT * from img_color WHERE id_phone='".$row_phone['id_phone']."'");
$i_color=1;
while($row_img_color=mysqli_fetch_array($query_img_color)){?>
document.getElementById("buy_color_"+<?php echo $i_color?>+"").style.border="1px solid gray"
 <?php $i_color++; }
  mysqli_free_result($query_img_color);
   ?>
      document.getElementById("buy_color_"+buy_change+"").style.border="2px solid red"
      document.getElementById("input_color_buy").value=""+document.getElementById("input_color_buy_"+buy_change+"").innerHTML+""
    } 
  </script>
  
</div><hr>
<div style="text-align:center">
  <h6>Số lượng sản phẩm:</h6>
  <button onclick="buy_minus()">-</button>
  <input id="buy_quantity" style="text-align:center;width:40%" type="text" name="quantity" value="1" disabled>
  <button onclick="buy_plus()">+</button>
  <script>
    buy_quantity=1;
function buy_minus(){
  if(buy_quantity > 1){
    buy_quantity--;
  }
  document.getElementById("buy_quantity").value=buy_quantity;
  document.getElementById("input_buy_quantity").value=buy_quantity;
}
function buy_plus(){
    buy_quantity++;
  document.getElementById("buy_quantity").value=buy_quantity;
  document.getElementById("input_buy_quantity").value=buy_quantity;
}
  </script>
</div>
<hr>
<div class="modal_type_buy" style="padding:10px 0px;">
  <h6>Chọn hình thức đặt hàng:</h6>
  <div style="display:flex;">
  <div style="width:50%;">
    
<form action="xuly_dat_hang.php" method="post">
<input type="hidden" name="id_phone" value="<?php echo $row_phone['id_phone'] ?>">
<input type="hidden" name="hoten" value="<?php echo $set_hoten ?>">
<input type="hidden" name="hang" value="<?php echo $hang ?>">
  <input type="hidden" name="ten" value="<?php echo $ten ?>">
  <input id="input_buy_quantity" type="hidden" name="quantity" value="1">
  <?php $query_img_color=mysqli_query($conn,"SELECT * from img_color WHERE id_phone='".$row_phone['id_phone']."'");
$i_color=1;
$row_img_color=mysqli_fetch_array($query_img_color);?>
  <input id="input_color_buy" type="hidden" name="color" value="<?php echo $row_img_color['ten_mau'] ?>">
  <?php mysqli_free_result($query_img_color); ?>
    <input type="radio" name="type_order" value="shop" checked>Đặt tại shop.<br>
    <input type="radio" name="type_order" value="shipper">Đặt giao hàng.
  </div>
  <div style="text-align:center;width:50%;">
<input  type="submit" style="background:rgba(0, 225, 255, 0.678)" value="Đặt hàng">
</form>
</div>
</div>
</div>
</div>

<div class="column_4" style="padding-top:5px">
  <table id="a" class="device_configuration_table">
    <tr>
        <th colspan="100" style="text-align:center;">Cấu hình thiết bị điện thoại.</th>
    </tr>
    <tr>
        <td class="ingredient">Màn hình:</td>
        <td class="detail">AMOLED 6.43", Full HD+</td>
    </tr>
    <tr>
        <td class="ingredient">Hệ điều hành:</td>
        <td class="detail">Android 11</td>
    </tr>
    <tr>
        <td class="ingredient">Camera sau:</td>
        <td class="detail">Chính 48 MP & Phụ 2 MP, 2 MP</td>
    </tr>
    <tr>
        <td class="ingredient">Camere trước:</td>
        <td class="detail">16 MP</td>
    </tr>
    <tr>
        <td class="ingredient">Chip:</td>
        <td class="detail">Snapdragon 662</td>
    </tr>
    <tr>
        <td class="ingredient">Ram:</td>
        <td class="detail">8 GB</td>
    </tr>
    <tr>
        <td class="ingredient">Rom:</td>
        <td class="detail">128 GB</td>
    </tr>
    <tr>
        <td class="ingredient">Sim:</td>
        <td class="detail">2 Nano SIMHỗ, trợ 4G</td>
    </tr>
    <tr>
        <td class="ingredient">Pin:</td>
        <td class="detail">5000 mAh, 33 W</td>
    </tr>
  <tr>
    <td class="ingredient">Thời gian ra mắt</td>
    <td class="detail">2021</td>
</tr>
</table>
</div>
   </div>
   
<div id="title_cart" class="title_cart" style="margin:auto;width:60%;border-top:1px solid black;border-bottom:1px solid black;display:none">
  <div>
    <span style="font-weight: bold;font-size:20px;width:100%"><?php echo $row_phone['ten'] ?></span><br>
    <span class="price">Giá: <?php echo number_format($row_phone['gia'], 0, ',', '.') ?>đ</span>
  </div>
<hr>
  <div class="modal_img_color" style="text-align:center">
   <h6> Màu sản phẩm:</h6>
  <?php $query_img_color=mysqli_query($conn,"SELECT * from img_color WHERE id_phone='".$row_phone['id_phone']."'");
$i_color=1;
while($row_img_color=mysqli_fetch_array($query_img_color)){?>
  <button id="cart_color_<?php echo $i_color ?>" style="width:20%;background:white;border:<?php if($i_color==1){ echo "2px solid red";}else{ echo "1px solid gray";} ?>" onclick="cart_change=<?php echo $i_color ?>;cart_color()">
  <img style="width:100%;" src="<?php echo $row_img_color['img_mau'] ?>">
  <b id="input_color_cart_<?php echo $i_color ?>" style="font-size:12px"><?php echo $row_img_color['ten_mau'] ?></b> 
</button>
  <?php $i_color++; }
  mysqli_free_result($query_img_color);
   ?>
</div>
<script>
    function cart_color(){
      <?php $query_img_color=mysqli_query($conn,"SELECT * from img_color WHERE id_phone='".$row_phone['id_phone']."'");
$i_color=1;
while($row_img_color=mysqli_fetch_array($query_img_color)){?>
document.getElementById("cart_color_"+<?php echo $i_color?>+"").style.border="1px solid gray"
 <?php $i_color++; }
  mysqli_free_result($query_img_color);
   ?>
      document.getElementById("cart_color_"+cart_change+"").style.border="2px solid red"
      document.getElementById("input_color_cart").value=""+document.getElementById("input_color_cart_"+cart_change+"").innerHTML+""
    } 
  </script>
 <hr>
 
 <div style="text-align:center">
 <div class="" style="text-align:center">
  <h6>Số lượng sản phẩm:</h6>
  <button onclick="cart_minus()">-</button>
  <input id="cart_quantity" style="text-align:center;width:30%" type="text" name="quantity" value="1" disabled>
  <button onclick="cart_plus()">+</button>
  <script>
    cart_quantity=1;
    total=<?php echo $row_phone['gia'] ?>;
function cart_minus(){
  if(cart_quantity > 1){
    cart_quantity--;
    total/=2;
  }
  document.getElementById("cart_quantity").value=cart_quantity;
  document.getElementById("input_buy_cart").value=cart_quantity;
  document.getElementById("total").innerHTML=Number(total).toLocaleString("es-CO");
}
function cart_plus(){
    cart_quantity++;
    total*=2
  document.getElementById("cart_quantity").value=cart_quantity;
  document.getElementById("input_buy_cart").value=cart_quantity;
  document.getElementById("total").innerHTML=Number(total).toLocaleString("es-CO");
}
  </script>
</div>
<div class="">
  <h6>Tổng giá: <span id="total"><?php echo number_format($row_phone['gia'], 0, ',', '.') ?></span>đ</h6>
</div>  
</div>
<hr>
<div style="text-align:center">
  <form action="xuly_gio.php" method="post">
  <input type="hidden" name="hoten" value="<?php echo $set_hoten ?>">
  <input type="hidden" name="id_phone" value="<?php echo $row_phone['id_phone'] ?>">
  <?php $query_img_color=mysqli_query($conn,"SELECT * from img_color WHERE id_phone='".$row_phone['id_phone']."'");
$i_color=1;
$row_img_color=mysqli_fetch_array($query_img_color);?>
 <input id="input_color_cart" type="hidden" name="color" value="<?php echo $row_img_color['ten_mau'] ?>">
 <?php mysqli_free_result($query_img_color); ?>
 <input id="input_buy_cart" type="hidden" name="quantity" value="1">
  <input style="width:30%;margin:0px 5px;padding:5px 0px;border-radius:10px;font-weight: bold;background:yellowgreen;" type="submit" value="Đặt hàng">
</form>
</div>
</div>
    </div>
  </div>
<div class="container" style="margin-top:30px">
    <div class="product_name"><a href="Home.php">Trang chủ</a> | <a href="muc_luc.php?hang=<?php echo $hang ?>&page=0"><?php echo $hang ?></a>
        <br>
        <h5><?php echo $row_phone['ten'] ?></h5></div>
    <hr>

<div class="row">
<div class="column_1">
  <style>
  </style>
    <div class="all_slide">
    <div class="button_move_slide" onclick="prev()">
    <div class="arrow_icon" style="transform: rotate(180deg)">&#10097;</div>
</div>
<div class="button_move_slide" onclick="next()" style="right:0;">
<div class="arrow_icon">&#10097;</div>
</div>
<div class="nav-slide" id="nav-slide">
    <?php
$query_img_color=mysqli_query($conn,"SELECT * from img_color WHERE id_phone='".$row_phone['id_phone']."'");
$i_color=0;
while($row_img_color=mysqli_fetch_array($query_img_color)){
  if($i_color==0){
    $show_bar=" active";
  }else{ 
   $show_bar="";
  }?>
    <div id="slide-bar-<?php echo $i_color ?>" class="slide-bar<?php echo $show_bar ?>">
<?php $query_img_color_detail=mysqli_query($conn,"SELECT * from img_color_detail WHERE id_phone='".$row_phone['id_phone']."' AND ten_mau='".$row_img_color['ten_mau']."' order by stt_mau_chi_tiet ASC");
$i_detail=0;
 while($row_img_color_detail=mysqli_fetch_array($query_img_color_detail)){
   if($i_detail==0){
     $show=" active";
   }else{ 
    $show="";
   }?>
<img id="slide" class="slide<?php echo $show ?>" src="<?php echo $row_img_color_detail['img_mau_chi_tiet'] ?>">
<?php 
$i_detail++;
} ?>
</div>

<?php $i_color++;
 }
 mysqli_free_result($query_img_color);
mysqli_free_result($query_img_color_detail); ?>  
</div>
</div>
<div style="text-align:center">
<?php
$query_img_color=mysqli_query($conn,"SELECT * from img_color WHERE id_phone='".$row_phone['id_phone']."'");
$i_color=0;
while($row_img_color=mysqli_fetch_array($query_img_color)){?>
<button class="button_change_slide" style="background:white;font-size:13px" onclick="onpen_slide_bar(<?php echo $i_color ?>)">
<img style="width:100%;" src="<?php echo $row_img_color['img_mau'] ?>"><br>
<b style="font-size:10px"><?php echo $row_img_color['ten_mau'] ?></b></button>
<?php
$i_color++; }
mysqli_free_result($query_img_color);?>
</div>
  <script>
  var element_nav_slide = document.getElementById("nav-slide");
  var element_slide = document.getElementById("slide");

  var lenght_child_nav = (element_nav_slide.childNodes.length-1)/2;
 
  var number_slide_bar = 0;
  var arr_slide = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

function onpen_slide_bar(number){
  number_slide_bar=number;
  for (i = 0; i < lenght_child_nav; i++) {
    element_nav_slide.children[i].classList.remove("active");
  }
  element_nav_slide.children[number].classList.add("active");
}
function prev(){
  var element_slide_bar = document.getElementById("slide-bar-"+number_slide_bar+"");
  element_slide_bar.children[arr_slide[number_slide_bar]].classList.remove("active");
  arr_slide[number_slide_bar]--;
  if(arr_slide[number_slide_bar] == -1){
    arr_slide[number_slide_bar]=((element_slide_bar.childNodes.length-1)/2)-1;
  }
  element_slide_bar.children[arr_slide[number_slide_bar]].classList.add("active");
}
function next(){
  var element_slide_bar = document.getElementById("slide-bar-"+number_slide_bar+"");
  element_slide_bar.children[arr_slide[number_slide_bar]].classList.remove("active");
  arr_slide[number_slide_bar]++;
  if(arr_slide[number_slide_bar] == (element_slide_bar.childNodes.length-1)/2){
    arr_slide[number_slide_bar]=0;
  }
  element_slide_bar.children[arr_slide[number_slide_bar]].classList.add("active");
}
</script>
</div>
<div class="column_2" style="position: relative;">
<table id="a" class="device_configuration_table">
    <tr>
        <th colspan="100" style="text-align:center;">Cấu hình thiết bị điện thoại.</th>
    </tr>
    <tr>
        <td class="ingredient">Màn hình:</td>
        <td class="detail">AMOLED 6.43", Full HD+</td>
    </tr>
    <tr>
        <td class="ingredient">Hệ điều hành:</td>
        <td class="detail">Android 11</td>
    </tr>
    <tr>
        <td class="ingredient">Camera sau:</td>
        <td class="detail">Chính 48 MP & Phụ 2 MP, 2 MP</td>
    </tr>
    <tr>
        <td class="ingredient">Camere trước:</td>
        <td class="detail">16 MP</td>
    </tr>
    <tr>
        <td class="ingredient">Chip:</td>
        <td class="detail">Snapdragon 662</td>
    </tr>
    <tr>
        <td class="ingredient">Ram:</td>
        <td class="detail">8 GB</td>
    </tr>
    <tr>
        <td class="ingredient">Rom:</td>
        <td class="detail">128 GB</td>
    </tr>
    <tr>
        <td class="ingredient">Sim:</td>
        <td class="detail">2 Nano SIMHỗ, trợ 4G</td>
    </tr>
    <tr>
        <td class="ingredient">Pin:</td>
        <td class="detail">5000 mAh, 33 W</td>
    </tr>
  <tr>
    <td class="ingredient">Thời gian ra mắt</td>
    <td class="detail">2021</td>
</tr>
<tr style="text-align:center;border:0.3px solid gray;cursor: pointer;">
  <td colspan="2">Xem thêm cấu hình chi tiết &darr;</td>
</tr>
</table>
<div id="b" class="buy">
<p class="price">Giá: <?php echo number_format($row_phone['gia'], 0, ',', '.') ?>đ</p>
<div class="order_type">
<?php if(isset($_COOKIE['hoten'])){?>
  <button style="background:rgba(0, 255, 242, 0.678);" onclick="cart()">Thêm Vào giỏ</button>
<button style="background:rgba(255, 0, 0, 0.678);" onclick="buy()">Đặt hàng</button>
   <?php }else{?>
     <button onclick="login()" style="background:rgba(0, 255, 242, 0.678);">Thêm Vào giỏ</button>
     <button onclick="login()" style="background:rgba(255, 0, 0, 0.678);">Đặt hàng</button>
     <script type="text/javascript">
  function login() {
    var form = document.getElementById('form');
    var r = confirm("Cần tài khoản để thực hiện hành động này.\nBạn có muốn đến đăng nhập tài khoản không!");
    if(r == true) {
      location.replace("dang_nhap.php");
  }else{
    return false;
  }
}
</script>
  <?php   } ?>

</div>
</div><hr>
</div>

<div class="row" style="margin:auto">
<div  class="column_5" style="">
<div id="show_view_more_evaluate" style="overflow:hidden;height:600px">
  <h4 style="color:green">Bài viết đánh giá:</h4>
<?php 
echo $row_phone['evaluate'];
?>
</div>
<button style="width:100%;height:38px;;background:white" id="button_view_more_evaluate">Xem thêm &darr;</button>
<script>
  $(document).ready(function(){
  $("#button_view_more_evaluate").click(function(){
    $("#show_view_more_evaluate").css("height", "100%");
    $(this).css("display", "none");
  });
});
  </script>
  <hr>
  </div>
  <div class="column_6">
  <div style="padding:5px">
  <style>
    .rating-list li{display: flex;}
    .number-star{width:40px}
    .timeline-star{width: 100%;height:7px;background-color:gray;margin:auto;}
    .timing{height:100%;background-color:gold}
    .number-percent{width:20%;padding:auto}
  </style>
<div>
  
</div>
  <ul class="rating-list" style="display:inline">
  <?php
$i = array(0,0,0,0,0);
$query_star=mysqli_query($conn, "SELECT DISTINCT star FROM `comment` WHERE id_phone='".$row_phone['id_phone']."'");
$t=0;
while($row_star=mysqli_fetch_array($query_star)){
  $query_star2=mysqli_query($conn,"SELECT star FROM `comment` WHERE id_phone='".$row_phone['id_phone']."' AND star='".$row_star['star']."'");
  while($row_star2=mysqli_fetch_array($query_star2)){
$i[$row_star['star']-1]++;
  }
  $t++;
}
$total = $i[0]+$i[1]+$i[2]+$i[3]+$i[4];
$n=5;
for($t=4;$t>=0;$t--){
  if($i[$t]>0){
$i[$t] = $i[$t]/($total)*100;
   } ?>
  <li>
    <div class="number-star">
      <?php echo $n ?><i class="fa fa-star"></i>
    </div>
    <div class="timeline-star">
      <p class="timing" style="width: <?php echo $i[$t] ?>%"></p>
    </div>
 </li>
<?php
$n--;
} ?>
</ul>
    <h5>Các bình luận về <?php echo $ten ?>:</h5>
  <style>
    </style>
  <div class="cmt" style="overflow:hidden;border:1px solid gray;border-radius:5px;padding:5px">
<?php $query_cmt = mysqli_query($conn,"SELECT  * from `comment` WHERE id_phone='".$row_phone['id_phone']."' GROUP BY id DESC");
while($row_cmt = mysqli_fetch_array($query_cmt)){?>
<div>
<b style="font-weight:bold"><?php echo $row_cmt['hoten'] ?></b> 
<div>
  <?php for($i=1;$i<=5;$i++){?>
<i class="fa fa-star" style="color:<?php if($i<=$row_cmt['star']) echo "gold"; else echo "gray"; ?>" aria-hidden="true"></i>
<?php } ?>
</div>
<p><?php echo $row_cmt['cmt'] ?></p>
<span style="color:dodgerblue;font-size:14px"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Hữu ích</span>&nbsp;
<span style="color:dodgerblue;font-size:14px"><i class="fa fa-comment-o" aria-hidden="true"></i> Thảo luận</span> | 
<span style="color:gray;font-size:13px"><?php echo $row_cmt['time'] ?></span>
</div>
<hr>
<?php 
 } ?>
</div>
<button id="button_show_cmt" style="width:100%">Xem thêm bình luận</button>
<script>
  var s=$('.cmt').height();
  if(s<="350"){
    $('#button_show_cmt').hide();
  }else{
    $('.cmt').height('350px');
  }
$(document).ready(function(){
  $("#button_show_cmt").click(function(){
    s1=$('.cmt').height();
    s2=s1+350;
    if(s2<s){
      s1+=350;
      $('.cmt').height(''+s1+'px');
    }
    if(s2>=s){
      $('.cmt').height(''+s+'px');
      $('#button_show_cmt').hide();
    }
  });
});
</script>
<br><br>
<h5>Viết bình luận của bạn về sản phẩm:</h5>
<script>
    function validate() {
      var star = $("#input-star").val();
      var cmt = $("#input-cmt").val();
if(cmt.length <= 7 || cmt=="0") {
alert("Mời bạn viết ý kiến đánh giá 8 ký tự trở lên và chọn số sao đánh giá!!");
return false;
}
    }
</script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<?php if(isset($_COOKIE['hoten'])){
   $j="xuly_cmt.php";
   }else{
      $j="dang_nhap.php";
      } ?>
<style type="text/css">
#choose_stars li{display: inline-block;list-style: none;text-align:center;width:50px;color:gray}
#choose_stars .fa{font-size:30px}
#choose_stars .fa div{text-align:center;width: 100%;}
</style>
<div style="width:100%;margin:auto;border:2px solid gray;padding:5px;border-radius:3px">
<form onsubmit="return validate()" method="POST" action="<?php echo $j ?>">
    <input type="hidden" name="hoten" value="<?php echo $set_hoten ?>"><input name="id_phone" type="hidden" value="<?php echo $row_phone['id_phone'] ?>">
    <span>Cảm nhận của bạn đối với sản phẩm này như thế nào?<br> (Cho sao đi bạn gì ơi)</span>
    <input id="input-star" type="hidden" name="star" value="0">
    <ul id="choose_stars">
    <li class="star-1" val-star="1"><i class="fa fa-star" aria-hidden="true"></i><p>Rất tệ</p></li>
    <li class="star-2" val-star="2"><i class="fa fa-star" aria-hidden="true"></i><p>Tệ</p></li>
    <li class="star-3" val-star="3"><i class="fa fa-star" aria-hidden="true"></i><p>Thường</p></li>
    <li class="star-4" val-star="4"><i class="fa fa-star" aria-hidden="true"></i><p>Tốt</p></li>
    <li class="star-5" val-star="5"><i class="fa fa-star" aria-hidden="true"></i><p>Rất tốt</p></li>
    </ul>
    <span>Viết ý kiến đánh giá sản phẩm này tại đây: </span><br>
    <textarea id="input-cmt" name="cmt" style="width:100%;height:80px" placeholder="Mời bạn chia sẻ bài viết đánh giá sản phẩm này..."></textarea><br><br>
    <input type="submit" style="width:100%" value="Đăng bình bài viết đánh giá của bạn">
    </form>
</div>
<script>
    $(document).ready(function(){
  $("#choose_stars li").click(function(){
    var star = $(this).attr("val-star");
    var i = 1;
    $("#input-star").val(star);
    for(n=1;n<=5;n++){
        $("li").css("color","gray");
    }
    while(i <= star){
        $(".star-"+i+"").css("color","gold");
        i++;
    }
  });
});
</script>
  </div>
</div>
</div>
</div>
</div>
    <?php 
}
?>

<?php include_once("footer.html") ?>
</body>
</html>

<?php
  if(isset($_COOKIE['quantity_limit'])){?>
    <script>
        alert("<?php echo $_COOKIE['quantity_limit'] ?>");
        </script>
       <?php }?>
       