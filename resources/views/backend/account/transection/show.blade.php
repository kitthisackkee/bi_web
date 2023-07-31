@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.transection')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.transection')}}</li>
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
              <!--<h3 class="card-title"><h4 class="card-title">{{__('lang.add')}}</h4></h3>-->
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
            
            
            <form method="POST" action="{{route('transection.approved', $transection->id)}}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tran_no">{{__('lang.tran_no')}}</label>
                            <input type="text" class="form-control" name="tran_no" value="{{$transection->tran_no}}" placeholder="{{__('lang.tran_no')}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="created_at">{{__('lang.created_at')}}</label>
                            <input type="datetime" class="form-control" name="date" value="{{date('Y-m-d H:m:s', strtotime($transection->date)) }}" placeholder="{{__('lang.created_at')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('lang.acc_debit')}}</label>
                            <select class="form-control select2" name="acc_debit" style="width: 100%;">                     
                                @foreach($acc as $ac)
                                    <option 
                                    @if($transection->acc_debit == $ac->code)
                                        {{'selected'}}
                                    @endif
                                        value="{{$ac->code}}">{{$ac->code}}-{{$ac->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>{{__('lang.acc_credit')}}</label>
                        <select class="form-control select2" name="acc_credit" style="width: 100%;">                     
                            @foreach($acc as $ac)
                                <option
                                    @if($transection->acc_credit == $ac->code)
                                        {{'selected'}}
                                    @endif
                                    value="{{$ac->code}}">{{$ac->code}}-{{$ac->name}}
                                </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="des">{{__('lang.des')}}</label>
                            <input type="text" class="form-control" name="des" value="{{$transection->des}}" placeholder="{{__('lang.des')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="debit">{{__('lang.debit')}}</label>
                            <input type="text" class="form-control money" name="debit" value="{{$transection->debit}}" placeholder="{{__('lang.debit')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="credit">{{__('lang.credit')}}</label>
                            <input type="text" class="form-control money" name="credit" value="{{$transection->credit}}" placeholder="{{__('lang.credit')}}">
                        </div>
                    </div>
                </div>
                    
                </div>
                <div class="card-footer">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{__('lang.accept')}}</button>
                            <a class="btn btn-primary" href="{{route('transection.index')}}" >{{__('lang.back')}}</a>
                        </div>
                    </div>
                </form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <form action=" {{ route('transection.rejected', $transection->id) }} " method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning" onclick="return confirm('ທ່ານຕ້ອງການຍົກເລີກລາຍການນີ້ ຫຼື ບໍ?')">{{__('lang.reject')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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