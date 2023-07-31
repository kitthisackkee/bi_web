@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.settingacc')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.settingacc')}}</li>
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
                  <a href="{{route('settingacc.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-add"></i>{{__('lang.add')}}</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.code')}}</th>
                      <th>{{__('lang.name')}}</th>
                      <th>{{__('lang.debit')}}</th>
                      <th>{{__('lang.credit')}}</th>
                      <th>{{__('lang.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                      $stt = 1;    
                    @endphp

                    @foreach ($acc as $ac)
                    <tr>
                      <td>{{$stt++}}</td>
                      <td>{{$ac->code}}</td>
                      <td>{{$ac->name}}</td>
                      <td>
                          @if($ac->debit == 1)
                            <p>{{__('lang.labelyes')}}</p>
                          @else
                            <p>{{__('lang.labelno')}}</p>
                          @endif
                      </td>
                      <td>
                          @if($ac->credit == 1)
                            <p>{{__('lang.labelyes')}}</p>
                          @else
                            <p>{{__('lang.labelno')}}</p>
                          @endif
                      </td>
                      <td>
                        <form action=" {{ route('settingacc.destroy', $ac->id) }} " method="POST">
                          @csrf
                          @method('DELETE')

                          <a href="{{ route('settingacc.edit', $ac->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
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