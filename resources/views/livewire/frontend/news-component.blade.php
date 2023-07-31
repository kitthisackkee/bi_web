<div>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{route('home')}}">{{__('blog.home')}}</a>
                    <span class="breadcrumb-item active">{{__('blog.news')}}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Service Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{__('blog.news')}}</span></h2>
        <div class="row px-xl-5">
            <div class="col-md-12 pb-2">
                <input type="text" wire:model="search" class="form-control" placeholder="{{__('lang.search')}}">
            </div>
        </div>
        <div class="row px-xl-5">

            @foreach ($news as $item)
                <div class="col-md-6">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <img class="img-fluid" src="{{asset($item->image)}}" alt="">
                        <div class="offer-text text-center">
                            <!--<h6 class="text-white text-uppercase">Save 20%</h6>-->
                            <h3 class="text-white mb-3">
                                @if (Config::get('app.locale') == 'lo')
                                    {{$item->name_la}}
                                @elseif (Config::get('app.locale') == 'en')
                                    {{$item->name_en}}
                                @endif
                            </h3>
                            <a href="{{route('news_detail', $item->id)}}" class="btn btn-outline-light">{{__('lang.detail')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-12">
            <nav>
            <ul class="pagination justify-content-center">
                {{ $news->links() }}
            </ul>
            </nav>
        </div>

    </div>
    <!-- Offer End -->
</div>
