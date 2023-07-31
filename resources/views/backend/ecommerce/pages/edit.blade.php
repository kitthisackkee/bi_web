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
              <h4 class="card-title">{{__('lang.edit')}}</h4>
            </div>

            <form method="POST" action="{{route('page.update', $page->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card-body">

                    <div class="row">
                      <div class="col-md-12">
                        <img src="{{asset($page->image)}}" alt="" height="100">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">{{__('lang.image')}}</label>
                            <input type="file" name="image" accept="image/png, image/gif, image/jpeg" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" >
                            @if ($errors->has('image'))
                            <span class="invalid-feedback"> <strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_la">{{__('lang.page')}} ({{__('lang.lao')}})</label>
                                <input type="text" name="title_la" value="{{$page->title_la}}" class="form-control {{ $errors->has('title_la') ? ' is-invalid' : '' }}" placeholder="{{__('lang.title')}}">
                                @if ($errors->has('title_la'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('name_la') }}</strong></span>
                                @endif
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_en">{{__('lang.page')}} ({{__('lang.en')}})</label>
                                <input type="text" name="title_en" value="{{$page->title_en}}" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" placeholder="{{__('lang.title')}}" >
                                @if ($errors->has('title_en'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('title_en') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">{{__('lang.slug')}}</label>
                                <input type="text" name="slug" value="{{$page->slug}}" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="{{__('lang.slug')}}" >
                                @if ($errors->has('slug'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('slug') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>{{__('lang.status')}}</label>
                              <select class="form-control" name="status">
                                  <option value="1" {{ $page->status == 1 ? 'selected' : '' }}>{{ __('lang.active') }}</option>
                                  <option value="0" {{ $page->status == 0 ? 'selected' : '' }}>{{ __('lang.inactive') }}</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="des_la">{{__('lang.des')}} ({{__('lang.lao')}})</label>
                                <textarea name="des_la" class="form-control summernote">{{$page->des_la}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="des_en">{{__('lang.des')}} ({{__('lang.en')}})</label>
                                <textarea name="des_en" class="form-control summernote">{{$page->des_en}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('page.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
