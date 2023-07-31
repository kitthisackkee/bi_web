@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.branch')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.branch')}}</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">{{__('lang.add')}}</h4>
            </div>

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

            <form method="POST" action="{{route('branch.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="code">{{__('lang.code')}}</label>
                        <input type="text" class="form-control" name="code" placeholder="{{__('lang.code')}}">
                    </div>
                    <div class="form-group">
                      <label for="name">{{__('lang.name')}}</label>
                      <input type="text" class="form-control" name="name" placeholder="{{__('lang.name')}}">
                    </div>
                    <div class="form-group">
                        <label for="code">{{__('lang.address')}}</label>
                        <input type="text" class="form-control" name="address" placeholder="{{__('lang.address')}}">
                    </div>
                    <div class="form-group">
                      <label for="name">{{__('lang.phone')}}</label>
                      <input type="text" class="form-control" name="phone" placeholder="{{__('lang.phone')}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('branch.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection