<div>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-3">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="display-4 text-white">{{__('blog.customer_dashboard')}}</h5>
                <!--
                <a href="">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Blog Grid</a>
                -->
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">

            <!-- Shop Sidebar Start-->
            
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8">
                <div class="bg-light p-4 mb-30">

                    <div class="row">
                        <div>
                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <p><h4>{{__('blog.hello')}}: {{Auth::user()->name}} - {{__('blog.tel')}}: {{Auth::user()->phone}}</h4></p>
                    </div>
                    
                    <div class="row">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{__('blog.customer_dashboard')}}</button>
                              <!--<button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">{{__('blog.e-book')}}</button>-->
                              <!--<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('blog.profile')}}</button>-->
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card text-white bg-primary mb-3" style="max-width:100%;">
                                            <div class="card-body">
                                              <h5 class="card-title text-white text-center">{{__('lang.books')}} {{__('lang.term_1')}}</h5>
                                              <hr>
                                              <h1 class="card-text text-white text-center">{{$book_1}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-white bg-warning mb-3" style="max-width:100%;">
                                            <div class="card-body">
                                              <h5 class="card-title text-white text-center">{{__('lang.books')}} {{__('lang.term_2')}}</h5>
                                              <hr>
                                              <h1 class="card-text text-white text-center">{{$book_2}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-white bg-success mb-3" style="max-width:100%;">
                                            <div class="card-body">
                                              <h5 class="card-title text-white text-center">{{__('lang.books')}} {{__('lang.term_3')}}</h5>
                                              <hr>
                                              <h1 class="card-text text-white text-center">{{$book_3}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-white bg-info mb-3" style="max-width:100%;">
                                            <div class="card-body">
                                              <h5 class="card-title text-white text-center">{{__('lang.books')}} {{__('lang.term_4')}}</h5>
                                              <hr>
                                              <h1 class="card-text text-white text-center">{{$book_4}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <h4>{{__('blog.e-book')}} - {{__('blog.total_my_ebook_this_year')}}</h4>
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
                                                    <th>{{__('lang.image')}}</th>
                                                    <th>{{__('lang.term')}}</th>
                                                    <th>{{__('lang.doc_typename')}}</th>
                                                    <th>{{__('lang.name')}}{{__('lang.books')}}</th>
                                                    <th>{{__('lang.view')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                    $stt = 1;    
                                                    @endphp
                                                    @foreach($book as $item)
                                                    <tr>
                                                        <td style="text-align: center">{{$stt++}}</td>
                                                        <td><img src="{{$item->image}}" width="50px" height="50px" alt=""></td>
                                                        <td style="text-align: center">{{$item->termname->name}}</td>
                                                        <td style="text-align: center">{{$item->booktypename->name}}</td>
                                                        <td>{{$item->name}}</td>
                                                        <td style="text-align: center">
                                                        @if(!empty($item->file))
                                                        <a href="{{url($item->file)}}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        {{$book->links()}}
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-md-4 bg-success text-light">
                            100
                        </div>
                        <div class="col-md-4 bg-warning text-light">
                            500
                        </div>
                        <div class="col-md-4 bg-info text-light">
                            200
                        </div>
                    </div>
                    -->
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</div>

