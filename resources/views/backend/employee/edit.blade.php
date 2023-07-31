@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.employee')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.employee')}}</li>
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
              <h3 class="card-title"><h4 class="card-title">{{__('lang.edit')}}</h4></h3>
  
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
            
            
            <form method="POST" action="{{route('employee.update', $emp->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-6">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="firstname">{{__('lang.firstname')}}</label>
                            <input type="text" class="form-control" name="firstname" value="{{$emp->firstname}}" placeholder="{{__('lang.firstname')}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lastname">{{__('lang.lastname')}}</label>
                            <input type="text" class="form-control" name="lastname" value="{{$emp->lastname}}" placeholder="{{__('lang.lastname')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="bod">{{__('lang.bod')}}</label>
                              <input type="date" class="form-control" name="bod" value="{{$emp->bod}}" placeholder="{{__('lang.bod')}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>{{__('lang.sex')}}</label>
                              <select class="form-control" name="sex" style="width: 100%;">
                                  <option value="1" {{$emp->sex == 1? 'selected' : ''}}>{{__('lang.man')}}</option>
                                  <option value="2" {{$emp->sex == 2? 'selected' : ''}}>{{__('lang.woman')}}</option>
                              </select>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>{{__('lang.bvillagename')}}</label>
                            <select class="form-control select2" name="bvill_id" style="width: 100%;">                    
                              @foreach($vill as $v)
                                <option
                                    @if($emp->bvill_id == $v->id)
                                        {{'selected'}}
                                    @endif
                                    value="{{$v->id}}">{{$v->name}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>{{__('lang.bdistrictname')}}</label>
                            <select class="form-control select2" name="bdis_id" style="width: 100%;">                     
                              @foreach($dis as $d)
                                <option
                                    @if($emp->bdis_id == $d->id)
                                        {{'selected'}}
                                    @endif
                                    value="{{$d->id}}">{{$d->name}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>{{__('lang.bprovincename')}}</label>
                            <select class="form-control select2" name="bpro_id" style="width: 100%;">                     
                              @foreach($pro as $p)
                                <option
                                    @if($emp->bpro_id == $p->id)
                                        {{'selected'}}
                                    @endif
                                    value="{{$p->id}}">{{$p->name}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="address">{{__('lang.address')}}</label>
                            <input type="text" class="form-control" name="address" value="{{$emp->address}}" placeholder="{{__('lang.address')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>{{__('lang.villagename')}}</label>
                              <select class="form-control select2" name="vill_id" style="width: 100%;">                    
                                @foreach($vill as $v)
                                    <option 
                                        @if($emp->vill_id == $v->id)
                                            {{'selected'}}
                                        @endif
                                        value="{{$v->id}}">{{$v->name}}
                                    </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>{{__('lang.districtname')}}</label>
                              <select class="form-control select2" name="dis_id" style="width: 100%;">                     
                                @foreach($dis as $d)
                                    <option
                                        @if($emp->dis_id == $d->id)
                                            {{'selected'}}
                                        @endif
                                        value="{{$d->id}}">{{$d->name}}
                                    </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>{{__('lang.provincename')}}</label>
                            <select class="form-control select2" name="pro_id" style="width: 100%;">                     
                              @foreach($pro as $p)
                                <option
                                    @if($emp->pro_id == $p->id)
                                        {{'selected'}}
                                    @endif
                                    value="{{$p->id}}">{{$p->name}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phone">{{__('lang.phone')}}</label>
                            <input type="text" class="form-control" name="phone" value="{{$emp->phone}}" placeholder="{{__('lang.phone')}}">
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.col -->
                    
                    <div class="col-md-6">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>{{__('lang.positionname')}}</label>
                            <select class="form-control select2" name="pos_id" style="width: 100%;">                     
                              @foreach($pos as $ps)
                                <option 
                                    @if($emp->pos_id == $ps->id)
                                        {{'selected'}}
                                    @endif
                                    value="{{$ps->id}}">{{$ps->name}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>{{__('lang.departname')}}</label>
                            <select class="form-control select2" name="dpart_id" style="width: 100%;">                     
                              @foreach($depart as $dp)
                                <option 
                                    @if($emp->dpart_id == $dp->id)
                                        {{'selected'}}
                                    @endif
                                    value="{{$dp->id}}">{{$dp->name}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="start_date">{{__('lang.start_date')}}</label>
                            <input type="date" class="form-control" name="start_date" value="{{$emp->start_date}}" placeholder="{{__('lang.start_date')}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="end_date">{{__('lang.end_date')}}</label>
                            <input type="date" class="form-control" name="end_date" value="{{$emp->end_date}}" placeholder="{{__('lang.end_date')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>{{__('lang.marriesstatus')}}</label>
                            <select class="form-control select2" name="mar_id" style="width: 100%;">                     
                              @foreach($marries as $mr)
                                <option 
                                    @if($emp->mar_id == $mr->id)
                                        {{'selected'}}
                                    @endif
                                    value="{{$mr->id}}">{{$mr->name}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="mar_name">{{__('lang.marriesname')}}</label>
                            <input type="text" class="form-control" name="mar_name" value="{{$emp->mar_name}}" placeholder="{{__('lang.marriesname')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="mar_work">{{__('lang.mar_work')}}</label>
                            <input type="text" class="form-control" name="mar_work" value="{{$emp->mar_work}}" placeholder="{{__('lang.mar_work')}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="mar_address">{{__('lang.mar_address')}}</label>
                            <input type="text" class="form-control" name="mar_address" value="{{$emp->mar_address}}" placeholder="{{__('lang.mar_address')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="mar_phone">{{__('lang.mar_phone')}}</label>
                            <input type="text" class="form-control" name="mar_phone" value="{{$emp->mar_phone}}" placeholder="{{__('lang.mar_phone')}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="note">{{__('lang.note')}}</label>
                            <input type="text" class="form-control" name="note" value="{{$emp->note}}" placeholder="{{__('lang.note')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="picture">{{__('lang.picture')}}</label>
                            <p><img src="{{asset($emp->picture)}}" alt="" width="50"></p>
                            <input type="file" class="form-control" name="picture" id="picture">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="file">{{__('lang.file')}}</label>
                            <input type="file" class="form-control" name="file" id="file">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="file">{{__('lang.status')}}</label>
                        <select name="status" class="form-control">
                            <option value="1" {{$emp->status == 1 ? 'selected' : ''}}>{{ __('lang.active') }}</option>
                            <option value="0" {{$emp->status == 0 ? 'selected' : ''}}>{{ __('lang.inactive') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('employee.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
            
          </div>

      </div>
    </div>
  </section>
@endsection