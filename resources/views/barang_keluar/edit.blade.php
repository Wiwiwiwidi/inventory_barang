@section('menu','barang_keluar')
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
            <h1 class="m-0">UBAH BARANG KELUAR</h1>
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
<div class="container">
  <div class="card mt-2">
    <div class="card-body">
    <form action="{{ route('barang_keluar.update', $barang_keluar->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
            <label for="stok_barang_id">stok barang</label>
            <select class="form-control" name="stok_barang_id">
                <option value="">pilih stok barang</option>
                @foreach( $stok_barang as $sb )
                <option value="{{ $sb->id}}" @if ($barang_keluar->stok_barang_id==$sb->id) selected @endif>{{ $sb->nama_barang}}
                @endforeach
        </select>
            <p class="text-danger">{{ $errors->first('stok_barang_id') }}</p>
     </div>

        <div class="form-group">
            <label for="jumlah_keluar"> JUMLAH BARANG KELUAR:</label>
            <input type="number" name="jumlah_keluar" min='0' class="form-control" value="{{ $barang_keluar->jumlah_keluar}}" required>
            
            @if($errors->has('jumlah_keluar'))
                    <div class="text-danger">
                        {{ $errors->first('jumlah_keluar')}}
                    </div>
              @endif

          </div>

          <div class="form-group">
            <label for="tgl_keluar"> TANGGAL KELUAR</label>
            <input type="date" name="tgl_keluar" class="form-control" value="{{ $barang_keluar->tgl_keluar}}" required>
        
            @if($errors->has('tgl_keluar'))
                    <div class="text-danger">
                        {{ $errors->first('tgl_keluar')}}
                    </div>
              @endif

        </div>
        
        <div class="form-group">
            <label for="keterangan">KETERANGAN:</label>
            <textarea name="keterangan" class="form-control" value="{{ $barang_keluar->keterangan }}" required></textarea>

            @if($errors->has('keterangan'))
                    <div class="text-danger">
                        {{ $errors->first('keterangan')}}
                    </div>
              @endif

        </div>

        <div class="form-group">
          <button class="btn btn-warning btn-sm">UBAH</button>
          <a class="btn btn-primary btn-sm" href="{{ route('barang_keluar.index') }}"> Kembali</a>
      </div>
      </div>
    </div>
    </form>
    <!-- /.content -->
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

















