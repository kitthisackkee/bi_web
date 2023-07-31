@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.student')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.student')}}</li>
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
                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{__('lang.add')}}</a>
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addExcelModal"><i class="fa fa-file-excel"></i> {{__('lang.add_file_excel')}}</button>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="text-align: center">
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.code')}}</th>
                      <th>{{__('lang.name')}}</th>
                      <th>{{__('lang.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $stt = 1; @endphp
                    @foreach($student as $item)
                        <tr align="center">
                            <td>{{$stt++}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                            <form action=" {{ route('student.destroy', $item->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                             <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນ ({{$item->name}}) ນີ້ ຫຼື ບໍ?')"><i class="fas fa-trash"></i></button>
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

      <div class="modal fade" tabindex="-1" role="dialog" id="addExcelModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> &ensp;{{__('lang.add_file_excel')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">{{__('lang.file')}}</label>
                        <input type="file" class="form-control" name="file" id="file">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">{{__('lang.back')}}</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

@endsection