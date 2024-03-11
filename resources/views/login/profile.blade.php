@section('menu','mainmenu')
@section('submenu','pemasok')
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
            <h1 class="m-0">PEMASOK</h1>
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
    <div class="card card-info card-out-line">
      <div class="card-header">
        <div class="card-tools">
          <a href="{{route('pemasok.create') }}"class="btn btn-success">TAMBAH PEMASOK</a>
        <!-- <a href="{{route('cetak-barang_keluar') }}" target="_blank" class="btn btn-warning" data-toggle="tooltip" title="Cetak Seluruh Data">CETAK BARANG KELUAR<i class="fas fa-print"></i></a> -->
          <br/>
          <br/>
    </div>
  </div>

      <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="table-data">
        <thead>
        <tr class="table-info">
          <th>NO</th>
          <th>NAMA</th>
          <th>ALAMAT</th>
          <th>NO TELEPON</th>
          <!-- <th>TANGGAL</th> -->
          <th>Aksi</th>
          </tr>
          </thead>
              <tbody>
              @foreach ($ as $p)
              <tr>
              <td>{{$i+1}}</td>
              <td>{{$p->name}}</td>
              <td>{{$p->level}}</td>
              <td>{{$p->no_telepon}}</td>
              <!-- <td>{{$p->created_at}}</td> -->
              <td>
              <form action="{{ route('pemasok.destroy', $p->id) }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE">
              <a href="{{ route('pemasok.edit', $p->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
              <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')"><i class="fas fa-trash-alt"></i></button>
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







