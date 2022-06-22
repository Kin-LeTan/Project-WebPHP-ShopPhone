<?php
include_once("connectSQL.php");
  $hint="";
if($_GET['type']=="product_show"){
    $key=$_GET['key'];
    if(strlen($key)==0){
        $query=mysqli_query($conn,"SELECT * FROM `phone` ORDER by id DESC");
    }else{
        $query=mysqli_query($conn,"SELECT * FROM `phone` where id_phone LIKE '%".$key."%' OR hang LIKE '%".$key."%' OR ten LIKE '%".$key."%' OR gia LIKE '%".$key."%' ORDER by id DESC");
    }
    $i=1;
    while($row=mysqli_fetch_array($query)){
        $hint=$hint."<tr>".
        "<th>".$i."</th>".
        "<td>".str_replace($key, "<span style='color:red;text-decoration:underline'>".$key."</span>", $row['id_phone'])."</td>".
        "<td>".str_replace($key, "<span style='color:red;text-decoration:underline'>".$key."</span>", $row['hang'])."</td>".
        "<td>".str_replace($key, "<span style='color:red;text-decoration:underline'>".$key."</span>", $row['ten'])."</td>".
        "<td><img style='width:80px' src='".$row['img_chinh']."' ></td>".
        "<td>".number_format($row['gia'], 0, ',', '.')."</td>".
        "<td><a href='#' style='color:green'><i class='far fa fa-eye'></i> CHI TIẾT</a><br>".
        "<span onclick=\"delete_id('".$row['id_phone']."')\" style='color:red;cursor: pointer;'><i class='nav-icon fa fa-trash'></i> XÓA</span></td>".
      "</tr>";
        $i++;
      }
      if($hint==""){
echo "<tr><td colspan='100' style='color:red'>Không rõ kết quả!!</td></tr>";
      }else{
      echo $hint;
      }
}
if($_GET['type']=="order"){
  $key=$_GET['key'];
  if(strlen($key)==0){
      $query=mysqli_query($conn,"SELECT * FROM `order` ORDER by id DESC");
  }else{
      $query=mysqli_query($conn,"SELECT * FROM `order` where hoten LIKE '%".$key."%' OR ten_mau_sp LIKE '%".$key."%' OR so_luong_dat LIKE '%".$key."%' ORDER by id DESC");
  }
  $i=1;
  while($row=mysqli_fetch_array($query)){
    $query_phone=mysqli_query($conn,"SELECT * FROM `phone` WHERE id_phone='".$row['id_phone']."'");
    $row_phone=mysqli_fetch_array($query_phone);
    if($row['hinh_thuc_dat']=="shop"){
      $type_order="Đặt tại cửa hàng";
    }else{
      $type_order="Giao hàng tận nhà";
    }
    if($row['trang_thai']=="no"){ 
    $status="yes";$icon="fas fa-check";$string="Hoàn tất";$css_color="green";
    }else{
      $status="no";$icon="fas fa-times";$string="Hủy";$css_color="red";
    }
      $hint=$hint."<tr>".
      "<th>".$i."</th>".
      "<td>".$row['hoten']."</td>".
      "<td>".$row_phone['hang']."</td>".
      "<td>".$row_phone['ten']."</td>".
      "<td><img style='width:80px' src='".$row_phone['img_chinh']."'></td>".
      "<td>".$row['ten_mau_sp']."</td>".
      "<td>".number_format($row_phone['gia'], 0, ',', '.')."</td>".
      "<td style='text-align:center'>".$row['so_luong_dat']."</td>".
     "<td>".number_format($row_phone['gia']*$row['so_luong_dat'], 0, ',', '.')."</td>".
     "<td>".$type_order."</td>".
     "<td>".$row['time_dat']."</td>".
     "<td>".
     "<span onclick=\"change_status('".$status."','".$row['id']."')\" style='color:".$css_color.";cursor: pointer;'>".
     "<i class='nav-icon ".$icon."'></i> ".$string." đơn hàng</span><br>".
     "<a href='#' style='color:blue'><i class='far fa fa-eye'></i> CHI TIẾT</a><br>".
     "<span onclick=\"delete_id('".$row['id_phone']."')\" style='color:red;cursor: pointer;'><i class='nav-icon fa fa-trash'></i> XÓA</span>".
   "</td>".
    "</tr>";
      $i++;
    }
    if($hint==""){
echo "<tr><td colspan='100' style='color:red'>Không rõ kết quả!!</td></tr>";
    }else{
    echo $hint;
    }
}
if($_GET['type']=="cus_inf"){
  $key=$_GET['key'];
  if($_GET['table']==1){

  if(strlen($key)==0){
      $query=mysqli_query($conn,"SELECT * FROM `customer_information` ORDER by id DESC");
  }else{
      $query=mysqli_query($conn,"SELECT * FROM `customer_information` where hoten LIKE '%".$key."%' OR sdt LIKE '%".$key."%' ORDER by id DESC");
  }
  $i=1;
  while($row=mysqli_fetch_array($query)){
      $hint=$hint."<tr>".
      "<th>".$i."</th>".
      "<td>".$row['hoten']."</td>".
      "<td>".$row['sdt']."</td>".
      "<td><a href='#' style='color:blue'><i class='far fa fa-eye'></i> CHI TIẾT</a>".
    "</tr>";
      $i++;
    }
    if($hint==""){
echo "<tr><td colspan='100' style='color:red'>Không rõ kết quả!!</td></tr>";
    }else{
    echo $hint;
    }

  }else{
    
    if(strlen($key)==0){
        $query=mysqli_query($conn,"SELECT * FROM `customer_information` ORDER by id DESC");
    }else{
        $query=mysqli_query($conn,"SELECT * FROM `customer_information` where hoten LIKE '%".$key."%' OR tp LIKE '%".$key."%' OR quan LIKE '%".$key."%' OR so_nha LIKE '%".$key."%' OR duong LIKE '%".$key."%' ORDER by id DESC");
    }
    $i=1;
    while($row=mysqli_fetch_array($query)){
        $hint=$hint."<tr>".
        "<th>".$i."</th>".
        "<td>".$row['hoten']."</td>".
        "<td>".$row['tp']."</td>".
        "<td>".$row['quan']."</td>".
        "<td>".$row['so_nha']."</td>".
        "<td>".$row['duong']."</td>".
      "</tr>";
        $i++;
      }
      if($hint==""){
  echo "<tr><td colspan='100' style='color:red'>Không rõ kết quả!!</td></tr>";
      }else{
      echo $hint;
      }

  }
}
if($_GET['type']=="account"){
  $key=$_GET['key'];
  if(strlen($key)==0){
      $query=mysqli_query($conn,"SELECT * FROM `account` ORDER by id DESC");
  }else{
      $query=mysqli_query($conn,"SELECT * FROM `account` where hoten LIKE '%".$key."%' OR user LIKE '%".$key."%' OR pass LIKE '%".$key."%' ORDER by id DESC");
  }
  $i=1;
  while($row=mysqli_fetch_array($query)){
      $hint=$hint."<tr>".
      "<th>".$i."</th>".
      "<td>".$row['hoten']."</td>".
      "<td>".$row['user']."</td>".
      "<td>".$row['pass']."</td>".
    "</tr>";
      $i++;
    }
    if($hint==""){
echo "<tr><td colspan='100' style='color:red'>Không rõ kết quả!!</td></tr>";
    }else{
    echo $hint;
    }
}
?>