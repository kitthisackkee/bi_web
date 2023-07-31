@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.employee')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.employee')}}</li>
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
                  <a href="{{route('employee.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-add"></i>{{__('lang.add')}}</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="text-align: center">
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.firstname')}}</th>
                      <th>{{__('lang.lastname')}}</th>
                      <th>{{__('lang.bod')}}</th>
                      <th>{{__('lang.sex')}}</th>
                      <th>{{__('lang.positionname')}}</th>
                      <th>{{__('lang.departname')}}</th>
                      <th>{{__('lang.status')}}</th>
                      <th>{{__('lang.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                      $stt = 1;    
                    @endphp

                    @foreach ($employee as $emp)
                    <tr>
                      <td width=5% style="text-align: center">{{$stt++}}</td>
                      <td>
                          <a href="{{ route('employee.show', $emp->id) }}">{{$emp->firstname}}</a>
                      </td>
                      <td>{{$emp->lastname}}</td>
                      <td>{{date('d/m/Y', strtotime($emp->bod)) }}</td>
                      <td style="text-align: center">
                        @if($emp->sex == 1)
                          <button class="btn btn-primary btn-sm">{{__('lang.man')}}</button>
                        @else
                          <button class="btn btn-info btn-sm">{{__('lang.woman')}}</button>
                        @endif
                      </td>
                      <td>{{$emp->posname->name}}</td>
                      <td>{{$emp->departname->name}}</td>
                      <td style="text-align: center">
                        @if($emp->status == 1)
                          <label class="text-success">{{__('lang.active')}}</label>
                        @else
                          <label class="text-danger">{{__('lang.inactive')}}</label>
                        @endif
                      </td>
                      <td>
                        <form action=" {{ route('employee.destroy', $emp->id) }} " method="POST">
                          @csrf
                          @method('DELETE')

                          <a href="{{ route('employee.edit', $emp->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          <a href="{{ route('employee.show', $emp->id) }}" class="btn btn-default btn-sm"><i class="fas fa-eye"></i></a>
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
      </section>
@endsection