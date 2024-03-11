<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Inventory</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-warning">
    <div class="card-header text-center">
    <h3 align="center"><img src="{{asset('gambar/logo-baru-kemhan-dok-istimewa_11.png')}}" alt="" class="brand-image img-circle" style="opacity: .8" width="105x" height="105px"></h3>
      <a href="#"><b>Registrasi</b>Pengguna</a>
        </div>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
    @endif

  <div class="card-body">
    <form action="{{ route('simpanregistrasi') }}" method="post">
        {{ csrf_field() }}
      <div class="input-group mb-3">
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{old('name') }}" placeholder="Nama..."  required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @if ($errors->has('name'))
          <div class="invalid-feedback">
            {{$errors->first('name')}}
          </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{old('email') }}" placeholder="Email..." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('email'))
          <div class="invalid-feedback">
            {{$errors->first('email')}}
          </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{old('password') }}" placeholder="Password..." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if ($errors->has('password'))
          <div class="invalid-feedback">
            {{$errors->first('password')}}
          </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" value="{{old('password_confirmation') }}" placeholder="Ketik Ulang Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if ($errors->has('pasword_confirmation'))
          <div class="invalid-feedback">
            {{$errors->first('pasword_confirmation')}}
          </div>
          @endif
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
</br>
      <p> 
      Sudah Mempunyai Akun? <a href="/login" class="text-center">Masuk</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
@include('Template.script')
</body>
</html>