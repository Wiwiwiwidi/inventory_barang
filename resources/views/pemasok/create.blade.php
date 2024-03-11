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
            <h1 class="m-0"><center>TAMBAH PEMASOK</center></h1>
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
<div class="container">
  <div class="card mt-2">
    <div class="card-body">
      <form action="{{ route('pemasok.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="nama_pemasok">NAMA PEMASOK</label>
              <input type="text" name="nama_pemasok" class="form-control" value="{{ old('nama_pemasok') }}" required>
          </div>
                @if($errors->has('nama_pemasok'))
                      <div class="text-danger">
                          {{ $errors->first('nama_pemasok')}}
                      </div>
                @endif
          <div class="form-group">
              <label for="alamat">ALAMAT</label>
              <textarea name="alamat" class="form-control" value="{{ old('alamat') }}" required></textarea>
              @if($errors->has('alamat'))
                    <div class="text-danger">
                        {{ $errors->first('alamat')}}
                    </div>
              @endif
          </div>
          <div class="form-group">
              <label for="no_telepon">NO TELEPON</label>
              <input type="tel" name="no_telepon" class="form-control" value="{{ old('no_telepon') }}" required>
              @if($errors->has('no_telepon'))
                    <div class="text-danger">
                        {{ $errors->first('no_telepon')}}
                    </div>
              @endif
            </div>
          
          <div class="form-group">
              <button class="btn btn-success btn-sm ">Tambah</button>
              <a class="btn btn-primary btn-sm" href="{{ route('pemasok.index') }}"> Kembali</a>
          </div>
    </div>
      </form>
            </table>
    <!-- /.content -->
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





















