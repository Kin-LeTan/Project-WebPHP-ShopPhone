<!DOCTYPE html>
<html lang="en">
<head>
<title>LỊCH SỬ ĐẶT HÀNG</title>
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
.column {
  width: 100%;
  padding: 10px;
    border-radius:2px;border:2px solid black;
    margin:5px 0px;
}
.column_color{
    width: 33.33%;
    height:50%;
    display: flex;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.img_main{width:15%;}
.all_color{width:65%;}
.all_total{width:20%;}
/*thực hiện responsive khi sang thiết bị*/
@media screen and (max-width:600px) {
    #change .img_main{order:1;width:30%;}
    #change .all_total{order:2;width:70%;}
    #change .all_color{order:3;width:100%;}
    .column_color{width: 50%;}
}
/* css cho sản phẩm(product)*/
.b{border: 1px solid blue}
.g{border: 1px solid green}
.r{border: 1px solid red}
.y{border: 1px solid yellow}
</style>
</head>
<body>
    <?php include_once('header.php'); ?>
<div class="container"><br>
<h3>Lịch sử đặt hàng:</h3>
<hr>
<div class="row">
    <?php
    include_once('connectSQL.php');
    $query=mysqli_query($conn,"SELECT *, Sum(`so_luong_dat`) FROM `history_order` WHERE hoten='".$set_hoten."' GROUP BY id_phone  ORDER by time_dat DESC");
    while($row=mysqli_fetch_array($query)){
        $query_phone=mysqli_query($conn,"SELECT * FROM `phone` WHERE id_phone='".$row['id_phone']."'");
        $row_phone=mysqli_fetch_array($query_phone); ?>
<div class="column">
    <div style="width:100%;border-bottom:1px solid gray;margin-bottom: 3px;padding:2px 0px">
    <a style="float:right" href="#">
    <button style="border-radius:20px;font-weight:bold;background-image: linear-gradient(to bottom right,  #fca5f1, #b5ffff)">&#9851;Xóa l.sử</button>
    </a>
    <a href="chi_tiet_san_pham.php?hang=<?php echo $row_phone['hang']?>&ten=<?php echo $row_phone['ten']?>">
    <h5><?php echo $row_phone['ten'] ?></h5></a>
    <h5 style="color:red"><?php echo number_format($row_phone['gia'], 0, ',', '.') ?>đ</h5>
    </div>
    <div class="row" id="change" style="width:100%;margin:0;">
    
    <div class="img_main">
    <img style="width:100%;" src="<?php echo $row_phone['img_chinh'] ?>">
    </div>
    
    <div class="all_color">
    <b style="color:red">	&#10151;Các loại màu sản phẩm bạn đã đặt hàng:</b>
    <div class="row" style="margin:0">

<?php $query_all_color_order=mysqli_query($conn,"SELECT `ten_mau_sp`, SUM(`so_luong_dat`) FROM `history_order` WHERE hoten='".$set_hoten."' AND id_phone='".$row['id_phone']."' GROUP BY ten_mau_sp ORDER by time_dat DESC");
while($row_all_color_order=mysqli_fetch_array($query_all_color_order)){
    $query_img_color=mysqli_query($conn,"SELECT * FROM `img_color` WHERE id_phone='".$row['id_phone']."' AND ten_mau='".$row_all_color_order['ten_mau_sp']."'");
    $row_img_color=mysqli_fetch_array($query_img_color); ?>
    <div class="column_color">
        <div style="width: 30%;"><img style="width:100%;" src="<?php echo $row_img_color['img_mau'] ?>"></div>
        <div style="width: 70%;"><b>Số lượng: <?php echo $row_all_color_order['SUM(`so_luong_dat`)'] ?></b><br>
        <b> Màu: <?php echo $row_all_color_order['ten_mau_sp'] ?></b></div>
    </div>
<?php } ?>
    </div>
    </div>
    
    <div class="all_total">
        <b>T.Gian gần nhất: </b><b style="color:red">12/12/2000 12:60:60</b><br>
        <b>Tổng số lượng: </b><b style="color:red"><?php echo $row['Sum(`so_luong_dat`)'] ?></b><br>
        <b>Tổng giá tất cả: </b><b style="color:red"><?php echo number_format($row['Sum(`so_luong_dat`)']*$row_phone['gia'], 0, ',', '.') ?>đ</b><br>
        <a href="#"><button style="width:100%;border-radius:5px;font-weight:bold;background-image: linear-gradient(to bottom right,  #fca5f1, #b5ffff)">Xem chi tiết hơn</button></a>
    </div>
    </div>
    </div>
<?php } ?>

</div>
</div>
    </div>
</div>
</div>
<?php include_once('footer.html'); ?>
</body>
</html>
