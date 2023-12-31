@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.page')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.page')}}</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('page.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-add"></i>{{__('lang.add')}}</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center">
                  <th width="5%" style="text-align: center">{{__('lang.no')}}</th>
                  <th>{{__('lang.image')}}</th>
                  <th>{{__('lang.name')}}</th>
                  <th>{{__('lang.status')}}</th>
                  <th>{{__('lang.creator')}}</th>
                  <th width="10%" style="text-align: center">{{__('lang.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                  $stt = 1;    
                @endphp

                @foreach ($pages as $item)
                <tr>
                    <td style="text-align: center">{{$stt++}}</td>
                    <td style="text-align: center"><img src="{{asset($item->image)}}" alt="" height="100"></td>
                    <td>
                        @if ( Config::get('app.locale') == 'lo')
                            {{$item->title_la}}
                        @elseif ( Config::get('app.locale') == 'en' )
                            {{$item->title_en}}
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if ($item->status == 0)
                           <label class="text-danger">{{__('lang.inactive')}}</label>
                        @else
                            <label class="text-success">{{__('lang.active')}}</label>
                        @endif
                    </td>
                    <td style="text-align: center">{{$item->username->name}}</td>
                    <td style="text-align: center">
                        <a href="{{ route('page.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>

                        <!--
                        <form action=" {{ route('page.destroy', $item->id) }} " method="POST">
                        @csrf
                        @method('DELETE')
                            <a href="{{ route('page.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ ຫຼື ບໍ?')"><i class="fas fa-trash"></i></button>
                        </form>
                        -->
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