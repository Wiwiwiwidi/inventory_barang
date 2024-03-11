@section('menu','mainmenu')
@section('submenu','stok_barang')
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
          <div class="col-sm-6">
            <h1 class="m-0">DETAIL DATA BARANG</h1>
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
    
<!-- <div class="container mt-6">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
        </div>
    </div> -->
<div class="container">
  <div class="row">
  <div class="col md-12">
  <div class="card mt-2">
  <div class="card-body">
    <br/>
</div>
    <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>NAMA BARANG :</strong>
                    {{ $stok_barang->nama_barang}}
        </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>KATEGORI :</strong>
                    {{ $stok_barang->kategori->nama_kategori}}
                </div>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Gudang :</strong>
                    {{ $stok_barang->gudang->nama_gudang}}
                    </br>
                    <strong>Lokasi :</strong>
                    {{ $stok_barang->gudang->lokasi}}
                </div>
          </div>
        
          <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>RAK :</strong>
                    {{ $stok_barang->rak->nama_rak}}
                </div>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>STOK BARANG :</strong>
                    {{ $stok_barang->jumlah_barang}} Unit
              </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>HARGA BARANG :</strong>
                    Rp.{{ number_format($stok_barang->harga_barang) }}
               </div>
        </div>
   
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>TOTAL:</strong>
                    Rp.{{ number_format($stok_barang->total) }}
               </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>TANGGAL:</strong>
                    <td>{{ date('d M Y', strtotime($stok_barang->tanggal)) }}</td>
                </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>GAMBAR:</strong>
                    <td><img width="150px" src="{{ url('/data_gambar/'.$stok_barang->gambar) }}"></td>
              </div>
            <a class="btn btn-primary" href="{{ route('stok_barang.index') }}"> Kembali</a>
           </div>
      </br>
    <!-- /.content -->
    </div>
  </div>
</div>
</div>
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


























