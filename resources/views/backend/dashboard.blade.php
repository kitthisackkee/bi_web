@extends('layouts.app.app')
@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{__('lang.dashboard')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
            <li class="breadcrumb-item active">{{__('lang.dashboard')}}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                @if (!empty($posts))
                    {{$posts}}
                @endif
              </h3>

              <p>{{__('blog.all_news')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('post.index')}}" class="small-box-footer">{{__('lang.detail')}} <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                @if (!empty($courses))
                    {{$courses}}
                @endif
                </h3>

              <p>{{__('blog.course')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('service.index')}}" class="small-box-footer">{{__('lang.detail')}} <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                @if (!empty($pages))
                    {{$pages}}
                @endif
              </h3>

              <p>{{__('blog.page')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('page.index')}}" class="small-box-footer">{{__('lang.detail')}} <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>
                @if (!empty($slide))
                  {{$slide}}
                @endif</h3>

              <p>{{__('blog.slider')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('slide.index')}}" class="small-box-footer">{{__('lang.detail')}} <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      
      <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{__('lang.user')}}</span>
              <span class="info-box-number">
                {{$user_count}}
                <small>{{__('lang.user')}}</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{__('lang.export_doc')}}</span>
              <span class="info-box-number">{{$ex_count}}<small> {{__('lang.export_doc')}}</small></span>
            </div>
          </div>
        </div>
      
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{__('lang.import_doc')}}</span>
              <span class="info-box-number">{{$im_count}}<small> {{__('lang.import_doc')}}</small></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="far fa-comment"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{__('lang.local_doc')}}</span>
              <span class="info-box-number">{{$local_count}}<small> {{__('lang.local_doc')}}</small></span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">{{__('blog.message')}}</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th width="5%" style="text-align: center">{{__('lang.no')}}</th>
                    <th>{{__('lang.name')}}</th>
                    <th>{{__('lang.phone')}}</th>
                    <th>{{__('blog.subject')}}</th>
                    <th>{{__('blog.message')}}</th>
                    <th>{{__('blog.status')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $stt = 1;    
                    @endphp
                    @foreach ($messages as $item)
                    <tr>
                      <td style="text-align: center">{{$stt++}}</td>
                      <td><a href="{{ route('message.show', $item->id) }}">{{$item->name}}</a></td>
                      <td><a href="{{ route('message.show', $item->id) }}">{{$item->phone}}</a></td>
                      <td><a href="{{ route('message.show', $item->id) }}">{{$item->subject}}</a></td>
                      <td><a href="{{ route('message.show', $item->id) }}">{{Str::limit($item->message, 60)}}</a></td>
                      <td style="text-align: center">
                          @if ($item->status == 1)
                              <label class="text-warning">{{__('blog.unread')}}</label>
                          @else
                              <label class="text-success">{{__('blog.read')}}</label>
                          @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer clearfix">
              <div class="float-left">
                {{$messages->links()}}
              </div>
              <div class="float-right">
                <!--<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">{{__('lang.viewall')}}</a>-->
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary">{{__('lang.viewall')}}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
        <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">{{__('lang.books')}}</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th width="10%" style="text-align: center">{{__('lang.no')}}</th>
                    <th width="40%" style="text-align: center">{{__('lang.type')}}</th>
                    <th>{{__('lang.name')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php $stt = 1; @endphp
                    @foreach($book as $item)
                      <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$item->booktypename->name}}</td>
                        <td>{{$item->name}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer clearfix">
              <div class="float-left">
                
              </div>
              <div class="float-right">
                <!--<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">{{__('lang.viewall')}}</a>-->
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary">{{__('lang.viewall')}}</a>
              </div>
            </div>
          </div>
          </div> <!-- end col -->
      </div> <!-- end row -->

    </div>
  </section>

@endsection