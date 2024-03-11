
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
            <h1 class="m-0"><center>TAMBAH DATA BARANG</center></h1>
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
  <div class="card mt-2">
  <div class="card-body">
    <form action="{{ route('stok_barang.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="form-group">
                <label for="gambar">GAMBAR</label>
              <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}" placeholder="MASUKKAN GAMBAR"required>
              @if($errors->has('gambar'))
                    <div class="text-danger">
                        {{ $errors->first('gambar')}}
                    </div>
              @endif
          </div>

        <div class="form-group">
              <label for="kategori_id">KATEGORI</label>
              <select class="form-control" name="kategori_id" >
                  <option value="">pilih kategori</option>
                  @foreach( $kategori as $k )
                  <option value="{{ $k->id}}">{{ $k->nama_kategori}}
                  @endforeach
          </select>
              <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
        </div>

        <div class="form-group">
              <label for="gudang_id">GUDANG</label>
              <select class="form-control" name="gudang_id">
                  <option value="">pilih Gudang</option>
                  @foreach( $gudang as $g )
                  <option value="{{ $g->id}}">{{ $g->nama_gudang}}
                  @endforeach
          </select>
              <p class="text-danger">{{ $errors->first('gudang_id') }}</p>
        </div>

        <div class="form-group">
              <label for="rak_id">RAK</label>
              <select class="form-control" name="rak_id">
                  <option value="">pilih Rak</option>
                  @foreach( $rak as $r )
                  <option value="{{ $r->id}}">{{ $r->nama_rak}}
                  @endforeach
          </select>
              <p class="text-danger">{{ $errors->first('rak_id') }}</p>
        </div>

          <div class="form-group">
                <label for="nama_barang">NAMA BARANG </label>
              <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}" placeholder="Masukkan Nama Barang"required>
             
              @if($errors->has('nama_barang'))
                    <div class="text-danger">
                        {{ $errors->first('nama_barang')}}
                    </div>
              @endif

          </div>

           <!-- <div class="form-group">
                <label for="jumlah_barang"> STOK BARANG </label>
              <input type="number" name="jumlah_barang" id="jumlah_barang" onkeyup="sum();" min='0' class="form-control" value="{{ old('jumlah_barang') }}" placeholder="Masukkan Jumlah Barang" required>
              
              @if($errors->has('jumlah_barang'))
                    <div class="text-danger">
                        {{ $errors->first('jumlah_barang')}}
                    </div>
              @endif

            </div>

          <div class="form-group">
              <label for="harga_barang">HARGA BARANG</label>
                <div class ="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Rp</span>
                  <input type="number" name="harga_barang" id="harga_barang" onkeyup="sum();" class="form-control" value="{{ old('harga_barang') }}" placeholder=" Harga Barang..." required>
                </div>
              
              @if($errors->has('harga_barang'))
                    <div class="text-danger">
                        {{ $errors->first('harga_barang')}}
                    </div>
              @endif

          </div>
           -->
          <!-- <div class="form-group">
                <label for="total">TOTAL</label>
              <input type="text" name="total" id="total" onkeyup="sum();" class="form-control"placeholder="TOTAL..."  required >
             
              @if($errors->has('total'))
                    <div class="text-danger">
                        {{ $errors->first('total')}}
                    </div>
              @endif

          </div>  -->
          
          <div class="form-group">
                <label for="tanggal"> TANGGAL </label>
              <input type="date" name="tanggal" class="form-control"placeholder="Masukkan tanggal " required>
          </div>
          
          <div class="modal-footer">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>TAMBAH</button>
              <a class="btn btn-primary" href="{{ route('stok_barang.index') }}">Kembali</a>
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
  <script>
    function sum() {
      var txtFirstNumberValue = document.getElementById('harga_barang').value;
      var txtSecondNumberValue = document.getElementById('jumlah_barang').value;
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

























