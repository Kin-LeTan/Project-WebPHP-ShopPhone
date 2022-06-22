<!DOCTYPE html>
<?php include_once("connectSQL.php")?>
<html lang="en">
<head>
<title>Tìm kiếm</title>
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
.b{border: 1px solid blue}
.g{border: 1px solid green}
.r{border: 1px solid red}
.y{border: 1px solid yellow}
.star_evaluate{width:20px}
</style>
</head>
<body>
<?php include_once('header.php'); ?>

<div class="container" style="margin-top:30px">
<hr>
  <div class="product_company"><h3>Tìm kiếm cú pháp là: <?php echo $_GET['key'] ?></h3></div>
<div class="row">
<?php
$query_1=mysqli_query($conn,"SELECT * from phone where ten LIKE '%".$_GET['key']."%' ORDER by id DESC");
while($row = mysqli_fetch_array($query_1)){
    $result = str_replace($_GET['key'], "<span style='color:red;text-decoration:underline'>".$_GET['key']."</span>", $row['ten']);
    ?>
<div class="column">
  <a style="text-decoration:none" href="chi_tiet_san_pham.php?hang=<?php echo $row['hang']?>&ten=<?php echo $row['ten']?>">
<div class="product_img">
  <img class="" src="<?php echo $row['img_chinh'] ?>">
</div>
<div class="product_inf">
<div class="product_name"><?php echo $result?></div>
<div class="product_price"><span><?php echo number_format($row['gia'], 0, ',', '.')?>đ</span></div>
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
?>
<hr>
</div>
</div>
<br>
<?php include_once("footer.html") ?>
</body>
</html>
