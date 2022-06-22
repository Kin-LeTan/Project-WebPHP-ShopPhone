<!DOCTYPE html>
<?php include_once('connectSQL.php'); ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản Trị | Quản lý đơn hàng </title>

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
              <h1 class="m-0">Quản lý đơn hàng</h1>
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









    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách đơn hàng <span style="color:gray">(thứ tự theo SP đã tạo lần cuối)</span></h3>
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
                      <th>Người đặt</th>
                      <th>Hãng SP</th>
                      <th>Tên SP</th>
                      <th>Ảnh đại diện</th>
                      <th>Màu SP</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Tổng giá</th>
                      <th>Hình thức</th>
                      <th>Thời gian đặt hàng</th>
                      <th>Công cụ</th>
                    </tr>
                  </thead>
                  <tbody id="livesearch">
                    <?php 
                    $query=mysqli_query($conn,"SELECT * FROM `order` ORDER by id DESC");
                    $stt=1;
                    while($row=mysqli_fetch_array($query)){
                        $query_phone=mysqli_query($conn,"SELECT * FROM `phone` WHERE id_phone='".$row['id_phone']."'");
                        $row_phone=mysqli_fetch_array($query_phone);
                        ?>
                    <tr>
                      <th><?php echo $stt ?></th>
                      <td><?php echo $row['hoten'] ?></td>
                      <td><?php echo $row_phone['hang'] ?></td>
                      <td><?php echo $row_phone['ten'] ?></td>
                      <td><img style="width:80px" src="<?php echo $row_phone['img_chinh'] ?>"></td>
                      <td><?php echo $row['ten_mau_sp'] ?></td>
                      <td><?php echo number_format($row_phone['gia'], 0, ',', '.')?></td>
                      <td style="text-align:center"><?php echo $row['so_luong_dat'] ?></td>
                      <td><?php echo number_format($row_phone['gia']*$row['so_luong_dat'], 0, ',', '.')?></td>
                      <td><?php if($row['hinh_thuc_dat']=="shop"){echo "Đặt tại cửa hàng";}else{echo "Giao hàng tận nhà";} ?></td>
                      <td><?php echo $row['time_dat'] ?></td>
                      <td>
                      <?php if($row['trang_thai']=="no"){ ?>
                      <span onclick="change_status('yes','<?php echo $row['id'] ?>')" style="color:green;cursor: pointer;">
                      <i class="nav-icon fas fa-check"></i> Hoàn tất đơn hàng</span><br>
                      <?php }else{ ?>
                        <span onclick="change_status('no','<?php echo $row['id'] ?>')" style="color:red;cursor: pointer;">
                        <i class="nav-icon fas fa-times"></i> Hủy đơn hàng</span><br>
                        <?php } ?>
                      <a href="#" style="color:blue"><i class="far fa fa-eye"></i> CHI TIẾT</a><br>
                      <span onclick="delete_id('<?php echo $row['id_phone'] ?>')" style="color:red;cursor: pointer;"><i class="nav-icon fa fa-trash"></i> XÓA</span><br>
                    </td>
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
  
  xmlhttp.open("GET","admin_search.php?type=order&key="+str,true);
  xmlhttp.send();
}
function change_status(status,id){
    if(status=="yes"){
        var r = confirm("Bạn có chắc xác nhận hoàn tất đơn hàng này không!");
    }else{
       var r = confirm("Bạn có chắc xác nhận hủy đơn hàng này không!");
    }
    if(r == true) {
     var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","order_processing.php?status="+status+"&id="+id,true);
  xmlhttp.send();
}
                 }
   function delete_id(id){
                var r = confirm("Bạn có chắc xóa sản phẩm có mã SP là: \""+id+"\" không?\nKhi xóa ảnh hưởng xóa cả thông tin của sản phẩm này!");
              if(r == true) {
                alert(id);
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
