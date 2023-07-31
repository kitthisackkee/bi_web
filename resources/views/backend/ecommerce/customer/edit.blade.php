@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.customer')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.customer')}}</li>
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
            
            <form method="POST" action="{{route('customer_logo.update', $customer->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name_la">{{__('lang.customername')}} (Lao)</label>
                            <input type="text" class="form-control {{ $errors->has('name_la') ? ' is-invalid' : '' }}" name="name_la" value="{{$customer->name_la}}" placeholder="{{__('lang.customername')}}">
                            @if ($errors->has('name_la'))
                              <span class="invalid-feedback"> <strong>{{ $errors->first('name_la') }}</strong></span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name_en">{{__('lang.customername')}} (English)</label>
                            <input type="text" class="form-control {{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" value="{{$customer->name_en}}" placeholder="{{__('lang.customername')}}">
                            @if ($errors->has('name_en'))
                              <span class="invalid-feedback"> <strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="image">{{__('lang.image')}}</label>
                            <img src="{{asset($customer->image)}}" alt="" height="100">
                            <input type="file" class="form-control" name="image" id="image">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>{{__('lang.type')}}</label>
                            <select class="form-control" name="customer_type_id">
                                @foreach ($cutsomtertype as $item)
                                  @if (Config::get('app.locale') == 'lo')
                                      <option 
                                      @if ($customer->customer_type_id == $item->id)
                                          {{'selected'}}
                                      @endif
                                      value="{{$item->id}}">{{$item->name_la}}</option>
                                  @elseif (Config::get('app.locale') == 'en')
                                      <option
                                      @if ($customer->customer_type_id == $item->id)
                                          {{'selected'}}
                                      @endif
                                      value="{{$item->id}}">{{$item->name_en}}</option>
                                  @endif
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
                    <a class="btn btn-warning" href="{{route('customer_logo.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
            
          </div>

      </div>
    </div>
  </section>
@endsection