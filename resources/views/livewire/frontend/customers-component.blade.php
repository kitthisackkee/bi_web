<div>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{route('home')}}">{{__('blog.home')}}</a>

                    @foreach ($customer_type as $item)
                        <a class="breadcrumb-item text-dark" href="">
                            @if (Config::get('app.locale') == 'lo')
                                {{$item->name_la}}
                            @elseif (Config::get('app.locale') == 'en')
                                {{$item->name_en}}
                            @endif
                        </a>
                    @endforeach

                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Service Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{__('blog.gov_customers')}}</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">

                    @foreach ($gov_customers as $item)
                    <div class="bg-light p-4">
                        <img src="{{asset($item->image)}}" alt="">
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{__('blog.organization_customers')}}</span></h2>
        <div class="row px-xl-5">
            
            @foreach ($customers as $item)
                <div class="col-md-3">
                    <div class="product-offer mb-30" style="height: 320px;">
                        <img class="img-fluid" src="{{asset($item->image)}}" alt="" style="object-fit: fill;">
                        <div class="offer-text text-center">
                            <!--<h6 class="text-white text-uppercase">Save 20%</h6>-->
                            <h3 class="text-white mb-3">
                                @if (Config::get('app.locale') == 'lo')
                                    {{$item->name_la}}
                                @elseif (Config::get('app.locale') == 'en')
                                    {{$item->name_en}}
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12">
                <nav>
                  <ul class="pagination justify-content-center">
                    {{ $customers->links() }}
                  </ul>
                </nav>
            </div>

        </div>
    </div>
    <!-- Offer End -->
</div>
