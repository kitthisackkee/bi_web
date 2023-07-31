@extends('layouts.app.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{__('lang.book_type')}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('lang.book_type')}}</li>
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
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addBookTypeModal">{{__('lang.add')}}</button>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="text-align: center">
                      <th>{{__('lang.no')}}</th>
                      <th>{{__('lang.name')}}</th>
                      <th>{{__('lang.status')}}</th>
                      <th>{{__('lang.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $stt = 1; @endphp
                    @foreach($booktype as $item)
                      <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$item->name}}</td>
                        <td style="text-align: center">
                          @if ($item->status == 1)
                            <label class="text-success">{{__('blog.active')}}</label>
                          @else
                            <label class="text-danger">{{__('blog.inactive')}}</label>
                          @endif
                        </td>
                        <td>
                        <form action=" {{ route('booktype.destroy', $item->id) }} " method="POST">
                              @csrf
                              @method('DELETE')
                                <a href="javascript:void(0)" onclick="editBookType({{$item->id}})" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
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

      <div class="modal fade" tabindex="-1" role="dialog" id="addBookTypeModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> &ensp;{{__('lang.add')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <form method="POST" action="{{route('booktype.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="name" >{{__('lang.name')}}</label>
                          <input type="text" id="name" class="form-control" name="name" placeholder="{{__('lang.name')}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{__('lang.status')}}</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">{{ __('blog.active') }}</option>
                            <option value="0">{{ __('blog.inactive') }}</option>
                        </select>
                      </div>
                    </div>
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

        <div class="modal fade" tabindex="-1" role="dialog" id="editBookTypeModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title">ແກ້ໄຂ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <form method="POST" action="{{route('booktype.store')}}" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                    <input type="hidden" id="book_type_id" name="book_type_id">
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label >{{__('lang.name')}}</label>
                          <input type="text" id="edit_name" class="form-control" name="edit_name" placeholder="{{__('lang.name')}}">
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>{{__('lang.status')}}</label>
                          <select class="form-control" id="status" name="status">
                              <option value="1">{{ __('blog.active') }}</option>
                              <option value="0">{{ __('blog.inactive') }}</option>
                          </select>
                        </div>
                      </div>
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