@extends('layouts.app.app')
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
      
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        @if (!empty($emp->picture))
                          <img class="profile-user-img img-fluid img-circle"src="{{asset($emp->picture)}}"alt="User profile picture">
                        @endif
                      </div>
      
                      <h3 class="profile-username text-center">
                        @if($emp->sex == 1)
                            ທ່ານ
                        @else
                            ທ່ານ ນາງ
                        @endif
                        {{$emp->firstname}} {{$emp->lastname}}
                      </h3>
      
                      <p class="text-muted text-center">{{$emp->posname->name}} - {{$emp->departname->name}}</p>
      
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>{{__('lang.bod')}}</b> <a class="float-right">{{ date('d/m/Y',strtotime($emp->bod)) }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>{{__('lang.phone')}}</b> <a class="float-right">{{$emp->phone}}</a>
                        </li>
                        <li class="list-group-item">
                          <b>{{__('lang.gender')}}</b>
                          <a class="float-right">
                                @if($emp->sex == 1)
                                    {{__('lang.man')}}
                                @else
                                    {{__('lang.woman')}}
                                @endif
                          </a>
                        </li>
                      </ul>
                      @if (!empty($emp->file))
                        <a href="{{url($emp->file)}}" target="_blank" class="btn btn-primary"><b>{{__('lang.viewfile')}}</b></a>
                      @endif
                        <a href="{{route('employee.index')}}" class="btn btn-warning"><b>{{__('lang.back')}}</b></a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-md-8">
                  <!-- About Me Box -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">{{__('lang.aboutme')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <strong><i class="fas fa-location-arrow mr-1"></i> {{__('lang.placeofborn')}}</strong>
                      <p class="text-muted">
                        {{$emp->bvillname->name}} - {{$emp->bdisname->name}} - {{$emp->bproname->name}}
                      </p>
      
                      <hr>
      
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> {{__('lang.location')}}</strong>
                      <p class="text-muted">{{$emp->address}} - {{$emp->villname->name}} - {{$emp->disname->name}} - {{$emp->proname->name}}</p>
      
                      <hr>
      
                      <strong><i class="fas fa-clock mr-1"></i>{{__('lang.start_date')}} - {{__('lang.start_date')}}</strong>
                      <p class="text-muted"> {{$emp->start_date}} - {{$emp->end_date}} </p>
      
                      <hr>
      
                      <strong><i class="far fa-file-alt mr-1"></i> {{__('lang.marriesstatus')}}</strong>
                      <p class="text-muted"> {{$emp->marname->name}} - {{$emp->mar_name}} - {{$emp->mar_work}} - {{$emp->mar_address}} - {{$emp->mar_phone}}</p>

                      <hr>
      
                      <strong><i class="fas fa-book mr-1"></i>{{__('lang.note')}} - {{__('lang.start_date')}}</strong>
                      <p class="text-muted"> {{$emp->note}} </p>

                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>

              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
@endsection