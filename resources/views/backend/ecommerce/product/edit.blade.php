@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.product')}}</h1>
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
            
            
            <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-12">

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="file">{{__('lang.file')}}</label>
                            <p>
                                <img width="100" src="{{asset($product->image)}}" alt="">
                            </p>
                            <input type="file" class="form-control" name="file" id="file">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">{{__('lang.productname')}}</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="{{__('lang.productname')}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">{{__('lang.price')}}</label>
                                <input type="text" class="form-control money" name="price" value="{{number_format($product->price)}}" placeholder="{{__('lang.price')}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price_online">{{__('lang.priceonline')}}</label>
                                <input type="text" class="form-control money" name="price_online" value="{{$product->price_online}}" placeholder="{{__('lang.priceonline')}}">
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="des">{{__('lang.des')}}</label>
                                <textarea class="form-control summernote" name="des" cols="30" rows="10">{{$product->des}}</textarea>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="long_des">{{__('lang.long_des')}}</label>
                                <textarea class="form-control summernote" name="long_des" cols="30" rows="10">{{$product->long_des}}</textarea>
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
                    <a class="btn btn-warning" href="{{route('product.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
            
          </div>

      </div>
    </div>
  </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.money').simpleMoneyFormat();
    </script>
@endsection