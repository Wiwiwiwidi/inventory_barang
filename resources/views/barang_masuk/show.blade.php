@section('menu','barang_masuk')
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
            <h1 class="m-0">DETAIL BARANG MASUK</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
  <div class="container">
      <div class="row">
          <div class="col md-2">
            <div class="card mt-2">
              <div class="card-body">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NAMA BARANG:</strong>
                        {{ $barang_masuk->stok_barang->nama_barang}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>PEMASOK BARANG:</strong>
                        </br>
                        Nama: {{ $barang_masuk->pemasok->nama_pemasok}}
                        </br>
                        No Telepon: {{ $barang_masuk->pemasok->no_telepon}}
                        </br> 
                        Alamat: {{ $barang_masuk->pemasok->alamat}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>JUMLAH BARANG MASUK :</strong>
                        {{ $barang_masuk->jumlah_masuk}} Unit
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> HARGA BARANG :</strong>
                        <td>Rp.{{ number_format($barang_masuk->harga) }}</td>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>TOTAL :</strong>
                        <td>Rp.{{ number_format($barang_masuk->total) }}</td>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>TANGGAL MASUK:</strong>
                        <td>{{ date('d M Y', strtotime($barang_masuk->tgl_masuk)) }}</td>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ route('barang_masuk.index') }}"> Kembali</a>
              </div>

    <!-- /.content -->
            </div>
        </div>
      </div>
</br>
</br>
</br>
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


















