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
            <h1 class="m-0">UBAH BARANG MASUK</h1>
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
    <form action="{{ route('barang_masuk.update', $barang_masuk->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
            <label for="stok_barang_id">NAMA BARANG</label>
            <select class="form-control" name="stok_barang_id">
                <option value="">pilih stok barang</option>
                @foreach( $stok_barang as $sb )
                <option value="{{ $sb->id}}" @if ($barang_masuk->stok_barang_id==$sb->id) selected @endif>{{ $sb->nama_barang}}
                @endforeach
        </select>
            <p class="text-danger">{{ $errors->first('stok_barang_id') }}</p>
    </div>

    <div class="form-group">
            <label for="pemasok_id">PEMASOK BARANG</label>
            <select class="form-control" name="pemasok_id">
                <option value="">pilih pemasok</option>
                @foreach( $pemasok as $p  )
                <option value="{{ $p->id}}"@if ($barang_masuk->pemasok_id==$p->id) selected @endif>{{ $p->nama_pemasok}}
                @endforeach
        </select>
            <p class="text-danger">{{ $errors->first('pemasok_id') }}</p>
    </div>

        <div class="form-group">
                <label for="jumlah_masuk"> JUMLAH BARANG MASUK</label>
              <input type="number" name="jumlah_masuk" id="jumlah_masuk" onkeyup="sum();" min='0' value="{{ $barang_masuk->jumlah_masuk}}" class="form-control" required>

              @if($errors->has('jumlah_masuk'))
                    <div class="text-danger">
                        {{ $errors->first('jumlah_masuk')}}
                    </div>
              @endif
              
          </div>

          <div class="form-group">
                <label for="harga"> HARGA BARANG MASUK</label>
              <input type="number" name="harga" id="harga" onkeyup="sum();"  value="{{ $barang_masuk->harga}}" class="form-control"  required>

              @if($errors->has('harga'))
                    <div class="text-danger">
                        {{ $errors->first('harga')}}
                    </div>
              @endif
              
          </div>
          <div class="form-group">
                <label for="total"> TOTAL BARANG MASUK</label>
              <input type="number" name="total" id="total" onkeyup="sum();" value="{{ $barang_masuk->total}}" class="form-control" readonly required>

              @if($errors->has('total'))
                    <div class="text-danger">
                        {{ $errors->first('total')}}
                    </div>
              @endif
              
          </div>
        <div class="form-group">
            <label for="tgl_masuk"> TANGGAL MASUK</label>
            <input type="date" name="tgl_masuk" class="form-control" value="{{ $barang_masuk->tgl_masuk}}" required>
        
            @if($errors->has('tgl_masuk'))
                  <div class="text-danger">
                      {{ $errors->first('tgl_masuk')}}
                  </div>
            @endif

        </div>
        
        <div class="form-group">
          <button class="btn btn-warning">UBAH</button>
          <a class="btn btn-danger" href="{{ route('barang_masuk.index') }}"> Kembali</a>
      </div>
      </div>
    </form>
    <!-- /.content -->
    </div>
    </div>
  </br>
  </br>
</div>
  <!-- /.content-wrapper -->
  <script>
    function sum() {
      var txtFirstNumberValue = document.getElementById('harga').value;
      var txtSecondNumberValue = document.getElementById('jumlah_masuk').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
        document.getElementById('total').value=result;
      }
    }
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













