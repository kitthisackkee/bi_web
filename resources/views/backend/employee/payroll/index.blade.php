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
          <div class="row">

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="{{route('payroll.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-add"></i>{{__('lang.add')}}</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.month')}}/{{__('lang.year')}}</th>
                      <th>{{__('lang.firstname')}} {{__('lang.lastname')}}</th>
                      <th>{{__('lang.salary')}}</th>
                      <th>{{__('lang.bonus')}}</th>
                      <th>{{__('lang.overtime')}}</th>
                      <th>{{__('lang.total')}}</th>
                      <th>{{__('lang.status')}}</th>
                      <th>{{__('lang.action')}}</th>
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
                      <td>{{$pr->employee_name->firstname}} {{$pr->employee_name->lastname}}</td>
                      <td>{{number_format($pr->salary,2)}}</td>
                      <td>{{number_format($pr->bonus,2)}}</td>
                      <td>{{number_format($pr->overtime,2)}}</td>
                      <td><b>{{number_format($pr->total,2)}}</b></td>
                      <td>
                        @if($pr->status==1)
                          <button class="btn btn-warning btn-sm">{{__('lang.notpay')}}</button>
                        @elseif($pr->status==2)
                          <button class="btn btn-success btn-sm">{{__('lang.pay')}}</button>
                        @endif
                      </td>
                      <td>
                        <form action=" {{ route('payroll.destroy', $pr->id) }} " method="POST">
                          @csrf
                          @method('DELETE')
                            <!--<a href="{{ route('payroll.edit', $pr->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>-->
                            <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('ທ່ານຕ້ອງການເບີກເງິນຕອນນີ້ ຫຼື ບໍ?')"><i class="fas fa-dollar-sign"></i> {{__('lang.pay')}}</button>
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

      </section>
@endsection