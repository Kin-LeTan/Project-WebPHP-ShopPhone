<!DOCTYPE html>
<?php include_once('connectSQL.php'); ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản Trị | Quản lý mặt hàng | <?php if($_GET['type']=="show"){echo "Xem sản phẩm";}else{echo "Tạo sản phẩm";} ?></title>
<style>
  .r{border:1px solid red}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  
  <?php include_once('menubar.html') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php if($_GET['type']=="show"){ ?>
            <h1 class="m-0">Xem sản phẩm</h1>
            <?php }
            if($_GET['type']=="create"){ ?>
              <h1 class="m-0">Tạo sản phẩm</h1>
              <?php }
              if($_GET['type']=="show-product"){ ?>
             <h1 class="m-0">Xem thông tin chi tiết sản phẩm</h1>
              <?php } ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->








<?php if($_GET['type']=="show"){  ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tất cả sản phẩm điện thoại <span style="color:gray">(thứ tự theo SP đã tạo lần cuối)</span></h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="table_search" id="input_search" class="form-control float-right"  onkeyup="showResult(this.value)" placeholder="Tìm kiếm theo mã, hãng, tên, giá sản phẩm...">
                  
                    <!-- <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 550px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã SP</th>
                      <th>Hãng SP</th>
                      <th>Tên SP</th>
                      <th>Ảnh đại diện</th>
                      <th>Giá</th>
                      <th>Công cụ</th>
                    </tr>
                  </thead>
                  <tbody id="livesearch">
                    <?php 
                    $query=mysqli_query($conn,"SELECT * FROM `phone` ORDER by id DESC");
                    $stt=1;
                    while($row=mysqli_fetch_array($query)){ ?>
                    <tr>
                      <th><?php echo $stt ?></th>
                      <td><?php echo $row['id_phone'] ?></td>
                      <td><?php echo $row['hang'] ?></td>
                      <td><?php echo $row['ten'] ?></td>
                      <td><img style="width:80px" src="<?php echo $row['img_chinh'] ?>" ></td>
                      <td><?php echo number_format($row['gia'], 0, ',', '.')?></td>
                      <td><a href="mat_hang.php?type=show-product&id=<?php echo $row['id_phone'] ?>" style="color:blue"><i class="far fa fa-eye"></i> CHI TIẾT</a><br>
                      <span onclick="delete_id('<?php echo $row['id_phone'] ?>')" style="color:red;cursor: pointer;"><i class="nav-icon fa fa-trash"></i> XÓA</span></td>
                    </tr>
                    <?php $stt++;
                   } ?>
                  </tbody>
                  <script>
                function showResult(str) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","admin_search.php?type=product_show&key="+str,true);
  xmlhttp.send();
}

              function delete_id(id){
                var r = confirm("Bạn có chắc xóa sản phẩm có mã SP là: \""+id+"\" không?\nKhi xóa ảnh hưởng xóa cả thông tin của sản phẩm này!");
              if(r == true) {
                window.location="XL_mat_hang.php?type=delete&id_phone="+id+"";
                 }
              }      
              </script>
                </table>
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <?php }
    if($_GET['type']=="create"){ ?>
      <section class="content">
      <div class="container-fluid">
        <div class="row" style="background-color:white;border-radius:5px">
<form method="post" id="form" style="width:100%">
          <div class="col-12" style="padding:10px;">
          <h4>Thông tin sản phẩm</h4>
          <div class="row">
            <div style="display: inline-block;padding:5px">
            Ảnh đại diện:<br>
            <img id="src_img_main" style="width:200px;border:1px solid gray;border-radius:5px" src="#"><br>
            <input id="input_img_main" type="text" name="img_chinh" onkeyup="img_main()" style="width:200px;" placeholder="Nhập địa chỉ hình ảnh...">
            <script type="text/javascript">
    function img_main() {
      document.getElementById('src_img_main').src=document.getElementById('input_img_main').value;
    }
      </script>
            </div>
            <div style="display: inline-block;padding:5px">
            <br>
            Mã sản phẩm: <input type="text" id="id_phone" name="id_phone" placeholder="Nhập mã sản phẩm..."><br><br>
            Hãng sản phẩm: <select name="hang">
    <option value="Samsung">Samsung</option>
    <option value="iPhone">iPhone</option>
    <option value="OPPO">OPPO</option>
  </select><br><br>
            Tên sản phẩm: <input type="text" id="ten" name="ten" placeholder="Nhập tên sản phẩm..."><br><br>
            Giá cả sản phẩm: <input type="number" step="10000" id="gia" name="gia" placeholder="Nhập giá sản phẩm..."><br><br>
            </div>
    </div>
    <hr>
          </div>
    <div class="col-12" style="padding:10px">
          <h4>Tạo màu của sản phẩm</h4>

          <style>
          .slide-detail ul li{width:270px;display: inline-block;border:1px solid gray;border-radius:3px;list-style: none;margin-right:2px;padding:2px}
          </style>

          <div class="row" id="create_img_color" style="padding:5px">
          <div id="create_color_1" style="width:100%;padding:5px;border:1px solid gray;border-radius:5px;box-shadow:0px 6px 20px -10px grey;margin:5px 0px">
            <div style="width:100%"><span style="color:red">Màu sản phẩm thứ 1 </span></div>
            <div style="display: inline-block;padding:5px">
            <img id="src_img_color_1" style="width:100px;border:1px solid gray;border-radius:5px" src="#"><br>
            <input id="input_img_color_1" name="img_mau_1" onkeyup="document.getElementById('src_img_color_1').src=document.getElementById('input_img_color_1').value" style="width:100px;" placeholder="Nhập địa chỉ hình ảnh">
            </div>
            <div style="display: inline-block;padding:5px">
            Tên màu: <input type="text" name="ten_mau_1" placeholder="Nhập tên màu..."><br>
            Số lượng SP hiện có: <input type="number" min="0" name="so_luong_1" style="width:113px" placeholder=""><br>
            </div>
            <div style="width:100%">
          <b>Ảnh slide mô tả chi tiết màu</b><br>
          <hr>
          <div class="slide-detail" style="width:100%;padding:5px;overflow-x: auto;white-space: nowrap;list-style-type: none;">
          <ul style="width:100%" id="create_img_color_detail_1">
            <li id="img_color_detail_1_1">
              Ảnh mô tả màu thứ <b style="color:red">(1)</b><br>
          <img id="src_img_color_detail_1_1" style="width:100%" src="#"><br>
          <input type="text" id="input_img_color_detail_1_1" name="img_mau_chi_tiet_1_1" onkeyup="document.getElementById('src_img_color_detail_1_1').src=document.getElementById('input_img_color_detail_1_1').value" style="width:100%" placeholder="Nhập địa chỉ ảnh mô tả...">
          </li>
          </ul>
          </div>
          <span style="color:green">Số lượng ảnh mô tả SP: </span><input style="width:42px;height:23px" id="quatity_color_detail_1" type="number" min="1" max="20" value="1" onblur="i=1; AddDelColorDetail();">
          </div>
    </div>
           </div>
           
           <script>
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
        main.append("<div id='create_color_"+i_color+"' style='width:100%;padding:5px;border:1px solid gray;border-radius:5px;box-shadow:0px 6px 20px -10px grey;margin:5px 0px'>"+
            "<div style='width:100%'><span style='color:red'>Màu sản phẩm thứ "+i_color+"</span></div>"+
            "<div style='display: inline-block;padding:5px'>"+
            "<img id='src_img_color_"+i_color+"' style='width:100px;border:1px solid gray;border-radius:5px' src='#'><br>"+
            "<input id='input_img_color_"+i_color+"' name='img_mau_"+i_color+"' style='width:100px;' onkeyup=\"document.getElementById('src_img_color_"+i_color+"').src=document.getElementById('input_img_color_"+i_color+"').value\" placeholder='Nhập địa chỉ hình ảnh'>"+
            "</div>"+
            "<div style='display: inline-block;padding:5px'>"+
            "Tên màu: <input type='text' name='ten_mau_"+i_color+"' placeholder='Nhập tên màu...'><br>"+
            "Số lượng SP hiện có: <input type='number' min='0' name='so_luong_"+i_color+"' style='width:113px' placeholder=''><br>"+
            "</div>"+
            "<hr>"+
            "<div style='width:100%'>"+
          "<b>Ảnh slide mô tả chi tiết màu</b><br>"+
          "<div class='slide-detail' style='width:100%;padding:5px;overflow-x: auto;white-space: nowrap;list-style-type: none;'>"+
          "<ul style='width:100%' id='create_img_color_detail_"+i_color+"'>"+
            "<li id='img_color_detail_"+i_color+"_1'>"+
              "Ảnh mô tả màu thứ <b style='color:red'>(1)</b><br>"+
          "<img id='src_img_color_detail_"+i_color+"_1' style='width:100%' src='#'><br>"+
          "<input type='text' style='width:100%' id='input_img_color_detail_"+i_color+"_1' name='img_mau_chi_tiet_"+i_color+"_1' onkeyup=\"document.getElementById('src_img_color_detail_"+i_color+"_1').src=document.getElementById('input_img_color_detail_"+i_color+"_1').value\" placeholder='Nhập địa chỉ ảnh mô tả...'>"+
          "</li>"+
          "</ul>"+
          "</div>"+
          "<span style='color:green'>Số lượng ảnh mô tả SP: </span><input style='width:42px;height:23px' id='quatity_color_detail_"+i_color+"' type='number' min='1' max='20' value='1' onblur='i="+i_color+"; AddDelColorDetail();'>"+
          "</div>"+
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
    add.append("<li id='img_color_detail_"+i+"_"+color_detail[i]+"'>"+
              "Ảnh mô tả màu thứ <b style='color:red'>("+color_detail[i]+")</b><br>"+
          "<img id='src_img_color_detail_"+i+"_"+color_detail[i]+"' style='width:100%' src='#'><br>"+
          "<input type='text' id='input_img_color_detail_"+i+"_"+color_detail[i]+"' name='img_mau_chi_tiet_"+i+"_"+color_detail[i]+"' style='width:100%' onkeyup=\"document.getElementById('src_img_color_detail_"+i+"_"+color_detail[i]+"').src=document.getElementById('input_img_color_detail_"+i+"_"+color_detail[i]+"').value\" placeholder='Nhập địa chỉ ảnh mô tả...'>"+
          "</li>");
    color_detail[i]++;
  }
}else{
    quatity_color_detail++;
    if(color_detail[i] > quatity_color_detail){
      var del=$("li");
        while(color_detail[i] > quatity_color_detail){
          color_detail[i]--;
          del.remove("#img_color_detail_"+i+"_"+color_detail[i]+"");
        }
    }
  }
  }
}
    </script>
    <br>
          <span style="color:blue">Số lượng màu sản phẩm: </span><input id="quatity_color" style="width:42px;height:23px" type="number" min="1" max="10" value="1" onblur="AddDelColor()">
          <hr>
          </div>
          <div class="col-12" style="padding:10px">
          <h4>Cấu hình chi tiết của sản phẩm</h4>
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
          </div>
          <div class="col-12" style="padding:10px">
          <hr>
          <h4>Bài viết đánh giá của sản phẩm</h4>
          <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<textarea id="editor" name="editor1"></textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
