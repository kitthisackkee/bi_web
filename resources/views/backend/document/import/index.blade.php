@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.import_doc')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.import_doc')}}</li>
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
                  <a href="{{route('import_doc.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-add"></i>{{__('lang.add')}}</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="text-align: center">
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.doc_no')}}</th>
                      <th>{{__('lang.date')}}</th>
                      <th>{{__('lang.doc_typename')}}</th>
                      <th>{{__('lang.short_title')}}</th>
                      <th>{{__('lang.departname')}}</th>
                      <th>{{__('lang.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                      $stt = 1;    
                    @endphp

                    @foreach ($import_doc as $im)
                    <tr>
                      <td width=5% style="text-align: center">{{$stt++}}</td>
                      <td style="text-align: center">
                          <a href="{{ route('import_doc.show', $im->id) }}">{{$im->doc_no}}</a>
                      </td>
                      <td>{{date('d/m/Y', strtotime($im->date)) }}</td>
                      <td>{{$im->doc_typename->name}}</td>
                      <td>{{$im->short_title}}</td>
                      <td>{{$im->depart_id_name->name}}</td>
                      <td style="text-align: center">
                        <form action=" {{ route('import_doc.destroy', $im->id) }} " method="POST">
                          @csrf
                          @method('DELETE')

                          <a href="{{ route('import_doc.edit', $im->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          <a href="{{route('download_import', $im->id)}}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
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