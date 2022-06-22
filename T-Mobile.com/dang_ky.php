<html lang="en">
    <head>
    <title>Đăng ký</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body{background: url("https://i.pinimg.com/originals/bd/56/5d/bd565dcc0a556add0b0a0ed6b26d686e.gif") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;}
    .container{width:1000px;height:100%;margin:auto;display:flex}
    span{font-size:20px}
    input{width:100%;height:35px;font-weight:bold}
    input[type="checkbox"]{width:auto;height:auto}
    .b{border: 1px solid blue}
    .g{border: 1px solid green}
    .r{border: 1px solid red}
    .y{border: 1px solid yellow}
    .p{border:5px solid purple}
    .black{border:1px solid black}
    .modal_login{margin:auto;width:40%;padding:10px;border:1px solid black;border-radius:10px;background-image: linear-gradient(to bottom right, rgb(212, 236, 250), pink);}
    @media screen and (max-width:600px) {
        .modal_login{width:100%}
        .container{width:100%}
    }
</style>
<script>
    function validate() {
var ht = document.getElementById("ht").value;
var sdt = document.getElementById("sdt").value;
var so = document.getElementById("so").value;
var duong = document.getElementById("duong").value;
var tp = document.getElementById("city").value;
var quan = document.getElementById("district").value;
var u = document.getElementById("user").value;
var p1 = document.getElementById("pass").value;
var p2 = document.getElementById("reset_pass").value;

if(ht=="" || sdt=="" || so=="" || duong=="" || tp=="none" || quan=="none") {
alert("Vui lòng nhập đầy đủ thông tin cá nhân!");
return false;
}
if(sdt.length < 10) {
alert("Số điện thoại chiều dài chứa 10 số, vui lòng nhập lại!");
return false;
}
if(u == "") {
alert("Vui lòng nhập tài khoản cần tạo!");
return false;
}
if(p1.length < 8) {
alert("Vui lòng nhập mật khẩu và chứa 8 ký tự trở lên!");
return false;
}
if(p2 != p1) {
alert("Vui lòng xác minh lại mật khẩu!");
return false;
}
alert("OK!! Xin đợi kiểm tra!");
}
</script>
    </head>
    <body>
<div class="container">
<div class="modal_login">
    <div style="text-align: center;"><h3>Đăng ký tạo tài khoản đến với <br><a href="Home.php">T-MOBILE</a></h3></div>
<form onsubmit="return validate()" action="xuly_tai_khoan.php" method="POST">
<div style="padding:5px;">
    <h4>Phần thông tin cá nhân</h4>
    <input type="hidden" name="loai" value="re">
    <input id="ht" type="text" name="hoten" placeholder="Họ và tên của bạn"><br>
    <input id="sdt" type="number" name="sdt" placeholder="Nhập số điện thoại"><br><br>
    Tỉnh/Thành Phố: <select id="city" onchange="change_district()" name="tinh_tp" placeholder="Quận">
  <option value="none">---Chọn Tỉnh/T.Phố---</option>
  <?php $VN_local = mysqli_connect("localhost", "root", "", "vietnamese_local") or die(mysql_error);
  $query=mysqli_query($VN_local,"SELECT * FROM `devvn_tinhthanhpho`");
  while($row=mysqli_fetch_array($query)){
  echo "<option value='".$row['matp']."'>".$row['name']."</option>";
  } ?>
</select><br><br>
 
Quận/Huyện: <select id="district" name="quan" placeholder="Quận">
  <option value="none">---Chọn Tỉnh/T.Phố trước---</option>
</select><br><br>
    <input id="so" type="number" style="width:30%" name="sonha" placeholder="Nhập số nhà"><input id="duong" type="text"  style="width:70%" name="duong" placeholder="Nhập đường bạn đang ở">
  
<script>
function change_district(){
  var selectBox = document.getElementById("city");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("district").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","checkbox_local_VN.php?type=city&id="+selectedValue,true);
  xmlhttp.send();
}
</script>

</div>
  <div style="padding:5px;">
  <h4>Phần tạo tài khoản</h4>
  <input id="user" type="text" name="user" placeholder="Nhập tài khoản cần tạo"><br>
  <input id="pass" type="password" name="pass" placeholder="Nhập mật khẩu chứa 8 ký tự trở lên"><br>
    <input id="reset_pass" type="password" name="reset_pass" placeholder="Nhập lại mật khẩu"><br><br>
    </div>
    <input type="checkbox" name="remember">Ghi nhớ tài khoản này.
    <br><br>
    <input type="submit" name="submit" value="Đăng ký">
</form>
<div>
    <p>Quay lại <a href="dang_nhap.php" style="font-weight:bold">đăng nhập</a>!!</p>
</div>
</div>
</div>
<?php
if(isset($_COOKIE['wrong_account'])){?>
<script>
    alert("Tài khoản này đã tồn tại, vui lòng nhập tài khoản khác!!");
    </script>
<?php
setcookie('wrong_account','w',time() - 100);
}
?>
    </body>
</html>