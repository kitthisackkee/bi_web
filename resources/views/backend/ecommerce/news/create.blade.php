@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('blog.news')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('blog.news')}}</li>
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
              <h4 class="card-title">{{__('lang.add')}}</h4>
            </div>

            <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
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
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>{{__('blog.solution_type')}}</label>
                            <select class="form-control" name="news_type_id">
                              @foreach ($new_type as $item)
                                <option value="{{$item->id}}">
                                  @if (Config::get('app.locale') == 'lo')
                                    {{ $item->name_la }}
                                  @elseif (Config::get('app.locale') == 'en')
                                    {{ $item->name_en }}
                                  @endif
                                </option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">{{__('blog.news')}} (Lao)</label>
                            <input type="text" class="form-control {{ $errors->has('name_la') ? ' is-invalid' : '' }}" name="name_la" placeholder="{{__('lang.servicename')}}">
                            @if ($errors->has('name_la'))
                            <span class="invalid-feedback"> <strong>{{ $errors->first('name_la') }}</strong></span>
                            @endif
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">{{__('blog.news')}} (English)</label>
                            <input type="text" class="form-control {{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" placeholder="{{__('lang.servicename')}}">
                            @if ($errors->has('name_en'))
                            <span class="invalid-feedback"> <strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                        </div>
                        </div>
                    </div>

                    <!--
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_des_la">{{__('lang.short_des')}} (Lao)</label>
                                <textarea type="text" class="form-control summernote {{ $errors->has('short_des_la') ? ' is-invalid' : '' }}" name="short_des_la" placeholder="{{__('lang.short_des')}}"> </textarea>
                                @if ($errors->has('short_des_la'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('short_des_la') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_des_en">{{__('lang.short_des')}} (English)</label> 
                                <textarea type="text" class="form-control summernote {{ $errors->has('short_des_en') ? ' is-invalid' : '' }}" name="short_des_en" placeholder="{{__('lang.short_des')}}"> </textarea>
                                @if ($errors->has('short_des_en'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('short_des_en') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    -->

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="des_la">{{__('lang.des')}} (Lao)</label>
                            <textarea type="text" class="form-control summernote {{ $errors->has('des_la') ? ' is-invalid' : '' }}" name="des_la" placeholder="{{__('lang.des')}}"> </textarea>
                            @if ($errors->has('des_la'))
                            <span class="invalid-feedback"> <strong>{{ $errors->first('des_la') }}</strong></span>
                            @endif
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="des_en">{{__('lang.des')}} (English)</label> 
                            <textarea type="text" class="form-control summernote {{ $errors->has('des_en') ? ' is-invalid' : '' }}" name="des_en" placeholder="{{__('lang.des')}}"> </textarea>
                            @if ($errors->has('des_en'))
                            <span class="invalid-feedback"> <strong>{{ $errors->first('des_en') }}</strong></span>
                            @endif
                        </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-3">
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('post.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