<hr>
          </div>
    <div style="display:flex">
   <button style="width:50%;color:blue" onclick="return submitForm('XL_mat_hang.php?type=save')"><i class="nav-icon fas fa-save"></i> Lưu lại</button>
   <button style="width:50%;color:green" onclick="return submitForm('XL_mat_hang.php?type=create')"><i class="nav-icon fas fa-check"></i> Hoàn tất</button>
</div>
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
</form>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <br><br><br><br><br>
<?php }
if($_GET['type']=="show-product"){
  $id=$_GET['id'];
  $query=mysqli_query($conn,"SELECT * FROM `phone` WHERE id_phone='".$id."'");
  $row=mysqli_fetch_array($query);
  ?>
<section class="content">
      <div class="container-fluid">
        <div class="row" style="background-color:white;border-radius:5px">
<form method="post" id="form" style="width:100%">
<input type="hidden" name="id_edit" value="<?php echo $row['id'] ?>">
          <div class="col-12" style="padding:10px;">
          <h4>Thông tin sản phẩm</h4>
          <div class="row">
            <div style="display: inline-block;padding:5px">
            Ảnh đại diện:<br>
            <img id="src_img_main" style="width:200px;border:1px solid gray;border-radius:5px" src="<?php echo $row['img_chinh'] ?>"><br>
            <input id="input_img_main" type="text" name="img_chinh" onkeyup="img_main()" style="width:200px;" value="<?php echo $row['img_chinh'] ?>" placeholder="Nhập địa chỉ hình ảnh...">
            <script type="text/javascript">
    function img_main() {
      document.getElementById('src_img_main').src=document.getElementById('input_img_main').value;
    }
      </script>
            </div>
            <div style="display: inline-block;padding:5px">
            <br>
            Mã sản phẩm: <input type="text" id="id_phone" name="id_phone" value="<?php echo $row['id_phone'] ?>" placeholder="Nhập mã sản phẩm..."><br><br>
            Hãng sản phẩm: <select name="hang">
    <option value="Samsung" <?php if($row['hang']=="Samsung")echo "selected"?>>Samsung</option>
    <option value="iPhone" <?php if($row['hang']=="iPhone")echo "selected"?>>iPhone</option>
    <option value="OPPO" <?php if($row['hang']=="OPPO")echo "selected"?>>OPPO</option>
  </select><br><br>
            Tên sản phẩm: <input type="text" id="ten" name="ten" value="<?php echo $row['ten'] ?>" placeholder="Nhập tên sản phẩm..."><br><br>
            Giá cả sản phẩm: <input type="number" step="10000" id="gia" name="gia" value="<?php echo $row['gia'] ?>" placeholder="Nhập giá sản phẩm..."><br><br>
            </div>
    </div>
    <hr>
          </div>
    <div class="col-12" style="padding:10px">
          <h4>Tạo màu của sản phẩm</h4>

          <style>
          .slide-detail ul li{width:270px;display: inline-block;border:1px solid gray;border-radius:3px;list-style: none;margin-right:2px;padding:2px}
          </style>

          <div class="row" id="create_img_color" style="padding:5px">
          <?php $query_img=mysqli_query($conn,"SELECT * FROM `img_color` WHERE id_phone='".$id."'");
          $i_color=1;
          $color_detail = array( 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
                while($row_img=mysqli_fetch_array($query_img)){ ?>
          <div id="create_color_<?php echo $i_color ?>" style="width:100%;padding:5px;border:1px solid gray;border-radius:5px;box-shadow:0px 6px 20px -10px grey;margin:5px 0px">
            <div style="width:100%"><span style="color:red">Màu sản phẩm thứ <?php echo $i_color ?> </span></div>
            <div style="display: inline-block;padding:5px">
            <img id="src_img_color_<?php echo $i_color ?>" style="width:100px;border:1px solid gray;border-radius:5px" src="<?php echo $row_img['img_mau'] ?>"><br>
            <input id="input_img_color_<?php echo $i_color ?>" name="img_mau_<?php echo $i_color ?>" value="<?php echo $row_img['img_mau'] ?>" onkeyup="document.getElementById('src_img_color_<?php echo $i_color ?>').src=document.getElementById('input_img_color_<?php echo $i_color ?>').value" style="width:100px;" placeholder="Nhập địa chỉ hình ảnh">
            </div>
            <div style="display: inline-block;padding:5px">
            Tên màu: <input type="text" name="ten_mau_<?php echo $i_color ?>" value="<?php echo $row_img['ten_mau'] ?>" placeholder="Nhập tên màu..."><br>
            Số lượng SP hiện có: <input type="number" min="0" name="so_luong_<?php echo $i_color ?>" style="width:113px" value="<?php echo $row_img['so_luong'] ?>" placeholder=""><br>
            </div>
            <div style="width:100%">
          <b>Ảnh slide mô tả chi tiết màu</b><br>
          <hr>
          <div class="slide-detail" style="width:100%;padding:5px;overflow-x: auto;white-space: nowrap;list-style-type: none;">
          <ul style="width:100%" id="create_img_color_detail_<?php echo $i_color ?>">
          <?php $query_img_detail=mysqli_query($conn,"SELECT * FROM `img_color_detail` WHERE id_phone='".$id."' AND ten_mau='".$row_img['ten_mau']."' ORDER BY stt_mau_chi_tiet ASC");
                while($row_img_detail=mysqli_fetch_array($query_img_detail)){ ?>
            <li id="img_color_detail_<?php echo $i_color ?>_<?php echo $color_detail[$i_color] ?>">
              Ảnh mô tả màu thứ <b style="color:red">(<?php echo $color_detail[$i_color] ?>)</b><br>
          <img id="src_img_color_detail_<?php echo $i_color ?>_<?php echo $color_detail[$i_color] ?>" style="width:100%" src="<?php echo $row_img_detail['img_mau_chi_tiet'] ?>"><br>
          <input type="text" id="input_img_color_detail_<?php echo $i_color ?>_<?php echo $color_detail[$i_color] ?>" name="img_mau_chi_tiet_<?php echo $i_color ?>_<?php echo $color_detail[$i_color] ?>" value="<?php echo $row_img_detail['img_mau_chi_tiet'] ?>" onkeyup="document.getElementById('src_img_color_detail_<?php echo $i_color ?>_<?php echo $color_detail[$i_color] ?>').src=document.getElementById('input_img_color_detail_<?php echo $i_color ?>_<?php echo $color_detail[$i_color] ?>').value" style="width:100%" placeholder="Nhập địa chỉ ảnh mô tả...">
          </li>
          <?php $color_detail[$i_color]++;
       } ?>
          </ul>
          </div>
          <span style="color:green">Số lượng ảnh mô tả SP: </span><input style="width:42px;height:23px" id="quatity_color_detail_<?php echo $i_color ?>" type="number" min="1" max="20" value="<?php echo $color_detail[$i_color]-1 ?>" onblur="i=<?php echo $i_color ?>; AddDelColorDetail();">
          </div>
    </div>
        <?php $i_color++;
       } ?>
           </div>
           
           <script>
  color_detail=[ 0, <?php echo $color_detail[1].", ".$color_detail[2].", ".$color_detail[3].", ".$color_detail[4].", ".$color_detail[5].", ".$color_detail[6].", ".$color_detail[7].", ".$color_detail[8].", ".$color_detail[9].", ".$color_detail[10]?>];
    i_color=<?php echo $i_color ?>;9
    function AddDelColor(){
      var quatity_color=$("#quatity_color").val();
      if(quatity_color > 10){
    alert("Sản phẩm chỉ chứa 10 màu!")
      }else{
      if(i_color <= quatity_color){
  var main = $("#create_img_color");
      while(i_color <= quatity_color){
        main.append("<div id='create_color_"+i_color+"' style='width:100%;padding:5px;border:1px solid gray;border-radius:5px;box-shadow:0px 6px 20px -10px grey;margin:5px 0px'>"+
            "<div style='width:100%'><span style='color:red'>Màu sản phẩm thứ "+i_color+"</span></div>"+
            "<div style='display: inline-block;padding:5px'>"+
            "<img id='src_img_color_"+i_color+"' style='width:100px;border:1px solid gray;border-radius:5px' src='#'><br>"+
            "<input id='input_img_color_"+i_color+"' name='img_mau_"+i_color+"' style='width:100px;' onkeyup=\"document.getElementById('src_img_color_"+i_color+"').src=document.getElementById('input_img_color_"+i_color+"').value\" placeholder='Nhập địa chỉ hình ảnh'>"+
            "</div>"+
            "<div style='display: inline-block;padding:5px'>"+
            "Tên màu: <input type='text' name='ten_mau_"+i_color+"' placeholder='Nhập tên màu...'><br>"+
            "Số lượng SP hiện có: <input type='number' min='0' name='so_luong_"+i_color+"' style='width:113px' placeholder=''><br>"+
            "</div>"+
            "<hr>"+
            "<div style='width:100%'>"+
          "<b>Ảnh slide mô tả chi tiết màu</b><br>"+
          "<div class='slide-detail' style='width:100%;padding:5px;overflow-x: auto;white-space: nowrap;list-style-type: none;'>"+
          "<ul style='width:100%' id='create_img_color_detail_"+i_color+"'>"+
            "<li id='img_color_detail_"+i_color+"_1'>"+
              "Ảnh mô tả màu thứ <b style='color:red'>(1)</b><br>"+
          "<img id='src_img_color_detail_"+i_color+"_1' style='width:100%' src='#'><br>"+
          "<input type='text' style='width:100%' id='input_img_color_detail_"+i_color+"_1' name='img_mau_chi_tiet_"+i_color+"_1' onkeyup=\"document.getElementById('src_img_color_detail_"+i_color+"_1').src=document.getElementById('input_img_color_detail_"+i_color+"_1').value\" placeholder='Nhập địa chỉ ảnh mô tả...'>"+
          "</li>"+
          "</ul>"+
          "</div>"+
          "<span style='color:green'>Số lượng ảnh mô tả SP: </span><input style='width:42px;height:23px' id='quatity_color_detail_"+i_color+"' type='number' min='1' max='20' value='1' onblur='i="+i_color+"; AddDelColorDetail();'>"+
          "</div>"+
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
    add.append("<li id='img_color_detail_"+i+"_"+color_detail[i]+"'>"+
              "Ảnh mô tả màu thứ <b style='color:red'>("+color_detail[i]+")</b><br>"+
          "<img id='src_img_color_detail_"+i+"_"+color_detail[i]+"' style='width:100%' src='#'><br>"+
          "<input type='text' id='input_img_color_detail_"+i+"_"+color_detail[i]+"' name='img_mau_chi_tiet_"+i+"_"+color_detail[i]+"' style='width:100%' onkeyup=\"document.getElementById('src_img_color_detail_"+i+"_"+color_detail[i]+"').src=document.getElementById('input_img_color_detail_"+i+"_"+color_detail[i]+"').value\" placeholder='Nhập địa chỉ ảnh mô tả...'>"+
          "</li>");
    color_detail[i]++;
  }
}else{
    quatity_color_detail++;
    if(color_detail[i] > quatity_color_detail){
      var del=$("li");
        while(color_detail[i] > quatity_color_detail){
          color_detail[i]--;
          del.remove("#img_color_detail_"+i+"_"+color_detail[i]+"");
        }
    }
  }
  }
}
    </script>
    <br>
          <span style="color:blue">Số lượng màu sản phẩm: </span><input id="quatity_color" style="width:42px;height:23px" type="number" min="1" max="10" value="<?php echo $i_color-1 ?>" onblur="AddDelColor()">
          <hr>
          </div>
          <div class="col-12" style="padding:10px">
          <h4>Cấu hình chi tiết của sản phẩm</h4>
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
          </div>
          <div class="col-12" style="padding:10px">
          <hr>
          <h4>Bài viết đánh giá của sản phẩm</h4>
          <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<textarea id="editor" name="editor1"><?php echo $row['evaluate'] ?></textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
<hr>
          </div>
    <div style="display:flex">
   <button style="width:50%;color:blue" onclick="return submitForm('XL_mat_hang.php?type=save')"><i class="nav-icon fas fa-save"></i> Lưu lại</button>
   <button style="width:50%;color:red" onclick="return submitForm('XL_mat_hang.php?type=edit')"><i class="nav-icon fas fa-wrench"></i> Sửa lại</button>
</div>
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
</form>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
          <br><br><br><br><br>
<?php } ?>








    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
