<html lang="en">
    <head>
        <title>Đăng nhập</title>
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
    input{width:100%;height:40px;font-weight:bold}
    input[type="checkbox"]{width:auto;height:auto}
    .b{border: 1px solid blue}
    .g{border: 1px solid green}
    .r{border: 1px solid red}
    .y{border: 1px solid yellow}
    .p{border:5px solid purple}
    .modal_login{margin:auto;width:40%;padding:10px;border:1px solid black;border-radius:10px;background-image: linear-gradient(to bottom right, rgb(197, 234, 255), pink);}
    @media screen and (max-width:600px) {
        .modal_login{width:90%}
        .container{width:100%}
    }
</style>
<script>
    function validate() {
var u = document.getElementById("user").value;
var p = document.getElementById("pass").value;
 
if(u== "") {
alert("Vui lòng nhập tài khoản đăng nhập!");
return false;
}
if(p == "") {
alert("Vui lòng nhập mật khẩu!");
return false;
}
alert("OK!! Xin đợi kiểm tra!");
}
</script>
    </head>
    <body>
<div class="container">
<div class="modal_login">
    <div style="text-align: center;"><h3>Đăng nhập tài khoản đến với <br><a href="Home.php">T-MOBILE</a></h3></div>
<form action="xuly_tai_khoan.php" method="POST" onsubmit="return validate()">
    <input type="hidden" name="loai" value="lo">
   <input id="user" type="text" name="user" placeholder="Nhập tên tàn khoản"><br>
    <input id="pass" type="password" name="pass" placeholder="Nhập mật khẩu chứa 8 ký tự trở lên"><br><br>
    <input type="checkbox" name="remember">Ghi nhớ tài khoản này.
    <br><br>
    <input type="submit" name="submit" value="Đăng nhập">
</form>
<div>
    <p>Bạn cần <a href="dang_ky.php" style="font-weight:bold">đăng ký</a> để tạo tài khoản!!</p>
</div>
</div>
</div>
<?php
if(isset($_COOKIE['wrong_account'])){?>
<script>
    alert("Mật khẩu sai hoặc tài khoản này không tồn tại!");
    </script>
<?php
setcookie('wrong_account','w',time() - 100);
}
if(isset($_COOKIE['empty_account'])){?>
    <script>
        alert("Bạn cần tài khoản để thực hiện!");
        </script>
    <?php
    setcookie('empty_account','ea',time() - 100);
    }
?>
    </body>
</html>