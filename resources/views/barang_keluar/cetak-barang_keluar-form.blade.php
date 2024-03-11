@section('menu','mainmenu')
@section('submenu','cetak-barang_keluar-form')
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><center>Cetak Data Barang Keluar Pertanggal</center></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content/buat bikin sesuatu -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card card card-outline">
                <div class="card-body">
                  <!-- <a href="/event" class="btn btn-info"><i class="bi bi-back"></i> Kembali</a>
                      <br>
                      <br> -->
                      <div class="input-group mb-3">
                        <label>Mulai Tanggal</label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control">
                      </div>
                      <div class="input-group mb-3">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                      </div>
                      <div class ="input-group mb-3">
                        <a href="" onclick="this.href='/cetak-barang_keluar-pertanggal/'+document.getElementById('tglawal').value +
                        '/'+ document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">
                        Cetak Laporan Pertanggal Barang Keluar<i class="fas fa-print"></i>
                    </a>
                      </div>
                  </div>
              </div>
              <div class="card card-info card-outline">
                <div class="card-body">
                  <h4>Keterangan :</h4>
                  <p class="card-text">Silahkan Pilih Tanggal Laporan yang diInginkan!</p>
              </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('Template.script')

</body>
</html>