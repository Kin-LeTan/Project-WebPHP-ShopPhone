<!DOCTYPE html>
<?php include_once('connectSQL.php'); ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản Trị | Quản lý mặt hàng | <?php if($_GET['type']=="show"){echo "Xem sản phẩm";}else{echo "Tạo sản phẩm";} ?></title>

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
            <h1 class="m-0">Thông tin cá nhân</h1>
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
          <div class="col-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông tin cá nhân khách hàng</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 145px;">
                    <input type="text" name="table_search" id="input_search" class="form-control float-right"  onkeyup="showResult(this.value, 1)" placeholder="Tìm kiếm theo mã, hãng, tên, giá sản phẩm...">
                  
                    <!-- <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Họ tên cá nhân</th>
                      <th>SĐT</th>
                      <th>Công cụ</th>
                    </tr>
                  </thead>
                  <tbody id="livesearch1">
                    <?php 
                    $query=mysqli_query($conn,"SELECT * FROM `customer_information` ORDER by id DESC");
                    $stt=1;
                    while($row=mysqli_fetch_array($query)){ ?>
                    <tr>
                      <th><?php echo $stt ?></th>
                      <td><?php echo $row['hoten'] ?></td>
                      <td><?php echo $row['sdt'] ?></td>
                      <td><a href="#" style="color:blue"><i class="far fa fa-eye"></i> CHI TIẾT</a>
                    </tr>
                    <?php $stt++;
                   }
                   mysqli_free_result($query); ?>
                  </tbody>
                </table>
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-7">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông tin địa chỉ khách hàng</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="table_search" id="input_search" class="form-control float-right"  onkeyup="showResult(this.value, 2)" placeholder="Tìm kiếm theo mã, hãng, tên, giá sản phẩm...">
                  
                    <!-- <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Họ Tên</th>
                      <th>Tỉnh/Thành Phố</th>
                      <th>Quận/Huyện</th>
                      <th>Số nhà</th>
                      <th>Đường</th>
                    </tr>
                  </thead>
                  <tbody id="livesearch2">
                    <?php 
                    $query=mysqli_query($conn,"SELECT * FROM `customer_information` ORDER by id DESC");
                    $stt=1;
                    while($row=mysqli_fetch_array($query)){ ?>
                    <tr>
                      <th><?php echo $stt ?></th>
                      <td><?php echo $row['hoten'] ?></td>
                      <td><?php echo $row['tp'] ?></td>
                      <td><?php echo $row['quan'] ?></td>
                      <td><?php echo $row['so_nha'] ?></td>
                      <td><?php echo $row['duong']?></td>
                    </tr>
                    <?php $stt++;
                   } ?>
                  </tbody>
                  <script>
                function showResult(str, i) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch"+i+"").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","admin_search.php?type=cus_inf&table="+i+"&key="+str,true);
  xmlhttp.send();
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
