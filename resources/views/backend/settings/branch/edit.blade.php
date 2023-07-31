@extends('layouts.app.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('lang.branch')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">{{__('lang.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('lang.branch')}}</li>
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

            <form method="POST" action="{{route('branch.update', $branch->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card-body">
                    @if (!empty($branch->logo) || !empty($branch->company_photo))
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="{{asset($branch->logo)}}" height="50%" width="50%">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="{{asset($branch->company_photo)}}" height="50%" width="50%">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="{{asset($branch->structure_photo)}}" height="50%" width="50%">
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="logo">{{__('lang.logo')}}</label>
                            <input type="file" name="logo" class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}">
                            @if ($errors->has('logo'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('logo') }}</strong></span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="company_photo">{{__('lang.company_photo')}}</label>
                            <input type="file" name="company_photo" class="form-control {{ $errors->has('company_photo') ? ' is-invalid' : '' }}">
                            @if ($errors->has('company_photo'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('company_photo') }}</strong></span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="structure_photo">{{__('lang.structure_photo')}}</label>
                            <input type="file" name="structure_photo" class="form-control {{ $errors->has('structure_photo') ? ' is-invalid' : '' }}">
                            @if ($errors->has('structure_photo'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('structure_photo') }}</strong></span>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name_la">{{__('lang.branchname')}} ({{__('lang.lao')}})</label>
                                <input type="text" name="name_la" value="{{$branch->name_la}}" class="form-control {{ $errors->has('name_la') ? ' is-invalid' : '' }}" placeholder="{{__('lang.branchname')}}">
                                @if ($errors->has('name_la'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('name_la') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name_en">{{__('lang.branchname')}} ({{__('lang.eng')}})</label>
                                <input type="text" name="name_en" value="{{$branch->name_en}}" class="form-control {{ $errors->has('name_en') ? ' is-invalid' : '' }}" placeholder="{{__('lang.branchname')}}">
                                @if ($errors->has('name_en'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('name_en') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">{{__('lang.email')}}</label>
                                <input type="text" name="email" value="{{$branch->email}}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{__('lang.email')}}">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback"> <strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address_la">{{__('lang.address')}} ({{__('lang.lao')}})</label>
                                <input type="text" name="address_la" value="{{$branch->address_la}}" class="form-control {{ $errors->has('address_la') ? ' is-invalid' : '' }}" placeholder="{{__('lang.address')}}">
                                @if ($errors->has('address_la'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('address_la') }}</strong></span>
                                @endif
                              </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="address_en">{{__('lang.address')}} ({{__('lang.en')}})</label>
                                <input type="text" name="address_en" value="{{$branch->address_en}}" class="form-control {{ $errors->has('address_en') ? ' is-invalid' : '' }}" placeholder="{{__('lang.address')}}" >
                                @if ($errors->has('address_en'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('address_en') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone">{{__('lang.phone')}}</label>
                                <input type="text" name="phone" value="{{$branch->phone}}" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{__('lang.phone')}}" >
                                @if ($errors->has('phone'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('phone') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="director_sign">{{__('lang.director_sign')}}</label>
                                <input type="text" name="director_sign" value="{{$branch->director_sign}}" class="form-control {{ $errors->has('director_sign') ? ' is-invalid' : '' }}" placeholder="{{__('lang.director_sign')}}" >
                                @if ($errors->has('director_sign'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('director_sign') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="chechker_sign">{{__('lang.chechker_sign')}}</label>
                                <input type="text" name="chechker_sign" value="{{$branch->chechker_sign}}" class="form-control {{ $errors->has('chechker_sign') ? ' is-invalid' : '' }}" placeholder="{{__('lang.chechker_sign')}}" >
                                @if ($errors->has('chechker_sign'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('chechker_sign') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="customer_sign">{{__('lang.customer_sign')}}</label>
                                <input type="text" name="customer_sign" value="{{$branch->customer_sign}}" class="form-control {{ $errors->has('customer_sign') ? ' is-invalid' : '' }}" placeholder="{{__('lang.customer_sign')}}" >
                                @if ($errors->has('customer_sign'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('customer_sign') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="staff_sign">{{__('lang.staff_sign')}}</label>
                                <input type="text" name="staff_sign" value="{{$branch->staff_sign}}" class="form-control {{ $errors->has('staff_sign') ? ' is-invalid' : '' }}" placeholder="{{__('lang.staff_sign')}}" >
                                @if ($errors->has('staff_sign'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('staff_sign') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="whatapps">{{__('lang.whatapps')}}</label>
                                <input type="text" name="whatapps" value="{{$branch->whatapps}}" class="form-control {{ $errors->has('whatapps') ? ' is-invalid' : '' }}" placeholder="{{__('lang.whatapps')}}" >
                                @if ($errors->has('whatapps'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('whatapps') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="fanpage">{{__('lang.fanpage')}}</label>
                                <input type="text" name="fanpage" value="{{$branch->fanpage}}" class="form-control {{ $errors->has('fanpage') ? ' is-invalid' : '' }}" placeholder="{{__('lang.fanpage')}}" >
                                @if ($errors->has('fanpage'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('fanpage') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="youtube">{{__('lang.youtube')}}</label>
                                <input type="text" name="youtube" value="{{$branch->youtube}}" class="form-control {{ $errors->has('youtube') ? ' is-invalid' : '' }}" placeholder="{{__('lang.youtube')}}" >
                                @if ($errors->has('youtube'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('youtube') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="google_map">{{__('lang.google_map')}}</label>
                                <input type="text" name="google_map" value="{{$branch->google_map}}" class="form-control {{ $errors->has('google_map') ? ' is-invalid' : '' }}" placeholder="{{__('lang.google_map')}}" >
                                @if ($errors->has('google_map'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('google_map') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="app_store">{{__('lang.app_store')}}</label>
                                <input type="text" name="app_store" value="{{$branch->app_store}}" class="form-control {{ $errors->has('app_store') ? ' is-invalid' : '' }}" placeholder="{{__('lang.app_store')}}" >
                                @if ($errors->has('app_store'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('app_store') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="play_store">{{__('lang.play_store')}}</label>
                                <input type="text" name="play_store" value="{{$branch->play_store}}" class="form-control {{ $errors->has('play_store') ? ' is-invalid' : '' }}" placeholder="{{__('lang.play_store')}}" >
                                @if ($errors->has('play_store'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('play_store') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="app_gallery">{{__('lang.app_gallery')}}</label>
                                <input type="text" name="app_gallery" value="{{$branch->app_gallery}}" class="form-control {{ $errors->has('app_gallery') ? ' is-invalid' : '' }}" placeholder="{{__('lang.app_gallery')}}" >
                                @if ($errors->has('app_gallery'))
                                  <span class="invalid-feedback"> <strong>{{ $errors->first('app_gallery') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bill_header">{{__('lang.des')}} ({{__('lang.bill_header')}})</label>
                                <textarea name="bill_header" class="form-group summernote"> {{$branch->bill_header}} </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bill_footer">{{__('lang.des')}} ({{__('lang.bill_footer')}})</label>
                                <textarea name="bill_footer" class="form-group summernote"> {{$branch->bill_footer}} </textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{__('lang.active')}}</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{$branch->status == 1 ? 'selected' : ''}}>{{ __('blog.active') }}</option>
                                    <option value="0" {{$branch->status == 0 ? 'selected' : ''}}>{{ __('blog.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    <a class="btn btn-warning" href="{{route('branch.index')}}" >{{__('lang.back')}}</a>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
