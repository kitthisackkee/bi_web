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
          <div class="row">

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="{{route('transection.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-add"></i>{{__('lang.add')}}</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.tran_no')}}</th>
                      <th>{{__('lang.date')}}</th>
                      <th width="5%">{{__('lang.acc_debit')}}</th>
                      <th width="5%">{{__('lang.acc_credit')}}</th>
                      <th>{{__('lang.des')}}</th>
                      <th>{{__('lang.debit')}}</th>
                      <th>{{__('lang.credit')}}</th>
                      <th>{{__('lang.status')}}</th>
                      <!--<th>{{__('lang.username')}}</th>
                      <th>{{__('lang.action')}}</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @php
                      $stt = 1;    
                    @endphp

                    @foreach ($transection as $tran)
                    <tr>
                      <td width=5%>{{$stt++}}</td>
                      <td>
                        @if(Auth()->user()->rolename->name == "admin")
                          <a href="{{ route('transection.show', $tran->id) }}">{{$tran->tran_no}}</a>
                        @else
                          {{$tran->tran_no}}
                        @endif
                      </td>
                      <td>{{date('d/m/Y', strtotime($tran->date)) }}</td>
                      <td>{{$tran->acc_debit}}</td>
                      <td>{{$tran->acc_credit}}</td>
                      <td>{{$tran->des}}</td>
                      <td>{{number_format($tran->debit,2)}}</td>
                      <td>{{number_format($tran->credit,2)}}</td>
                      <td>
                          @if($tran->status_acc_id == 1)
                              <small class="badge badge-warning">{{$tran->statusname->name}}</small>
                          @elseif($tran->status_acc_id == 2)
                              <small class="badge badge-success">{{$tran->statusname->name}}</small>
                          @else
                              <small class="badge badge-danger">{{$tran->statusname->name}}</small>
                          @endif
                      </td>
                      <!--<td>{{$tran->username->name}}
                      <td>
                        <form action=" {{ route('transection.destroy', $tran->id) }} " method="POST">
                          @csrf
                          @method('DELETE')

                          <a href="{{ route('transection.edit', $tran->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          <a href="{{ route('transection.show', $tran->id) }}" class="btn btn-default btn-sm"><i class="fas fa-eye"></i></a>
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ ຫຼື ບໍ?')"><i class="fas fa-trash"></i></button>

                        </form>
                      </td>
                      </td>-->
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