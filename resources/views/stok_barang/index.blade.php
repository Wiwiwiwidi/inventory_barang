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
            <h1 class="m-0">DATA BARANG</h1>
            
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
    @if($message = Session::get('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
    @endif
    
    @if($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
        @endif
    <!-- Main content -->
  <div class="content">
    <div class="card card-dark card-out-line">
      <div class="card-header">
        <div class="card-tools">
        <a href="{{route('stok_barang.create') }}"class="btn btn-success">Tambah Data Barang<i class="bi bi-plus"></i></a>
        <a href="{{route('cetak_stok_barang') }}" target="_blank" class="btn btn-warning" data-toggle="tooltip" title="Cetak Seluruh Data">CETAK DATA BARANG<i class="fas fa-print"></i></a>
      </br>
        </br>
        </div>
    </div>

    <div class="card-body">
      <table class="table table-bordered table-hover table-striped" id="table-data">
        <thead>
        <tr class="table-info">
        <th>NO</th>
        <th>nama barang</th>
        <th>kategori</th>
        <th>Gudang</th>
        <th>Rak</th>
        <th>Stok barang</th>
        <th>harga barang</th>
        <th>total barang</th>
        <th>tanggal </th>
        <th>Gambar</th>
          <th>Aksi</th>
        </tr>
       </thead>
        <tbody>
          @foreach ($stok_barang as $i => $sb)
            <tr>
              <td>{{$i+1}}</td>
              <td>{{$sb->nama_barang}}</td>
              <td>{{$sb->kategori->nama_kategori}}</td>
              <td>{{$sb->gudang->nama_gudang}}</td>
              <td>{{$sb->rak->nama_rak}}</td>
              <td>{{$sb->jumlah_barang}} Unit</td>
              <td>Rp.{{ number_format($sb->harga_barang) }}</td>
              <td>Rp.{{ number_format($sb->total) }}</td>
              <td>{{ date('d M Y', strtotime($sb->tanggal)) }}</td>
              <td><img width="100px"src="{{ url('/data_gambar/'.$sb->gambar) }}"></td>
              <td>
         <form action="{{ route('stok_barang.destroy', $sb->id) }}" method="post">
         {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <a href="{{ route('stok_barang.show', $sb->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detail"><i class="bi bi-eye-fill"></i></a>
            <a href="{{ route('stok_barang.edit', $sb->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-fill"></i></a>
            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')" title="Hapus"><i class="bi bi-trash-fill"></i></button>
         </form>
         </td>
      </tr>
   @endforeach
  </tbody>
      </table>
    <!-- /.content -->
  </div>
</div>
</div>
</br>
</br>
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





