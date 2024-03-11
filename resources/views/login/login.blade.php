
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INVENTORY LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Admin/dist/css/adminlte.min.css')}}">
  <!-- Bootstrap Icon  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

      @if($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
        @endif

        
      @if($message = Session::get('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
        @endif

<div class="login-logo">
  <h3 align="center"><img src="{{asset('gambar/logo-baru-kemhan-dok-istimewa_11.png')}}" alt="" class="brand-image img-circle" style="opacity: .8" width="105x" height="105px"></h3>
    <a href="#" class="h1"><b>Inventory Barang</b></br>Balitbang Kemhan RI</a>
  </div>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <p class="login-box-msg">Login Untuk Masuk</p>

      <form action="{{route('postlogin')}}" method="post">
         {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"name="email" placeholder="Masukkan Email Anda">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if($errors->has('email'))
              <div class="text-danger">
                {{ $errors->first('email')}}
              </div>
        @endif

        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"  placeholder="Masukkan Password Anda">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if($errors->has('password'))
              <div class="text-danger">
                {{ $errors->first('password')}}
                </div>
        @endif

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div>
      </br>
          <div>
            <p>Belum Punya Akun?<a href="{{ route('registrasi') }}">Daftar</a></p>
          </div>

         
      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
@include('Template.script')

</body>
</html>
