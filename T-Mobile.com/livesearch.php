<?php
include_once("connectSQL.php");

$q=$_GET["q"];

if (strlen($q)>0) {
  $hint="";
  $i=1;
  $query=mysqli_query($conn,"SELECT * FROM `phone` where ten LIKE '%$q%' ORDER by id DESC");
  while($i<=5 && $row=mysqli_fetch_array($query)){
    $result = str_replace($q, "<span style='color:red;text-decoration:underline'>".$q."</span>", $row['ten']);
    $hint=$hint."<a class='result_livesearch' style='display:flex;text-decoration:none;padding:8px;' href='chi_tiet_san_pham.php?hang=".$row['hang']."&ten=".$row['ten']."'>".
    "<div style='width:23%'><img style='width:100%' src='".$row['img_chinh']."'></div><div style='width:67%'><span style='color:black'>".$result."</span><br>".
    "<b style='color:red'>".number_format($row['gia'], 0, ',', '.')."đ</b></div></a>";
    $i++;
  }
}

if ($hint=="") {
  $response="<span style='color:red;font-size:18px;font-family:Times'>Không rõ kết quả!</span>";
} else {
  $response="<div><span style='color:green;font-size:18px;font-family:Times'>Sản phẩm gợi ý:</span><br>".$hint."</div>";
}

echo $response;
?>