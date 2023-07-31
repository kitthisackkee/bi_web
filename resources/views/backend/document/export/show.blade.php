@extends('layouts.app.app')
@section('content')
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">{{__('lang.doc_typename')}}</h3>
                    </div>
                    <div class="card-body">
                      <strong><i class="fas fa-location-arrow mr-1"></i> {{__('lang.doc_no')}} - {{__('lang.date')}}</strong>
                      <p class="text-muted">
                        {{$export_doc->doc_no}} - {{date('d/m/Y', strtotime($export_doc->date)) }}
                      </p>
      
                      <hr>
      
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> {{__('lang.doc_typename')}}</strong>
                      <p class="text-muted">{{$export_doc->doc_typename->name}}</p>
      
                      <hr>
      
                      <strong><i class="fas fa-clock mr-1"></i>{{__('lang.short_title')}}</strong>
                      <p class="text-muted"> {{$export_doc->short_title}} </p>
      
                      <hr>
      
                      <strong><i class="far fa-file-alt mr-1"></i> {{__('lang.external_partsname')}} - {{__('lang.storage_filename')}}</strong>
                      <p class="text-muted"> {{$export_doc->external_parts_name->name}} - {{$export_doc->storage_file_name->name}}</p>

                      <hr>
      
                      <strong><i class="fas fa-book mr-1"></i>{{__('lang.username')}} - {{__('lang.branchname')}}</strong>
                      <p class="text-muted"> {{$export_doc->username->name}} - {{$export_doc->branchname->name}} </p>

                      <hr>

                      <strong><i class="fas fa-book mr-1"></i>{{__('lang.file')}}</strong>
                      <p><a href="{{route('download_export', $export_doc->id)}}" target="_blank" class="btn btn-success">{{__('lang.download')}}</a> <a class="btn btn-warning" href="{{route('export_doc.index')}}" >{{__('lang.back')}}</a></p>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>
@endsection