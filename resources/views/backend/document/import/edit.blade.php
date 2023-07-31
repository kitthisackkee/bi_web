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
        <div class="col-lg-12">
          <div class="card card-default">

            <div class="card-header">
              <h3 class="card-title"><h4 class="card-title">{{__('lang.edit')}}</h4></h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

            @if(count($errors)>0)
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-ban"> {{__('lang.error')}}</i></br>
                  @foreach($errors->all() as $error)
                  {{$error}} </br>
                  @endforeach
                </div>
              </div>
            @endif 
            
            
            <form method="POST" action="{{route('import_doc.update', $import_doc->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-12">

                      <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                              <label for="doc_no">{{__('lang.doc_no')}}</label>
                              <input type="text" class="form-control" name="doc_no" value="{{$import_doc->doc_no}}" placeholder="{{__('lang.doc_no')}}">
                            </div>
                          </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="date">{{__('lang.date')}}</label>
                            <input type="date" class="form-control" name="date" value="{{$import_doc->date}}" placeholder="{{__('lang.date')}}">
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>{{__('lang.doc_typename')}}</label>
                              <select class="form-control select2" name="doc_type" style="width: 100%;">                    
                                @foreach($doc_type as $type)
                                    <option 
                                        @if($import_doc->doc_type == $type->id)
                                            {{'selected'}}
                                        @endif
                                        value="{{$type->id}}">{{$type->name}}
                                    </option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="no_doc">{{__('lang.no_doc')}}</label>
                            <input type="text" class="form-control" name="no_doc" value="{{$import_doc->no_doc}}" placeholder="{{__('lang.no_doc')}}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="date_doc">{{__('lang.date')}}</label>
                            <input type="date" class="form-control" name="date_doc" value="{{$import_doc->date_doc}}" placeholder="{{__('lang.date_doc')}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="short_title">{{__('lang.short_title')}}</label>
                                <input type="text" class="form-control" name="short_title" value="{{$import_doc->short_title}}" placeholder="{{__('lang.short_title')}}">
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('lang.departname')}}</label>
                                <select class="form-control select2" name="depart_id" style="width: 100%;">                    
                                  @foreach($depart as $dp)
                                    <option 
                                        @if($import_doc->depart_id == $dp->id)
                                            {{'selected'}}
                                        @endif
                                        value="{{$dp->id}}">{{$dp->name}}
                                    </option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('lang.storage_filename')}}</label>
                                <select class="form-control select2" name="storage_file_id" style="width: 100%;">                    
                                  @foreach($storage as $store)
                                    <option 
                                        @if($import_doc->storage_file_id == $store->id)
                                            {{'selected'}}
                                        @endif
                                        value="{{$store->id}}">{{$store->name}}
                                    </option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="file">{{__('lang.file')}}</label>
                            <input type="file" class="form-control" name="file" id="file">
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('import_doc.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
            
          </div>

      </div>
    </div>
  </section>
@endsection