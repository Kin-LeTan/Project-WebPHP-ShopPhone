<?php 
$VN_local = mysqli_connect("localhost", "root", "", "vietnamese_local") or die(mysql_error);
$type=$_GET['type'];
if($type=="city"){
    $id_city=$_GET['id'];
    if($id_city=="none"){
        $hint="<option value='none'>---Chọn Tỉnh/T.Phố trước---</option>";
    }else{
    $hint="<option value='none'>---Chọn Quận/Huyện---</option>";
    $query=mysqli_query($VN_local,"SELECT * FROM `devvn_quanhuyen` WHERE matp='".$id_city."'");
  while($row=mysqli_fetch_array($query)){
    $hint=$hint."<option value='".$row['maqh']."'>".$row['name']."</option>".
    "";
  }
}
  echo $hint;
}
?>