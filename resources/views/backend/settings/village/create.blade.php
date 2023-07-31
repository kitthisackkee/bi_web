@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.village')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.village')}}</li>
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

            <form method="POST" action="{{route('village.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label for="name">{{__('lang.villagename')}}</label>
                      <input type="text" class="form-control" name="name" placeholder="{{__('lang.villagename')}}">
                    </div>
                    <div class="form-group">
                        <label>{{__('lang.provincename')}}</label>
                        <select class="form-control select2" name="dis_id" style="width: 100%;">
                                                   
                          @foreach($dis as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                          @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{__('lang.provincename')}}</label>
                        <select class="form-control select2" name="pro_id" style="width: 100%;">
                                                   
                          @foreach($pro as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                          @endforeach

                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('village.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection