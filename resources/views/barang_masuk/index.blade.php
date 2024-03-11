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
            <h1 class="m-0">BARANG MASUK</h1>
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
    <!-- Main content -->
  <div class="content">
      <div class="card card-info card-out-line">
        <div class="card-header">
          <div class="card-tools">
            <a href="{{route('barang_masuk.create') }}"class="btn btn-success">TAMBAH BARANG MASUK</a>
            <a href="{{route('cetak-barang_masuk') }}" target="_blank" class="btn btn-warning" data-toggle="tooltip" title="Cetak Seluruh Data">CETAK BARANG MASUK<i class="fas fa-print"></i></a>
          <br/>
          <br/>
    </div>
  </div>

    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="table-data">
        <thead>
        <tr>
      <th>NO</th>
      <th>NAMA BARANG</th>
      <th>JUMLAH BARANG MASUK</th>
      <th>HARGA BARANG</th>
      <th>TOTAL BARANG</th>
      <th>PEMASOK</th>
      <th>TANGGAL MASUK</th>
        <th>Aksi</th>
      </tr> 
        </thead>
          <tbody>
          @foreach ($barang_masuk as $i => $bm)
          <tr>
          <td>{{$i+1}}</td>
          <td>{{$bm->stok_barang->nama_barang}}</td>
          <td>{{$bm->jumlah_masuk}} Unit</td>
          <td>Rp.{{ number_format($bm->harga) }}</td>
          <td>Rp.{{ number_format($bm->total) }}</td>
          <td>{{$bm->pemasok->nama_pemasok}}</td>
          <td>{{ date('d M Y', strtotime($bm->tgl_masuk)) }}</td>
      <td>
          <form action="{{ route('barang_masuk.destroy', $bm->id) }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="DELETE">
          <a href="{{ route('barang_masuk.show', $bm->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detail"><i class="bi bi-eye-fill"></i></a>
          <a href="{{ route('barang_masuk.edit', $bm->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-fill"></i></a>
          <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')"><i class="bi bi-trash-fill"></i></button>
      </form>
      </td>
    </tr>
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








