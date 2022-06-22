
  <style>
  .header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
} 
.result_livesearch:hover{
  box-shadow:0px 0px 20px -10px gray;
}
      </style>
<div class="header">
  <h1>T-MOBLIE</h1>
  <?php
     if(isset($_COOKIE['hoten'])){
     $set_hoten=$_COOKIE['hoten'];
     }else{
      $set_hoten="";
     }?>
  <p>CHÀO MỪNG (<span style="color:red"><?php if(isset($_COOKIE['hoten'])){
     echo $set_hoten;
     }else{ echo "BẠN"; } ?></span>) ĐÃ ĐẾN CỬA HÀNG ĐIỆN THOẠI.</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="Home.php">TRANG CHỦ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="muc_luc.php?hang=Samsung&page=0">SAMSUNG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="muc_luc.php?hang=iPhone&page=0">IPHONE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="muc_luc.php?hang=OPPO&page=0">OPPO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gio_hang.php">GIỎ HÀNG</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="dang_nhap.php">ĐĂNG NHẬP</a>
      </li>
      <?php
     if(isset($_COOKIE['hoten'])){?>
      <li class="nav-item">
        <a class="nav-link" href="xuly_tai_khoan.php?loai=de">ĐĂNG XUẤT</a>
      </li>
     <?php
     }?>
      <li class="nav-item" style="padding-top:4px">
      <script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="1px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
function Search() {
    var input_search = document.getElementById('input_search').value;
    if(input_search != ""){
    window.location="http://localhost:81/php/Gi%E1%BB%AFa_k%C3%AC/T-Mobile.com/Tim_kiem.php?key="+input_search+"";
}
}
</script>
<input id="input_search" type="text" size="33" placeholder="Tìm kiếm điện thoại..." onkeyup="showResult(this.value)"><button onclick="Search()" size="8" >OK</button>
<div style="width:316px;position:absolute;background-color: white;z-index:100;box-shadow:0px 6px 20px -5px grey;" id="livesearch"></div>
</li> 
    </ul>
  </div>  
</nav>
