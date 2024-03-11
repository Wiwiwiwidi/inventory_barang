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
            <h1 class="m-0">RAK</h1>
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
   
    <!-- Main content -->
    @if($message = Session::get('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
    @endif
    
    <!-- <div class="container"> -->
      <div class="content">
        <div class="card card-info card-out-line">
          <div class="card-header">
            <div class="card-tools">
            <a href="{{ route('rak.create') }}"class="btn btn-success">TAMBAH RAK</a>
            <br/>
            <br/>
      </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="table-data">
          <thead>
          <tr>
            <th>NO</th>
            <th>RAK</th>
            <th>Aksi</th>
        </tr>
        </thead>
            <tbody>
            @foreach ($rak as $i => $v)
            <tr>
            <td>{{$i+1}}</td>
            <td>{{$v->nama_rak}}</td>
        <td>
            <form action="{{ route('rak.destroy', $v->id) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <a href="{{ route('rak.edit', $v->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-fill"></i></a>
            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')" title="Hapus"><i class="fas fa-trash-alt"></i></button>
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
    <script>
      window.setTimeout(function(){
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
        });
      }, 3000);
  </script> 
</body>
</html>

