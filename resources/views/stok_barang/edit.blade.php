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
        <div class="row mb-10">
          <div class="col-sm-10">
            <h1 class="m-0">UBAH DATA BARANG</h1>
          </div><!-- /.col -->
          <div class="col-sm-10">
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
    
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
    @endif

    <!-- Main content -->
<div class="container">
  <div class="card mt-10">
  <div class="card-body">
    <form action="{{ route('stok_barang.update', $stok_barang->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <label for="gambar">GAMBAR:</label>
            <input type="file" class="form-control" name="gambar" placeholder="MASUKKAN GAMBAR" value="{{ $stok_barang->gambar}}">
           
            @if($errors->has('gambar'))
                    <div class="text-danger">
                        {{ $errors->first('gambar')}}
                    </div>
            @endif

          </div>
        <div class="form-group">
            <img width="150px" src="{{ url('/data_gambar/'.$stok_barang->gambar) }}">
        </div>

    <div class="form-group">
        <label for="kategori_id">kategori barang</label>
            <select class="form-control" name="kategori_id">
                <option value="">--pilih kategori--</option>
                @foreach( $kategori as $k )
                <option value="{{ $k->id}}" @if ($stok_barang->kategori_id==$k->id) selected @endif>{{ $k->nama_kategori}}</option>
                @endforeach
                </select>
            <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
        </div>

        <div class="form-group">
              <label for="gudang_id">GUDANG</label>
              <select class="form-control" name="gudang_id">
                  <option value="">pilih Gudang</option>
                  @foreach( $gudang as $g )
                  <option value="{{ $g->id}}" @if ($stok_barang->gudang_id==$g->id) selected @endif>{{ $g->nama_gudang}}</option>
                  @endforeach
              </select>
              <p class="text-danger">{{ $errors->first('gudang_id') }}</p>
        </div>

        <div class="form-group">
              <label for="rak_id">RAK</label>
              <select class="form-control" name="rak_id">
                  <option value="">--pilih Rak--</option>
                  @foreach( $rak as $r )
                  <option value="{{ $r->id}}" @if ($stok_barang->rak_id==$r->id) selected @endif>{{ $r->nama_rak}}
                  @endforeach
          </select>
              <p class="text-danger">{{ $errors->first('rak_id') }}</p>
        </div>

       
        <div class="form-group">
            <label for="nama_barang">NAMA BARANG: </label>
            <input type="text" name="nama_barang" class="form-control"  value="{{ $stok_barang->nama_barang}}" required>
           
            @if($errors->has('nama_barang'))
                    <div class="text-danger">
                        {{ $errors->first('nama_barang')}}
                    </div>
            @endif

        </div>

        <!-- <div class="form-group">
            <label for="harga_barang">HARGA BARANG</label>
                <div class ="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Rp</span>
                  <input type="text" name="harga_barang" class="form-control" value="{{ $stok_barang->harga_barang}}" readonly required>
              </div>

              @if($errors->has('harga_barang'))
                    <div class="text-danger">
                        {{ $errors->first('harga_barang')}}
                    </div>
              @endif
        </div> -->

        <!-- <div class="form-group">
            <label for="jumlah_barang"> STOK BARANG:</label>
            <input type="number" name="jumlah_barang" class="form-control"  value="{{ $stok_barang->jumlah_barang}}" readonly required>
             <p class="text-danger">{{ $errors->first('jumlah_barang') }}</p> 
        </div> 
        
        @if($errors->has('jumlah_barang'))
              <div class="text-danger">
                  {{ $errors->first('jumlah_barang')}}
              </div>
        @endif
  -->

        <!-- <div class="form-group">
                <label for="total">TOTAL</label>
              <input type="text" name="total" class="form-control" value="{{ $stok_barang->total}}" readonly required>

              @if($errors->has('total'))
                    <div class="text-danger">
                        {{ $errors->first('total')}}
                    </div>
              @endif

          </div> -->

        <div class="form-group">
            <label for="tanggal"> TANGGAL :</label>
            <input type="date" name="tanggal" class="form-control"  value="{{ $stok_barang->tanggal}}"required>
           
            @if($errors->has('tanggal'))
                    <div class="text-danger">
                        {{ $errors->first('tanggal')}}
                    </div>
              @endif

        </div>

        <div class="form-group">
          <button class="btn btn-warning">UBAH</button>
          <a class="btn btn-danger" href="{{ route('stok_barang.index') }}"> Kembali</a>
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










