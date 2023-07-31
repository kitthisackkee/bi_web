@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.books')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.books')}}</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="col-lg-8">
          <div class="card card-default">

            <div class="card-header">
              <h3 class="card-title"><h4 class="card-title">{{__('lang.add')}}</h4></h3>
  

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
            
            
            <form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-12">

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('lang.term')}}</label>
                                <select class="form-control select2" name="term_id" style="width: 100%;">  
                                    <option value="">{{__('lang.select')}}</option>                      
                                  @foreach($term as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('lang.book_type')}}</label>
                                <select class="form-control select2" name="book_type_id" style="width: 100%;">  
                                    <option value="">{{__('lang.select')}}</option>                  
                                  @foreach($booktype as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{__('lang.name')}}{{__('lang.books')}}</label>
                                <input type="text" class="form-control" name="name" placeholder="{{__('lang.name')}}{{__('lang.books')}}">
                            </div>
                        </div>
                        
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="note">{{__('lang.detail')}}</label>
                            <textarea name="note" id="note" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-md-5">
                            <div class="form-group">
                                <label for="pic">{{__('lang.image')}}</label>
                                <input type="file" class="form-control" name="pic" id="pic">
                            </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="file_pdf">{{__('lang.file')}}</label>
                            <input type="file" class="form-control" name="file_pdf" id="file_pdf">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>{{__('lang.status')}}</label>
                            <select class="form-control" name="status">
                                <option value="1">{{ __('blog.active') }}</option>
                                <option value="0">{{ __('blog.inactive') }}</option>
                            </select>
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
                    <a class="btn btn-warning" href="{{route('book.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
            
          </div>

      </div>
    </div>
  </section>
@endsection