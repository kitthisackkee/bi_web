@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.term')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.term')}}</li>
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
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTermModal">{{__('lang.add')}}</button>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="text-align: center">
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.name')}}</th>
                      <th>{{__('lang.detail')}}</th>
                      <th>{{__('lang.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $stt = 1; @endphp
                    @foreach($term as $item)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->note}}</td>
                            <td>
                            <form action=" {{ route('term.destroy', $item->id) }} " method="POST">
                              @csrf
                              @method('DELETE')
                                <a href="javascript:void(0)" onclick="editTerm({{$item->id}})" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
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


      <div class="modal fade" tabindex="-1" role="dialog" id="addTermModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> &ensp;{{__('lang.add')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <form method="POST" action="{{route('term.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" >{{__('lang.name')}}</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="{{__('lang.name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="note">{{__('lang.detail')}}</label>
                        <input type="text" id="note" class="form-control" name="note" placeholder="{{__('lang.detail')}}">
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

        <div class="modal fade" tabindex="-1" role="dialog" id="editTermModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title">ແກ້ໄຂ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <form method="POST" action="{{route('term.store')}}" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                    <input type="hidden" id="term_id" name="term_id">
                    <div class="form-group">
                        <label >{{__('lang.name')}}</label>
                        <input type="text" id="edit_name" class="form-control" name="edit_name" placeholder="{{__('lang.name')}}">
                    </div>
                    <div class="form-group">
                        <label>{{__('lang.detail')}}</label>
                        <input type="text" id="edit_note" class="form-control" name="edit_note" placeholder="{{__('lang.detail')}}">
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
