<div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-2">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="display-4 text-white">{{__('blog.documents')}}</h5>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-3 px-3">
        <div class="row g-5">
            <div class="col-lg-8">

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <!--
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <select class="form-control" style="width: 100%;">
                                            <option value="" selected>{{__('lang.select')}}</option>
                                            @foreach ($doctype as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach             
                                      </select>
                                    </div>
                                </div>-->
                                <div class="col-md-4">
                                    <div>
                                        <h4>{{__('blog.other_documents')}}</h4>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" wire:model="search" class="form-control" placeholder="{{__('lang.search')}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr style="text-align: center">
                                    <th>{{__('lang.no')}}</th>
                                    <th>{{__('lang.date')}}</th>
                                    <th>{{__('lang.doc_typename')}}</th>
                                    <th>{{__('lang.short_title')}}</th>
                                    <th>{{__('lang.view')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $stt = 1;    
                                    @endphp
                
                                    @foreach ($exprot_doc as $item)
                                    <tr>
                                    <td width=5% style="text-align: center">{{$stt++}}</td>
                                    <td style="text-align: center">{{date('d/m/Y', strtotime($item->date)) }}</td>
                                    <td style="text-align: center">{{$item->doc_typename->name}}</td>
                                    <td>{{$item->short_title}}</td>
                                    <td style="text-align: center">
                                        <a href="{{url($item->file)}}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    </td>
                                    </tr>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        {{$exprot_doc->links()}}
                    </div>
                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <!--
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <select class="form-control" style="width: 100%;">
                                            <option value="" selected>{{__('lang.select')}}</option>
                                            @foreach ($doctype as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach             
                                      </select>
                                    </div>
                                </div>-->
                                <div class="col-md-4">
                                    <div>
                                        <h4>{{__('blog.exam_results')}}</h4>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" wire:model="searchExam" class="form-control" placeholder="{{__('lang.search')}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr style="text-align: center">
                                    <th>{{__('lang.no')}}</th>
                                    <th>{{__('lang.date')}}</th>
                                    <th>{{__('lang.doc_typename')}}</th>
                                    <th>{{__('lang.short_title')}}</th>
                                    <th>{{__('lang.view')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $stt = 1;    
                                    @endphp
                
                                    @foreach ($exam_doc as $item)
                                    <tr>
                                    <td width=5% style="text-align: center">{{$stt++}}</td>
                                    <td style="text-align: center">{{date('d/m/Y', strtotime($item->date)) }}</td>
                                    <td style="text-align: center">{{$item->doc_typename->name}}</td>
                                    <td>{{$item->short_title}}</td>
                                    <td style="text-align: center">
                                        <a href="{{url($item->file)}}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    </td>
                                    </tr>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        {{$exam_doc->links()}}
                    </div>
                </div>
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h2 class="mb-4">{{__('blog.other_news')}}</h2>

                    @foreach ($random_news as $item)
                    <div class="d-flex mb-3">
                        <img class="img-fluid" src="{{asset($item->image)}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        <a href="{{route('news_detail', $item->id)}}" class="h5 d-flex align-items-center bg-secondary px-3 mb-0">
                            @if (Config::get('app.locale') == 'lo')
                                {{$item->name_la}}
                            @elseif (Config::get('app.locale') == 'en')
                                {{$item->name_en}}
                            @endif
                        </a>
                    </div>
                    @endforeach

                </div>
                <!-- Recent Post End -->

            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
