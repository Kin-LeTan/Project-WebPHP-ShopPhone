<!DOCTYPE html>
<?php include_once("connectSQL.php")?>
<html lang="en">
<head>
<title>QUẢN TRỊ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
  font-family: Times;
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
  float: left;
  width: 25%;
  padding: 10px;
  transition: padding 0.3s;
}
.column:hover {
  float: left;
  width: 25%;
  padding: 0px;
  transition: padding 0.3s;
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
.menu li{list-style-type:none;border-bottom: 1px solid gray;color:white;padding:14px 0px}
.menu a{color:white}
#show_hide_MENU{height:100%;width:20%;background:rgba(0, 0, 0, 0.8);overflow:hidden;display:none}
.b{border: 1px solid blue}
.g{border: 1px solid green}
.r{border: 1px solid red}
.y{border: 1px solid yellow}
</style>
</head>
<body><div class="header">
  <h1>T-MOBLIE</h1>
</div>
<div style="background:black">
<button style="width:70px;height:50px" onclick="showhideMenu()"><b>MENU</b></button>
</div>
<div style="position:relative;width:100%">
<div id="show_hide_MENU" style="position:fixed;">
<ul class="menu">
      <li>
        <a href="Home.php">Đến SHOP T-MOBILE</a>
      </li>
      <li>
        <a href="Admin.php?loai=dsdh">Danh sách đặt hàng</a>
      </li>
      <li>
        <a href="#">Thông kê</a>
      </li>
      <li>
        <a href="Admin.php?loai=qlsp">Quản lý sản phẩm</a>
      </li>
      <li>
        <a href="Admin.php?loai=qltk">Quản lý tài khoản</a>
      </li>
</ul>
</div>
<script>
    menu=1;
function showhideMenu(){
if(menu==1){
    document.getElementById("show_hide_MENU").style.display="block"; 
    menu=2;
}else{
document.getElementById("show_hide_MENU").style.display="none";
menu=1;
}
}
</script>
</div>
<div style="height:100%;width:100%;margin-top:50px">
<?php if(!isset($_GET['loai'])){ ?>
  <h2 style="text-align:center;width:100%">Để quản lý tốt nhất nên sử dụng thiết bị máy tính!</h2>
<?php }else{
if($_GET['loai']=="qlsp"){?>
<style>
    table th{text-align:center}
    table tr:nth-child(even){background-color: #f2f2f2;}
    table tr:hover {background-color: #ddd;}
</style>
    <table border="2" style="margin:auto">
<tr>
    <th style="width:50px">STT</th>
    <th style="width:150px">Mã ĐT</th>
    <th style="width:150px">Hãng</th>
    <th style="width:200px">Tên</th>
    <th style="width:100px">Ảnh</th>
    <th style="width:150px">Giá</th>
    <th style="width:200px">Công cụ</th>
</tr>
<?php
$query=mysqli_query($conn,"SELECT * FROM `phone` ORDER by id DESC");
$stt=1;
while($row=mysqli_fetch_array($query)){
?>
<tr>
    <th><?php echo $stt ?></th>
    <th><?php echo $row['id_phone'] ?></th>
    <th><?php echo $row['hang'] ?></th>
    <th><?php echo $row['ten'] ?></th>
    <th><img style="width:100%" src="<?php echo $row['img_chinh'] ?>"></th>
    <th><?php echo number_format($row['gia'], 0, ',', '.')?>đ</th>
    <th><a href="Admin.php?loai=ctsp&id=<?php echo $row['id_phone']?>"><button style="background:orange;font-weight:bold">Chi tiết của sản phẩm</button></a></th>
</tr>
    <?php $stt++; } ?>
<tr>
    <td colspan="100"><a style="float:right" href="Admin.php?loai=tspm"><button style="background:greenyellow;font-weight:bold">Tạo sản phẩm mới</button></a></td>
</tr>
    </table>
    <?php }
    if($_GET['loai']=="tspm"){
?>
<div style="margin:auto;width:1000px">
<h3 style="text-align:center">Tạo sản phẩm mới</h3>
<hr>
<form method="post" id="form">
<h4>Thông tin sản phẩm:</h4>
<div>
    Mã sản phẩm (bắt buộc): <input type="text" id="id_phone" name="id_phone" placeholder="Nhập mã sản phẩm"><br>
    Hãng (bắt buộc):<select name="hang">
    <option value="Samsung">Samsung</option>
    <option value="iPhone">iPhone</option>
    <option value="OPPO">OPPO</option>
  </select><br>
    Tên sản phẩm (bắt buộc): <input type="text" id="ten" name="ten" placeholder="Nhập tên sản phẩm"><br>
    Giá sản phẩm: <input type="number" step="10000" id="gia" name="gia" placeholder="Nhập giá sản phẩm">đ<br>
    Ảnh chính : <input id="input_img_main" style="width:100%" type="text" name="img_chinh" onkeyup="img_main()" placeholder="Nhập địa chỉ hình ảnh"><br>
    <img id="src_img_main" style="width:30%" src="">
    <script type="text/javascript">
    function img_main() {
      document.getElementById('src_img_main').src=document.getElementById('input_img_main').value;
    }
      </script>

</div>
<hr>
<h4>Tạo màu sản phẩm:</h4>
<div id="create_img_color">

<div id="create_color_1" style="display:flex;border-bottom:1px solid black;padding:5px 0px">
  <div id="img_color_1" style="width:30%">
  Màu hình ảnh thứ 1:<br>
  Tên Màu : <input type="text" name="ten_mau_1" placeholder="Nhập tên màu"><br>
  Số lượng :<input type="number" name="so_luong_1" placeholder="Nhập số lượng hiện có"><br>
<input id="input_img_color_1" style="width:80%" name="img_mau_1" onkeyup="document.getElementById('src_img_color_1').src=document.getElementById('input_img_color_1').value" placeholder="Nhập địa chỉ màu hình ảnh"> 
<img id="src_img_color_1" style="width:50%" src="">
  </div>
  <div style="width:70%;height:100%">
  <div id="create_img_color_detail_1">
      <div id="img_color_detail_1_1">
    <span>Ảnh chi tiết thứ 1: <input type="text" id="input_img_color_detail_1_1" name="img_mau_chi_tiet_1_1" onkeyup="document.getElementById('src_img_color_detail_1_1').src=document.getElementById('input_img_color_detail_1_1').value"></span>
    <br><img id="src_img_color_detail_1_1" style="width:20%" src=""><br>
</div>
</div>
      <br>
      Số lượng ảnh chi tiết: <input id="quatity_color_detail_1" type="number" min="1" max="20" value="1" onblur="i=1; AddDelColorDetail();">
  </div>
</div>
</div><script>
  color_detail=[0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2];
    i_color=2;
    function AddDelColor(){
      var quatity_color=$("#quatity_color").val();
      if(quatity_color > 10){
    alert("Sản phẩm chỉ chứa 10 màu!")
      }else{
      if(i_color <= quatity_color){
  var main = $("#create_img_color");
      while(i_color <= quatity_color){
        main.append("<div id='create_color_"+i_color+"' style='display:flex;border-bottom:1px solid black;padding:5px 0px'>"+ 
  "<div id='img_color_"+i_color+"' style='width:30%'>"+
  "Màu hình ảnh thứ "+i_color+":<br>"+
  "Tên Màu : <input type='text' name='ten_mau_"+i_color+"' placeholder='Nhập tên màu'><br>"+
  "Số lượng :<input type='number' name='so_luong_"+i_color+"' placeholder='Nhập số lượng hiện có'><br>"+
"<input id='input_img_color_"+i_color+"' style='width:80%' name='img_mau_"+i_color+"' onkeyup=\"document.getElementById('src_img_color_"+i_color+"').src=document.getElementById('input_img_color_"+i_color+"').value\" placeholder='Nhập địa chỉ màu hình ảnh'>"+
"<img id='src_img_color_"+i_color+"' style='width:50%' src=''>"+
  "</div>"+
  "<div style='width:70%;height:100%'>"+
  "<div id='img_color_detail_"+i_color+"_1'>"+
  "<div id='create_img_color_detail_"+i_color+"'>"+
    "<span>Ảnh chi tiết thứ 1: <input type='text' id='input_img_color_detail_"+i_color+"_1' name='img_mau_chi_tiet_"+i_color+"_1' onkeyup=\"document.getElementById('src_img_color_detail_"+i_color+"_1').src=document.getElementById('input_img_color_detail_"+i_color+"_1').value\"></span>"+
    "<br><img id='src_img_color_detail_"+i_color+"_1' style='width:20%' src=''><br>"+
"</div>"+
      "<br>"+
      "Số lượng ảnh chi tiết: <input id='quatity_color_detail_"+i_color+"' type='number' min='1' max='20' value='1' onblur='i="+i_color+"; AddDelColorDetail();'>"+
      "</div>");
  i_color++;
      }
    }else{
    quatity_color++;
    if(quatity_color < i_color){
    var del_color=$("div");
        while(quatity_color < i_color){
          i_color=i_color-1;
    del_color.remove("#create_color_"+i_color+"");
        }
    }
  }
  }
}
function AddDelColorDetail(){
  var quatity_color_detail=$("#quatity_color_detail_"+i+"").val();
  if(quatity_color_detail > 20){
alert('Ảnh chi tiết chứa tối đa 20!')
  }else{
    if(color_detail[i] <= quatity_color_detail){
  var add=$("#create_img_color_detail_"+i+"");
  while(color_detail[i] <= quatity_color_detail){
    add.append("<div id='img_color_detail_"+i+"_"+color_detail[i]+"'>"+
    "<span>Ảnh chi tiết thứ "+color_detail[i]+": <input type='text' id='input_img_color_detail_"+i+"_"+color_detail[i]+"' name='img_mau_chi_tiet_"+i+"_"+color_detail[i]+"' onkeyup=\"document.getElementById('src_img_color_detail_"+i+"_"+color_detail[i]+"').src=document.getElementById('input_img_color_detail_"+i+"_"+color_detail[i]+"').value\"></span>"+
    "<br><img id='src_img_color_detail_"+i+"_"+color_detail[i]+"' style='width:15%' src=''><br>"+
    "</div>");
    color_detail[i]++;
  }
}else{
    quatity_color_detail++;
    if(color_detail[i] > quatity_color_detail){
      var del=$("div");
        while(color_detail[i] > quatity_color_detail){
          color_detail[i]--;
          del.remove("#img_color_detail_"+i+"_"+color_detail[i]+"");
        }
    }
  }
  }
}
    </script>
Số lượng màu sản phẩm: <input id="quatity_color" type="number" min="1" max="10" value="1" onblur="AddDelColor()">

<hr>
<h4>Thêm cấu hình sản phẩm:</h4>
<style>
  .device_configuration_table{width:100%;float: left;}
    .device_configuration_table tr:nth-child(even) {background-color: #f1f1f1;}
    .device_configuration_table td{padding:3px 0px 3px 10px}
    .device_configuration_table .ingredient{width:40%}
    .device_configuration_table .detail{width:60%}
    .device_configuration_table input{width:100%}
  </style>
<table class="device_configuration_table">
    <tr>
        <th colspan="100" style="text-align:center;">Cấu hình thiết bị điện thoại.</th>
    </tr>
    <tr>
        <td class="ingredient">Màn hình:</td>
        <td class="detail"><input type="text"></td>
    </tr>
    <tr>
        <td class="ingredient">Hệ điều hành:</td>
        <td class="detail"><input type="text"></td>
    </tr>
    <tr>
        <td class="ingredient">Camera sau:</td>
        <td class="detail"><input type="text"></td>
    </tr>
    <tr>
        <td class="ingredient">Camere trước:</td>
        <td class="detail"><input type="text"></td>
    </tr>
    <tr>
        <td class="ingredient">Chip:</td>
        <td class="detail"><input type="text"></td>
    </tr>
    <tr>
        <td class="ingredient">Ram:</td>
        <td class="detail"><input type="text"></td>
    </tr>
    <tr>
        <td class="ingredient">Rom:</td>
        <td class="detail"><input type="text"></td>
    </tr>
    <tr>
        <td class="ingredient">Sim:</td>
        <td class="detail"><input type="text"></td>
    </tr>
    <tr>
        <td class="ingredient">Pin:</td>
        <td class="detail"><input type="text"></td>
    </tr> 
</table>
<hr>
<h4>Thêm bài viết đánh giá sản phẩm:</h4>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<textarea id="editor" name="editor1"></textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
<hr>
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('form');
    var r = confirm("Bạn có muốn thực hiện hành động này không!");
    if(r == true) {
    form.action = action;
    form.submit();
  }else{
    return false;
  }
}
</script>
<button style="width:50%" onclick="return submitForm('Xuly_Luu_SP.php')">Lưu lại</button><button style="width:50%" onclick="return submitForm('Xuly_tao_sp.php')">Hoàn tất</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<script>
function Confirm(){
  q=1;
  b=1;
while(b==1){
  if($('#create_color_'+q+'').lenght){
    o=1;
while($('#img_color_detail_'+q+'_'+o+'').lenght){
o++;
}
b=1;
}else{
  b=2;
}
  q++;
  }
  alert(''+o+'');
}
</script>
 <?php   }
 if($_GET['loai']=="qltk"){ ?>
<style>
    table th{width:300px;text-align:center}
    table tr:nth-child(even){background-color: #f2f2f2;}
    table tr:hover {background-color: #ddd;}
</style>
    <table border="2" style="margin:auto">
<tr>
    <th>STT</th>
    <th>Tên</th>
    <th>Tài khoản</th>
    <th>Mật khẩu</th>
    <th>Thông tin cá nhân</th>
<?php
$query=mysqli_query($conn,"SELECT * FROM `account` ORDER by id DESC");
$stt=1;
while($row=mysqli_fetch_array($query)){
?>
<tr>
    <th><?php echo $stt ?></th>
    <th><?php echo $row['hoten'] ?></th>
    <th><?php echo $row['user'] ?></th>
    <th><?php echo $row['pass'] ?></th>
    <th><a href="Admin.php?loai=ttcn&ten=<?php echo $row['hoten'] ?>"><button style="background:orange;font-weight:bold">Xem thông tin cá nhân</button></a></th>
    <?php $stt++; } ?>
</tr>
<tr>
    <td colspan="100"><a style="float:right" href="Admin.php?loai=ttcn"><button style="background:greenyellow;font-weight:bold">Xem tất cả thông tin cá nhân</button></a></td>
</tr>
    </table>
 <?php }
 if($_GET['loai']=="ttcn"){?>
<style>
    table th{width:300px;text-align:center}
    table tr:nth-child(even){background-color: #f2f2f2;}
    table tr:hover {background-color: #ddd;}
</style>
    <table border="2" style="margin:auto">
<tr>
    <th>STT</th>
    <th>Họ Tên</th>
    <th>Số điện thoại</th>
    <th>Quận</th>
    <th>Số nhà địa điểm</th>
    <th>Đường địa điểm</th>
<?php
if(isset($_GET['ten'])){
$sql="SELECT * FROM `customer_information` WHERE hoten='".$_GET['ten']."'";
}else{
$sql="SELECT * FROM `customer_information` ORDER by id DESC";
}
$query=mysqli_query($conn,$sql);
$stt=1;
while($row=mysqli_fetch_array($query)){
?>
<tr>
    <th><?php echo $stt ?></th>
    <th><?php echo $row['hoten'] ?></th>
    <th><?php echo $row['sdt'] ?></th>
    <th><?php echo $row['quan'] ?></th>
    <th><?php echo $row['so_nha'] ?></th>
    <th><?php echo $row['duong'] ?></th>
    <?php $stt++; } ?>
</tr>
    </table>  
 <?php }
 if($_GET['loai']=="dsdh"){?>
<style>
    table th{width:150px;text-align:center}
    table tr:nth-child(even){background-color: #f2f2f2;}
    table tr:hover {background-color: #ddd;}
</style>
    <table border="2" style="margin:auto">
<tr>
    <th>STT</th>
    <th>Họ Tên</th>
    <th>Tên SP</th>
    <th>Màu SP đã chọn</th>
    <th>Hình thức đặt</th>
    <th>Số lượng SP</th>
    <th>Giá</th>
    <th>Tổng giá</th>
    <th>Trạng thái thanh toán</th>
    <th>Công cụ</th>
<?php
$query=mysqli_query($conn,"SELECT * FROM `order` ORDER by id DESC");
$stt=1;
while($row=mysqli_fetch_array($query)){
  $query_phone=mysqli_query($conn,"SELECT * FROM `phone` where id_phone='".$row['id_phone']."'");
  $row_phone=mysqli_fetch_array($query_phone);
?>
<tr>
    <th><?php echo $stt; if($stt <= 3){ echo " <span style='color:red'>(MỚI)<span>"; } ?></th>
    <th><a href="Admin.php?loai=ttcn&ten=<?php echo $row['hoten']?>"><?php echo $row['hoten'] ?></a></th>
    <th><a href="#"><?php echo $row_phone['ten'] ?></a></th>
    <th><?php echo $row['ten_mau_sp'] ?></th>
    <th><?php if($row['hinh_thuc_dat']=="shop"){echo "Đặt tại cửa hàng";}else{echo "Đặt giao hàng";} ?></th>
    <th><?php echo $row['so_luong_dat'] ?></th>
    <th><?php echo number_format($row_phone['gia'], 0, ',', '.')."đ" ?></th>
    <th><?php echo number_format($row_phone['gia']*$row['so_luong_dat'], 0, ',', '.')."đ" ?></th>
    <th><?php if($row['trang_thai']=="no"){echo "<b style='color:red'>Chưa thanh toán</b>";}else{echo "<b style='color:green'>Đã thanh toán</b>";} ?></th>
    <th><a href="Xuly_thanh_toan.php?id=<?php echo $row['id']?>"><button>Hoàn thành thanh toán</button></a></th>
    <?php $stt++; } ?>
</tr>
    </table>  
 <?php } }  ?>
</div>

</body>
</html>
