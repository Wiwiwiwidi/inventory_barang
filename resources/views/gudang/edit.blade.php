@section('menu','mainmenu')
@section('submenu','gudang')
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
            <h1 class="m-0">UBAH GUDANG</h1>
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
  <div class="card mt-2">
    <div class="card-body">
      <form action="{{ route('gudang.update', $gudang->id) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
              <label for="nama_gudang">NAMA GUDANG</label>
              <input type="text" name="nama_gudang" class="form-control" value="{{ $gudang->nama_gudang }}"required>
          </div>
                @if($errors->has('nama_gudang'))
                      <div class="text-danger">
                          {{ $errors->first('nama_gudang')}}
                      </div>
                @endif
          <div class="form-group">
              <label for="lokasi">LOKASI GUDANG</label>
              <textarea name="lokasi" class="form-control" value="{{ $gudang->lokasi }}" required></textarea>
              @if($errors->has('lokasi'))
                    <div class="text-danger">
                        {{ $errors->first('lokasi')}}
                    </div>
              @endif
          </div>
        <div class="form-group">
            <button class="btn btn-warning btn-sm">UBAH</button>
            <a class="btn btn-danger btn-sm" href="{{ route('gudang.index') }}"> Kembali</a>
        </div>
      </form>
    <!-- /.content -->
  </div>
</div>
</div>
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









