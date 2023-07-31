@extends('layouts.app.app')
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
      
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{asset($product->image)}}"
                             alt="User profile picture">
                      </div>
      
                      <h3 class="profile-username text-center">
                        {{$product->name}}
                      </h3>
      
                      <!--<p class="text-muted text-center">{{__('lang.price')}}:{{number_format($product->price)}} - {{__('lang.priceonline')}}:{{number_format($product->price_online)}}</p>-->
      
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>{{__('lang.price')}}</b> <a class="float-right">{{number_format($product->price)}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{__('lang.priceonline')}}</b> <a class="float-right">{{number_format($product->price_online)}}</a>
                          </li>
                        <li class="list-group-item">
                          <b>{{__('lang.des')}}</b> <a class="float-right">{!!$product->des!!}</a>
                        </li>
                      </ul>
      
                      <a href="{{route('product.index')}}" class="btn btn-primary btn-block"><b>{{__('lang.back')}}</b></a>
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