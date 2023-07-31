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
            
            
            <form method="POST" action="{{route('transection.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="row">
                   
                    <div class="col-md-2">
                      <div class="form-group">
                          <label for="date">{{__('lang.date')}}</label>
                          <input type="text" class="form-control" name="date" value="{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}" placeholder="{{__('lang.date')}}">
                      </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label>{{__('lang.acc_debit')}}</label>
                            <select class="form-control select2" name="acc_debit" style="width: 100%;">                     
                                @foreach($acc_debit as $ac)
                                    <option value="{{$ac->code}}">{{$ac->code}}-{{$ac->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                        <label>{{__('lang.acc_credit')}}</label>
                        <select class="form-control select2" name="acc_credit" style="width: 100%;">                     
                            @foreach($acc_credit as $ac)
                                <option value="{{$ac->code}}">{{$ac->code}}-{{$ac->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="des">{{__('lang.des')}}</label>
                            <input type="text" class="form-control" name="des" placeholder="{{__('lang.des')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="debit">{{__('lang.debit')}}</label>
                            <input type="text" class="form-control money" name="debit" placeholder="{{__('lang.debit')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="credit">{{__('lang.credit')}}</label>
                            <input type="text" class="form-control money" name="credit" placeholder="{{__('lang.credit')}}">
                        </div>
                    </div>
                </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('transection.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
            
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">{{__('lang.detail')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th style="width: 5%">#</th>
                        <th>{{__('lang.date')}}</th></th>
                        <th width="5%">{{__('lang.acc_debit')}}</th>
                        <th width="5%">{{__('lang.acc_credit')}}</th>
                        <th>{{__('lang.des')}}</th>
                        <th>{{__('lang.debit')}}</th>
                        <th>{{__('lang.credit')}}</th>
                        <th style="width: 5%">{{__('lang.action')}}</th>
                        <th style="width: 5%">{{__('lang.action')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt = 1;
                        @endphp
                        @foreach ($transection as $tran)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{date('d/m/Y', strtotime($tran->created_at)) }}</td>
                            <td>{{$tran->acc_debit}}</td>
                            <td>{{$tran->acc_credit}}</td>
                            <td>{{$tran->des}}</td>
                            <td>{{number_format($tran->debit,2)}}</td>
                            <td>{{number_format($tran->credit,2)}}</td>
                            <td>
                                <form action=" {{ route('transection.update', $tran->id) }} " method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('ທ່ານຕ້ອງຍອມຮັບເອົາຂໍ້ມູນນີ້ ຫຼື ບໍ?')">{{__('lang.accept')}}</button>
                                </form>
                            </td>
                            <td>  
                                <form action=" {{ route('transection.destroy', $tran->id) }} " method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ ຫຼື ບໍ?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                  </table>
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