@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.products')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.product')}}</li>
              </ol>
            </div>
          </div>
        </div>
    </section>

    <section class="content">
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">

            @foreach ($product as $pd)
            
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    {{$pd->catalogname}}
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>{{$pd->name}}</b></h2>
                        <p class="text-muted text-sm"><b>{{__('lang.price')}}: </b> {{number_format($pd->price)}} </p>
                        <p class="text-muted text-sm"><b>{{__('lang.priceonline')}}: </b> {{number_format($pd->price_online)}} </p>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{ asset($pd->image) }}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                    <a href="{{ route('product.edit', $pd->id) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="{{ route('product.show', $pd->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> {{__('lang.view')}}
                    </a>
                    </div>
                </div>
                </div>
            </div>

            @endforeach
            

        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        {!! $product->links() !!}
      </div>
    </div>
  </section>
  @endsection