@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.payroll')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.payroll')}}</li>
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
            
            
            <form method="POST" action="{{route('payroll.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="row">

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{__('lang.month')}}</label>
                            <select class="form-control select2" name="month" style="width: 100%;">                     
                                <option value="">{{__('lang.month')}}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label>{{__('lang.year')}}</label>
                        <select class="form-control select2" name="year" style="width: 100%;">                     
                            <option value="">{{__('lang.year')}}</option>
                                {{$year = date('yyyy')}}
                            @for ($year = 2019; $year <=2050; $year++)
                                <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>{{__('lang.employee')}}</label>
                            <select class="form-control select2" name="emp_id" style="width: 100%;">                    
                              @foreach($emp as $ep)
                                  <option value="{{$ep->id}}">{{$ep->firstname}} {{$ep->lastname}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__('lang.salary')}}</label>
                            <select class="form-control select2" name="salary" style="width: 100%;">                    
                              @foreach($salary as $slr)
                                  <option value="{{$slr->salary}}">{{number_format($slr->salary,2)}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bonus">{{__('lang.bonus')}}</label>
                            <input type="text" class="form-control money" name="bonus" placeholder="{{__('lang.bonus')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="overtime">{{__('lang.overtime')}}</label>
                            <input type="text" class="form-control money" name="overtime" placeholder="{{__('lang.overtime')}}">
                        </div>
                    </div>
                    <!--
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="total">{{__('lang.total')}}</label>
                          <input type="text" class="form-control money" name="total" placeholder="{{__('lang.total')}}">
                      </div>
                    </div>
                    -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="note">{{__('lang.note')}}</label>
                            <input type="text" class="form-control" name="note" placeholder="{{__('lang.note')}}">
                        </div>
                    </div>
                </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('payroll.index')}}" >{{__('lang.back')}}</a>
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
                        <th>{{__('lang.month')}}/{{__('lang.year')}}</th>
                        <th>{{__('lang.firstname')}} {{__('lang.lastname')}}</th>
                        <th>{{__('lang.salary')}}</th>
                        <th>{{__('lang.bonus')}}</th>
                        <th>{{__('lang.overtime')}}</th>
                        <th>{{__('lang.total')}}</th>
                        <th style="width: 5%">{{__('lang.action')}}</th>
                        <th style="width: 5%">{{__('lang.action')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt = 1;
                        @endphp
                        @foreach ($payroll as $pr)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$pr->month}}/{{$pr->year}}</td>
                            <td>{{$pr->employee_name->firstname}}{{$pr->employee_name->lastname}}</td>
                            <td>{{number_format($pr->salary,2)}}</td>
                            <td>{{number_format($pr->bonus,2)}}</td>
                            <td>{{number_format($pr->overtime,2)}}</td>
                            <td><b>{{number_format($pr->total,2)}}</b></td>
                            <td>
                                <form action=" {{ route('payroll.aceptedpayroll', $pr->id) }} " method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('ທ່ານຕ້ອງຍອມຮັບເອົາຂໍ້ມູນນີ້ ຫຼື ບໍ?')">{{__('lang.accept')}}</button>
                                </form>
                            </td>
                            <td>  
                                <form action=" {{ route('payroll.deletepayroll', $pr->id) }} " method="POST">
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