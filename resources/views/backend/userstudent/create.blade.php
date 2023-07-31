@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.student')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.student')}}</li>
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
            
            
            <form method="POST" action="{{route('user_for_student.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4"><h5><b><u>{{__('lang.profile')}}</u></b></h5></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><h5><b><u>{{__('lang.address')}}</u></b></h5></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 callout callout-info">
                       <div class="form-group">
                          <label>{{__('lang.gender')}}</label><br>
                                  <div class="icheck-info d-inline col-md-2">
                                    <input type="radio" name="gender"  id="radioSuccess1"  value="ທ້າວ"  >
                                    <label for="radioSuccess1">{{__('lang.male')}}</label>
                                  </div>
                                  <div class="icheck-warning d-inline col-md-2">
                                    <input type="radio" name="gender" id="radioSuccess2" value="ນາງ"  >
                                    <label for="radioSuccess2">{{__('lang.female')}}</label>
                                  </div>
                       </div>
                       <div class="form-group">   
                         <label>{{__('lang.code')}}</label>
                         <input type="text" class="form-control" name="code" placeholder="{{__('lang.code')}}">
                       </div>
                       
                       <div class="form-group">
                          <label>{{__('lang.name')}}</label>
                          <input type="text" class="form-control" name="name" placeholder="{{__('lang.name')}}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.lastname')}}</label>
                            <input type="text" class="form-control" name="lastname" placeholder="{{__('lang.lastname')}}">
                        </div>
                        
                      </div> <!-- end col sm 4 -->

                      <div class="col-sm-4 callout callout-info">
                       <div class="form-group">
                            <label>{{__('lang.bod')}}</label>
                            <input type="date" class="form-control" name="birthday" placeholder="{{__('lang.bod')}}">
                        </div>
                       <div class="form-group">   
                         <label>{{__('lang.bvillagename')}}</label>
                         <select class="form-control select2" name="vl_id" style="width: 100%;">
                         <option value="">{{__('lang.select')}}</option>  
                              @foreach($vil as $br)
                                  <option value="{{$br->id}}">{{$br->name}}</option>
                              @endforeach
                              </select>
                       </div>
                       <div class="form-group">
                          <label>{{__('lang.bdistrictname')}}</label>
                          <select class="form-control select2" name="dt_id" style="width: 100%;">  
                          <option value="">{{__('lang.select')}}</option>
                              @foreach($dis as $br)
                                  <option value="{{$br->id}}">{{$br->name}}</option>
                              @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.bprovincename')}}</label>
                            <select class="form-control select2" name="pv_id" style="width: 100%;"> 
                            <option value="">{{__('lang.select')}}</option> 
                              @foreach($pro as $br)
                                  <option value="{{$br->id}}">{{$br->name}}</option>
                              @endforeach
                              </select>
                        </div>
                      </div>
                      <div class="col-sm-4 callout callout-info">
                       <div class="form-group">   
                         <label>{{__('lang.villagename')}}</label>
                         <select class="form-control select2" name="last_vl_id" style="width: 100%;">  
                                <option value="">{{__('lang.select')}}</option>
                              @foreach($vil as $br)
                                  <option value="{{$br->id}}">{{$br->name}}</option>
                              @endforeach
                              </select>
                       </div>
                       <div class="form-group">
                          <label>{{__('lang.districtname')}}</label>
                          <select class="form-control select2" name="last_dt_id" style="width: 100%;">  
                          <option value="">{{__('lang.select')}}</option>
                              @foreach($dis as $br)
                                  <option value="{{$br->id}}">{{$br->name}}</option>
                              @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.provincename')}}</label>
                            <select class="form-control select2" name="last_pv_id" style="width: 100%;"> 
                            <option value="">{{__('lang.select')}}</option> 
                              @foreach($pro as $br)
                                  <option value="{{$br->id}}">{{$br->name}}</option>
                              @endforeach
                              </select>
                        </div>
                      </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                              <label>{{__('lang.term')}}</label>
                              <select class="form-control select2" name="term_id" style="width: 100%;">  
                              <option value="">{{__('lang.select')}}</option>  
                              @foreach($term as $br)
                                  <option value="{{$br->id}}">{{$br->name}}</option>
                              @endforeach
                              </select>
                            </div>
                      </div>

                    <div class="col-md-4">
                            <div class="form-group">
                              <label>{{__('lang.class_room')}}</label>
                              <input type="text" class="form-control" name="classroom_id" placeholder="{{__('lang.class_room')}}">
                            </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">{{__('lang.phone')}}</label>
                            <input type="text" class="form-control" name="phone" placeholder="{{__('lang.phone')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{__('lang.email')}}</label>
                            <input type="email" class="form-control" name="email" placeholder="{{__('lang.email')}}">
                        </div>
                      </div>

                    <div class="col-md-4">
                        <div class="form-group">
                              <label for="password">{{__('lang.password')}}</label>
                              <input type="password" class="form-control" value="888888" name="password" placeholder="{{__('lang.password')}}">
                        </div>
                        <div class="form-group">
                              <label for="confirmpassword">{{__('lang.confirmpassword')}}</label>
                              <input type="password" class="form-control" value="888888" name="confirmpassword" placeholder="{{__('lang.confirmpassword')}}">
                        </div>
                        
                    </div>
                    <!-- /.col -->
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="picture">{{__('lang.image')}}</label>
                            <input type="file" class="form-control" name="picture" id="picture">
                        </div>
                        <div class="form-group">
                            <label for="note">{{__('lang.detail')}}</label>
                            <textarea name="note" id="note" class="form-control"></textarea>
                        </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('user_for_student.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> {{__('lang.back')}}</a>
                </div>
            </form>
            
          </div>

      </div>
    </div>
  </section>
@endsection