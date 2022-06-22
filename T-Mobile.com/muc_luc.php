<!DOCTYPE html>
<?php include_once("connectSQL.php")?>
<html lang="en">
<head>
<title>HÃNG | <?php echo $_GET['hang'] ?></title>
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
/*css cho cột và hàng cho sản phẩm*/
.column {
  float: left;
  width: 20%;
  padding: 10px;
  transition: padding 0.3s;
}
.column:hover {
  padding: 4px;
  transition: padding 0.3s;
  box-shadow:0px 0px 20px -12px grey;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
/*thực hiện responsive khi sang thiết bị*/
@media screen and (max-width:600px) {
  .column {
    width: 50%;
  }
  .column:hover {
  width: 50%;
}
}
/* css cho sản phẩm(product)*/
.product_company{height:46px;}
.product_company h3{float:left;}
.product_company a{float:right}
.column a{text-decoration-line:none}
.product_img{height:auto}
.product_img img{width:100%;;height:auto;text-align: center;}
.product_inf{height:150px}
.product_inf .product_name{height:30%;font-style: monospace;font-size:17px;overflow: hidden;color:black}
.product_inf .product_price{height:25%;font-style: monospace;color:red}
.product_inf .product_review{height:45%;color:black}
.page_true{pointer-events: none;padding:10px;background:#25baff;border-radius:30px;border:2px solid gray;color:white;font-weight:bold;text-decoration: none;}
.page_false{padding:10px;border:1px solid gray;color:black;font-weight:bold;text-decoration: none;}

.active_page

.b{border: 1px solid blue}
.g{border: 1px solid green}
.r{border: 1px solid red}
.y{border: 1px solid yellow}
.star_evaluate{width:20px}

.pagination {
  list-style: none;
  padding: 0;
  margin-top: 10px;
}
.pagination li {
  display: inline;
  text-align: center;
}
.pagination a {
  float: left;
  display: block;
  font-size: 14px;
  text-decoration: none;
  padding: 5px 12px;
  color: #fff;
  margin-left: -1px;
  border: 1px solid transparent;
  line-height: 1.5;
}
.pagination a.active {
  cursor: default;
}
.pagination a:active {
  outline: none;
}
.modal-1 a {
  border-color: #ddd;
  color: #4285F4;
  background: #fff;
}
.modal-1 a:hover {
  background: #eee;
}
.modal-1 a.active, .modal-1 a:active {
  border-color: #4285F4;
  background: #4285F4;
  color: #fff;
}
</style>
</head>
<body>
<?php include_once('header.php'); ?>

<div class="container" style="margin-top:30px">
<hr>
  <div class="product_company"><h3 style="text-transform: uppercase"><?php if($_GET['hang'] != "ALL"){echo $_GET['hang'];}else{ echo "Tất cả hãng điện thoại";} ?></h3></div>
<div class="row">
<?php

$page=$_GET['page'];

$number_of_output_cells_per_page = 3;

$result=$page*$number_of_output_cells_per_page;
if($_GET['hang'] != "ALL"){
$query_limit=mysqli_query($conn,"SELECT * from phone WHERE `hang`='".$_GET['hang']."' ORDER by id DESC LIMIT ".$result.", ".$number_of_output_cells_per_page."");
}else{
  $query_limit=mysqli_query($conn,"SELECT * from phone ORDER by id DESC LIMIT ".$result.", ".$number_of_output_cells_per_page."");
}
while($row_limit = mysqli_fetch_array($query_limit)){
    ?>
<div class="column">
  <a style="text-decoration:none" href="chi_tiet_san_pham.php?hang=<?php echo $row_limit['hang']?>&ten=<?php echo $row_limit['ten']?>">
<div class="product_img">
  <img class="" src="<?php echo $row_limit['img_chinh'] ?>">
</div>
<div class="product_inf">
<div class="product_name"><?php echo $row_limit['ten']?></div>
<div class="product_price"><span><?php echo number_format($row_limit['gia'], 0, ',', '.')?>đ</span></div>
<div class="product_review">
  <span style="font-size:12px">giảm 22.300.000.000đ, mới, hết hàng, gần hết hàng</span><br>
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
  <img class="star_evaluate"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQeDYrJ2uA7Mb9iSebSU7LwAPyEff9imk5BItf1BmbMO1gPeJg_L5d0KRNsuWMYbF6xb0&usqp=CAU">
</div>
</div>
</a> 
</div>
<?php
}
mysqli_free_result($query_limit);
?>
<hr>
</div>
<hr>
<div style="text-align:center;padding:0px 18px">
<ul class="pagination modal-1" style="display:inline-block">
<?php if($page != 0){ ?>
<li><a href="muc_luc.php?hang=<?php echo $_GET['hang'] ?>&page=0" class="prev">Trang đầu</a></li>
<?php
}
if($_GET['hang'] != "ALL"){
$query=mysqli_query($conn,"SELECT * from phone WHERE `hang`='".$_GET['hang']."'");
}else{
  $query=mysqli_query($conn,"SELECT * from phone");
}
$i=1;
$number_page=0;
while($row = mysqli_fetch_array($query)){
  if($i % $number_of_output_cells_per_page == 0){ 
    if($page == $number_page){
      $check_page="class='active'";
    }else{
      $check_page="";
    }
    echo "<li><a ".$check_page." href='muc_luc.php?hang=".$_GET['hang']."&page=".$number_page."'>".$number_page."</a></li>";
    $number_page++;
  }
  $i++;
}
if($page == $number_page){
  $check_page="class='active'";
}else{
  $check_page="";
}
if(($i-1) % $number_of_output_cells_per_page != 0){
  echo "<li><a ".$check_page." href='muc_luc.php?hang=".$_GET['hang']."&page=".$number_page."'>".$number_page."</a></li>";
}
if($number_page > $page){ ?>
<li><a href="muc_luc.php?hang=<?php echo $_GET['hang'] ?>&page=<?php echo $number_page ?>" class="next">Trang cuối</a></li>
<?php } ?>
</ul>
</div>
</div>
<br>
<br>
<?php include_once("footer.html") ?>
</body>
</html>
