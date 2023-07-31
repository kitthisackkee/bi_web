@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.user')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.user')}}</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="col-lg-12">
          <div class="card card-default">

            <div class="card-header">
              <h3 class="card-title"><h4 class="card-title">{{__('lang.add')}}</h4></h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
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
            
            
            <form method="POST" action="{{route('user.store')}}">
                @csrf
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-6">

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="username">{{__('lang.username')}}</label>
                            <input type="text" class="form-control" name="name" placeholder="{{__('lang.username')}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="phone">{{__('lang.phone')}}</label>
                            <input type="text" class="form-control" name="phone" placeholder="{{__('lang.phone')}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="email">{{__('lang.email')}}</label>
                            <input type="email" class="form-control" name="email" placeholder="{{__('lang.email')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="password">{{__('lang.password')}}</label>
                              <input type="password" class="form-control" name="password" placeholder="{{__('lang.password')}}">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="confirmpassword">{{__('lang.confirmpassword')}}</label>
                              <input type="password" class="form-control" name="confirmpassword" placeholder="{{__('lang.confirmpassword')}}">
                            </div>
                          </div>
                      </div>
                    </div>
                    <!-- /.col -->
                    
                    <div class="col-md-6">

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>{{__('lang.employee')}}</label>
                              <select class="form-control select2" name="emp_id" style="width: 100%;">                     
                                @foreach($emp as $e)
                                    <option value="{{$e->id}}">{{$e->firstname}} {{$e->lastname}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>{{__('lang.branchname')}}</label>
                            <select class="form-control select2" name="branch_id" style="width: 100%;">                     
                              @foreach($branch as $br)
                                  <option value="{{$br->id}}">{{$br->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>{{__('lang.rolename')}}</label>
                            <select class="form-control select2" name="role_id" style="width: 100%;">                     
                              @foreach($role as $rl)
                                  <option value="{{$rl->id}}">{{$rl->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('user.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
            
          </div>

      </div>
    </div>
  </section>
@endsection