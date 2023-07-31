<div>
    <!-- Breadcrumb Start
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{route('home')}}">{{__('blog.home')}}</a>
                    <span class="breadcrumb-item active">{{__('blog.service')}}</span>
                </nav>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb End -->
    <!-- Service Start 
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{__('blog.service')}}</span></h2>
        <div class="row px-xl-5">

            @foreach ($courses as $item)
                <div class="col-md-6">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <img class="img-fluid" src="{{asset($item->image)}}" alt="">
                        <div class="offer-text text-center">
                            <h3 class="text-white mb-3">
                                @if (Config::get('app.locale') == 'lo')
                                    {{$item->name_la}}
                                @elseif (Config::get('app.locale') == 'en')
                                    {{$item->name_en}}
                                @endif
                            </h3>
                            <a href="{{route('service_detail', $item->id)}}" class="btn btn-outline-light">{{__('lang.detail')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>-->
    <!-- Offer End -->

    <!-- Page Header Start-->
    <div class="container-fluid bg-dark p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="display-4 text-white">{{__('blog.course')}}</h5>
            </div>
        </div>
    </div> 
    <!-- Page Header End -->
    

    <!-- Services Start -->
    <div class="container-fluid py-6 px-5">

        <div class="row g-5">
            
            @foreach ($courses as $item)
            <div class="col-lg-6 col-md-6">
                <div class="service-item bg-secondary text-center px-5">
                    <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                        <i class="{{$item->icon}} fa-2x"></i>
                    </div>
                    <h3 class="mb-3">
                        @if(Config::get('app.locale') == 'lo')
                            {{$item->name_la}}
                        @elseif(Config::get('app.locale') == 'en')
                            {{$item->name_en}}
                        @endif
                    </h3>
                    <p class="mb-0">
                        @if(Config::get('app.locale') == 'lo')
                            {!! $item->short_des_la !!}
                        @elseif(Config::get('app.locale') == 'en')
                            {!! $item->short_des_en !!}
                        @endif
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Services End -->


</div>
