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
            <h1 class="m-0">TAMBAH BARANG KELUAR</h1>
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
    <!-- select search -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    
    @if($message = Session::get('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
    @endif

    @if($message = Session::get('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
    @endif
    <!-- Main content -->
    <div class="container">
    <div class="card mt-2">
      <div class="card-body"> 
        <form action="{{ route('barang_keluar.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

    <div class="form-group">
            <label for="stok_barang_id">STOK BARANG:</label>
            <select class="form-control" name="stok_barang_id" id="stok_barang_id"multiple>
                <option value="">pilih stok barang</option>
                @foreach( $stok_barang as $sb )
                @if ($sb->jumlah_barang !=0)<option value="{{ $sb->id}}">{{ $sb->nama_barang}}@endif
                @endforeach
        </select>
            <p class="text-danger">{{ $errors->first('stok_barang_id') }}</p>
    </div>

        <div class="form-group">
            <label for="jumlah_keluar"> JUMLAH BARANG KELUAR:</label>
            <input type="number" name="jumlah_keluar" min='0' class="form-control" value="{{ old('jumlah_keluar') }}" required>

            @if($errors->has('jumlah_keluar'))
                    <div class="text-danger">
                        {{ $errors->first('jumlah_keluar')}}
                    </div>
              @endif

          </div>

        <div class="form-group">
            <label for="tgl_keluar"> TANGGAL KELUAR:</label>
            <input type="date" name="tgl_keluar" class="form-control" value="{{ old('tgl_keluar') }}" required>

            @if($errors->has('tgl_keluar'))
                    <div class="text-danger">
                        {{ $errors->first('tgl_keluar')}}
                    </div>
              @endif

        </div>

        <div class="form-group">
            <label for="keterangan">KETERANGAN:</label>
            <textarea name="keterangan" class="form-control" value="{{ old('keterangan') }}" required></textarea>

            @if($errors->has('keterangan'))
                    <div class="text-danger">
                        {{ $errors->first('keterangan')}}
                    </div>
              @endif

        </div>

        <div class="modal-footer">
            <button type="submit"class="btn btn-success">TAMBAH</button>
            <a class="btn btn-primary" href="{{ route('barang_keluar.index') }}"> Kembali</a>
        </div>
    </div>
</di>
</form>
    <!-- /.content -->
</div>
</div>
</br>
</br>
</div>
  <!-- /.content-wrapper -->
<!-- select search -->
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<!-- select search -->
<script>
    new MultiSelectTag('stok_barang_id') // id
</script>

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
























