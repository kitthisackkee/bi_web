@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.local_doc')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.local_doc')}}</li>
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
                  <a href="{{route('local_doc.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-add"></i>{{__('lang.add')}}</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="text-align: center">
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.date')}}</th>
                      <th>{{__('lang.doc_typename')}}</th>
                      <th>{{__('lang.short_title')}}</th>
                      <th>{{__('lang.storage_filename')}}</th>
                      <th>{{__('lang.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                      $stt = 1;    
                    @endphp

                    @foreach ($local_doc as $lc)
                    <tr>
                      <td width=5% style="text-align: center">{{$stt++}}</td>
                      <td><a href="{{ route('local_doc.show', $lc->id) }}">{{date('d/m/Y', strtotime($lc->date)) }}</a></td>
                      <td><a href="{{ route('local_doc.show', $lc->id) }}">{{$lc->doc_typename->name}}</a></td>
                      <td><a href="{{ route('local_doc.show', $lc->id) }}">{{$lc->short_title}}</a></td>
                      <td><a href="{{ route('local_doc.show', $lc->id) }}">{{$lc->storage_file_name->name}}</a></td>
                      <td style="text-align: center">
                        <form action=" {{ route('local_doc.destroy', $lc->id) }} " method="POST">
                          @csrf
                          @method('DELETE')

                          <a href="{{ route('local_doc.edit', $lc->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          <a href="{{route('download_local', $lc->id)}}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
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