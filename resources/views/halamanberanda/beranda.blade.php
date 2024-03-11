@section('menu','dashboard')
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
  <!-- <img src="gambar/downloadkemhan.jpg" alt="Kemhan Logo" class="" style="" height="300" width="300"> -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          <h1>Dashboard</h1>
          <h3 align="center"><img src="{{asset('gambar/logo-baru-kemhan-dok-istimewa_11.png')}}" alt="" class="brand-image img-circle" style="opacity: .8" width="250x" height="250px"><br></h3>
            <h1 class="m-0"><center>INVENTORY BARANG BALITBANG KEMHAN RI</center></h1>
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
  
    <!-- Main content -->
      <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4">
                  <div class="small-box bg-primary">
                      <div class="inner">
                        <h3>{{ $jumlah_barang_masuk }}</h3>

                        <p>TOTAL BARANG MASUK</P>
                      </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                    <a href="{{ route('barang_masuk.index') }}" class="small-box-footer">Info Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>{{ $jumlah_barang_keluar }}</h3>
                    <p>TOTAL BARANG KELUAR</P>
              </div>
            <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('barang_keluar.index') }}" class="small-box-footer">Info Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                  </div>
            </div>

              <div class="col-lg-4">
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>{{ $jumlah_stok_barang }}</h3>
                    <p>TOTAL STOK BARANG</P>
              </div>
              <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('stok_barang.index') }}" class="small-box-footer">Info Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>

      <div class="col-lg-4">
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{ $jumlah_pemasok }}</h3>
                        <p>TOTAL PEMASOK</P>
                 </div>
          <div class="icon">
              <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('pemasok.index') }}" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
       </div>

       <div class="col-lg-4">
            <div class="small-box bg-purple">
                      <div class="inner">
                        <h3>{{ $jumlah_kategori }}</h3>
                        <p>TOTAL KATEGORI</P>
                 </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('kategori.index') }}"class="small-box-footer">Info Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
       </div>

       <div class="row col-12">
          <div class="col-md-3">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"><i class="bi bi-telephone-fill"></i> Kontak Admin</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                Hubungi 085886843050
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          </div>  
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
  <footer class="main-footer">
    @include('Template.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    @include('Template.script')
</body>
</html>
