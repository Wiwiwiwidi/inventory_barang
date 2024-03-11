@section('menu','mainmenu')
@section('submenu','rak')
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
            <h1 class="m-0"><center>TAMBAH RAK</center></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
<div class="container">
  <div class="card mt-2">
    <div class="card-body">
    <form action="{{ route('rak.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nama_rak">NAMA RAK</label>
            <input type="text" name="nama_rak" class="form-control" required>

            @if($errors->has('nama_rak'))
                    <div class="text-danger">
                        {{ $errors->first('nama_rak')}}
                    </div>
              @endif

        </div>
        <div class="form-group">
            <button class="btn btn-success">Tambah</button>
            <a class="btn btn-primary" href="{{ route('rak.index') }}">Kembali</a>
        </div>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
</div>
</br>
</div>
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




