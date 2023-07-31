<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{__('lang.login')}} | {{__('lang.title')}}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('images/logo.png')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <style>
    @font-face{
      font-family: Phetsarath OT;
      src: url('{{asset('fonts/PhetsarathOT.ttf')}}');
    }
  </style>
</head>
<body class="hold-transition login-page" style="font-family: 'Phetsarath OT'">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="{{asset('images/logo.png')}}" height="100"> <br>
      <a href="https://bibol.edu.la/" target="_blank" class="h3"><b>{{__('lang.title')}}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{__('lang.signintostartyoursession')}}</p>

      <form action="{{route('loginadmin.store')}}" method="post">

        @csrf

        @if(count($errors)>0)
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-ban"> {{__('lang.error')}}</i></br>
                  @foreach($errors->all() as $error)
                  {{$error}} </br>
                  @endforeach
                </div>
            </div>
        @endif 

        @if(session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button type="button" class="btn btn-default">020</button>
          </div>
          <input type="text" class="form-control" name="phone" placeholder="{{__('lang.phone')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="{{__('lang.password')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">{{__('lang.signin')}}</button>
          </div>
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
